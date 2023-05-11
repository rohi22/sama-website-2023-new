<?php

namespace App\Http\Controllers;
use Session;
use App\Logo;
use App\AboutImage;
use App\About;
use App\ContactPage;
use App\FooterSection;
use App\AwardImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    function index(){
        $sliders = HomeSlider::all();
        $home_back_img = DB::table('home_slider_background_images')->first();
        return view('/home_slider/all')->with(['sliders'=>$sliders,'home_back_img'=>$home_back_img]);
    }
    function create()
    {
    	$logos = DB::table('logos')->first();
    	dd($logos);
        return view('setting/new')->with(['logos'=>$logos]);
    }

    function store(Request $request)
    {
        
        $header_logo = '';
        $footer_logo = '';
        $favicon_logo = '';

        if(DB::table('logos')->count())
        {

        	$logo = DB::table('logos')->first();
            
            if($request->hasfile('header_logo')){
                if(file_exists(public_path().'/uploads/logos/'.$logo->header_logo))
                {
                   unlink(public_path().'/uploads/logos/'.$logo->header_logo);
                }
	            $file1 =  $request->file('header_logo');
	            $img_name1 = $file1->getClientOriginalName();
	            $header_logo = uniqid().$img_name1;
	            $file1->move('uploads/logos',$header_logo);
            }
            else
            {
                $header_logo = $logo->header_logo;
            }
            if($request->hasfile('footer_logo')){
                if(file_exists(public_path().'/uploads/logos/'.$logo->footer_logo))
                {
                   unlink(public_path().'/uploads/logos/'.$logo->footer_logo);
                }
	            $file1 =  $request->file('footer_logo');
	            $img_name1 = $file1->getClientOriginalName();
	            $footer_logo = uniqid().$img_name1;
	            $file1->move('uploads/logos',$footer_logo);
            }
            else
            {
                $footer_logo = $logo->footer_logo;
            }
            if($request->hasfile('favicon_logo')){
                if(file_exists(public_path().'/uploads/logos/'.$logo->favicon_logo))
                {
                   unlink(public_path().'/uploads/logos/'.$logo->favicon_logo);
                }
	            $file1 =  $request->file('favicon_logo');
	            $img_name1 = $file1->getClientOriginalName();
	            $favicon_logo = uniqid().$img_name1;
	            $file1->move('uploads/logos',$favicon_logo);
            }
            else
            {
                $favicon_logo = $logo->favicon_logo;
            }
            
            Logo::where('id', $logo->id)->update(array(
                'header_logo'     => $header_logo,
                'footer_logo'     => $footer_logo,
                'favicon_logo'    => $favicon_logo,
                'home_icon'       => $request->home_icon,
                'meta_title'      => $request->meta_title,
                'meta_desc'       => $request->meta_desc
            ));
	                
	        return redirect('/setting/logo')->with('message', 'Logo & favicon is updated !');
	    }
	    else
	    {
		    $this->validate($request, [
	            'header_logo'   => 'required|image|mimes:jpeg,png,gif,mp4|max:2000',
	            'footer_logo'  	=> 'required|image|mimes:jpeg,png,gif,mp4|max:2000',
	            'favicon_logo'  => 'required|image|mimes:jpeg,png,gif|max:2000',
	        ]);
	    	if($request->hasFile('header_logo')) {
	            $file1 =  $request->file('header_logo');
	            $img_name1 = $file1->getClientOriginalName();
	            $header_logo = uniqid().$img_name1;
	            $file1->move('uploads/logos',$header_logo);
	        }
	        if($request->hasFile('footer_logo')) {
	            $file1 =  $request->file('footer_logo');
	            $img_name1 = $file1->getClientOriginalName();
	            $footer_logo = uniqid().$img_name1;
	            $file1->move('uploads/logos',$footer_logo);
	        }
	        if($request->hasFile('favicon_logo')) {
	            $file1 =  $request->file('favicon_logo');
	            $img_name1 = $file1->getClientOriginalName();
	            $favicon_logo = uniqid().$img_name1;
	            $file1->move('uploads/logos',$favicon_logo);
	        }
	        
	        $table = new Logo();
	        $table->header_logo     = $header_logo;
	        $table->footer_logo     = $footer_logo;
	        $table->favicon_logo    = $favicon_logo;
	        $table->home_icon       = $request->home_icon;
	        $table->meta_title      = $request->meta_title;
	        $table->meta_desc       = $request->meta_desc;
	        $table->save();
	                
	        return redirect('/setting/logo')->with('message', 'Logo & favicon is added !');
	    }
    }
    public function about_us()
    {

       	$about 	 = DB::table('abouts')->first();
        $images  = DB::table('about_images')->where('about_id','=',$about->id)->get();
		$awardImages = DB::table('award_images')->get();
    	return view('setting.about')->with(['about'=>$about,'images'=>$images,'awardImages'=>$awardImages]);
    }
    public function about_store(Request $request)
    {

    	if(DB::table('abouts')->count())
        {
        	$about 	 = DB::table('abouts')->first();
        	$images  = DB::table('about_images')->where('about_id','=',$about->id)->get();
	    	$this->validate($request, [
	            'title'       => 'required',
	            'desc'        => 'required',
	            'image.*'     => 'image|mimes:jpeg,jpg,png,gif|max:2000',
	        ]);
	   
	        About::where('id', $about->id)->update(array(
                'title'     => $request->title,
                'desc'      => $request->desc,
                'heading'   => $request->heading,
                'description' => $request->description,
                'points' => isset($request->points) ? json_encode($request->points) : '[]',
            ));

	        $last_id  = $about->id;

	        if($files = $request->file('image')){
	            // unlink and delete preious images
	            $size = sizeof($images);
	            for( $i = 0;$i < $size; $i++)
	            {
	                if(file_exists(public_path().'/uploads/about/'.$images[$i]->about_image))
	                {
	                   unlink(public_path().'/uploads/about/'.$images[$i]->about_image);
	                }
	            }
	            DB::table('about_images')->where('about_id','=',$about->id)->delete();
	            foreach($files as $file){
	                $img_name = $file->getClientOriginalName();
	                $image = uniqid().$img_name;
	                $file->move('uploads/about',$image);

	                $img                  = new AboutImage();
	                $img->about_id     = $last_id;
	                $img->about_image  = $image;
	                $img->save();
	            }
	        }
			if($award_image=$request->file('award_image')){
				$img_name = $award_image->getClientOriginalName();
				$image = uniqid().$img_name;
				$award_image->move('uploads/award',$image);

				$img = new AwardImages();
				$img->images = $image;
				$img->save();
			}


	       return redirect('/about-us')->with('message', 'Content Updated !');
	    }
	    else
	    {	
	    	$this->validate($request, [
	            'title'       => 'required',
	            'desc'        => 'required',
	            'image'       => 'required',
	            'image.*'     => 'image|mimes:jpeg,jpg,png,gif|max:2000',
	        ]);
	   
	    	$table = new About();
	        $table->title     = $request->title;
	        $table->desc      = $request->desc;
	        $table->save();

	        $last_id  = $table->id;

	        if($files = $request->file('image')){
	            foreach($files as $file){
	                $img_name = $file->getClientOriginalName();
	                $image = uniqid().$img_name;
	                $file->move('uploads/about',$image);

	                $img                  = new AboutImage();
	                $img->about_id     = $last_id;
	                $img->about_image  = $image;
	                $img->save();
	            }
	        }

	       return redirect('/about-us')->with('message', 'Content submitted !');
	    }
    }

	public function delete_Award_images($id){
		$img =  AwardImages::find($id);
		if(file_exists(public_path().'/uploads/award/'.$img->images)){
			unlink(public_path().'/uploads/award/'.$img->images);
		}
		$img->delete();
		return redirect('/about-us')->with('message', 'Award Image Updated !');
	}

    public function change_password()
    {
    	 return view('setting/change_password');
    }
    public function changeed_password(Request $request)
    {
    	$this->validate($request, [
            'current_password'       => 'required',
            'new_password'        	=> 'required',
        ]);
    	$user = DB::table('admins')->first();
    	if($request->current_password == base64_decode($user->password))
    	{
    		DB::table('admins')->where('id', $user->id)->update(array(
                'password'     => base64_encode($request->new_password)
            ));
    		return redirect('/setting/change-password')->with('message', 'Password Changed Successfully; !');	
    	}
    	else
    	{
    		return redirect('setting/change-password')->with('message_danger', 'Current Password does not match.; !');
    	}
       
    }

    public function contact_us()
    {
    	$data 	 = DB::table('contact_pages')->first();
    	return view('setting/contact_us')->with(['data'=>$data]);
    }
    public function contact_us_store(Request $request)
    {
    	//return dd($request->all());
    	if(DB::table('contact_pages')->count())
        {
        	
        	$this->validate($request, [
		        'title'   		=> 'required',
		        's_1_name'  	=> 'required',
		        's_1_email'   	=> 'required',
		        's_1_phone'   	=> 'required',
		        's_2_name'   	=> 'required',
		        's_2_email'   	=> 'required',
		        's_2_phone'   	=> 'required',
		        's_3_name'   	=> 'required',
		        's_3_email'   	=> 'required',
		        's_3_phone'   	=> 'required',
		        's_4_name'   	=> 'required',
		        's_4_email'   	=> 'required',
		        's_4_phone'   	=> 'required',
		        's_4_title'   	=> 'required',
		        's_4_address'   => 'required',
		    ]);
		    $data 	 = DB::table('contact_pages')->first();
		    ContactPage::where('id', $data->id)->update(array(
                'title'     	=> $request->title,
		        's_1_name'  	=> $request->s_1_name,
		        's_1_email'  	=> $request->s_1_email,
		        's_1_phone'  	=> $request->s_1_phone,
		        's_2_name'  	=> $request->s_2_name,
		        's_2_email'  	=> $request->s_2_email,
		        's_2_phone'  	=> $request->s_2_phone,
		        's_3_name'  	=> $request->s_3_name,
		        's_3_email'  	=> $request->s_3_email,
		        's_3_phone'  	=> $request->s_3_phone,
		        's_4_name' 		=> $request->s_4_name,
		        's_4_email'  	=> $request->s_4_email,
		        's_4_phone'  	=> $request->s_4_phone,
		        's_4_address' 	=> $request->s_4_address,
		        's_4_title'  	=> $request->s_4_title,
            ));
            return redirect('/contact-us-page')->with('message', 'Data Updated successfully.. !');

        }
        else
        {
        
	    	$this->validate($request, [
		        'title'   		=> 'required',
		        's_1_name'  	=> 'required',
		        's_1_email'   	=> 'required',
		        's_1_phone'   	=> 'required',
		        's_2_name'   	=> 'required',
		        's_2_email'   	=> 'required',
		        's_2_phone'   	=> 'required',
		        's_3_name'   	=> 'required',
		        's_3_email'   	=> 'required',
		        's_3_phone'   	=> 'required',
		        's_4_name'   	=> 'required',
		        's_4_email'   	=> 'required',
		        's_4_phone'   	=> 'required',
		        's_4_title'   	=> 'required',
		        's_4_address'   => 'required',
		    ]);

		    $table = new ContactPage();
	        $table->title     	= $request->title;
	        $table->s_1_name  	= $request->s_1_name;
	        $table->s_1_email  	= $request->s_1_email;
	        $table->s_1_phone  	= $request->s_1_phone;
	        $table->s_2_name  	= $request->s_2_name;
	        $table->s_2_email  	= $request->s_2_email;
	        $table->s_2_phone  	= $request->s_2_phone;
	        $table->s_3_name  	= $request->s_3_name;
	        $table->s_3_email  	= $request->s_3_email;
	        $table->s_3_phone  	= $request->s_3_phone;
	        $table->s_4_name  	= $request->s_4_name;
	        $table->s_4_email  	= $request->s_4_email;
	        $table->s_4_phone  	= $request->s_4_phone;
	        $table->s_4_address = $request->s_4_address;
	        $table->s_4_title  	= $request->s_4_title;
	        $table->save();

	        return redirect('/contact-us-page')->with('message', 'Data submitted successfully.. !');
	    }	

    }
    public function subscription()
    {
    	$data 	 = DB::table('subscribe_emails')->get();
    	return view('setting/subscribe_list')->with(['data'=>$data]);
    }
    public function subscribe_delete($id)
    {
    	DB::table('subscribe_emails')->where('id','=',$id)->delete();
        return redirect('/subscribe-list')->with('message', 'Subscription is deleted !');
    }
    public function footer_section()
    {
    	$data 	 = DB::table('footer_sections')->first();
    	return view('setting/footer_section')->with(['data'=>$data]);	
    }
    public function footer_submit(Request $request)
    {

    	if(DB::table('contact_pages')->count())
        {
        	
        	$this->validate($request, [
		        'f_email_1'   	=> 'required',
		        'f_email_2'   	=> 'required',
		      //  'f_email_3'   	=> 'required',
		      //  'f_email_4'   	=> 'required',
		        'f_phone_1'  	=> 'required',
		        'f_phone_2'   	=> 'required',
		        'f_phone_3'   	=> 'required',
		        'f_phone_4'   	=> 'required',
		      //  'f_phone_5'   	=> 'required',
		        'f_address'   	=> 'required',
		        'f_content'   	=> 'required',
		    ]);
		    $data 	 = DB::table('footer_sections')->first();
		    FooterSection::where('id', $data->id)->update(array(
                'f_email_1'     => $request->f_email_1,
		        'f_email_2'  	=> $request->f_email_2,
		        'f_email_3'     => $request->f_email_3,
		        'f_email_4'  	=> $request->f_email_4,
		        'f_text_email_1'     => $request->f_text_email_1,
		        'f_text_email_2'  	=> $request->f_text_email_2,
		        'f_text_email_3'     => $request->f_text_email_3,
		        'f_text_email_4'  	=> $request->f_text_email_4,
		        'f_phone_1'  	=> $request->f_phone_1,
		        'f_phone_2'  	=> $request->f_phone_2,
		        'f_phone_3'  	=> $request->f_phone_3,
		        'f_phone_4'  	=> $request->f_phone_4,
		        'f_phone_5'  	=> $request->f_phone_5,
		        'f_address'  	=> $request->f_address,
		        'f_content'  	=> $request->f_content
            ));
            return redirect('/setting/footer')->with('message', 'Data Updated successfully.. !');

        }
        else
        {
        	
	    	$this->validate($request, [
		        'f_email_1'   	=> 'required',
		        'f_email_2'   	=> 'required',
		        'f_email_3'   	=> 'required',
		        'f_email_4'   	=> 'required',
		        'f_phone_1'  	=> 'required',
		        'f_phone_2'   	=> 'required',
		        'f_phone_3'   	=> 'required',
		        'f_phone_4'   	=> 'required',
		      //  'f_phone_5'   	=> 'required',
		        'f_address'   	=> 'required',
		        'f_content'   	=> 'required',
		    ]);

		    $table = new FooterSection();
	        $table->f_email_1   = $request->f_email_1;
	        $table->f_email_2  	= $request->f_email_2;
	        $table->f_email_3   = $request->f_email_3;
	        $table->f_email_4  	= $request->f_email_4;
	        $table->f_phone_1  	= $request->f_phone_1;
	        $table->f_phone_2  	= $request->f_phone_2;
	        $table->f_phone_3  	= $request->f_phone_3;
	        $table->f_phone_4  	= $request->f_phone_4;
	        $table->f_phone_5  	= $request->f_phone_5;
	        $table->f_address  	= $request->f_address;
	        $table->f_content  	= $request->f_content;
	        $table->save();

	        return redirect('/setting/footer')->with('message', 'Data submitted successfully.. !');
	    }
    }
    public function spare_part_list()
    {
    	$data 	 = DB::table('spare_parts')
    				->join('country','country.Code','=','spare_parts.country')
    				->join('city','city.id','=','spare_parts.city')
    				->get(['spare_parts.*','country.Name as country_name','city.Name as city_name']);
    
    	return view('setting.spare_part_list')->with(['data'=>$data]);
    }
    public function spare_part_delete($id)
    {
    	DB::table('spare_parts')->where('id','=',$id)->delete();
        return redirect('/spare_part_list')->with('message', 'Record is deleted !');
    }
    public function become_agent_list()
    {
    	$data 	 = DB::table('become_agents')
    				->join('country','country.Code','=','become_agents.country')
    				->join('city','city.id','=','become_agents.city')
    				->get(['become_agents.*','country.Name as country_name','city.Name as city_name']); 
    	return view('setting.become_agent_list')->with(['data'=>$data]);			
    }
    public function become_agent_delete($id)
    {
    	DB::table('become_agents')->where('id','=',$id)->delete();
        return redirect('/become_agent_list')->with('message', 'Record is deleted !');
    }
  
}
