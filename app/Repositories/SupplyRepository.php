<?php


namespace App\Repositories;


use App\Models\Supply;

class SupplyRepository
{
    public function getAll()  {
        return Supply::all();
    }

    public function getWithPagination($limit, $with = [])  {
        $query = Supply::query();
        if ($with) {
            $query->with($with);
        }
        return $query->paginate($limit);
    }

    public function create($supply) {
        return Supply::create($supply);
    }

    public function update($id, $supply) {
        return Supply::where('id', $id)->update($supply);
    }

    public function delete($supply) {
        return $supply->delete();
    }
}
