<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Services\Category\CategoryService;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
         $this->categoryService = $categoryService; 
    }

    public function index()
    {
        return response()->json($this->categoryService->all());
    }

    public function store(CategoryRequest $request)
    {
        return $this->categoryService->create($request);
    }

    public function show($id)
    {
        return $this->categoryService->find($id);
    }

    public function getChildren($id) {
        return $this->categoryService->children($id);
    }

    public function update(CategoryRequest $request, $id)
    {
        return $this->categoryService->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->categoryService->destroy($id);
    }
}
