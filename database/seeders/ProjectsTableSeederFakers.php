<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Functions\Helper;

class ProjectsTableSeederFakers extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 60; $i++) {
            $new_project = new Project;
            $new_project -> title = $faker->words(9, true);
            $new_project ->slug = Helper::generateSlug($new_project->title, new Project());
            $new_project -> type = $faker->word();
            $new_project -> link = $faker->url();

            $new_project->save();
        }
    }

    public static function generateSlug($string, $model)
    {

        $slug = Str::slug($string, '-');
        $original_slug = $slug;

        $exists = $model::where('slug', $slug)->first();
        $c = 1;

        while ($exists) {
            $slug = $original_slug . '-' . $c;
            $exists = $model::where('slug', $slug)->first();
            $c++;
        }
        return $slug;
    }
}
