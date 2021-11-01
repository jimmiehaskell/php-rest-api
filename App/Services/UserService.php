<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function get($id = null)
    {
        if ($id) {
            return User::getUser($id);
        } else {
            return User::getAllUser();
        }
    }

    public function post()
    {
        return USer::insertNewUser($_POST);
    }

    public function update()
    {
    }

    public function delete()
    {
    }
}
