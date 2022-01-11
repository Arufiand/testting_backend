<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_Product');
        for($i = 1; $i <= 10; $i++){
            DB::table('categories')->insert([
                'c_name' => "Category Name ".$i
            ]);
            DB::table('products')->insert([
                'p_category_id' => $i,
                'p_name' => "Product ".$i
            ]);
            DB::table('product_details')->insert([
                'p_id' => $i,
                'pd_notes' => "Product ".$i
            ]);
        }
    }
}
