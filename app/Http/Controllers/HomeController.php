<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Team;
class HomeController extends Controller
{
    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        if($usertype=='1')
        {
              $TotalOrder= Order::count();
                $TotalProduct=Product::count();
                $TotalTeams=Team::count();
                $TotalUser=User::count();
                
                return view('admin.home',[
                    'TotalOrder'=>$TotalOrder,
                    'TotalProduct'=>$TotalProduct,
                    'TotalTeams' =>$TotalTeams,
                    'TotalUser'=>$TotalUser,

                ]);
        }
        else
        {

            $data = Product::paginate(6);
            $user = auth()->user();
            $count = Cart::where('phone',$user->phone)->count();
            return view('user.home',compact('data','count'));
        }
    }
    public function index()
    {
        if(Auth::id())
        {
            return redirect('redirect');
        }
        else
        {
            $data = Product::paginate(6);
            return view('user.home',compact('data'));
        }
       
    }

    public function search(Request $request)
    {
        $search=$request->search;
        if($search=='')
        {
            $data = Product::paginate(6);
            return view('user.home',compact('data'));
        }
        $data = Product::where('title','Like','%'.$search.'%')->get();
        return view('user.home',compact('data'));
    }
    public function addcart(Request $request,$id)
    {
        if(Auth::id())
        {
            $user=auth()->user();
            $product=product::find($id);
            $cart = new cart;
            $cart->name = $user->name;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->product_title=$product->title;
            $cart->price = $product->price;
            $cart->quantity = $request->quantity;
            $cart->save();
            return redirect()->back()->with('message','Product Added Successfully');
        }
        else
        {
            return redirect('login');
        }
    }
    public function showcart()
    {
        $user = auth()->user();
        $cart=Cart::where('phone',$user->phone)->get();
        $count = Cart::where('phone',$user->phone)->count();
        return view('user.showcart',compact('count','cart'));
    }
    public function deletecart($id)
    {
        $data=cart::find($id);
        $data->delete();
        return redirect()->back()->with('message','Product Removed Successfully');
    }
    public function confirmorder(Request $request)
    {
        $user = auth()->user();
        $name = $user->name;
        $phone= $user->phone;
        $address=$user->address;
        foreach($request->productname as $key=>$productname)
        {
            $order = new order;
            $order->product_name=$request->productname[$key];
            $order->price=$request->price[$key];
            $order->quantity=$request->quantity[$key];
            $order->name=$name;
            $order->phone=$phone;
            $order->address=$address;
            $order->status='not delivered';
            $order->save();
        }
        DB::table('carts')->where('phone',$phone)->delete();
        return redirect()->back()->with('message','Product Ordered Successfully');
    }
    public function productsDetails()
    {
        if(Auth::id())
        {
            return redirect('redirect');
        }
        else
        {
            $data = Product::paginate(6);
            return view('user.products',compact('data'));
        }
    }
    public function about()
    {
        if(Auth::id())
        {
            return redirect('redirect');
        }
        else
        {
            $data = Team::all();
            return view('user.about',compact('data'));
        }
    }
    public function contact()
    {
        if(Auth::id())
        {
            return redirect('redirect');
        }
        else
        {
           
            return view('user.contact');
        }
    }
    
}
