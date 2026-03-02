<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function __construct()
    {
        
    }
    public function homePage(){
        return view('pages.home');
    }

    public function technologies(){
        return view('pages.home');
    }

    public function services(){
        return view('pages.home');
    }

    public function dynamic_slider(){
        return view('pages.dynamic_slider');
    }

    public function learn(){
        return view('pages.home');
    }

    public function contact(){
        return view('pages.home');
    }

    public function store(){
        return view('pages.home');
    }

    public function start_a_project(){
        return view('pages.home');
    }

}
