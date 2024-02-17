<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        $users = ["Johnny Depp", "Angelina Jolie", "Russell Crowe", "Tom Cruise", "Arnold Schwarzenegger"];
        $userEmail = ["johnny@gmail.com", "angelina@gmail.com", "russell@gmail.com", "tom@gmail.com", "arnold@gmail.com"];
        $roles = ["Manager", "Account", "Invoices", "Director", "Sales Team"];

        foreach ($users as $key => $user) {
            $role = Role::where("title", $roles[$key])->first();
            User::create([
                'role_id' => ($role) ? $role->id : NULL,
                'name' => $user,
                'email' => $userEmail[$key],
                'password' => Hash::make("123456"),
            ]);
        }
    }

}
