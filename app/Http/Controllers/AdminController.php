<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function admin()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype=='1')
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
                return redirect()->back();
            }
           
        }
        else
        {
            return redirect('login');
        }
       
    }
    public function product()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype=='1')
            {
                return view('admin.product');
            }
            else
            {
                return redirect()->back();
            }
           
        }
        else
        {
            return redirect('login');
        }
        
    }
    public function uploadproduct(Request $request)
    {
        $data = new Product;
        $image = $request->file;
        $imagename = time().'.'.$image->getClientoriginalExtension();
        $request->file->move('productimage',$imagename);
        $data->image=$imagename;
        $data->title=$request->title;
        $data->price=$request->price;
        $data->description=$request->des;
        $data->quantity=$request->Qty;
        $data->save();
        return redirect()->back()->with('message','Product Added Successfully');

    }
    public function showproduct()
    {
        $data = Product::all();
        return view('admin.showproduct',compact('data'));
    }
    public function deleteproduct($id)
    {
        $data = Product::find($id);
        $data->delete();
        return redirect()->back()->with('message','Product Deleted Successfully');
    }
    public function updateview($id)
    {
        $data = Product::find($id);
        return view('admin.updateview',compact('data'));
    }
    public function updateproduct(Request $request,$id)
    {
        $data = Product::find($id);
        $data->title=$request->title;
        $data->price=$request->price;
        $data->description=$request->des;
        $data->quantity=$request->Qty;
        $image = $request->file;
        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->file->move('productimage',$imagename);
            $data->image=$imagename;
        }
        $data->save();
        return redirect()->back()->with('message','Product Updated Successfully');

    }
    public function showorder()
    {
        $order = Order::all();
        return view('admin.showorder',compact('order'));
    }
    public function updatestatus($id)
    {
        $order = Order::find($id);
        $order->status='delivered';
        $order->save();
       return redirect()->back()->with('message','Status Updated Successfully');

    }
    public function addteam()
    {
        if(Auth::id())
        {
            if(Auth::user()->usertype=='1')
            {
                return view('admin.team');
            }
            else
            {
                return redirect()->back();
            }
           
        }
        else
        {
            return redirect('login');
        }
    }
    public function uploadteam(Request $request)
    {
        $data = new Team();
        $image = $request->file;
        $imagename = time().'.'.$image->getClientoriginalExtension();
        $request->file->move('teamimage',$imagename);
        $data->image=$imagename;
        $data->person_name=$request->person_name;
        $data->person_title=$request->person_title;
        $data->details=$request->details;
        $data->save();
        return redirect()->back()->with('message','Team Added Successfully');
    }
    public function showteam()
    {
        $data = Team::all();
        return view('admin.showteam',compact('data'));
    }
    public function deleteteam($id)
    {
        $data = Team::find($id);
        $data->delete();
        return redirect()->back()->with('message','Team Deleted Successfully');
    }
    public function updateteam($id)
    {
        $data = Team::find($id);
        return view('admin.updateteam',compact('data'));
    }
    public function updateTeamData(Request $request,$id)
    {
        $data = Team::find($id);
        $data->person_name=$request->person_name;
        $data->person_title=$request->person_title;
        $data->details=$request->details;
        $image = $request->file;
        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->file->move('teamimage',$imagename);
            $data->image=$imagename;
        }
        $data->save();
        return redirect()->back()->with('message','Team Data Updated Successfully');

    }

}
