<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TblinterestedTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('tblinterested')->truncate();
        $json = File::get("database/cars/tblinterested.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            DB::table('tblinterested')->insert([
                'Id_interested' => $obj->Id_interested,
                'Name' => $obj->Name,
                'Phone' => $obj->Phone,
                'Email' => $obj->Email,
                'Id_car' => $obj->Id_car,
                'Status' => $obj->Status,
                'Meet_date' => $obj->Meet_date,
                'Meet_time' => $obj->Meet_time,
                'Meet_place' => $obj->Meet_place,
                'Create_date' => $obj->Create_date,
                'Create_id' => $obj->Create_id,
                'Update_date' => $obj->Update_date,
                'Update_id' => $obj->Update_id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

        }
    }
}
