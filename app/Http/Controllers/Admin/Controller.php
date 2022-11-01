<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller as Base;

class Controller extends Base
{
    public function __construct()
    {
        $this->middleware('auth');
        //setlocale(LC_TIME, 'Spanish');
    }
}
