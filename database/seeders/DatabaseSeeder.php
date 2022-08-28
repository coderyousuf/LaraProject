<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Country;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\CountrySeeder;
use Database\Seeders\CategorySeeder;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\SubCategorySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if($this->command->confirm('Do you want to refresh the DB')){
            $this->command->call('migrate:refresh');
            $this->command->info('Database is refreshed');
        }

        $this->call([
            CountrySeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            SubCategorySeeder::class
        ]);

    }
}
