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
use App\Industry;
use App\SimilarProduct;
use App\ProcessingProduct;
use App\AccessoriesProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;
use Config;

class RevampController extends Controller
{
    

    public function index(){
        $data['sliders'] = HomeSlider::OrderBy('id','DESC')->get();
        $data['mobile_sliders'] = MobileSlider::all();
        $data['home_back_img'] = DB::table('home_slider_background_images')->first();
        $data['home_machine_slider'] = DB::table('products')
                        ->where('p_status','=',1)
                        ->where('p_slider_id','=',1)
                        ->get();

        $data['home_processing_slider'] = DB::table('products')
                        ->where('p_status','=',1)
                        ->where('p_slider_id','=',2)
                        ->get();
        
        $data['castStudies'] = DB::table('blog_posts')->where('p_status',1)->where('p_case_studies',1)->get();

        $data['industry'] = industry::all();
        $data['about_us'] = DB::table('abouts')->first();
        
        $data['points']=json_decode($data['about_us']->points);
        $data['award_images']=DB::table('award_images')->get();
        return view('revamp.pages.index',$data);
    }
    
    public function get_category($slug)
    {
        $currentCat = DB::table('categories')->where('cat_slug','=',$slug)->orderBy('cat_order','ASC')->first();
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
        //$currentCat->theme_mode==0 || $currentCat->theme_mode==2
        // !empty($subcategories[0])
        if($currentCat->theme_mode==0 || $currentCat->theme_mode==2 || request()->segment(3) == 'accessories')
        {
            $childcategories = DB::table('categories')->whereIn('parent_id',$array)->orderBy('cat_order','ASC')->get();
            
            return view('revamp.pages.list')->with(['cat_head'=>$result,'tags'=>$tags,'slider_categories'=>$slider_categories,'bag_images'=>$bag_images,'sliders'=>$sliders,'childcategories'=>$childcategories,'subcategories'=>$subcategories,'slug'=>$slug,'theme_mode'=>$mode,'products'=>$products,'commodity_images'=>$commodity_images,'sachet_images'=>$sachet_images,'nav'=>$id,'currentCat'=>$currentCat]);
        }
        else
        {
            $childcategories = DB::table('categories')->whereIn('parent_id',$array)->orderBy('cat_order','ASC')->get();
            return view('revamp.pages.list2')->with(['childcategories'=>$childcategories,'cat_head'=>$result,'tags'=>$tags,'slider_categories'=>$slider_categories,'bag_images'=>$bag_images,'sliders'=>$sliders,'subcategories'=>$subcategories,'slug'=>$slug,'theme_mode'=>$mode,'products'=>$products,'commodity_images'=>$commodity_images,'sachet_images'=>$sachet_images,'nav'=>$id,'currentCat'=>$currentCat]);
        }
        
    }
    
    
    public function get_products()
    {
        $products = DB::table('products')
                    ->join('assign_categories','assign_categories.p_id','=','products.id')
                    ->join('categories','categories.id','=','assign_categories.category_id')
                    ->where('assign_categories.category_id','=',request('id'))
                    ->where('products.p_status','=',1)
                    ->get(['products.*','categories.cat_title']);

         $view = view('revamp.pages.get-products',compact('products'));
         return response()->json(['success' => true,'data' => $view->render()]);
    }
    
    
    public function aboutUs(){
        return view('revamp.pages.about-us');
    }
    
    public function contactUsWidget(Request $request){
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
        if($responseKeys["success"]) {
            $store = new User();
            $store->name = $request->name;
            $store->email = $request->email;
            $store->phone = $request->phone;
            $store->company = $request->company;
            $store->save();
            if(!empty($store->id)){
                return response()->json(['success' => true]);
            }
        }else{
            return ['status' => 'failed','msg' => 'Verify Captcha'];
        }
        return response()->json(['success' => false]);
    }
    
    
    
     public function get_sub_category($slug)
    {
        $currentCat = DB::table('categories')->where('cat_slug','=',$slug)->orderBy('cat_order','ASC')->first();
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


        return view('revamp.pages.list')->with(['cat_head'=>$result,'tags'=>$tags,'sliders'=>$sliders,'subcategories'=>$subcategories,'slug'=>$slug,'theme_mode'=>$mode,'products'=>$products,'commodity_images'=>$commodity_images,'sachet_images'=>$sachet_images,'childcategories'=>$childcategories,'slider_categories'=>$slider_categories,'nav'=>$parent_id,'child_nav'=>$id,'category_slug'=>$slug,'cat_bred_title'=>$cat_title,'currentCat'=>$currentCat]);    
    }
    
    public function contactUs(Request $request){
        $data = DB::table('contact_pages')->first();
        $countries = DB::table("country")->get();
        return view('revamp.pages.contact-us',compact('data','countries'));
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

        $relatedProduct = SimilarProduct::select('child_product')->where('master_product',$product->id)->get();
        $processingProduct = ProcessingProduct::select('child_product')->where('master_product',$product->id)->get();
        $accessoriesProduct = AccessoriesProduct::select('child_product')->where('master_product',$product->id)->get();
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
                
        $categoryProduct = DB::table('products')
                        ->join('assign_categories','assign_categories.p_id','=','products.id')
                        ->join('categories','categories.id','=','assign_categories.category_id')
                        ->where('categories.id','=',$product->cat_id)
                         ->orderBy('products.created_at','DESC')
                         ->take(4)
                        ->get(['products.*']);
        
        $similarProduct = DB::table('products')
                        ->join('assign_categories','assign_categories.p_id','=','products.id')
                        ->join('categories','categories.id','=','assign_categories.category_id')
                        ->where('categories.id','=',$product->cat_id)
                         ->orderBy('products.created_at','ASC')
                         ->take(2)
                        ->get(['products.*']);
        if($product->cat_id == 112){
            return view('revamp.pages.detail2')->with(['categoryProduct' => $categoryProduct, 'similarProduct' => $similarProduct,'product'=>$product,'bag_images'=>$bag_images,'p_mode'=>$p_mode,'attributes'=>$attributes,'category'=>$category,'title'=>$slug,'data'=>$data,'tags'=>$tags,'relatedProduct'=>$relatedProduct,'processingProduct'=>$processingProduct,'accessoriesProduct'=>$accessoriesProduct]);
        }
        return view('revamp.pages.detail')->with(['categoryProduct' => $categoryProduct, 'similarProduct' => $similarProduct,'product'=>$product,'bag_images'=>$bag_images,'p_mode'=>$p_mode,'attributes'=>$attributes,'category'=>$category,'title'=>$slug,'data'=>$data,'tags'=>$tags,'relatedProduct'=>$relatedProduct,'processingProduct'=>$processingProduct,'accessoriesProduct'=>$accessoriesProduct]);
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
        return view('revamp.pages.tag')->with(['slug'=>$slug,'products'=>$products,'row'=>$row]);  

    }
    
    public function searchResult(Request $request){
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
        return view('revamp.pages.search')->with(['slug'=>$request->search,'products'=>$products]);
    }
    
     public function about()
    {
        $about   = DB::table('abouts')->first();
        $images  = DB::table('about_images')->where('about_id','=',$about->id)->get();
        return view('revamp.pages.about-us')->with(['about'=>$about,'images'=>$images]);
    }
    
    public function spare_parts(){
        $countries = DB::table("country")->get();
        return view('revamp.pages.spare-parts')->with(['countries'=>$countries]);
    }
    
    public function become_an_agent()
    {
        $countries = DB::table("country")->get();
        return view('revamp.pages.become-agent')->with(['countries'=>$countries]);
    }
    
      public function e_catalogue()
    {
        return view('revamp.pages.e-catalogue');
    }
    
        public function privacyPolicy()
    {
        return view('revamp.pages.privacy-policy');
    }
}
