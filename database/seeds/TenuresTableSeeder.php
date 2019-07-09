<?php

use Illuminate\Database\Seeder;

class TenuresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Tenure::class)->create([
            'en' => [
                'name' => '2017-2018'
            ],
            'mr' => [
                'name' => '२०१७-२०१८'
            ]
        ]);
    }
}
