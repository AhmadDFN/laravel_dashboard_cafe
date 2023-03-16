<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageCtrl extends Controller
{
    function home(){
        $data = [
            "title" => "Home",
            "page" => "Dashboard"
        ];
        return view('dashboard',$data);
    }
}
