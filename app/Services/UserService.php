<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\User;

class UserService
{
    public function findByEmail($value)
    {
        $user = User::where('email', $value)->first();

        return $user;
    }

    public function firstOrCreate(array $fields)
    {
        $user = User::firstOrCreate($fields);

        return $user;
    }
}
