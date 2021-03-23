<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker =  Faker\Factory::create();
        for ($i=0;$i<20;$i++){
             $item = [
                 'name'=>$faker->realText(30,1)
             ];
             DB::table('category')->insert($item);
        }
    }
}
