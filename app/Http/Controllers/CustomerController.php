<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function index()
    {
        return view('admin.customer.index', ['customers' => Customer::paginate(25)]);
    }

    public function create()
    {
        return view('admin.customer.create');
    }

    public function store(Request $request)
    {
        try {
            Customer::create($request->validate([
                'name' => 'required|string|min:2|max:150',
                'email' => 'nullable|email|min:2|max:150',
                'phone' => 'nullable|min:2|max:150',
                'address' => 'nullable|min:2|max:150',
                'dob' => 'nullable|date',
                'sex' => 'nullable',
                'is_active' => 'nullable',
            ]));
        } catch (\Exception $e) {
            return back()->withWarning($e->getMessage());
        }

        return redirect('customers')->withSuccess( 'Customer saved!' );

    }

    public function show(Customer $customer)
    {
        //
    }

    public function edit(Customer $customer)
    {
        return view('admin.customer.update', ['customer' => $customer]);
    }

    public function update(Request $request, Customer $customer)
    {
        try {
            Customer::where('id', $customer->id)->update($request->validate([
                'name' => 'required|string|min:2|max:150',
                'email' => 'nullable|email|min:2|max:150',
                'phone' => 'nullable|min:2|max:150',
                'address' => 'nullable|min:2|max:150',
                'dob' => 'nullable|date',
                'sex' => 'nullable',
                'is_active' => 'nullable',
            ]));
        } catch (\Exception $e) {
            return back()->withWarning($e->getMessage());
        }

        return redirect('customers')->withSuccess( 'Customer updated!' );
    }

    public function destroy(Customer $customer)
    {
        try {
            $customer->delete();
        } catch (\Exception $e) {
            return back()->withWarning($e->getMessage());
        }

        return redirect('customers')->withSuccess( 'Customer deleted!' );

    }
}
