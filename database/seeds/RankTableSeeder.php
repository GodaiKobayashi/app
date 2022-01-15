<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ranks_name  = ['ブロンズ','シルバー','ゴールド','プラチナ','ダイヤ','マスター'];
        foreach ($ranks_name as $rank_name){
            DB::table('ranks')->insert([
            'rank_name' => $rank_name,
            'created_at' => now(),
            'updated_at' => now(),
            ]);
        }
    }
}
