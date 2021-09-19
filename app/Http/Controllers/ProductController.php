<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Services\Product\ProductService;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
         $this->productService = $productService; 
    }

    public function index()
    {
        return response()->json($this->productService->all());
    }

    public function store(ProductRequest $request)
    {
        return $this->productService->create($request);
    }

    public function show($id)
    {
        return $this->productService->find($id);
    }

    public function update(ProductRequest $request, $id)
    {
        return $this->productService->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->productService->destroy($id);
    }
}
