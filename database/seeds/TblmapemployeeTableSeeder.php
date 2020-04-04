<?php

use Illuminate\Database\Seeder;

class TblmapemployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tblmapemployee')->truncate();
        $json = File::get("database/cars/tblmapemployee.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            DB::table('tblmapemployee')->insert([
                'Id_mapemployee' => $obj->Id_mapemployee,
                'Id_user' => $obj->Id_user,
                'Id_interested' => $obj->Id_interested,
                'Create_date' => $obj->Create_date,
                'Create_id' => $obj->Create_id,
                'Update_date' => $obj->Update_date,
                'Update_id' => $obj->Update_id,
            ]);

        }
    }
}
