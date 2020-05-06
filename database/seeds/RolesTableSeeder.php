<?php

use Illuminate\Database\Seeder;

use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
        				'role' => 'Premium'
        			]);

        Role::create([
        				'role' => 'Top'
        			]);

        Role::create([
        				'role' => 'Regular'
        			]);

        Role::create([
        				'role' => 'Irregular'
        			]);
    }
}
