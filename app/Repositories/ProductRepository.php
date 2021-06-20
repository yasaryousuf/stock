<?php


namespace App\Repositories;


use App\Models\Product;

class ProductRepository
{
    public function getWithPagination($limit)  {
        return Product::paginate($limit);
    }

    public function create($product) {
        return Product::create($product);
    }

    public function update($id, $product) {
        return Product::where('id', $id)->update($product);
    }

    public function delete($product) {
        return $product->delete();
    }
}
