<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->truncate();

        DB::table('users')->insert([
                'name'     => 'Admin',
                'email'    => 'admin@admin.com',
                'password' => bcrypt('12345'),
                'is_admin' => 1,
        ],[
                'name'     => 'Admin2',
                'email'    => 'admin2@admin.com',
                'password' => bcrypt('12345'),
                'is_admin' => 0,
        ]
        );
    }
}
