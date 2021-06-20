<?php


namespace App\Repositories;


use App\Models\Customer;

class CustomerRepository
{
    public function getAll()  {
        return Customer::all();
    }

    public function getWithPagination($limit, $with = [])  {
        $query = Customer::query();
        if ($with) {
            $query->with($with);
        }
        return $query->paginate($limit);
    }

    public function create($customer) {
        return Customer::create($customer);
    }

    public function update($id, $customer) {
        return Customer::where('id', $id)->update($customer);
    }

    public function delete($customer) {
        return $customer->delete();
    }
}
