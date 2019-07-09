<?php

use App\District;
use App\Taluka;
use Illuminate\Database\Seeder;

class TalukasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Taluka::class)->create([
            'district_id' => getRandomOrCreate(District::class)->id,
            'en' => [
                'name' => 'Khatav',
            ],
            'mr' => [
                'name' => 'खटाव',
            ]
        ]);
    }
}
