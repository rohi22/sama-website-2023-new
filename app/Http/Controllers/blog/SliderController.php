<?php

namespace App\Http\Controllers\blog;
use Session;
use App\blog\BlogSlider;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    function index(){
        $sliders = DB::table('blog_sliders')->get();
        return view('/blog/slider/all')->with(['sliders'=>$sliders]);
    }
    function create()
    {
        return view('blog/slider/new');
    }
    function store(Request $request)
    {
        $this->validate($request, [
            's_image1'         => 'image|mimes:jpeg,jpg,png,gif|required|max:2000',
            's_image2'         => 'image|mimes:jpeg,jpg,png,gif|required|max:2000',
            's_image3'         => 'image|mimes:jpeg,jpg,png,gif|required|max:2000',
        ]);
        $s_image1 = '';
        $s_image2 = '';
        $s_image3 = '';
        if($request->hasFile('s_image1')) {
            $file1 =  $request->file('s_image1');
            $img_name1 = $file1->getClientOriginalName();
            $s_image1 = uniqid().$img_name1;
            $file1->move('uploads/blog/slider',$s_image1);
        }
        if($request->hasFile('s_image2')) {
            $file1 =  $request->file('s_image2');
            $img_name1 = $file1->getClientOriginalName();
            $s_image2 = uniqid().$img_name1;
            $file1->move('uploads/blog/slider',$s_image2);
        }
        if($request->hasFile('s_image3')) {
            $file1 =  $request->file('s_image3');
            $img_name1 = $file1->getClientOriginalName();
            $s_image3 = uniqid().$img_name1;
            $file1->move('uploads/blog/slider',$s_image3);
        }
        $table                = new BlogSlider();
        $table->s_image1      = $s_image1;
        $table->s_image2      = $s_image2;
        $table->s_image3   	  = $s_image3;
        $table->save();

        return redirect('/blog/sliders')->with('message', ' Slider is added !');
    }

    function edit($id)
    {
        $slider = DB::table('blog_sliders')->where('id','=',$id)->first();
        return view('/blog/slider/edit')->with(['data'=>$slider]);
    }
    function update(Request $request)
    {

        $this->validate($request, [
            's_image1'         => 'image|mimes:jpeg,jpg,png,gif|max:2000',
            's_image2'         => 'image|mimes:jpeg,jpg,png,gif|max:2000',
            's_image3'         => 'image|mimes:jpeg,jpg,png,gif|max:2000',
        ]);

        $s_image1 = '';
        $s_image2 = '';
        $s_image3 = '';
        $slider            = DB::table('blog_sliders')->where('id','=',$request->id)->first();
        if($request->hasfile('s_image1')){
            if(file_exists(public_path().'/uploads/blog/slider/'.$slider->s_image1))
            {
               unlink(public_path().'/uploads/blog/slider/'.$slider->s_image1);
            }
            $file1 =  $request->file('s_image1');
            $img_name1 = $file1->getClientOriginalName();
            $s_image1 = uniqid().$img_name1;
            $file1->move('uploads/blog/slider',$s_image1);
        }
        else
        {
            $s_image1 = $slider->s_image1;
        }
        if($request->hasfile('s_image2')){
            if(file_exists(public_path().'/uploads/blog/slider/'.$slider->s_image2))
            {
               unlink(public_path().'/uploads/blog/slider/'.$slider->s_image2);
            }
            $file1 =  $request->file('s_image2');
            $img_name1 = $file1->getClientOriginalName();
            $s_image2 = uniqid().$img_name1;
            $file1->move('uploads/blog/slider',$s_image2);
        }
        else
        {
            $s_image2 = $slider->s_image2;
        }
        if($request->hasfile('s_image3')){
            if(file_exists(public_path().'/uploads/blog/slider/'.$slider->s_image3))
            {
               unlink(public_path().'/uploads/blog/slider/'.$slider->s_image3);
            }
            $file1 =  $request->file('s_image3');
            $img_name1 = $file1->getClientOriginalName();
            $s_image3 = uniqid().$img_name1;
            $file1->move('uploads/blog/slider',$s_image3);
        }
        else
        {
            $s_image3 = $slider->s_image3;
        }
          BlogSlider::where('id', $request->id)->update(array(
                's_image1'       => $s_image1,
                's_image2'       => $s_image2,
                's_image3'       => $s_image3,
            ));
        
    
        return redirect('/blog/sliders')->with('message', 'Slider is updated !');
    }
    function destroy(Request $request)
    {
    	$row = BlogSlider::find($request->id);
        if(file_exists(public_path().'/uploads/blog/slider/'.$row->s_image1))
        {
           unlink(public_path().'/uploads/blog/slider/'.$row->s_image1);
        }
        if(file_exists(public_path().'/uploads/blog/slider/'.$row->s_image2))
        {
           unlink(public_path().'/uploads/blog/slider/'.$row->s_image2);
        }
        if(file_exists(public_path().'/uploads/blog/slider/'.$row->s_image3))
        {
           unlink(public_path().'/uploads/blog/slider/'.$row->s_image3);
        }
        
        $row->delete();
        return redirect('/blog/sliders')->with('message', 'Slider is deleted !');
    }
  
}
