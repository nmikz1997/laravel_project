<?php

namespace App\Services\Product;

use App\Models\Product;
use App\Services\BaseService;
use Illuminate\Database\Eloquent\Model;

class ProductService extends BaseService
{
    protected Model $model;

    public function __construct(Product $product)
    {
        $this->model = $product;
        $this->setSortBy('id');
    }
}
