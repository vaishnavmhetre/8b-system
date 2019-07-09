<?php

use App\District;
use Illuminate\Database\Seeder;

class DistrictsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(District::class)->create([
            'en' => [
                'name' => 'Satara',
            ],
            'mr' => [
                'name' => 'सातारा',
            ]
        ]);
    }
}
