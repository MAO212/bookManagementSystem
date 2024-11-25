<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            'book_name' => 'ほげほげ本',
            'author' => 'ほげほげ太郎',
            'publisher_name' => 'ほげほげ株式会社',
            'price' => '5000',
            'img_link' => 'hogehgoe.img',
            'ISBM' => '33aadfs3'
        ]);
        DB::table('books')->insert([
            'book_name' => 'ほげほげ料理',
            'author' => 'ほげほげ太郎',
            'publisher_name' => 'ほげほげ株式会社',
            'price' => '5000',
            'img_link' => 'hogehgoe.img',
            'ISBM' => 'aaaaaa'
        ]);
        DB::table('books')->insert([
            'book_name' => 'ほげほげプログラム',
            'author' => 'ほげほげ太郎',
            'publisher_name' => 'ほげほげ株式会社',
            'price' => '5000',
            'img_link' => 'hogehgoe.img',
            'ISBM' => 'bbbbbbb'
        ]);
        DB::table('books')->insert([
            'book_name' => 'ほげほげ',
            'author' => 'ほげほげ太郎',
            'publisher_name' => 'ほげほげ株式会社',
            'price' => '5000',
            'img_link' => 'hogehgoe.img',
            'ISBM' => 'cccccccc'
        ]);
        
    }
}
