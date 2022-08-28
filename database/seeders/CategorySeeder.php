<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seedCount=(int) $this->command->ask('How many fake data do you want me to seed?', 20);
        $categories=Category::factory($seedCount)->create();
    }
}
