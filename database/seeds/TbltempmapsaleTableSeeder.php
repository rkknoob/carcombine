<?php

use Illuminate\Database\Seeder;

class TbltempmapsaleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tbltempmapsale')->truncate();

        $json = File::get("database/cars/tblmapsale.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            DB::table('tblmapsale')->insert([
                'Id_mapsale' => $obj->Id_mapsale,
                'Id_user' => $obj->Id_user,
                'Id_interested' => $obj->Id_interested,
                'Create_date' => $obj->Create_date,
                'Create_id' => $obj->Create_id,
                'Update_date' => $obj->Update_date,
            ]);
        }
    }

    
}
