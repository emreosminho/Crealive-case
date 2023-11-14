<?php

namespace App\Services;

use App\Repositories\BlogRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class BlogService extends AbstractService
{

    public function __construct(BlogRepository $repository)
    {
        $this->repository = $repository;
        $this->modelName = 'BLOG';
    }

    public function storeModel(array $data)
    {
        try {
            DB::beginTransaction();

            $blog = $this->repository->create($data)->refresh();

            $blogToCategory = app()->make(BlogToCategory::class);

            foreach($data['categories'] as $item) {
                $blogToCategoryData = [
                    'blog_id' => $blog->id,
                    'category_id' => $item['id']
                ];

                $blogToCategory->storeModel($blogToCategoryData);
            }
        } catch (Exception $e) {
            DB::rollBack();
            $this->errorExcptionLog($message, $data, $error);
        }

        DB::commit();

        return $blog;
    }

    public function updateModel(int $id, array $data)
    {
        try {
            DB::beginTransaction();

            $blog = $this->getModel($id);

            $blogToCategoryIds = Arr::pluck($data['categories'], 'id');

            $blogToCategoryService= app()->make(BlogToCategory::class);

            $blogToCategories = $blogToCategoryService->findModels([
                'filter' => [
                    'blog_id' => $blog->id
                ]
            ]);

            foreach($blogToCategories as $blogToCategory) {
                if(in_array($blogToCategory->category_id,$blogToCategoryIds)) {
                    continue;
                }
                $query['filter']['category_id'] = $blogToCategory->category_id;

                $blogToCategoryService->deleteModelByQuery($query);
            }

            $blogToCategoryIds = Arr::pluck($blogToCategories, 'id');

            foreach($data['categories'] as $item) {
                if(in_array($item['id'], $blogToCategoryIds)) {
                    continue;
                }
                
                $blogToCategoryData = [
                    'blog_id' => $blog->id,
                    'category_id' => $item['id']
                ];

                $blogToCategoryService->storeModel($blogToCategoryData);
            }

        } catch (Exception $e) {
            DB::rollBack();
            $this->errorExcptionLog($message, $data, $error);
        }

        DB::commit();
        
        return true;
    }

    public function deleteModelById(int $id)
    {
        try {
            DB::beginTransaction();
            $blogToCategoryService= app()->make(BlogToCategory::class);
            $query['filter']['blog_id'] = $id;
            $blogToCategoryService->deleteModelByQuery($query);

            $queryForBlog['filter']['id'] = $id;
            $result = $this->repository->delete($queryForBlog);
        } catch (Exception $e) {
            DB::rollBack();
            $this->errorExcptionLog($message, $query, $error);
        }

        DB::commit();
        
        return $result;
    }
}
