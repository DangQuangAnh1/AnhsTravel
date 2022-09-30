<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index()
    {
        return view('search');
    }
    public function search(Request $request){
        $data = $request->validate([
            'search_input' => 'required'
        ]);
        $search_input=$request->search_input;
        return view('search',['search_result'=>$search_input]);
    }

    public function show($search_type){
        return view('search',['search_result'=>$search_type]);
    }
}
