<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;
use App\Models\Tour;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class TourController extends Controller
{

    public function index(){
        $tours = DB::table('tours')->get();
        return view('admin.tour',['tours'=>$tours]);
    }

    public function show($tour_id)
    {
        $tour = DB::table('tours')->where('id', $tour_id)->first();
        $itineraries= DB::table('itineraries')->where('tour_id', $tour_id)->orderBy('day','asc')->get();
        $tour_similar = DB::table('tours')->where('style_name', $tour->style_name)->limit(3)->orderByRaw("RAND()")->get();
        $user = session()->get('user', '');
        $like=DB::table('likes')->where('tour_id', $tour_id)->where('user_id', $user->id)->first();
        return view('tour',['tour'=>$tour,'itineraries'=>$itineraries,'tour_similar'=>$tour_similar,'like'=>$like]);
    }
}
