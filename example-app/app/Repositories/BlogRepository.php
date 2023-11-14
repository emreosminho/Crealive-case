<?php

namespace App\Repositories;

use App\Models\Blog;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use Illuminate\Http\Request;

class BlogRepository extends AbstractRepository
{

    public function __construct(Blog $model)
    {
        $this->model = $model;
    }

    protected function queryBuilder(array $query = NULL, $pagination = NULL)
    {
        return QueryBuilder::for(Blog::class, new Request($query))
        ->allowedFilters([
            AllowedFilter::exact('id'),
            AllowedFilter::exact('user_id'),
            AllowedFilter::exact('title'),
            AllowedFilter::exact('contents'),
        ])
        ->defaultSort('-id')
        ->allowedSorts(['user_id','title','contents']);
    }
}
