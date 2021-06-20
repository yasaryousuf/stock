<?php


namespace App\Repositories;


use App\Models\Category;

class CategoryRepository
{
    public function getAll()  {
        return Category::all();
    }

    public function getWithPagination($limit, $with = [])  {
        $query = Category::query();
        if ($with) {
            $query->with($with);
        }
        return $query->paginate($limit);
    }

    public function create($category) {
        return Category::create($category);
    }

    public function update($id, $category) {
        return Category::where('id', $id)->update($category);
    }

    public function delete($category) {
        return $category->delete();
    }
}
