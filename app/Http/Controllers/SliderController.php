<?php

namespace App\Http\Controllers;
use Session;
use App\Category;
use App\Slider;
use App\SliderBullet;
use App\GalleryImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SliderController extends Controller
{
    function index(){
        $sliders = DB::table('sliders')->get();
   		$categories   = DB::table('categories')->get();
        $images       = DB::table('gallery_images')
                    ->join('sliders','sliders.id','=','gallery_images.s_id')
                    ->get(['gallery_images.*']);

        $bullets       = DB::table('slider_bullets')
                    ->join('sliders','sliders.id','=','slider_bullets.s_id')
                    ->get(['slider_bullets.*']);
        
        return view('/slider/all')->with(['sliders'=>$sliders,'categories'=>$categories]);
    }
    function create()
    {
        return view('slider/new');
    }
    function store(Request $request)
    {
        
        $this->validate($request, [
            's_title'         	=> 'required',
            's_sub_title'     	=> 'required',
            's_desc'     	  	=> 'required',
            /*'s_bullets'  	  	=> 'required',*/
            's_main_image'    	=> 'image|mimes:jpeg,png,gif',
            's_background_image'=> 'image|mimes:jpeg,png,gif',
            's_gallery_images.*'  => 'image|mimes:jpeg,png,gif',
        ]);

        $s_main_image  = '';
        $s_background_image   = '';

        if($request->hasFile('s_main_image')) {
            $file1 =  $request->file('s_main_image');
            $img_name1 = $file1->getClientOriginalName();
            $s_main_image = uniqid().$img_name1;
            $file1->move('uploads',$s_main_image);
        }
        if($request->hasFile('s_background_image')) {
            $file1 =  $request->file('s_background_image');
            $img_name1 = $file1->getClientOriginalName();
            $s_background_image = uniqid().$img_name1;
            $file1->move('uploads',$s_background_image);
        }
        $table                  = new Slider();
        $table->s_title       	= $request->s_title;
        $table->s_sub_title     = $request->s_sub_title;
        $table->s_desc   		= $request->s_desc;
        $table->s_main_image    = $s_main_image;
        $table->s_background_image = $s_background_image;
        $table->save();

        $last_id  = $table->id;

        if($files = $request->file('s_gallery_images')){
            foreach($files as $file){
                $img_name = $file->getClientOriginalName();
                $s_gallery_images = uniqid().$img_name;
                $file->move('uploads/gallery',$s_gallery_images);

                $image                  = new GalleryImages();
		        $image->s_gallery_image = $s_gallery_images;
		        $image->s_id     = $last_id;
		        $image->save();
            }
        }
        if(!empty($request->s_bullets)){
            $bullets = $request->s_bullets;
            $size = sizeof($bullets);
            for( $i = 0;$i < $size;$i++)
            {
                $bullet          = new SliderBullet();
                $bullet->s_id    = $last_id;
                $bullet->s_bullet= $bullets[$i];
                $bullet->save();
            }
        }

        return redirect('/sliders')->with('message', ' Slider is added !');
    }

    function edit($id)
    {
        $images        = DB::table('gallery_images')->where('s_id','=',$id)->get();		
		$bullets        = DB::table('slider_bullets')->where('s_id','=',$id)->get();
        $data       = DB::table('sliders')->where('id','=',$id)->first();

        return view('/slider/edit')->with(['images'=>$images,'bullets'=>$bullets,'data'=>$data]);
    }

    function update(Request $request)
    {
    
        $this->validate($request, [
            's_title'         	=> 'required',
            's_sub_title'     	=> 'required',
            's_desc'     	  	=> 'required',
            /*'s_bullets'  	  	=> 'required',*/
            's_main_image'    	=> 'image|mimes:jpeg,png,gif',
            's_background_image'=> 'image|mimes:jpeg,png,gif',
            's_gallery_images.*'  => 'image|mimes:jpeg,png,gif',
        ]);
        $s_main_image  = '';
        $s_background_image   = '';

            $slider = Slider::find($request->id);
            $images        = DB::table('gallery_images')->where('s_id','=',$request->id)->get();
            if($request->hasfile('s_main_image')){
                if(file_exists(public_path().'/uploads/'.$slider->s_main_image))
                {
                   unlink(public_path().'/uploads/'.$slider->s_main_image);
                }
                $file1 =  $request->file('s_main_image');
                $img_name1 = $file1->getClientOriginalName();
                $s_main_image = uniqid().$img_name1;
                $file1->move('uploads',$s_main_image);
            }
            else
            {
                $s_main_image = $slider->s_main_image;
            }
            if($request->hasfile('s_background_image')){
                if(file_exists(public_path().'/uploads/'.$slider->s_background_image))
                {
                   unlink(public_path().'/uploads/'.$slider->s_background_image);
                }
                $file1 =  $request->file('s_background_image');
                $img_name1 = $file1->getClientOriginalName();
                $s_background_image = uniqid().$img_name1;
                $file1->move('uploads',$s_background_image);
            }
            else
            {
                $s_background_image = $slider->s_background_image;
            }
            Slider::where('id', $request->id)->update(array(
                's_title'       	=> $request->s_title,
		        's_sub_title'     	=> $request->s_sub_title,
		        's_desc'   			=> $request->s_desc,
		        's_main_image'    	=> $s_main_image,
		        's_background_image'=> $s_background_image
            ));

   
            if($files = $request->file('s_gallery_images')){

            	// unlink and delete preious images
            	$size = sizeof($images);
            	for( $i = 0;$i < $size; $i++)
            	{
            		if(file_exists(public_path().'/uploads/gallery/'.$images[$i]->s_gallery_image))
	                {
	                   unlink(public_path().'/uploads/gallery/'.$images[$i]->s_gallery_image);
	                }
            	}
            	DB::table('gallery_images')->where('s_id','=',$request->id)->delete();
	            foreach($files as $file){
	                $img_name = $file->getClientOriginalName();
	                $s_gallery_images = uniqid().$img_name;
	                $file->move('uploads/gallery',$s_gallery_images);

	                $image                  = new GalleryImages();
			        $image->s_gallery_image = $s_gallery_images;
			        $image->s_id     = $request->id;
			        $image->save();
	            }
        	}

        if(!empty($request->s_bullets))
        {
        	DB::table('slider_bullets')->where('s_id','=',$request->id)->delete();
        	$bullets = array_values(array_filter($request->s_bullets));
	        $size = sizeof($bullets);
	        for( $i = 0;$i < $size;$i++)
	        {
	            $bullet          = new SliderBullet();
	            $bullet->s_id    = $request->id;
	            $bullet->s_bullet= $bullets[$i];
	            $bullet->save();
	        }	
        }
        

        return redirect('/sliders')->with('message', 'Slider is updated !');
    }
    function destroy(Request $request)
    {
    	// Delete and unlink images

    	$row = Slider::find($request->id);
        if(file_exists(public_path().'/uploads/'.$row->s_main_image))
        {
           unlink(public_path().'/uploads/'.$row->s_main_image);
        }
        if(file_exists(public_path().'/uploads/'.$row->s_background_image))
        {
           unlink(public_path().'/uploads/'.$row->s_background_image);
        }
        
        // Delete and unlink images
        $images        = DB::table('gallery_images')->where('s_id','=',$request->id)->get();
        $size = sizeof($images);
    	for( $i = 0;$i < $size; $i++)
    	{
    		if(file_exists(public_path().'/uploads/gallery/'.$images[$i]->s_gallery_image))
            {
               unlink(public_path().'/uploads/gallery/'.$images[$i]->s_gallery_image);
            }
    	}
    	$row->delete();
        return redirect('/sliders')->with('message', 'Slider is deleted !');
    }
    
    public function assign_category()
    {
        $res = DB::table('sliders')->where('id','=',request('id'))->first();
        if(empty($res))
        {
            echo "Something went wrong";
        }
        else
        {
            if($res->s_category_id  == request('category'))
            {
                echo "Already exist..";
            }
            else
            {
                $response = DB::table('sliders')->where('id','=',request('id'))->update(['s_category_id'=>request('category')]);
                if($response == true)
                {
                    return 1;
                }
                else
                {
                    echo "Something went wrong";
                }
            }    
        }        
    }
    public function get_gallery_images()
    {

        $images = DB::table('gallery_images')->where('s_id','=',request('id'))->get();
        return $images;
    }
    public function get_bullets()
    {
    	$bullets = DB::table('slider_bullets')->where('s_id','=',request('id'))->get();
        return $bullets;
    }
    
}
