<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class LangController extends Controller
{
    public function switch($id){
        Session::put('lang', $id);
    }
}
