<?php

namespace App\Http\Composers;

use Illuminate\View\View;
use Carbon\Carbon;

class CompanyComposer
{
    public function compose(View $view)
    {
        $company = "●●会社";
        $view->with('company', $company);

    }
}
