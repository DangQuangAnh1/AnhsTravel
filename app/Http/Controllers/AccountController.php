<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{

    public function index(){
        $users = DB::table('users')->get();
        return view('admin.account',['users'=>$users]);
    }

    public function update(Request $request, $id)
    {
        User::find($id)->update($request->all());
        $account=DB::table('users')->where('id',$id)->first();
        session()->put('user', $account);
        return Response::json($account);
    }
}
