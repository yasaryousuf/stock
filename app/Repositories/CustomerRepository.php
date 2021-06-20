<?php


namespace App\Repositories;


use App\Models\Customer;

class CustomerRepository
{
    public function getWithPagination($limit)  {
        return Customer::paginate($limit);
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
