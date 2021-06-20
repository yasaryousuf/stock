<?php


namespace App\Repositories;


use App\Models\Supplier;

class SupplierRepository
{
    public function getWithPagination($limit)  {
        return Supplier::paginate($limit);
    }

    public function create($supplier) {
        return Supplier::create($supplier);
    }

    public function update($id, $supplier) {
        return Supplier::where('id', $id)->update($supplier);
    }

    public function delete($supplier) {
        return $supplier->delete();
    }
}
