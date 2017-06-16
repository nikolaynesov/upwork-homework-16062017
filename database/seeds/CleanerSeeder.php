<?php

use App\City;
use App\Cleaner;
use Illuminate\Database\Seeder;

class CleanerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $cleaners = factory(Cleaner::class, 20)->create();

        foreach ($cleaners as $cleaner) {

            $cities = City::inRandomOrder()->take(2)->get();

            $cleaner->cities()->sync($cities->pluck('id')->all());

        }

    }

}
