<?php

namespace App\Http\Controllers;
use App\Workstation;
use App\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    function login(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'password'=>'required'
        ]);
        $table = db::table('admins')
            ->where('name', 'like', $request->name)
            ->where('password', 'like', base64_encode($request->password))
            ->count();

        if($table==1){
            $user = db::table('admins')
                ->where('name', 'like', $request->name)
                ->where('password', 'like', base64_encode($request->password))
                ->first();
                session(['login_name'=> $user->name]);
                session(['login_user_id'=> $user->id]); 
                session(['role'=> 'admin']); 
            return redirect('/dashboard');
        }
        else
        {
             $user = db::table('user_roles')
                ->where('email', 'like', $request->name)
                ->where('password', 'like',$request->password)
                ->count();
            if($user == 1)
            {
                $row = db::table('user_roles')
                ->where('email', 'like', $request->name)
                ->where('password', 'like',$request->password)
                ->first();
                if($row->role == 1)
                {
                    session(['login_name'=> $row->name]);
                    session(['login_user_id'=> $row->id]); 
                    session(['role'=> $row->role]); 
                    return redirect('/dashboard');
                }
                if($row->role == 2)
                {
                    session(['login_name'=> $row->name]);
                    session(['login_user_id'=> $row->id]); 
                    session(['role'=> $row->role]); 
                    return redirect('/dashboard');
                }
                
            }
            else
            {
                Session::flush();
                return redirect('/login')->with('invalid', 'Invalid login !');
            }
            
        }
        
    }
    function logout()
    {
        Session::flush();
        return redirect('/login');
    }
    
    public function all_quote()
    {
        $data['allQuote'] = Quote::orderBy('id', 'desc')->get();
        // dd($data['allQuote']);
        return view('quote.all-quote', $data);
    }
    
    public function dashboard()
    {
        /* Sama */

        $categories_active = DB::table('categories')->where('status','=',1)->count();             
        $categories_deactive = DB::table('categories')->where('status','=',0)->count();             
        $categories_total = DB::table('categories')->count();

        $products_active = DB::table('products')->where('p_status','=',1)->count();             
        $products_deactive = DB::table('products')->where('p_status','=',0)->count();             
        $products_total = DB::table('products')->count();

        $attributes_total = DB::table('attributes')->count();

        $user_roles_active = DB::table('user_roles')->where('status','=',1)->count();             
        $user_roles_deactive = DB::table('user_roles')->where('status','=',0)->count();             
        $user_roles_total = DB::table('user_roles')->count();

        /* Blog */

        $blog_categories_active = DB::table('blog_categories')->where('cat_status','=',1)->count();             
        $blog_categories_deactive = DB::table('blog_categories')->where('cat_status','=',0)->count();             
        $blog_categories_total = DB::table('blog_categories')->count();

        $blog_posts_active = DB::table('blog_posts')->where('p_status','=',1)->count();             
        $blog_posts_deactive = DB::table('blog_posts')->where('p_status','=',0)->count();             
        $blog_posts_total = DB::table('products')->count();
             
        return view('home')->with([
            'categories_active'=>$categories_active,
            'categories_deactive'=>$categories_deactive,
            'categories_total'=>$categories_total,
            'products_active'=>$products_active,
            'products_deactive'=>$products_deactive,
            'products_total'=>$products_total,
            'attributes_total'=>$attributes_total,
            'user_roles_active'=>$user_roles_active,
            'user_roles_deactive'=>$user_roles_deactive,
            'user_roles_total'=>$user_roles_total,
            'blog_categories_active'=>$blog_categories_active,
            'blog_categories_deactive'=>$blog_categories_deactive,
            'blog_categories_total'=>$blog_categories_total,
            'blog_posts_active'=>$blog_posts_active,
            'blog_posts_deactive'=>$blog_posts_deactive,
            'blog_posts_total'=>$blog_posts_total
            ]);
    }
}








