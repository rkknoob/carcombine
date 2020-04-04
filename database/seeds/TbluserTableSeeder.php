<?php

use Illuminate\Database\Seeder;



class TbluserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('tbluser')->truncate();
        DB::table('tbluser')->truncate();

        $json = File::get("database/cars/tbluser.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            DB::table('tbluser')->insert([
                'id' => $obj->id,
                'Username' => $obj->Username,
                'Password' => $obj->Password,
                'Phone' => $obj->Phone,
                'Email' => $obj->Email,
                'User_level' => $obj->User_level,
                'Flag_active' => $obj->Flag_active,
                'Create_date' => $obj->Create_date,
                'Create_id' => $obj->Create_id,
                'Update_date' => $obj->Update_date,
                'Update_id' => $obj->Update_id,
                'Firstname' => $obj->Firstname,
                'Lastname' => $obj->Lastname,
            ]);
        }
    }
}
