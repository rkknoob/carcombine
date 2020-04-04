<?php

use Illuminate\Database\Seeder;
use App\Models\Car;

class CarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Car::truncate();

        $json = File::get("database/cars/car.json");

        $data = json_decode($json,true);

        foreach ($data as $obj)  {
            foreach ($obj as $key => $value) {
                $insertArr[$key] = $value;
            }
            Car::insert($insertArr);
        }
    }
}
