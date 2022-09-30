<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;

class StyleController extends Controller
{
    public function index()
    {
        return view('style');
    }
    public function show($style_name)
    {
        $style = DB::table('styles')->where('style_name', $style_name )->first();
        $tours = DB::table('tours')->where('style_name', $style_name )->get();
        return view('style',['style'=>$style,'tours'=>$tours]);
    }
}
