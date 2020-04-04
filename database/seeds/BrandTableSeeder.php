<?php

use Illuminate\Database\Seeder;
use App\Models\Car;
use App\Models\Brand;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $car_count = Car::GroupByBrandCount();
        foreach($car_count as $k => $item):
            Brand::create(['name' => $item->CarBrandName, 'sequence' => ++$k, 'image' => '/images/brand/'.strtolower($item->CarBrandName).'.png']);
        endforeach;
    }
}
