<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Article as AppArticle;
use App\Models\User as AppUser;
use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AppArticle::truncate();
        AppArticle::unguard();

        $faker = \Faker\Factory::create();

        AppUser::all()->each(function ($user) use ($faker) {
            foreach (range(1, 5) as $i) {
                AppArticle::create([
                    'user_id' => $user->id,
                    'title'   => $faker->sentence,
                    'content' => $faker->paragraphs(3, true),
                ]);
            }
        });
    }
}
