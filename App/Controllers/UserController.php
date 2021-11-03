<?php

namespace App\Controllers;

use App\Models\User;

class UserController
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
        if ($_POST != null) {
            return User::insertNewUser($_POST);
        } else {
            throw new \Exception("Todos os campos devem ser preenchidos.");
        }
    }

    public function update()
    {
    }

    public function delete()
    {
    }
}
