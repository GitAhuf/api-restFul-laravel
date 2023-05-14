<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

use Illuminate\Http\Resources\CategoryResourse;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::included()
                                ->filter()
                                ->sort()                              
                                ->getOrPaginate();
        return CategoryResource::collection($categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|max:255|unique:categories'
        ]);

        $category = Category::create($request->all());

        return $category;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = Category::included()->findOrFail($id);
        // return new CategoryResource($category);
        return CategoryResource::make($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|max:255|unique:categories,slug,' . $category->id,
        ]);

        $category->update($request->all());

        return $category;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return $category;
    }
}
