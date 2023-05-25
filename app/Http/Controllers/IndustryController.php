<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Industry;

class IndustryController extends Controller
{

    function index(){
        $industries = Industry::get();
        return view('/industry/all')->with(['industries'=>$industries]);
    }


    function create(){
        return view('industry/new');
    }

    function store(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'url' => 'nullable|url',
        ]);

        $industry = new Industry();
        $industry->title = $request->title;
        $industry->url = $request->url;
        $industry->save();

        return redirect('/industries')->with('message', ' Industry is added !');

    }

    function edit($id)
    {
        $industry = Industry::find($id);
        return view('/industry/edit')->with(['data'=>$industry]);
    }

    function update(Request $request)
    {
    
        $this->validate($request, [
            'title' => 'required',
            'url' => 'nullable|url',
        ]);
        $industry = Industry::find($request->id);
        
        Industry::where('id', $request->id)->update(array(
            'title'       	=> $request->title,
            'url'     	=> $request->url,
        ));
        return redirect('/industries')->with('message', 'Industry is updated !');
    }

    function destroy(Request $request)
    {

    	$industry = Industry::find($request->id);
        return redirect('/industries')->with('message', 'Industry is deleted !');
    }
}
