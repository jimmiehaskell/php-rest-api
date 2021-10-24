<?php
    namespace App\Services;

    use App\Models\User;

    class UserService
    {
        public function get($id = null)
        {
            if($id){
                return User::get_user($id);
            } else{
                return User::get_all_user();
            }
        }

        public function post()
        {
            
        }

        public function update()
        {
            
        }

        public function delete()
        {
            
        }
    }