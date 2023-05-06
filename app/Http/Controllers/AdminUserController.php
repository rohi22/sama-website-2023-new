<?php

namespace App\Http\Controllers;
use Session;
use App\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminUserController extends Controller
{
    function index(){
        $users = UserRole::all();
        return view('/user_roles/all')->with(['users'=>$users]);
    }
    function create()
    {

        return view('user_roles/new');
    }

    function store(Request $request)
    {

        $this->validate($request, [
            'name'  	=> 'required',
            'email' 	=> 'required|email',
            'password' 	=> 'required',
            'contact' 	=> 'required|numeric|digits:11',
            'role' 		=> 'required',
            /*'bio_desc'  => 'required',*/
        ]);

        $table = new UserRole();
        $table->name 		= $request->name;
        $table->email 		= $request->email;
        $table->password 	= $request->password;
        $table->contact 	= $request->contact;
        $table->role 		= $request->role;
        $table->bio_desc 	= $request->bio_desc;
        $table->save();
        return redirect('/admin/users')->with('message', ' User is added !');
    }

   
    function edit($id)
    {
        return view('user_roles/edit',['data'=>UserRole::where('id', '=', $id)->first()]);
    }

    function update(Request $request)
    {

        $this->Validate($request, [
            'name'  	=> 'required',
            'email' 	=> 'required|email',
            'password' 	=> 'required',
            'contact' 	=> 'required|numeric|digits:11',
            'role' 		=> 'required',
            /*'bio_desc'  => 'required',*/
        ]);

        UserRole::where('id', $request->id)->update(array(
            'name'		=> $request->name,
            'email'		=> $request->email,
            'password'	=> $request->password,
            'bio_desc'	=> $request->bio_desc,
            'contact'	=> $request->contact,
            'role'		=> $request->role
        ));

        return redirect('/admin/users')->with('message', 'User is updated !');

    }

    function destroy(Request $request)
    {
        UserRole::where('id', $request->id)->delete();
        return redirect('/admin/users')->with('message', 'User is deleted !');
    }
}
