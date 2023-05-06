<?php

namespace App\Http\Controllers;
use Session;
use App\HomeSlider;
use App\HomeSliderBackgroundImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeSliderController extends Controller
{
    function index(){
        $sliders = HomeSlider::all();
        $home_back_img = DB::table('home_slider_background_images')->first();
        return view('/home_slider/all')->with(['sliders'=>$sliders,'home_back_img'=>$home_back_img]);
    }
    function create()
    {

        return view('home_slider/new');
    }

    function store(Request $request)
    {
        $this->validate($request, [
            // 'h_first'   => 'required',
            // 'h_second'  => 'required',
            // 'h_third'   => 'required',
            // 'h_fourth'  => 'required',
            // 'h_fifth'   => 'required',
            'contact_show'=> 'required',
            'image'     => 'image|mimes:jpeg,jpg,png,webp|required|max:2000',
        ]);
        
        $image = '';
        if($request->hasFile('image')) {
            $file1 =  $request->file('image');
            $img_name1 = $file1->getClientOriginalName();
            $image = uniqid().$img_name1;
            $file1->move('uploads/sliders',$image);
        }
        $table = new HomeSlider();
        $table->h_first     = $request->h_first;
        $table->h_second    = $request->h_second;
        $table->h_third     = $request->h_third;
        $table->h_fourth    = $request->h_fourth;
        $table->h_fifth     = $request->h_fifth;
        $table->h_sixth     = $request->h_sixth;
        $table->h_seventh   = $request->h_seventh;
        $table->contact_show= $request->contact_show;
        $table->image      = $image;
        $table->save();
        return redirect('/home-slider-list')->with('message', 'Slider is added !');
    }

   
    function edit($id)
    {
        return view('home_slider/edit',['data'=>HomeSlider::where('id', '=', $id)->first()]);
    }

    function update(Request $request)
    {

        $this->Validate($request, [
            // 'h_first'   => 'required',
            // 'h_second'  => 'required',
            // 'h_third'   => 'required',
            // 'h_fourth'  => 'required',
            // 'h_fifth'   => 'required',
            'contact_show'=> 'required',
            'image'     => 'image|mimes:jpeg,jpg,webp,png|max:2000',
        ]);
        
        // dd($request->all());
        
        $image = '';
        $data = DB::table('home_sliders')->where('id','=',$request->id)->first();
        if($request->hasfile('image')){ /* Check for Image*/
            if(file_exists(public_path().'/uploads/sliders/'.$data->image)) /* Check Image path in uploads folder*/
            {
               unlink(public_path().'/uploads/sliders/'.$data->image); /*Delete Path*/
            }
            $file1 =  $request->file('image');
            $img_name1 = $file1->getClientOriginalName();
            $image = uniqid().$img_name1;
            $file1->move('uploads/sliders',$image); /*New Path*/
        }
        else
        {
            $image = $data->image; /* Assign Previous Image*/
        }
        HomeSlider::where('id', $request->id)->update(array(
            'h_first'       => $request->h_first,
            'h_second'      => $request->h_second,
            'h_third'       => $request->h_third,
            'h_fourth'      => $request->h_fourth,
            'h_fifth'       => $request->h_fifth,
            'h_sixth'       => $request->h_sixth,
            'h_seventh'     => $request->h_seventh,
            'contact_show'  => $request->contact_show,
            'image'         => $image
        ));

        return redirect('/home-slider-list')->with('message', 'Slider is updated !');

    }

    function destroy(Request $request)
    {
        $row = HomeSlider::find($request->id);
        if(file_exists(public_path().'/uploads/sliders/'.$row->image))
        {
           unlink(public_path().'/uploads/sliders/'.$row->image);
        }
        $row->delete();
        return redirect('/home-slider-list')->with('message', 'Slider is deleted !');
    }
    public function home_slider_back_img(Request $request)
    {
        $this->validate($request, [
            'home_slider_back_img'      => 'required|image|mimes:jpeg,webp,png,gif|max:2000'
        ]);
        if(DB::table('home_slider_background_images')->count())
        {
            $home_slider_back_img = '';
            $slider = DB::table('home_slider_background_images')->first();
            if($request->hasfile('home_slider_back_img')){
                if(file_exists(public_path().'/uploads/'.$slider->home_slider_back_img))
                {
                   unlink(public_path().'/uploads/'.$slider->home_slider_back_img);
                }
                $file1 =  $request->file('home_slider_back_img');
                $img_name1 = $file1->getClientOriginalName();
                $home_slider_back_img = uniqid().$img_name1;
                $file1->move('uploads',$home_slider_back_img);
            }
            else
            {
                $home_slider_back_img = $slider->home_slider_back_img;
            }
            HomeSliderBackgroundImage::where('id', $slider->id)->update(array(
                'home_slider_back_img'     => $home_slider_back_img
            ));
            
            return redirect('/home-slider-list')->with('message', 'background Image updated !');
        }
        else
        {
            if($request->hasFile('home_slider_back_img')) {
                $file1 =  $request->file('home_slider_back_img');
                $img_name1 = $file1->getClientOriginalName();
                $home_slider_back_img = uniqid().$img_name1;
                $file1->move('uploads',$home_slider_back_img);
                
                $table = new HomeSliderBackgroundImage();
                $table->home_slider_back_img     = $home_slider_back_img;
                $table->save();
            }
                return redirect('/home-slider-list')->with('message', 'Image uploaded !');
        }
    }
}
