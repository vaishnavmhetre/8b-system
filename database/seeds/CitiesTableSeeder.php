<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\City::class)->create([
            'taluka_id' => getRandomOrCreate(\App\Taluka::class)->id,
            'en' => [
                'name' => 'Nidhal',
            ],
            'mr' => [
                'name' => 'निढळ',
            ]
        ]);
    }
}
