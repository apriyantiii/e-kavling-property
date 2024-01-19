<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \App\Models\Admin::insert([
            [
                'name' => 'Administrator',
                'email' => 'administrator@gmail.com',
                'password' => bcrypt('123'),
                'level' => 'admin',
                'created_at' => \Carbon\Carbon::now('Asia/Jakarta')
            ],
        ]); 
    }
}
