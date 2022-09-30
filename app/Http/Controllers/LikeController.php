<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;
use App\Models\Like;
use Illuminate\Support\Facades\DB;

class LikeController extends Controller
{
    public function index(Request $request){
        $user = session()->get('user', '');
        $tours=DB::table('likes')->join('tours', 'likes.tour_id', '=', 'tours.id')->where('user_id', $user->id)->get(['likes.*','tours.tour_img','tours.tour_name','tours.nation_name','tours.tour_day']);
        return view('user.like',['tours'=>$tours]);
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'tour_id' => 'required'
        ]);

        $like = Like::create($data);
        return Response::json($like);
    }
    public function destroy($id)
    {
        $memory=Like::find($id);
        Like::find($id)->delete();
        return Response::json($memory);
    }
}
