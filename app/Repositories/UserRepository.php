<?php


namespace App\Repositories;


use App\Models\User;

class UserRepository
{
    public function getAll()  {
        return User::all();
    }

    public function getWithPagination($limit, $with = [])  {
        $query = User::query();
        if ($with) {
            $query->with($with);
        }
        return $query->paginate($limit);
    }

    public function create($user) {
        return User::create($user);
    }

    public function update($id, $user) {
        return User::where('id', $id)->update($user);
    }

    public function delete($user) {
        return $user->delete();
    }
}
