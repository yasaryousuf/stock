<?php


namespace App\Repositories;


use App\Models\Order;

class OrderRepository
{
    public function getAll()  {
        return Order::all();
    }

    public function getWithPagination($limit, $with = [])  {
        $query = Order::query();
        if ($with) {
            $query->with($with);
        }
        return $query->paginate($limit);
    }

    public function create($order) {
        return Order::create($order);
    }

    public function update($id, $order) {
        return Order::where('id', $id)->update($order);
    }

    public function delete($order) {
        return $order->delete();
    }
}
