<?php

namespace App\Http\Controllers;
use Session;
use App\Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttributeController extends Controller
{
    function index(){
        $attributes = Attribute::all();
        return view('/attribute/all')->with(['attributes'=>$attributes]);
    }
    function create()
    {

        return view('attribute/new');
    }

    function store(Request $request)
    {

        $this->validate($request, [
            'label' => 'required',
        ]);

        $table = new Attribute();
        $table->label = $request->label;
        $table->save();
        return redirect('/attributes')->with('message', ' Attribute is added !');
    }

   
    function edit($id)
    {
        return view('attribute/edit',['data'=>Attribute::where('id', '=', $id)->first()]);
    }

    function update(Request $request)
    {
        $this->validate($request, [
            'label' => 'required',
        ]);
        Attribute::where('id', $request->id)->update(array(
            'label'=> $request->label,
        ));

        return redirect('/attributes')->with('message', 'Attribute is updated !');

    }

    function destroy(Request $request)
    {
        Attribute::where('id', $request->id)->delete();
        return redirect('/attributes')->with('message', 'Attribute is deleted !');
    }
}
