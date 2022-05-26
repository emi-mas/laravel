<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\ShiireRequest;

class ShiireController extends Controller
{
    // 仕入入⼒画⾯
    public function index(Request $request, Response $response)
    {
        return view('shiire.index');
    }
    // 仕入処理
    public function create(ShiireRequest $request, Response $response)
    {
        return view('shiire.index');
    }
}
