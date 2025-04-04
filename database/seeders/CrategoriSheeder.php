<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Product;

class CrategoriSheeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
       $cateFake = [];
       for($i = 0; $i < 10; $i++) {
        $cateFake [] = [
            "name" =>fake()->word(),
            "status"=>fake()->numberBetween(0,1),
        ];
        DB::table("categories")->insert($cateFake);
       }
       
    }
}
