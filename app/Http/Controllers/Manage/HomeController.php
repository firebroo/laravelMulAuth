<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //
    public function index(Request $request) {
        return  $request->session()->all();
    }
}
