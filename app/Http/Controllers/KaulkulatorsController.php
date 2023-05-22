<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KaulkulatorsController extends Controller
{
    public function index(){
        return view('kal.index');
    }
}
