<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'title'=>'supperuser'
        ]);
        Role::create([
            'title'=>'agent'
        ]);
        Role::create([
            'title'=>'company'
        ]);

        Role::create([
            'title'=>'lecture'
        ]);
        Role::create([
            'title'=>'student'
        ]);
    }
}
