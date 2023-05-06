<?php

namespace App\Http\Controllers;
use Session;
use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    function index(){
        $menus = Menu::all();
        return view('/menu/all')->with(['menus'=>$menus]);
    }
    function create()
    {

        return view('menu/new');
    }

    function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
        ]);

        $table = new Menu();
        $table->name = $request->name;
        $table->save();
        return redirect('/menus')->with('message', ' Menu is added !');
    }

   
    function edit($id)
    {
        return view('menu/edit',['data'=>Menu::where('id', '=', $id)->first()]);
    }

    function update(Request $request)
    {

        $this->Validate($request, [
            'name' => 'required',
        ]);

        Menu::where('id', $request->id)->update(array(
            'name'=> $request->name,
        ));

        return redirect('/menus')->with('message', 'Menu is updated !');

    }

    function destroy(Request $request)
    {
        Menu::where('id', $request->id)->delete();
        return redirect('/menus')->with('message', 'Menu is deleted !');
    }
}
