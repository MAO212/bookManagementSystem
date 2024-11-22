<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employees')->insert([
            'name' => 'ほげ山ほげ男',
            'pass' => 'hoge1234'
        ]);
        DB::table('employees')->insert([
            'name' => 'ほげ川ほげ男',
            'pass' => 'hoge1234'
        ]);
        DB::table('employees')->insert([
            'name' => 'ほげほげ男',
            'pass' => 'hoge1234'
        ]);
    }
}
