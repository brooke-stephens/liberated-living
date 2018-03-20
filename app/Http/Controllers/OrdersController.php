<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use App\ProductImage;
use App\Status;
use App\Category;
use App\Order;
use App\User;


class OrdersController extends Controller
{
    public function index(){
    	$orders = Order::all();
    	$orders = Order::paginate(20); 
    	$orders->transform(function($order, $key) {
            $order->cart = unserialize($order->cart);            
            return $order;
        });	

    	$status = Status::all();


        foreach ($orders as $order) {
        	// dd(count($order->cart->items));
        	// dd($order->User->id);	
        	// dd($order->Status->name);		
        	foreach ($order->cart->items as $item) {
        		// $itemcount =  count($item);
        	}
        }

        // echo $itemcount;

    	// foreach ($orders as $value) {
    		// foreach($value->cart->items as $item){
    	// 		echo $item['item'];

    	// 	}
    	// }

    	return view('admin.view_orders', [
    		'orders' => $orders,
    		
    	]);
    }

    public function getSingleOrder($id){
    	$images = ProductImage::where('isprimaryimage', '1')->get();
    	$order = Order::find($id);	
    	$ordersdetails = Order::find($id);
    	$statuses = Status::all();

    	
    		
            $ordersdetails->cart = unserialize($order->cart);
            // dd($ordersdetails->cart);
            // dd($order);
      		

    	return view('admin.view_single_order',[
    		'order' => $order,
    		'statuses' => $statuses,
    		'ordersdetails' => $ordersdetails,
    		'images' => $images,
    	]);
    }

    public function postSingleOrder(Request $request, $id){


  		$images = ProductImage::where('isprimaryimage', '1')->get();
    	$order = Order::find($id);	
    	$order->status_id = $request->orderstatus;
    	$order->save();
    	$ordersdetails = Order::find($id);
    	$statuses = Status::all();

		$ordersdetails->cart = unserialize($order->cart);
      		

    	return view('admin.view_single_order',[
    		'order' => $order,
    		'statuses' => $statuses,
    		'ordersdetails' => $ordersdetails,
    		'images' => $images,
    	]);
    }
}
