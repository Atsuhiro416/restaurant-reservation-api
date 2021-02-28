<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OwnerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => '山田太郎',
            'email' => 'taro@taro.com',
            'password' => 'taro1234'
        ];
        DB::table('owners')->insert($param);

        $param = [
            'name' => '山田次郎',
            'email' => 'jiro@jiro.com',
            'password' => 'jiro1234'
        ];
        DB::table('owners')->insert($param);

        $param = [
            'name' => '山田三郎',
            'email' => 'saburo@saburo.com',
            'password' => 'saburo1234'
        ];
        DB::table('owners')->insert($param);
    }
}
