<?php

namespace App\Http\Controllers;
use Session;
use App\Sachet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class SachetController extends Controller
{
    function index(){
        $sachets = Sachet::all();
        return view('/sachet/all')->with(['sachets'=>$sachets]);
    }
    function create()
    {

        return view('sachet/new');
    }

    function store(Request $request)
    {

        $this->validate($request, [
            'sachet_title'    => 'required',
            'sachet_image'    => 'required|image|mimes:jpeg,jpg,png,gif',
        ]);
        $sachet_image = '';
        if($request->hasFile('sachet_image')) {
            $file1 =  $request->file('sachet_image');
            $img_name1 = $file1->getClientOriginalName();
            $sachet_image = uniqid().$img_name1;
            $file1->move('uploads/sachet',$sachet_image);
        }
            $image                    = new Sachet();
            $image->sachet_image = $sachet_image;
            $image->sachet_title  = $request->sachet_title;
            $image->save();
       
        return redirect('/sachets')->with('message', ' Sachet is added !');
    }

}
