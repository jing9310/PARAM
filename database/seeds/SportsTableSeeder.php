<?php

use Illuminate\Database\Seeder;

class SportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sports = [
            ["sport_name" => "野球"],
            ["sport_name" => "サッカー"],
            ["sport_name" => "バスケットボール"],
            ["sport_name" => "バレーボール"],
            ["sport_name" => "陸上"],
            ["sport_name" => "水泳"],
            ["sport_name" => "柔道"],
            ["sport_name" => "剣道"],
            ["sport_name" => "テニス"],
            ["sport_name" => "スケート"],
            ["sport_name" => "卓球"],
            ["sport_name" => "ハンドボール"],
            ["sport_name" => "体操"],
            ["sport_name" => "ゴルフ"],
            ["sport_name" => "ラグビー"],
            ["sport_name" => "その他"],
        ];

        DB::table('sports')->insert($sports);
    }
}
