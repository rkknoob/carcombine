<?php

use Illuminate\Database\Seeder;

class Tblinterested_detailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

 
        DB::table('tblinterested_detail')->truncate();
        $json = File::get("database/cars/tblinterested_detail.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            DB::table('tblinterested_detail')->insert([
                'Id_interesteddetail' => $obj->Id_interesteddetail,
                'Id_interested' => $obj->Id_interested,
                'Status' => $obj->Status,
                'Remark' => $obj->Remark,
                'Create_date' => $obj->Create_date,
                'Create_id' => $obj->Create_id,
                'Update_date' => $obj->Update_date,
                'Update_id' => $obj->Update_id,
            ]);

        }
    }
}
