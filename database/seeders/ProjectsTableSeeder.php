<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Faker\Generator as Faker;
use App\Functions\Helper;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

     public function run(): void
     {

         }
    //  }
    // public function run(Faker $faker): void
    // {
    //     for ($i = 0; $i < 60; $i++) {
    //         $new_project = new Project;
    //         $new_project -> title = $faker->words(9, true);
    //         $new_project ->slug = Helper::generateSlug($new_project->title, new Project());
    //         $new_project -> type = $faker->word();
    //         $new_project -> link = $faker->url();

    //         $new_project->save();
    //     }
    //}
}
