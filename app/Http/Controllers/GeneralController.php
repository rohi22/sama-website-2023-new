<?php

namespace App\Http\Controllers;
use Session;
use App\GeneralTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GeneralController extends Controller
{
    function index(Request $request){
       
        
        if(!empty($request->filter)){
            //
            
            $res = GeneralTag::latest();
            
            if(!empty($request->title)){
                $res->where('gt_title', 'like', '%' . $request->title . '%');
            }
            
            if(!empty($request->description)){
                $res->where('gt_desc', 'like', '%' . $request->description . '%');
            }
            
            if(!empty($request->metaDescription)){
                $res->where('gt_meta_desc', 'like', '%' . $request->metaDescription . '%');
            }
            
            if(!empty($request->metaKeyWords)){
                $res->where('gt_meta_key_words', 'like', '%' . $request->metaKeyWords . '%');
            }
            
            //  dd($data->get());
            
            $data = $res->paginate(20);
            
            
        }else{
            $data = GeneralTag::paginate(20);
        }
        
        return view('tag/all')->with(['data'=>$data]);
    }
    function create(){
        return view('tag/new');
    }

    function store(Request $request){
        $this->validate($request, [
            'gt_title'  		=> 'required',
            'gt_desc' 			=> 'required',
            'gt_slug' 			=> 'required',
            //'gt_og_img' 		=> 'required|image|mimes:jpeg,jpg,png,gif|max:800',
            //'gt_icon' 			=> 'required|image|mimes:jpeg,jpg,png,gif|max:800',
            'gt_meta_desc' 		=> 'required',
            'gt_meta_key_words' => 'required',
        ]);

        $gt_og_img  = '';
        $gt_icon   = '';
        if($request->hasFile('gt_og_img')) {
            $file1 =  $request->file('gt_og_img');
            $img_name1 = $file1->getClientOriginalName();
            $gt_og_img = uniqid().$img_name1;
            $file1->move('uploads/tags',$gt_og_img);
        }
        if($request->hasFile('gt_icon')) {
            $file1 =  $request->file('gt_icon');
            $img_name1 = $file1->getClientOriginalName();
            $gt_icon = uniqid().$img_name1;
            $file1->move('uploads/tags',$gt_icon);
        }
        GeneralTag::create([
        	'gt_title'			=>	$request->gt_title,
        	'gt_meta_title'     =>  $request->gt_meta_title,
        	'gt_desc'			=>	$request->gt_desc,
        	'gt_slug'			=>	$request->gt_slug,
        	'gt_og_img'			=>	$gt_og_img,
        	'gt_icon'			=>	$gt_icon,
        	'gt_meta_desc'		=>	$request->gt_meta_desc,
        	'gt_meta_descr'    => $request->gt_meta_descr,
        	'gt_meta_key_words'	=>	$request->gt_meta_key_words,
        ]);
        return redirect('tag/tag-list')->with('message', ' Tag is added !');
    }

    function edit($id){
        return view('tag/edit',['data'=>GeneralTag::where('id', '=', $id)->first()]);
    }

    function update(Request $request){
        $this->Validate($request, [
            'gt_title'  		=> 'required',
            'gt_desc' 			=> 'required',
            'gt_slug' 			=> 'required',
            //'gt_og_img' 		=> 'image|mimes:jpeg,jpg,png,gif|max:800',
            //'gt_icon' 			=> 'image|mimes:jpeg,jpg,png,gif|max:800',
            'gt_meta_desc' 		=> 'required',
            'gt_meta_key_words' => 'required',
        ]);
        $row = GeneralTag::where('id', $request->id)->first();
        $gt_og_img  = '';
        $gt_icon   = '';
        if($request->hasfile('gt_og_img')){
            if(file_exists(public_path().'/uploads/tags/'.$row->gt_og_img)){
               unlink(public_path().'/uploads/tags/'.$row->gt_og_img);
            }
            $file1 =  $request->file('gt_og_img');
            $img_name1 = $file1->getClientOriginalName();
            $gt_og_img = uniqid().$img_name1;
            $file1->move('uploads/tags/',$gt_og_img);
        }else{
            $gt_og_img = $row->gt_og_img;
        }
        if($request->hasfile('gt_icon')){
            if(file_exists(public_path().'/uploads/tags/'.$row->gt_icon)){
               unlink(public_path().'/uploads/tags/'.$row->gt_icon);
            }
            $file1 =  $request->file('gt_icon');
            $img_name1 = $file1->getClientOriginalName();
            $gt_icon = uniqid().$img_name1;
            $file1->move('uploads/tags/',$gt_icon);
        }else{
            $gt_icon = $row->gt_icon;
        }
        GeneralTag::where('id', $request->id)->update([
            'gt_title'			=>	$request->gt_title,
            'gt_meta_title'     =>  $request->gt_meta_title,
        	'gt_desc'			=>	$request->gt_desc,
        	'gt_slug'			=>	$request->gt_slug,
        	'gt_og_img'			=>	$gt_og_img,
        	'gt_icon'			=>	$gt_icon,
        	'gt_meta_desc'		=>	$request->gt_meta_desc,
        	'gt_meta_descr'    => $request->gt_meta_descr,
        	'gt_meta_key_words'	=>	$request->gt_meta_key_words,
        ]);
        return redirect('tag/tag-list')->with('message', ' Tag is updated !');
    }
    function destroy(Request $request){
        $row = GeneralTag::where('id', $request->id)->first();
        if(file_exists(public_path().'/uploads/tags/'.$row->gt_og_img)){
            unlink(public_path().'/uploads/tags/'.$row->gt_og_img);
        }
        if(file_exists(public_path().'/uploads/tags/'.$row->gt_icon)){
            unlink(public_path().'/uploads/tags/'.$row->gt_icon);
        }
        $row->delete();
        return redirect('tag/tag-list')->with('message', ' Tag is deleted !');
    }
}
