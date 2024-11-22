<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reviews')->insert([
            'post_content' => 'hogehogeでした',
            'score' => '5',
            'book_id' => '1',
            'employee_id' => '1'
        ]);
        DB::table('reviews')->insert([
            'post_content' => 'hogehogeでした',
            'score' => '5',
            'book_id' => '2',
            'employee_id' => '2'
        ]);
        DB::table('reviews')->insert([
            'post_content' => 'hogehogeでした',
            'score' => '5',
            'book_id' => '3',
            'employee_id' => '3'
        ]);
    }
}
