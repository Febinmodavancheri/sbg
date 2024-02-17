<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        $roles = ["Manager", "Account", "Invoices", "Director", "Sales Team"];
        foreach ($roles as $role) {
            Role::create([
                "title" => $role,
                "status" => 1
            ]);
        }
    }

}
