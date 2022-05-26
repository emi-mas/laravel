<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SingleController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Response $response)
    {
        //
        $html = <<< EOD
            <html>
            <head>
            <title>SingleController</title>
            </head>
            <body>
            <p>SingleController</p>
            {$request->path()}
            </body>
            </html>
            EOD;
        $response->setContent($html);
        return $response;
    }
}
