<?php

namespace App\Repositories;

use App\Models\Category;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use Illuminate\Http\Request;

class CategoryRepository extends AbstractRepository
{

    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    protected function queryBuilder(array $query = NULL, $pagination = NULL)
    {
        return QueryBuilder::for(Category::class, new Request($query))
        ->allowedFilters([
            'name',
            AllowedFilter::exact('id'),
            AllowedFilter::exact('name'),
        ])
        ->defaultSort('-id')
        ->allowedSorts(['id','name']);
    }
}
