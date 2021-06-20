<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\Supply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function index()
    {
        return view('admin.order.index', ['orders' => Order::with('products', 'customer')->paginate(25)]);
    }

    public function create()
    {
        return view('admin.order.create', ['customers' => Customer::all(), 'products' => Product::all()]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $order = Order::create($request->validate([
                'date' => 'required',
                'reference' => 'required|min:2|max:150',
                'note' => 'nullable|min:2|max:150',
                'customer_id' => 'nullable',
            ]));
            $i = 0;
            foreach ($request->data['product_id'] as $product_id) {
                $order->products()->attach($product_id, ['quantity' => $request->data['quantity'][$i], 'unit_price' => $request->data['unit_price'][$i]]);
                $i++;
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withWarning($e->getMessage());
        }
        return redirect('orders')->withSuccess( 'Order saved!' );
    }

    public function show(Order $order)
    {
        //
    }

    public function edit(Order $order)
    {
        //
    }

    public function update(Request $request, Order $order)
    {
        //
    }

    public function destroy(Order $order)
    {
        try {
            $order->delete();
        } catch (\Exception $e) {
            return back()->withWarning($e->getMessage());
        }

        return redirect('orders')->withSuccess( 'Order deleted!' );

    }
}
