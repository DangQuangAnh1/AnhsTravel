<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;

class NationController extends Controller
{
    public function index()
    {
        return view('nation');
    }
    public function show($nation_name)
    {
        $nation = DB::table('nations')->where('nation_name', $nation_name )->first();
        $tours = DB::table('tours')->where('nation_name', $nation_name )->get();
        return view('nation',['nation'=>$nation,'tours'=>$tours]);
    }
}
