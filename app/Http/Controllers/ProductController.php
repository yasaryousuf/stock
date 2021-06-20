<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        return view('admin.product.index', ['products' => Product::paginate(25)]);
    }

    public function create()
    {
        return view('admin.product.create', ['categories' => Category::all()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|min:2|max:150',
            'code' => 'required|min:2|max:150',
            'description' => 'nullable|min:2|max:150',
            'category_id' => 'required',
        ]);
        try {
            Product::create($data);
        } catch (\Exception $e) {
            return back()->withWarning($e->getMessage());
        }

        return redirect('products')->withSuccess( 'Product saved!' );

    }

    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        return view('admin.product.update', ['product' => $product, 'categories' => Category::all()]);
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|string|min:2|max:150',
            'code' => 'required|min:2|max:150',
            'description' => 'nullable|min:2|max:150',
            'category_id' => 'required',
        ]);
        try {
            Product::where('id', $product->id)->update($data);
        } catch (\Exception $e) {
            return back()->withWarning($e->getMessage());
        }

        return redirect('products')->withSuccess( 'Product updated!' );
    }

    public function destroy(Product $product)
    {
        try {
            $product->delete();
        } catch (\Exception $e) {
            return back()->withWarning($e->getMessage());
        }

        return redirect('products')->withSuccess( 'Product deleted!' );

    }
}
