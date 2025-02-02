<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;


class CategoryController extends Controller
{

    const NUMBER_OF_ITEMS_PER_PAGE = 25;
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        $categories = Category::paginate(self::NUMBER_OF_ITEMS_PER_PAGE);
        return inertia('Categories/Index', [
            'categories' => $categories,
            'flash' => session('success')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Categories/Create');
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param App\Http\Requests\CategoryRequest
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        Category::create($request->validated());
        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param App\Http\Requests\CategoryRequest
     * @param Category $category
     * @return \Illuminate\Http\Response
     * 
     */
    public function edit(Category $category)
    {
        return inertia('Categories/Edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     * @param App\Http\Requests\CategoryRequest
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
        
    }

    /**
     * Remove the specified resource from storage.
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category){
        $category->delete();
        return redirect()->route('categories.index');
    }
}
