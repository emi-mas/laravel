<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HelloController extends Controller
{
    // indexアクションを作成
    public function index(Request $request, Response $response)
    {
        $data = ['path' => $request->path()];
        return view('hello.index', $data);
    }

    // personアクションを作成
    public function person(Request $request, Response $response, $sei = 'test', $mei = 'taro')
    {
        $html = <<< EOD
            <html>
            <head>
            <title>Hello World</title>
            </head>
            <body>
            こんにちは!：{$sei} {$mei}
            </body>
            </html>
            EOD;
        $response->setContent($html);
        return $response;
    }
}
