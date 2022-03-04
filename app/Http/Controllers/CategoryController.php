<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;

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
    public function store(StoreCategoryRequest $request)
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
    public function show($id)
    {
        $category = Category::findOrFail($id);
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
    public function update(UpdateCategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);

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
    public function destroy(Request $request)
    {
        $ids = $request->getContent();

        foreach (json_decode($ids) as $id) {
            $type = Category::findOrFail($id);
            $type->delete();
        }
    }
}
