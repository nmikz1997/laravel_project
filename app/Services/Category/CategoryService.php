<?php

namespace App\Services\Category;

use App\Models\Category;
use App\Services\BaseService;
use Illuminate\Database\Eloquent\Model;

class CategoryService extends BaseService
{
    protected Model $model;

    public function __construct(Category $category)
    {
        $this->model = $category;
        $this->setSortBy('id');
    }
}
