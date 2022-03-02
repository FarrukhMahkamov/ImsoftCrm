<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    /**
    * Display all categories
    *
    * This method is used to display all categories.
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return CategoryResource::collection(Category::latest()->get());
    }
    
    /**
    * Store a newly created category in storage.
    *
    * This method is used to create a new category.
    * @param  \App\Http\Requests\StoreCategoryRequest  $request
    * @return \Illuminate\Http\Response
    */
    public function store(StoreCategoryRequest $request, Category $category)
    {
        $category = Category::create($request->only('name'));
        
        return new CategoryResource($category);
    }
    
    /**
    * DIsplay single category
    *
    * This method is used to display a single category.
    * @param  \App\Models\Category  $category
    * @return \Illuminate\Http\Response
    */
    public function show(Category $category)
    {
        return new CategoryResource($category);
    }
    
    /**
    * Update the specified category in storage.
    *
    * This method is used to update an existing category.
    * @param  \App\Http\Requests\UpdateCategoryRequest  $request
    * @param  \App\Models\Category  $category
    * @return \Illuminate\Http\Response
    */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->only('name'));
        
        return new CategoryResource($category);
    }
    
    /**
    * Remove the specified category from storage.
    *
    * This method is used to delete an existing category.
    * @param  \App\Models\Category  $category
    * @return \Illuminate\Http\Response
    */
    public function destroy(Category $category)
    {
        $category->delete();
        
        return response(null, 204);
    }
}
