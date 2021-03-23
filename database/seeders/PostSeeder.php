<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create();
        for ($i=0;$i<50;$i++){
            $item = [
                'title'=>$faker->title,
                'cate_id'=>rand(1,20),
                'content'=>$faker->realText('200'),
                'short_desc'=>$faker->realText('100'),
                'author'=>$faker->name
            ];
            DB::table('post')->insert($item);
        }
    }
}
