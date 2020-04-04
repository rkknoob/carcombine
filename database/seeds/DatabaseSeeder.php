<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(CarTableSeeder::class);
        $this->call(DetailTableSeeder::class);
        $this->call(BrandTableSeeder::class);
        $this->call(ColorTableSeeder::class);
        $this->call(TbluserTableSeeder::class);
        $this->call(TbltempmapsaleTableSeeder::class);
        $this->call(Tblinterested_detailTableSeeder::class);
        // $this->call(TblinterestedTableSeeder::class);
        $this->call(TblmapemployeeTableSeeder::class);
    }
}
