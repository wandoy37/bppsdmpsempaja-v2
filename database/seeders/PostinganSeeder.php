<?php

namespace Database\Seeders;

use App\Models\Postingan;
use Database\Factories\PostinganFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostinganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Postingan::factory()->count(50)->create();
    }
}
