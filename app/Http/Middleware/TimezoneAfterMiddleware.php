<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TimezoneAfterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // コントローラからのレスポンスを受け取る
        $response = $next($request);
        // HTMLを加⼯するのでレスポンスから取り出す
        $content = $response->content();
        // ⽬印のタグを協定標準時に書き換える
        $pattern = '/<p id="after"><\/p>/';
        $replace = '<p>現地時刻(協定標準時): ' . Carbon::now('Etc/GMT') . '</p>';
        $content = preg_replace($pattern, $replace, $content);
        // レスポンスに加⼯したHTMLをセットして出⼒する
        $response->setContent($content);
        return $response;
    }
}
