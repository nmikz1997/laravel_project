<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Faker;

class ProductSeeder extends Seeder
{
    const COUNT_RECORD = 50;
    public function run()
    {
        $faker = Faker\Factory::create('vi_VN');
        for ($i = 1; $i<= $this::COUNT_RECORD; $i++) {
            DB::table('products')->insert([
                'name' => $faker->catchPhrase,
                'content' => $faker->realText,
                'category_id' => $faker->numberBetween(1, 9),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
