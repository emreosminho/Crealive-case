<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use App\Services\AbstractService;

class CategoryService extends AbstractService
{

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
        $this->modelName = 'CATEGORY';
    }
}
