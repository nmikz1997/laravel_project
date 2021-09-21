<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Faker;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $faker = Faker\Factory::create('vi_VN');
        for ($i = 1; $i <= 3; $i++) {
            DB::table('categories')->insert([
                'name' => 'Loại: '.$i,
                'content' => $faker->realText,
                'parent_id' => null,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
            for ($j = 1; $j <= 2; $j++) {
                DB::table('categories')->insert([
                    'name' => 'Loại: '.$i.'.'.$j,
                    'content' => $faker->realText,
                    'parent_id' => $i,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
            }
        }
    }
}
