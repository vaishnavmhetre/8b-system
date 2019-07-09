<?php

use Illuminate\Database\Seeder;

class AathBsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\AathB::class, 6)->create();
    }
}
