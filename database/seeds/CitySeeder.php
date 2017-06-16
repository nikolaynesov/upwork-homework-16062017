<?php

use App\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        foreach ($this->getData() as $item) {

            $data = array_merge($item, [

                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),

            ]);

            City::create($data);

        }


    }

    public function getData() {

        return [

            ['name' => 'New York'],
            ['name' => 'Los Angeles'],
            ['name' => 'Chicago'],
            ['name' => 'Houston'],
            ['name' => 'Philadelphia'],
            ['name' => 'Phoenix'],
            ['name' => 'San Antonio'],
            ['name' => 'San Diego'],
            ['name' => 'San Jose'],
            ['name' => 'Dallas'],

        ];

    }

}
