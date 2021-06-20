<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use App\Models\Supply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplyController extends Controller
{
    public function index()
    {
        return view('admin.supply.index', ['supplies' => Supply::with('products', 'supplier')->paginate(25)]);
    }

    public function create()
    {
        return view('admin.supply.create', ['suppliers' => Supplier::all(), 'products' => Product::all()]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $supply = Supply::create($request->validate([
                'date' => 'required',
                'reference' => 'required|min:2|max:150',
                'note' => 'nullable|min:2|max:150',
                'supplier_id' => 'nullable',
            ]));
            $i = 0;
            foreach ($request->data['product_id'] as $product_id) {
                $supply->products()->attach($product_id, ['quantity' => $request->data['quantity'][$i], 'unit_price' => $request->data['unit_price'][$i]]);
                $i++;
            }
        DB::commit();
        } catch (\Exception $e) {
        DB::rollback();
            return back()->withWarning($e->getMessage());
        }
        return redirect('supplies')->withSuccess( 'Supply saved!' );
    }

    public function show(Supply $supply)
    {
        //
    }

    public function edit(Supply $supply)
    {
        //
    }

    public function update(Request $request, Supply $supply)
    {
        //
    }

    public function destroy(Supply $supply)
    {
        try {
            $supply->delete();
        } catch (\Exception $e) {
            return back()->withWarning($e->getMessage());
        }

        return redirect('supplies')->withSuccess( 'Supply deleted!' );

    }
}
