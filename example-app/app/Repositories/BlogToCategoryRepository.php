<?php

namespace App\Repositories;

use App\Models\BlogToCategory;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use Illuminate\Http\Request;

class BlogToCategoryRepository extends AbstractRepository
{

    public function __construct(BlogToCategory $model)
    {
        $this->model = $model;
    }

    protected function queryBuilder(array $query = NULL, $pagination = NULL)
    {
        return QueryBuilder::for(BlogToCategory::class, new Request($query))
        ->allowedFilters([
            AllowedFilter::exact('category_id'),
            AllowedFilter::exact('blog_id'),
        ])
        ->defaultSort('-id')
        ->allowedSorts(['blog_id','category_id']);
    }
}
