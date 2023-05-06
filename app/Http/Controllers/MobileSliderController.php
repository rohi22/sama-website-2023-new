<?php

namespace App\Http\Controllers;
use Session;
use App\MobileSlider;
use App\HomeSliderBackgroundImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MobileSliderController extends Controller
{
    function index(){
        $sliders = MobileSlider::all();
        $mobile_back_img = DB::table('home_slider_background_images')->first();
        return view('/mobile_slider/all')->with(['sliders'=>$sliders,'mobile_back_img'=>$mobile_back_img]);
    }
    function create()
    {

        return view('mobile_slider/new');
    }

    function store(Request $request)
    {
        $this->validate($request, [
            // 'h_first'   => 'required',
            // 'h_second'  => 'required',
            'image'     => 'image|mimes:jpeg,jpg,png,webp|required|max:2000',
        ]);
        
        $image = '';
        if($request->hasFile('image')) {
            $file1 =  $request->file('image');
            $img_name1 = $file1->getClientOriginalName();
            $image = uniqid().$img_name1;
            $file1->move('uploads/mobile',$image);
        }
        $table = new MobileSlider();
        // $table->h_first     = $request->h_first;
        // $table->h_second    = $request->h_second;
        $table->image      = $image;
        $table->save();
        return redirect('/mobile_sliders')->with('message', 'Mobile Slider is added !');
    }

   
    function edit($id)
    {
        return view('mobile_slider/edit',['data'=>MobileSlider::where('id', '=', $id)->first()]);
    }

    function update(Request $request)
    {

        $this->Validate($request, [
            // 'h_first'   => 'required',
            // 'h_second'  => 'required',
            'image'     => 'image|mimes:jpeg,jpg,png,webp|max:2000',
        ]);
        
        $image = '';
        $data = DB::table('mobile_sliders')->where('id','=',$request->id)->first();
        if($request->hasfile('image')){ /* Check for Image*/
            if(file_exists(public_path().'/uploads/mobile/'.$data->image)) /* Check Image path in uploads folder*/
            {
               unlink(public_path().'/uploads/mobile/'.$data->image); /*Delete Path*/
            }
            $file1 =  $request->file('image');
            $img_name1 = $file1->getClientOriginalName();
            $image = uniqid().$img_name1;
            $file1->move('uploads/mobile',$image); /*New Path*/
        }
        else
        {
            $image = $data->image; /* Assign Previous Image*/
        }
        MobileSlider::where('id', $request->id)->update(array(
            // 'h_first'       => $request->h_first,
            // 'h_second'      => $request->h_second,
            'image'         => $image
        ));

        return redirect('/mobile_sliders')->with('message', 'Mobile Slider is updated !');

    }

    function destroy(Request $request)
    {
        $row = MobileSlider::find($request->id);
        if(file_exists(public_path().'/uploads/mobile/'.$row->image))
        {
           unlink(public_path().'/uploads/mobile/'.$row->image);
        }
        $row->delete();
        return redirect('/mobile_sliders')->with('message', 'Mobile Slider is deleted !');
    }
    public function mobile_slider_back_img(Request $request)
    {
        $this->validate($request, [
            'mobile_slider_back_img'      => 'required|image|mimes:jpeg,webp,png,gif|max:2000'
        ]);
        if(DB::table('home_slider_background_images')->count())
        {
            $mobile_slider_back_img = '';
            $slider = DB::table('home_slider_background_images')->first();
            if($request->hasfile('mobile_slider_back_img')){
                if(!empty($slider->mobile_slider_back_img) && file_exists(public_path().'/uploads/mobile/'.$slider->mobile_slider_back_img))
                {
                   unlink(public_path().'/uploads/mobile/'.$slider->mobile_slider_back_img);
                }
                $file1 =  $request->file('mobile_slider_back_img');
                $img_name1 = $file1->getClientOriginalName();
                $mobile_slider_back_img = uniqid().$img_name1;
                $file1->move('uploads/mobile',$mobile_slider_back_img);
            }
            else
            {
                $mobile_slider_back_img = $slider->mobile_slider_back_img;
            }
            HomeSliderBackgroundImage::where('id', $slider->id)->update(array(
                'mobile_slider_back_img'     => $mobile_slider_back_img
            ));
            
            return redirect('/mobile_sliders')->with('message', 'background Image updated !');
        }
    }
}
