<?php

namespace App\Http\Composers;

use Illuminate\View\View;
use Carbon\Carbon;

class DateTimeComposer
{
    public function compose(View $view)
    {
        Carbon::setLocale('ja');
        $date = Carbon::now('Asia/Tokyo');
        $day = Carbon::now('Asia/Tokyo')->isoFormat('ddd');
        $view->with('datetime', "現在時刻(JST: ⽇本時間): {$date} {$day}曜日");
    }
}
