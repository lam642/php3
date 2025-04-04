<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categoriID = DB::table("categories")->pluck("id")->toArray();
        $proSeeder = []; // mảng chứa dữ liệu
        for($i = 0; $i < 10; $i ++) {
            $proSeeder[] = [
                "name" =>fake()->name(),
                "price"=>fake()->randomNumber(),
                "quantity"=>fake()->randomNumber(),
                "image"=>fake()->image(),
                "category_id"=>fake()->randomElement($categoriID),
                "description"=>fake()->text(),
                "status"=>fake()->numberBetween(0,1),
            ];
        };
        DB::table("products")->insert($proSeeder);
    }
}
