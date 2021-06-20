<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{

    public function index()
    {
        return view('admin.supplier.index', ['suppliers' => Supplier::paginate(25)]);
    }

    public function create()
    {
        return view('admin.supplier.create');
    }

    public function store(Request $request)
    {
        try {
            Supplier::create($request->validate([
                'name' => 'required|string|min:2|max:150',
                'email' => 'nullable|email|min:2|max:150',
                'phone' => 'nullable|min:2|max:150',
                'code' => 'nullable|min:2|max:150',
                'address' => 'nullable|min:2|max:150',
                'dob' => 'nullable|date',
                'sex' => 'nullable',
                'is_active' => 'nullable',
            ]));
        } catch (\Exception $e) {
            return back()->withWarning($e->getMessage());
        }

        return redirect('suppliers')->withSuccess( 'Supplier saved!' );

    }

    public function show(Supplier $supplier)
    {
        //
    }

    public function edit(Supplier $supplier)
    {
        return view('admin.supplier.update', ['supplier' => $supplier]);
    }

    public function update(Request $request, Supplier $supplier)
    {
        try {
            Supplier::where('id', $supplier->id)->update($request->validate([
                'name' => 'required|string|min:2|max:150',
                'email' => 'nullable|email|min:2|max:150',
                'phone' => 'nullable|min:2|max:150',
                'code' => 'nullable|min:2|max:150',
                'address' => 'nullable|min:2|max:150',
                'dob' => 'nullable|date',
                'sex' => 'nullable',
                'is_active' => 'nullable',
            ]));
        } catch (\Exception $e) {
            return back()->withWarning($e->getMessage());
        }

        return redirect('suppliers')->withSuccess( 'Supplier updated!' );
    }

    public function destroy(Supplier $supplier)
    {
        try {
            $supplier->delete();
        } catch (\Exception $e) {
            return back()->withWarning($e->getMessage());
        }

        return redirect('suppliers')->withSuccess( 'Supplier deleted!' );

    }
}
