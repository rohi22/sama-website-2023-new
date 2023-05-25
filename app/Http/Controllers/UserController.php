<?php

namespace App\Http\Controllers;
use App\User;
use DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index(){
        $users = DB::table('users')->orderBy('created_at','DESC')->get();
        return view('user.all')->with(['users'=>$users]);
    }

    function destroy($id){
        DB::table('users')->where('id','=',$id)->delete();
        return redirect('/users')->with('message', 'User is deleted !');
    }
}








