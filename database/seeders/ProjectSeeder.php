<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as faker; 
use App\Models\Project;
use Illuminate\Support\Facades\Schema;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Schema::disableForeignKeyConstraints();
        Project::truncate();
        Schema::enableForeignKeyConstraints();


        for ($i=0; $i < 10; $i++) { 
            $newProject = new Project();
            $newProject->title = $faker->words(3, true);
            $newProject->description = $faker->paragraph();
            $newProject->img = "placeholders/placeholder.avif";
            
            $newProject->link_to_project = $faker->url();
            $newProject->save();
        }
    }
}
