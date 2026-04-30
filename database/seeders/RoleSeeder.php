<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'id' => 1,
                'name' => 'Admin'
            ],
            [
                'id' => 2,
                'name' => 'Barbero'
            ],
            [
                'id' => 3,
                'name' => 'Cliente'
            ],
        ]);
    }
}
