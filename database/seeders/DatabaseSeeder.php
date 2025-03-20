<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

User::create([
    'name' => 'テストユーザー',
    'email' => 'test@example.com',
    'password' => Hash::make('password'),
]);

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call([
            CompaniesTableSeeder::class,
            ProductsTableSeeder::class,
            SalesTableSeeder::class
        ]);
    }
}
