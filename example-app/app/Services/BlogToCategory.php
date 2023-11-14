<?php

namespace App\Services;

use App\Repositories\BlogToCategoryRepository;
use App\Services\AbstractService;

class BlogToCategory extends AbstractService
{

    public function __construct(BlogToCategoryRepository $repository)
    {
        $this->repository = $repository;
        $this->modelName = 'BLOG_TO_CATEGORY';
    }
}
