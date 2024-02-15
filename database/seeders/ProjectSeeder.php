<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // public function run(Faker $faker): void
    // {
    //     for ($i = 0; $i < 50; $i++) {
    //         $project = new Project();

    //         $project->title = $faker->sentence(3);
    //         $project->img = $faker->imageUrl(640, 480, 'animals', true);
    //         $project->creation_date = $faker->date();
    //         $project->description = $faker->text(300);
    //         $project->slug = Str::of($project->title)->slug('-');

    //         $project->save();
    //     }
    // }

    public function run(): void
    {
        $projects = config('projects_db');

        foreach ($projects as $project) {

            $types = Type::inRandomOrder()->first();

            $newProject = new Project();

            // $newProject->title = $project['name'];
            // $newProject->visibility = $project['visibility'];
            // $newProject->last_updated = $project['last_updated'];
            // $newProject->main_language = $project['language'];
            // $newProject->slug = $project['slug'];

            $newProject->title = $project['name'];
            $newProject->visibility = $project['visibility'];
            $newProject->last_updated = $project['last_updated'];
            $newProject->main_language = $project['language'];
            $newProject->slug = Str::of($newProject->title)->slug('-');
            $newProject->type_id = $types->id;

            $newProject->save();
        }
    }
}
