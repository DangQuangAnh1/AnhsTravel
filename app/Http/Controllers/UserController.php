<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(Request $request)
    {
        session()->forget('user');
        return view('user.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $checked = DB::table('users')->where('email', $request->email)->where('password', $request->password)->first();
        if($checked){
            if($checked->role == 'admin'){
                session()->put('user', $checked);
                $tours = DB::table('tours')->get();
                $talks = DB::table('talks')->get();
                $orders = DB::table('orders')->get();
                $users = DB::table('users')->get();
                return view('admin.index',['tours'=>$tours,'talks'=>$talks,'orders'=>$orders,'users'=>$users]);
            }
            else{
                session()->put('user', $checked);
                $tours = DB::table('tours')->get();
                return view('welcome', ['tours' => $tours]);
            }
        }
        else{
            return view('user.login');
        }
    }
    public function regist(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        $user=User::create($data);
        return view('user.login');
    }
}
