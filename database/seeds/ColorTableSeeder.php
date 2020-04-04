<?php

use Illuminate\Database\Seeder;
use App\Models\Color;
use App\Models\Car;

class ColorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $car_color = Car::DistinctColor();
        foreach($car_color as $k => $item):
            $item->CarColorName ? Color::create(['name' => $item->CarColorName]) : null;
        endforeach;
    }
}
