<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // たまご
        $param = [
            'name' => 'たまご',
            'list_price' => 200,
            'created_at' => Carbon::now('Asia/Tokyo'),
            'updated_at' => Carbon::now('Asia/Tokyo'),
        ];
        DB::table('items')->insert($param);
        // いちご
        $param = [
            'name' => 'いちご',
            'list_price' => 400,
            'created_at' => Carbon::now('Asia/Tokyo'),
            'updated_at' => Carbon::now('Asia/Tokyo'),
        ];
        DB::table('items')->insert($param);
        // トマト
        $param = [
            'name' => 'トマト',
            'list_price' => 300,
            'created_at' => Carbon::now('Asia/Tokyo'),
            'updated_at' => Carbon::now('Asia/Tokyo'),
        ];
        DB::table('items')->insert($param);
    }
}
