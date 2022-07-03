<?php

use Illuminate\Database\Seeder;

class PlacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $places = [
            ["place_name" => "アジア"],
            ["place_name" => "ヨーロッパ"],
            ["place_name" => "北アメリカ"],
            ["place_name" => "南アメリカ"],
            ["place_name" => "オセアニア"],
            ["place_name" => "アフリカ"],
            ["place_name" => "北海道"],
            ["place_name" => "青森県"],
            ["place_name" => "岩手県"],
            ["place_name" => "宮城県"],
            ['place_name' => '秋田県'],
            ['place_name' => '山形県'],
            ['place_name' => '福島県'],
            ['place_name' => '茨城県'],
            ['place_name' => '栃木県'],
            ['place_name' => '群馬県'],
            ['place_name' => '埼玉県'],
            ['place_name' => '千葉県'],
            ['place_name' => '東京都'],
            ['place_name' => '神奈川県'],
            ['place_name' => '新潟県'],
            ['place_name' => '富山県'],
            ['place_name' => '石川県'],
            ['place_name' => '福井県'],
            ['place_name' => '山梨県'],
            ['place_name' => '長野県'],
            ['place_name' => '岐阜県'],
            ['place_name' => '静岡県'],
            ['place_name' => '愛知県'],
            ['place_name' => '三重県'],
            ['place_name' => '滋賀県'],
            ['place_name' => '京都府'],
            ['place_name' => '大阪府'],
            ['place_name' => '兵庫県'],
            ['place_name' => '奈良県'],
            ['place_name' => '和歌山県'],
            ['place_name' => '鳥取県'],
            ['place_name' => '島根県'],
            ['place_name' => '岡山県'],
            ['place_name' => '広島県'],
            ['place_name' => '山口県'],
            ['place_name' => '徳島県'],
            ['place_name' => '香川県'],
            ['place_name' => '愛媛県'],
            ['place_name' => '高知県'],
            ['place_name' => '福岡県'],
            ['place_name' => '佐賀県'],
            ['place_name' => '長崎県'],
            ['place_name' => '熊本県'],
            ['place_name' => '大分県'],
            ['place_name' => '宮崎県'],
            ['place_name' => '鹿児島県'],
            ['place_name' => '沖縄県'],
        ];
        DB::table('places')->insert($places);
    }
}
