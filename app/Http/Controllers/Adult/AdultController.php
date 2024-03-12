<?php

namespace App\Http\Controllers\Adult;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdultController extends Controller
{
    public function returnPage(Request $requset){
        return view('adult.home');
    }
}
