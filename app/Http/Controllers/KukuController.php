<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class KukuController extends Controller
{
    // indexアクションを作成
    public function index(Request $request, Response $response, $dan = 9)
    {
        try{
            if($dan < 1 || $dan > 9){
                throw new \Exception("1-9の数字以外がパラメーターにセットされている");
            }
        }catch(\Exception $e){
            echo "エラー：" . $e->getMessage();
            exit;
        }

        $data = [
            'path' => $request->path(),
            'dan' => $dan
        ];
        return view('kuku.index', $data);
    }
}
