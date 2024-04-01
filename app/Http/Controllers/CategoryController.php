<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->paginate(5);
        return view('category.index', compact('categories'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $input = $request->all();
        category::create($input);
        return redirect()->route('categories.index')
            ->with('success', 'category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, category $category)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $input = $request->all();
        $category->update($input);
        return redirect()->route('categories.index')
            ->with('success', 'category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')
            ->with('success', 'category deleted successfully');
    }
}
