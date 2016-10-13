<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }
    
    public function photos()
    {
        return view('pages.photos');
    }
    
    public function blog()
    {
        return view('pages.blog');
    }
    
    public function info()
    {
        return view('pages.info');
    }
}
