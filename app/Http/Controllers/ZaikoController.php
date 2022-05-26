<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ZaikoController extends Controller
{
    // indexアクションを作成
    public function index(Request $request, Response $response){
        $items = [
            ['no' => 1, 'name' => 'トマト', 'zaiko' => 30, 'kakaku' => 290,'last_shiire_date' => '2021-05-26 12:00', 'last_hanbai_date' => '2021-06-01 15:30'],
            ['no' => 2, 'name' => 'きゅうり', 'zaiko' => 10, 'kakaku' => 90,
            'last_shiire_date' => '2021-05-27 12:00', 'last_hanbai_date' => '2021-06-02
            15:30'],
            ['no' => 3, 'name' => 'たまご', 'zaiko' => 35, 'kakaku' => 190,
            'last_shiire_date' => '2021-05-28 12:00', 'last_hanbai_date' => '2021-06-03
            15:30'],
            ['no' => 4, 'name' => 'レタス', 'zaiko' => 28, 'kakaku' => 150,
            'last_shiire_date' => '2021-05-29 12:00', 'last_hanbai_date' => '2021-06-04
            15:30'],
            ['no' => 5, 'name' => 'だいこん', 'zaiko' => 34, 'kakaku' => 200,
            'last_shiire_date' => '2021-05-31 12:30', 'last_hanbai_date' => '2021-06-05
            15:30'],
        ];
        // $data = ['path' => $request->path()];
        $data = [
            'items' => $items,
            'honolulu_datetime' => $request->honolulu_datetime // ミドルウェアからの値をビューに渡す
        ];
        return view('zaiko.index',$data);
    }
}
