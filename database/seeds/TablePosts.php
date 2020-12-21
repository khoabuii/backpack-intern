<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablePosts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('posts')->truncate();

        DB::table('posts')->insert([
                'title'     => 'Dựa báo kết quả trận đấu',
                'summary'    => 'dsvg dsgdgs fgg',
                'content' => 'content text deshdhfgfg',
                'image'=> null,
                'category' => 1,
        ],[
                'title'     => 'Dựa báo kết quả trận đấudsadsd',
                'summary'    => 'dsvddg dsgdgs fgdssadg',
                'content' => 'content text deshsdssdsasddhfgfg',
                'image'=> null,
                'category' => 2,
        ]
        );
    }
}
