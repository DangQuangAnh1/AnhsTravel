<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Talk;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $tours = DB::table('tours')->get();
        return view('welcome',['tours'=>$tours]);
    }

    public function admin_home(){
        $tours = DB::table('tours')->get();
        $talks = DB::table('talks')->get();
        $orders = DB::table('orders')->get();
        $users = DB::table('users')->get();
        return view('admin.index',['tours'=>$tours,'talks'=>$talks,'orders'=>$orders,'users'=>$users]);
    }

    public function admin_talk(){
        $talks = DB::table('talks')->join('users', 'talks.sender', '=', 'users.id')->get(['talks.*','users.name']);
        return view('admin.talk',['talks'=>$talks]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'sender' => 'required',
            'receiver' => 'required',
            'title' => 'required',
            'description' => 'required'

        ]);

        $talk = Talk::create($data);
        return Response::json($talk);
    }

    public function destroy($id)
    {
        Talk::find($id)->delete();
        return Response::json(['data'=>'removed'],200);
    }

}
