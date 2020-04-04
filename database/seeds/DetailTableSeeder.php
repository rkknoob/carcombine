<?php

use Illuminate\Database\Seeder;
use App\Models\Detail;

class DetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Detail::truncate();

        $json = File::get("database/cars/details.json");

        $data = json_decode($json);

        foreach ($data as $obj)  {
            foreach ($obj as $key => $value) {
                $insertArr[$key] = $value;
            }
            Detail::insert($insertArr);
        }
    }
}
