<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param  = [
            'name' => '太郎園',
            'category' => '居酒屋',
            'image' => '写真',
            'introduction' => 'おいしい居酒屋',
            'address' => '東京都武蔵野市吉祥寺1-1-1',
            'owner_id' => 1,
        ];
        DB::table('stores')->insert($param);

        $param  = [
            'name' => '太郎の焼肉',
            'category' => '焼肉',
            'image' => '写真',
            'introduction' => 'おいしい焼肉',
            'address' => '東京都武蔵野市吉祥寺1-1-1',
            'owner_id' => 1,
        ];
        DB::table('stores')->insert($param);

        $param  = [
            'name' => '次郎カフェ',
            'category' => '喫茶',
            'image' => '写真',
            'introduction' => 'おいしい喫茶',
            'address' => '東京都武蔵野市吉祥寺1-1-1',
            'owner_id' => 2,
        ];
        DB::table('stores')->insert($param);

        $param  = [
            'name' => '次郎パフェ',
            'category' => 'スイーツ',
            'image' => '写真',
            'introduction' => 'おいしいパフェ',
            'address' => '東京都武蔵野市吉祥寺1-1-1',
            'owner_id' => 2,
        ];
        DB::table('stores')->insert($param);

        $param  = [
            'name' => '三郎定食',
            'category' => '定食',
            'image' => '写真',
            'introduction' => 'おいしい定食',
            'address' => '東京都武蔵野市吉祥寺1-1-1',
            'owner_id' => 3,
        ];
        DB::table('stores')->insert($param);

        $param  = [
            'name' => '三郎バーガー',
            'category' => 'ファストフード',
            'image' => '写真',
            'introduction' => 'おいしいハンバーガー',
            'address' => '東京都武蔵野市吉祥寺1-1-1',
            'owner_id' => 3,
        ];
        DB::table('stores')->insert($param);
    }
}
