<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(DistrictsTableSeeder::class);
         $this->call(TalukasTableSeeder::class);
         $this->call(CitiesTableSeeder::class);
         $this->call(TenuresTableSeeder::class);
         $this->call(AathBsTableSeeder::class);
    }
}
