<?php

namespace App\Http\Controllers;
use Session;
use App\Commodity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommodityController extends Controller
{
    function index(){
        $commodities = Commodity::all();
        return view('/commodity/all')->with(['commodities'=>$commodities]);
    }
    function create()
    {

        return view('commodity/new');
    }

    function store(Request $request)
    {

        $this->validate($request, [
            'commodity_name'    => 'required',
            'commodity_images'    => 'required|image|mimes:jpeg,jpg,png,gif',
        ]);
        $commodity_images = '';
        if($request->hasFile('commodity_images')) {
            $file1 =  $request->file('commodity_images');
            $img_name1 = $file1->getClientOriginalName();
            $commodity_images = uniqid().$img_name1;
            $file1->move('uploads/commodity',$commodity_images);
        }
            $image                    = new Commodity();
            $image->commodity_images = $commodity_images;
            $image->commodity_name  = $request->commodity_name;
            $image->save();
       
        return redirect('commodities')->with('message', ' Commodity is added !');
    }
}
