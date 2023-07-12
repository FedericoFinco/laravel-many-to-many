<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as faker; 
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) { 
            $newProject = new Project();
            $newProject->title = $faker->words(3, true);
            $newProject->description = $faker->paragraph();
            $newProject->img = $faker->imageUrl(360, 360, 'animals', true, 'dogs', true, 'jpg');
            $newProject->link_to_project = $faker->url();
            $newProject->save();
        }
    }
}
