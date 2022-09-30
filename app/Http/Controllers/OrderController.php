<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function admin_order(){
        $tours=DB::table('orders')->join('tours', 'orders.tour_id', '=', 'tours.id')->get(['orders.*','tours.tour_img','tours.tour_name','tours.nation_name','tours.tour_day','tours.tour_price']);
        return view('admin.order',['tours'=>$tours]);
    }

    public function admin_turnover(){
        $tours = DB::table('tours')->get();
        $talks = DB::table('talks')->get();
        $orders=DB::table('orders')->join('tours', 'orders.tour_id', '=', 'tours.id')->get(['orders.*','tours.tour_price']);
        $users = DB::table('users')->get();
        return view('admin.turnover',['tours'=>$tours,'talks'=>$talks,'orders'=>$orders,'users'=>$users]);
    }

    public function index(Request $request){
        $user = session()->get('user', '');
        $tours=DB::table('orders')->where('user_id',$user->id)->join('tours', 'orders.tour_id', '=', 'tours.id')->get(['orders.*','tours.tour_img','tours.tour_name','tours.nation_name','tours.tour_day','tours.tour_price']);
        return view('user.order',['tours'=>$tours]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' =>'required',
            'tour_id' =>'required',
            'name' =>'required',
            'phone_number' =>'required',
            'travel_date' =>'required',
            'adults' =>'required',
            'childrens' =>'required',
            'payment' =>'required',
            'note' =>'required',
            'status' =>'required'
        ]);
        $order = Order::create($data);
        return Response::json($order);
    }

    public function destroy($id)
    {
        Order::find($id)->delete();
        return Response::json(['data'=>'removed'],200);
    }

    public function update(Request $request,$id)
    {
        Order::find($id)->update($request->all());
        $user = session()->get('user', '');
        $tours=DB::table('orders')->where('user_id',$user->id)->join('tours', 'orders.tour_id', '=', 'tours.id')->get(['orders.*','tours.tour_img','tours.tour_name','tours.nation_name','tours.tour_day','tours.tour_price']);
        return Response::json($tours);
    }
}
