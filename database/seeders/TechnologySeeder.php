<?php

namespace Database\Seeders;
use App\Models\Technology;
use Faker\Generator as faker; 



use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) { 
            $newTech = new Technology();
            $newTech->name = $faker->words(2, true);
            $newTech->save();
        }
    }
}
