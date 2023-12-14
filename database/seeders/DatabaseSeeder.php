<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\DashPackage;
use App\Models\DashCategory;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'dion',
            'password' => Hash::make('123'),
        ]);
        User::factory(2)->create();

        DashCategory::create([
            'title' => 'Other',
            'img' => 'upload/category/other.jpg',
            'slug' => 'other',
        ]);
        DashCategory::factory(8)->create();

        DashPackage::factory(200)->create();
    }
}
