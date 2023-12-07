<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostContoller extends Controller
{
    public function index(){
        dd(auth()->user());
    }
}

?>