<?php

namespace App\Http\Controllers;

use App\Tranining;
use Illuminate\Http\Request;

class TraniningController extends Controller
{
    function index(){

        return view('tranining', ['trans' => Tranining::all()]);
    }
}
