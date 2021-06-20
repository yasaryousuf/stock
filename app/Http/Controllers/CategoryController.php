<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index', ['categories' => Category::paginate(25)]);
    }

    public function create()
    {
        return view('admin.category.create', ['categories' => Category::all()]);
    }

    public function store(Request $request)
    {
        try {
            Category::create($request->validate([
                'name' => 'required|string|min:2|max:150',
                'slug' => 'nullable|string|min:2|max:150',
                'details' => 'nullable|string|min:2|max:150',
                'unit' => 'nullable|string|min:2|max:150',
                'parent_id' => 'nullable',
            ]));
        } catch (\Exception $e) {
            return back()->withWarning($e->getMessage());
        }

        return redirect('categories')->withSuccess( 'Category saved!' );
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('admin.category.update', ['category' => $category, 'categories' => Category::all()]);
    }

    public function update(Request $request, Category $category)
    {
        try {
            Category::where('id', $category->id)->update($request->validate([
                'name' => 'required|string|min:2|max:150',
                'slug' => 'nullable|string|min:2|max:150',
                'details' => 'nullable|string|min:2|max:150',
                'unit' => 'nullable|string|min:2|max:150',
                'parent_id' => 'nullable',
            ]));
        } catch (\Exception $e) {
            return back()->withWarning($e->getMessage());
        }

        return redirect('categories')->withSuccess( 'Category updated!' );
    }

    public function destroy(Category $category)
    {
        try {
            $category->delete();
        } catch (\Exception $e) {
            return back()->withWarning($e->getMessage());
        }

        return redirect('categories')->withSuccess( 'Category deleted!' );

    }
}
