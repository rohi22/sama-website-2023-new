<?php

namespace App\Http\Controllers;
use Session;
use App\Category;
use App\Slider;
use App\SliderBullet;
use App\GalleryImages;
use App\HomeSlider;
use App\MobileSlider;
use App\User;
use App\Quote;
use App\Product;
use App\SparePart;
use App\BecomeAgent;
use App\SubscribeEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;
use Config;

class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function save_quote(Request $request)
    {

        if(!empty($request->captcha)){
             
            $captcha = $request->captcha;
          
        }
        else{
            return ['status' => 'failed','msg' => 'Verify Captcha'];
        }
        
        $secretKey = config('services.recaptcha.secret');
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
         $response = file_get_contents($url);
        $responseKeys = json_decode($response,true);
         
        $message = $request->q_message;
        $email = $request->q_email;
        $number = $request->q_num;
        if($responseKeys["success"]) {
            if($message != '' && $email != '' && $number != '' ){
                $quote = new Quote;
                $quote->message = $message;
                $quote->email = $email;
                $quote->number = $number;
                
                if($quote->save()){
                    
                    $view = 'emails.quote';
                    
                    $data = [
                        'full_name' => 'Samaengineering',
                        'subject' => 'Get Quote',
                        'msg' => $quote->message,
                        'q_email' => $quote->email,
                        'number' => $quote->number,
                        'email' => Config::get('mail.mail_to') // technologiesmbt@gmail.com'
                    ];
                    
                    $this->sendEmail($view, $data);
                    
                    return ['status' => 'success', 'msg' => 'Quote successfully submitted.'];
                }else{
                    return ['status' => 'failed', 'msg' => 'Something went wrong.'];
                }
            }else{
                return ['status' => 'failed', 'msg' => 'All fields are required.'];
            }
        }else{
            return ['status' => 'failed','msg' => 'Verify Captcha'];
        }
    }
    
    public function refreshCaptcha()
    {
        //return response()->json(['captcha'=> captcha_img()]);
        return array(mt_rand(10,100),mt_rand(10,100));
    }
    public function index()
    {
        $sliders = HomeSlider::OrderBy('id','DESC')->get();
        $mobile_sliders = MobileSlider::all();
        $home_back_img = DB::table('home_slider_background_images')->first();
        $home_machine_slider = DB::table('products')
                        ->where('p_status','=',1)
                        ->where('p_slider_id','=',1)
                        ->get(['id','p_main_image','p_title','p_slug']);
        
        $home_processing_slider = DB::table('products')
                        ->where('p_status','=',1)
                        ->where('p_slider_id','=',2)
                        ->get(['id','p_main_image','p_title','p_slug']);             
             
        return view('index')->with(['mobile_sliders'=>$mobile_sliders,'home_machine_slider'=>$home_machine_slider,'home_processing_slider'=>$home_processing_slider,'sliders'=>$sliders,'home_back_img'=>$home_back_img]);
    }

    public function get_category($slug)
    {
        $result = DB::table('categories')->where('menu_mode','=',1)->where('status','=',1)->where('cat_slug','=',$slug)->orderBy('cat_order','ASC')->first();
        $id     = $result->id;
        $mode   = $result->theme_mode;
                    
        $subcategories = DB::table('categories')
                        ->where('parent_id','=',$id)->where('status', 1)->orderBy('cat_order','ASC')->get(['categories.*']);
        
        $slider_categories = DB::table('categories')
                        ->join('sliders','sliders.s_category_id','=','categories.parent_id')
                        ->where('parent_id','=',$id)->orderBy('categories.cat_order','ASC')->get(['categories.*','sliders.s_main_image']);
                     
        $sliders = DB::table('sliders')
                        ->join('categories','categories.id','=','sliders.s_category_id')
                        ->select(['sliders.s_main_image','sliders.s_background_image'])
                        ->where('sliders.s_category_id','=',$id)
                        ->first();

        $categories = Category::with('childrenRecursive')->where('id','=',$id)->get()->toArray();
       
            $cat_ids = [];
            foreach($categories as $third)
            {
                array_push($cat_ids,$third['id']);
                foreach($third['children_recursive'] as $second)
                {
                    array_push($cat_ids,$second['id']);
                    foreach($second['children_recursive'] as $first)
                    {
                        array_push($cat_ids,$first['id']);
                    }
                }
                
            }
             $products = DB::table('products')
                        ->join('assign_categories','assign_categories.p_id','=','products.id')
                        ->join('categories','categories.id','=','assign_categories.category_id')
                        ->whereIn('assign_categories.category_id',$cat_ids)
                        ->where('products.p_status','=',1)
                        ->orderBy('products.id','ASC')
                        ->select('products.*','categories.cat_title')
                        ->paginate(12);
        
             $tags = DB::table('assigned_general_tags as at')
                    ->join('general_tags as t','t.id','=','at.tag_id')
                    ->join('products as p','p.id','=','at.p_id')
                    ->join('assign_categories','assign_categories.p_id','=','p.id')
                    ->join('categories','categories.id','=','assign_categories.category_id')
                    ->whereIn('assign_categories.category_id',$cat_ids)
                    ->where('p.p_status','=',1)
                    ->orderBy('p.id','ASC')
                    ->get(['t.*','at.p_id']);
        
            $commodity_images = DB::table('products')
                        ->join('assign_categories','assign_categories.p_id','=','products.id')
                        ->join('categories','categories.id','=','assign_categories.category_id')
                        ->join('product_commodity_images','product_commodity_images.p_id','=','products.id')
                        ->join('commodities','commodities.id','=','product_commodity_images.p_commodity_image')
                        ->whereIn('assign_categories.category_id',$cat_ids)
                        ->get(['product_commodity_images.*','commodities.commodity_images as p_commodity_image','commodities.commodity_name']);
            
            $bag_images = DB::table('products')
                        ->join('assign_categories','assign_categories.p_id','=','products.id')
                        ->join('categories','categories.id','=','assign_categories.category_id')
                        ->join('product_main_images','product_main_images.p_id','=','products.id')
                        ->whereIn('assign_categories.category_id',$cat_ids)
                        ->get(['product_main_images.*']);
                        
            /*$bag_images = DB::table('products')
                        ->join('categories','categories.id','=','products.p_category')
                        ->join('product_main_images','product_main_images.p_id','=','products.id')
                        ->whereIn('products.p_category',$cat_ids)
                        ->get(['product_main_images.*']);*/

            $sachet_images = DB::table('products')
                        ->join('assign_categories','assign_categories.p_id','=','products.id')
                        ->join('categories','categories.id','=','assign_categories.category_id')
                        ->join('product_sachet_images','product_sachet_images.p_id','=','products.id')
                        ->join('sachets','sachets.id','=','product_sachet_images.p_sachet_image')
                        ->whereIn('assign_categories.category_id',$cat_ids)
                        ->get(['product_sachet_images.*','sachets.sachet_image as p_sachet_image','sachets.sachet_title']);
         $array = [];
        foreach($subcategories as $row)
        {
            $array[] = $row->id;
        }
        if(!empty($subcategories[0]))
        {
            $childcategories = DB::table('categories')->whereIn('parent_id',$array)->orderBy('cat_order','ASC')->get();
            
            return view('category')->with(['cat_head'=>$result,'tags'=>$tags,'slider_categories'=>$slider_categories,'bag_images'=>$bag_images,'sliders'=>$sliders,'childcategories'=>$childcategories,'subcategories'=>$subcategories,'slug'=>$slug,'theme_mode'=>$mode,'products'=>$products,'commodity_images'=>$commodity_images,'sachet_images'=>$sachet_images,'nav'=>$id]);
        }
        else
        {

            return view('category')->with(['cat_head'=>$result,'tags'=>$tags,'slider_categories'=>$slider_categories,'bag_images'=>$bag_images,'sliders'=>$sliders,'subcategories'=>$subcategories,'slug'=>$slug,'theme_mode'=>$mode,'products'=>$products,'commodity_images'=>$commodity_images,'sachet_images'=>$sachet_images,'nav'=>$id]);
        }
        
    }
    public function get_sub_category($slug)
    {
        $result = DB::table('categories')
                        ->where('cat_slug','=',$slug)->first();
        
        $id         = $result->id;                
        $parent_id  = $result->parent_id;                
        $mode       = $result->theme_mode;                
        
         $categories = Category::with('childrenRecursive')->where('id','=',$id)->get()->toArray();
       
            $cat_ids = [];
            foreach($categories as $third)
            {
                array_push($cat_ids,$third['id']);
                foreach($third['children_recursive'] as $second)
                {
                    array_push($cat_ids,$second['id']);
                    foreach($second['children_recursive'] as $first)
                    {
                        array_push($cat_ids,$first['id']);
                    }
                }
                
            }
        $cat_title = DB::table('categories')->where('id','=',$parent_id)->first();
                
        $subcategories = DB::table('categories')
                ->leftjoin('sliders','sliders.s_category_id','=','categories.parent_id')
                ->where('parent_id','=',$parent_id)
                ->where('status','=',1)
                ->orderBy('categories.cat_order','ASC')
                ->get(['categories.*','sliders.s_main_image']);
        
        $childcategories = DB::table('categories')->where('parent_id','=',$id)->orderBy('cat_order','ASC')->get();
        
        $sliders = DB::table('sliders')
                ->join('categories','categories.id','=','sliders.s_category_id')
                ->select(['sliders.s_main_image','sliders.s_background_image'])
                ->first();
        
         $slider_categories = DB::table('categories')
                        ->join('sliders','sliders.s_category_id','=','categories.parent_id')
                        ->where('parent_id','=',$id)->get(['categories.*','sliders.s_main_image']);
         //dd($slider_categories);               
        $products = DB::table('products')
                ->join('assign_categories','assign_categories.p_id','=','products.id')
                ->join('categories','categories.id','=','assign_categories.category_id')
                ->whereIn('assign_categories.category_id',$cat_ids)
                ->where('products.p_status','=',1)
               ->select('products.*','categories.cat_title')
                    ->paginate(12);
        
         $tags = DB::table('assigned_general_tags as at')
                    ->join('general_tags as t','t.id','=','at.tag_id')
                    ->join('products as p','p.id','=','at.p_id')
                    ->join('assign_categories','assign_categories.p_id','=','p.id')
                    ->join('categories','categories.id','=','assign_categories.category_id')
                    ->whereIn('assign_categories.category_id',$cat_ids)
                    ->where('p.p_status','=',1)
                    ->orderBy('p.id','ASC')
                    ->get(['t.*','at.p_id']);

        $commodity_images = DB::table('products')
                ->join('assign_categories','assign_categories.p_id','=','products.id')
                ->join('categories','categories.id','=','assign_categories.category_id')
                ->join('product_commodity_images','product_commodity_images.p_id','=','products.id')
                ->join('commodities','commodities.id','=','product_commodity_images.p_commodity_image')
                ->whereIn('assign_categories.category_id',$cat_ids)
                ->get(['product_commodity_images.*','commodities.commodity_images as p_commodity_image','commodities.commodity_name']);

        $sachet_images = DB::table('products')
                ->join('assign_categories','assign_categories.p_id','=','products.id')
                ->join('categories','categories.id','=','assign_categories.category_id')
                ->join('product_sachet_images','product_sachet_images.p_id','=','products.id')
                ->join('sachets','sachets.id','=','product_sachet_images.p_sachet_image')
                ->whereIn('assign_categories.category_id',$cat_ids)
                ->get(['product_sachet_images.*','sachets.sachet_image as p_sachet_image','sachets.sachet_title']);


        return view('category')->with(['cat_head'=>$result,'tags'=>$tags,'sliders'=>$sliders,'subcategories'=>$subcategories,'slug'=>$slug,'theme_mode'=>$mode,'products'=>$products,'commodity_images'=>$commodity_images,'sachet_images'=>$sachet_images,'childcategories'=>$childcategories,'slider_categories'=>$slider_categories,'nav'=>$parent_id,'child_nav'=>$id,'category_slug'=>$slug,'cat_bred_title'=>$cat_title]);    
    }
    
    public function single_product($slug)
    {
        $product = DB::table('products')
                        ->join('assign_categories','assign_categories.p_id','=','products.id')
                        ->join('categories','categories.id','=','assign_categories.category_id')
                        ->where('p_slug','=',$slug)
                         ->select('products.*','categories.cat_title','categories.cat_slug','categories.id  as cat_id')
                        ->first();
        
        if(empty($product)){
            return redirect('category/processing-line');
        }
        
        $id         = $product->id;
        $p_mode     = $product->p_theme;
        $category   = $product->cat_title;
        $cat_id     = $product->cat_id;
        $bag_images = DB::table('product_main_images')->where('p_id','=',$id)->get();

        $attributes = DB::table('product_attributes')
            ->join('categories','categories.id','=','product_attributes.cat_id')
            ->join('attributes','attributes.id','=','product_attributes.attribute_id')
            ->where('product_attributes.cat_id','=',$cat_id)
            ->where('product_attributes.p_id','=',$id)
            ->get(['attributes.label','product_attributes.name']);
        
    
         function getParentCategory($cat_id) {
            $c = DB::table('categories')->where('id','=',$cat_id)->first();
            $cat_id = $c->parent_id;
    
            if($cat_id  == null)
            {   
               return  $c;  
            }
            else
            {
                return getParentCategory($cat_id);
            }
        }
        $data =  getParentCategory($cat_id);
        $tags = DB::table('assigned_general_tags as at')
                ->join('general_tags as t','t.id','=','at.tag_id')
                ->join('products as p','p.id','=','at.p_id')
                ->where('p.id',$id)
                ->get(['t.*']);

        return view('product')->with(['product'=>$product,'bag_images'=>$bag_images,'p_mode'=>$p_mode,'attributes'=>$attributes,'category'=>$category,'title'=>$slug,'data'=>$data,'tags'=>$tags]);
    }
    public function get_products()
    {
        $products = DB::table('products')
                    ->join('assign_categories','assign_categories.p_id','=','products.id')
                    ->join('categories','categories.id','=','assign_categories.category_id')
                    ->where('assign_categories.category_id','=',request('id'))
                    ->where('products.p_status','=',1)
                    ->get(['products.*','categories.cat_title']);

         $commodity_images = DB::table('products')
                    ->join('assign_categories','assign_categories.p_id','=','products.id')
                    ->join('categories','categories.id','=','assign_categories.category_id')
                    ->join('product_commodity_images','product_commodity_images.p_id','=','products.id')
                    ->join('commodities','commodities.id','=','product_commodity_images.p_commodity_image')
                    ->where('assign_categories.category_id','=',request('id'))
                    ->get(['product_commodity_images.*','commodities.commodity_images as p_commodity_image','commodities.commodity_name']);

        $sachet_images = DB::table('products')
                    ->join('assign_categories','assign_categories.p_id','=','products.id')
                    ->join('categories','categories.id','=','assign_categories.category_id')
                    ->join('product_sachet_images','product_sachet_images.p_id','=','products.id')
                    ->join('sachets','sachets.id','=','product_sachet_images.p_sachet_image')
                    ->where('assign_categories.category_id','=',request('id'))
                    ->get(['product_sachet_images.*','sachets.sachet_image as p_sachet_image','sachets.sachet_title']);
        $res = array($products,$commodity_images,$sachet_images);            
        if(sizeof($products) > 0)
        {
            return $res;
        }
        else
        {
            return 0;
        }
    }

        public function contactus(){
            
            return redirect('contact-us');
        }
       
    public function contact_us()
    {
        $data = DB::table('contact_pages')->first();
        $countries = DB::table("country")->get();
        return view('contact')->with(['data'=>$data,'countries'=>$countries]);
    }
    
    public function privacyPolicy()
    {
        return view('privacy-policy');
    }
    
    public function about()
    {
        $about   = DB::table('abouts')->first();
        $images  = DB::table('about_images')->where('about_id','=',$about->id)->get();
        return view('about')->with(['about'=>$about,'images'=>$images]);
    }
    public function e_catalogue()
    {
        return view('e_catalogue');
    }
    public function get_catalog()
    {
        return view('catalogs/index');
    }
    public function snack_processing()
    {
        return view('catalogs/snack_processing');
    }
    public function bakery_series()
    {
        return view('catalogs/bakery_series');
    } 
    public function packaging_series()
    {
        return view('catalogs/packaging_series');
    }
    public function kitchen_heart()
    {
        return view('catalogs/kitchen_heart');
    }
    public function doypack()
    {
        return view('catalogs/doypack');
    }
    public function user_detail_submit(Request $request)
    {
        if(!empty($request->captcha)){
             
            $captcha = $request->captcha;
          
        }
        else{
            return ['error' => 'Verify Captcha'];
        }
        
        $secretKey = "6LcHXEEaAAAAAIqxmnpVrv_5q-OvCBoqWsmF1dbh";
        
        $ip = $_SERVER['REMOTE_ADDR'];
        
        // post request to server
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
        
        $response = file_get_contents($url);
        $responseKeys = json_decode($response,true);
        // should return JSON with success as true
        
        if($responseKeys["success"]) {
            
            
            $this->validate($request, [
                'name'      => 'required|max:150',
                'company'   => 'required',
                'email'     => 'required|email',
                'phone'     => 'required|numeric|digits:11',
                // 'captcha'   => 'required',
            ]);
    
            $table = new User();
            $table->name     = $request->name;
            $table->company  = $request->company;
            $table->email    = $request->email;
            $table->phone    = $request->phone;
            $table->save();
            

            $view= 'emails.contact-us';
            $data = [
                'full_name' => 'Samaengineering',
                'name' => $request->name,
                'user_email' => $request->email,
                'contact' => $request->phone,
                'country' => '',
                'city' => '',
                'company' => $request->company,
                'msg' => '',
                'subject' => 'Contact US',
                'email' => Config::get('mail.mail_to')//'talk@samaengineering.com'
            ];
            
             $this->sendEmail($view,$data);

            return "Data submitted successfully..";
            
        }else{
            return ['error' => 'Verify Captcha'];
        }
    }
    public function user_detail_submit_msg(Request $request)
    {
        // dd($request->request);
        
        if(!empty($request->captcha)){
             
            $captcha = $request->captcha;
          
        }
        else{
            return ['error' => 'Verify Captcha'];
        }
        
        $secretKey = config('services.recaptcha.secret');
        $ip = $_SERVER['REMOTE_ADDR'];
        
        // post request to server
         $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);
         $response = file_get_contents($url);
        $responseKeys = json_decode($response,true);
         if($responseKeys["success"]) {
        $this->validate($request, [
            'name'      => 'required|max:150',
            'company'   => 'required',
            'country'   => 'required',
            'city'   => 'required',
            'email'     => 'required|email',
            'phone'     => 'required|numeric',
            'msg'       => 'required',
            // 'captcha'   => 'required',
        ]);

        $table = new User();
        $table->name     = request('name');
        $table->company  = request('company');
        $table->country  = request('country');
        $table->city     = request('city');
        $table->email    = request('email');
        $table->phone    = request('phone');
        $table->msg      = request('msg');
        $table->save();

        $view= 'emails.contact-us';
        $data = [
            'full_name' => 'Samaengineering',
            'name' => request('name'),
            'user_email' => request('email'),
            'contact' => request('phone'),
            'country' => request('country'),
            'city' => request('city'),
            'company' => request('company'),
            'msg' => request('msg'),
            'subject' => 'Contact US',
            'email' => Config::get('mail.mail_to')//'talk@samaengineering.com'
        ];
        
         $this->sendEmail($view,$data);
        }else{
            \Log::info($responseKeys);
            return ['error' => 'Verify Captcha'];
        }
        return "Data submitted successfully..";
    }
    public function subscribe_email(Request $request)
    {
         $this->validate($request, [
            'email'     => 'required|email'
        ]);

        $table = new SubscribeEmail();
        $table->email    = $request->email;
        $table->save();
        return redirect('/')->with('message', 'Thank You..!');
    }
        public function spare_parts()
    {
        $countries = DB::table("country")->get();
        return view('spare_parts')->with(['countries'=>$countries]);
    }
    public function get_city()
    {
        $code = request('country'); 
        $city = DB::table('city')->where('CountryCode','=',$code)->get();
        $html = '';
        foreach($city as $cit)
        {
            $html .='<option value="'.$cit->ID.'">'.$cit->Name.'</option>'; 
        }
        echo $html;
    }
    public function submit_spare_parts(Request $request)
    {
        $this->validate($request, [
            'name'          => 'required',
            'company'       => 'required',
            'address'       => 'required',
            'phone'         => 'required|numeric|digits:11',
            'country'       => 'required',
            'city'          => 'required',
            'machine_name'  => 'required',
            'model'         => 'required',
            'parts'         => 'required',
            'any_detail'    => 'required',
            'g-recaptcha-response'       => 'required',
        ]);

        $table = new SparePart();
        $table->name        = $request->name;
        $table->company     = $request->company;
        $table->address     = $request->address;
        $table->phone       = $request->phone;
        $table->country     = $request->country;
        $table->city        = $request->city;
        $table->machine_name= $request->machine_name;
        $table->model       = $request->model;
        $table->parts       = $request->parts;
        $table->any_detail  = $request->any_detail;
        $table->save();
        
        // send email 
        $sparePart = SparePart::where('spare_parts.id',$table->id)
                            ->join('country', 'country.Code', 'spare_parts.country')
                            ->join('city', 'city.CountryCode', 'country.Code')
                            ->select('spare_parts.*', 'country.Name as country_name', 'city.Name as city_name')
                            ->first();
            
        $view= 'emails.spare-parts';
        $data = [
            'full_name' => $sparePart->name,
            'company' => $sparePart->company,
            'subject' => 'Spare Parts',
            'address' => $sparePart->address,
            'phone' => $sparePart->phone,
            'country' => $sparePart->country_name,
            'city' => $sparePart->city_name,
            'machine_name' => $sparePart->machine_name,
            'model' => $sparePart->model,
            'parts' => $sparePart->parts,
            'any_detail' => $sparePart->any_detail,
            'email' => 'noman.shaikh49@yahoo.com'//'talk@samaengineering.com'
        ];
        
         $this->sendEmail($view,$data);
        
        // end
        
        return redirect('/revamp/spare-parts')->with('message', 'Your data submitted successfully!');
    }
    public function become_an_agent()
    {
        $countries = DB::table("country")->get();
        return view('become_an_agent')->with(['countries'=>$countries]);
    }
    public function submit_become_agent(Request $request)
    {
         $this->validate($request, [
            'name'          => 'required|max:150',
            'company'       => 'required',
            'email'         => 'required|email',
            'phone'         => 'required|numeric|digits:11',
            'country'       => 'required',
            'city'          => 'required',
            'become_agent'  => 'required',
            // 'other_company' => 'required',
            'g-recaptcha-response'       => 'required',
            'territory'     =>  'required',
            'your_industry'  => 'required',
            'which_industry' =>  'required',
            'web_url'  => 'required',
        ]);

        $table = new BecomeAgent();
        $table->name            = $request->name;
        $table->company         = $request->company;
        $table->email           = $request->email;
        $table->phone           = $request->phone;
        $table->country         = $request->country;
        $table->city            = $request->city;
        $table->become_agent    = $request->become_agent;
        // $table->other_company   = $request->other_company;
         $table->territory    = $request->territory;
         $table->your_industry    = $request->your_industry;
         $table->which_industry    = $request->which_industry;
         $table->web_url    = $request->web_url;
        $table->save();
        return redirect('/revamp/become-an-agent')->with('message', 'Your data submitted successfully!');
    }
    public function search(Request $request){
        
        // dd($request->search);
        $products = DB::table('products')
            ->join('assign_categories','assign_categories.p_id','=','products.id')
            ->join('categories','categories.id','=','assign_categories.category_id')
            ->where('products.p_short_desc','LIKE', '%'.$request->search.'%')
            ->orwhere('products.p_long_desc','LIKE', '%'.$request->search.'%')
            ->orwhere('products.p_title','LIKE', '%'.$request->search.'%')
            ->orderBy('products.id','ASC')
            ->select('products.*','categories.cat_title')
            ->where('products.p_status','=',1)
            ->paginate(12);
            // dd(count($products));
         if(count($products) == 0){
             
            $check = explode(" ",$request->search);
             
            //  dd($check);
             $products = DB::table('products')
            ->join('assign_categories','assign_categories.p_id','=','products.id')
            ->join('categories','categories.id','=','assign_categories.category_id')
            ->where(function ($query) use($check) {
             for ($i = 0; $i < count($check); $i++){
                    $query->orwhere('products.p_short_desc', 'like',  '%' . $check[$i] .'%');
                 }      
            })
            ->where(function ($query) use($check) {
             for ($i = 0; $i < count($check); $i++){
                    $query->orwhere('products.p_long_desc', 'like',  '%' . $check[$i] .'%');
                 }      
            })
            ->where(function ($query) use($check) {
             for ($i = 0; $i < count($check); $i++){
                    $query->orwhere('products.p_title', 'like',  '%' . $check[$i] .'%');
                 }      
            })
            ->orderBy('products.id','ASC')
            ->select('products.*','categories.cat_title')
            ->where('products.p_status','=',1)
            ->paginate(12);
             
         }   
            
            

        return view('search')->with(['slug'=>$request->search,'products'=>$products]);  
    }
    public function product_tag($slug){
        $products = DB::table('products')
            ->join('assign_categories','assign_categories.p_id','=','products.id')
            ->join('categories','categories.id','=','assign_categories.category_id')
            ->join('assigned_general_tags as at','at.p_id','=','products.id')
            ->join('general_tags as gt','gt.id','=','at.tag_id')
            ->select('products.*','categories.cat_title')
            ->where('products.p_status','=',1)
            ->where('gt.gt_slug','=',$slug)
            ->paginate(12);
        $row = DB::table('general_tags')->where('gt_slug','=',$slug)->first();
        
        // $tags = DB::table('assigned_general_tags as at')
        //         ->join('general_tags as t','t.id','=','at.tag_id')
        //         ->join('products as p','p.id','=','at.p_id')
        //         ->where('p.p_slug',$p_slug)
        //         ->get(['t.*']);       
        return view('product_tag')->with(['slug'=>$slug,'products'=>$products,'row'=>$row]);  

    }
    
     public function sendEmail($view,$data)
     {
        try{
            Mail::send($view, $data, function($message) use ($data) {
                $message->subject($data['subject']);
                $message->to($data['email'], $data['full_name']);
            });
        }catch(\Exception $e){
            \Log::info($e);
        }
        
    }
    
    public function contactUsWidget(Request $request){
        dd($request->all());
;    }
    
    
   
}
