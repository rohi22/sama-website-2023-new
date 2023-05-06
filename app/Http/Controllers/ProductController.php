<?php

namespace App\Http\Controllers;
use Session;
use App\Category;
use App\Product;
use App\ProductMainImage;
use App\ProductCommodityImage;
use App\ProductSachetImage;
use App\GeneralTag;
use App\AssignedGeneralTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    function index(){
        $tags = GeneralTag::all();
        $products  = DB::table('products')
                            ->join('assign_categories','assign_categories.p_id','=','products.id')
                            ->join('categories','categories.id','=','assign_categories.category_id')
                            ->select(['products.*','assign_categories.category_id','categories.theme_mode as product_mode'])
                            ->orderBy('products.id','DESC')
                            ->paginate(10);
        $categories   = DB::table('categories')->get();
        return view('/product/all')->with(['products'=>$products,'categories'=>$categories,'tags'=>$tags]);
    }
    public function product_filter($num){
        $tags = GeneralTag::all();
        $products  = DB::table('products')
                            ->join('assign_categories','assign_categories.p_id','=','products.id')
                            ->join('categories','categories.id','=','assign_categories.category_id')
                            ->select(['products.*','assign_categories.category_id','categories.theme_mode as product_mode'])
                            ->limit($num)
                            ->paginate(10);
        $categories   = DB::table('categories')->get();
        return view('/product/all')->with(['products'=>$products,'categories'=>$categories,'tags'=>$tags,'num'=>$num]);
    }
    public function assign_actions(Request $request){
        //dd($request->all());
        $p_ids = explode(',',$request->box_id);
        /* Check Product array*/
        if(!empty($p_ids)){
            /* Iterate Product array*/
            foreach($p_ids as $j){
                if($request->delete_id == 'on'){
                    Product::where('id',$j)->delete();
                    AssignedGeneralTag::where('p_id',$j)->delete();
                }else{
                    /* Check tag array*/
                    if(!empty($request->tag_id)){
                        /* Delete previous Products*/
                        //AssignedGeneralTag::where('p_id',$j)->delete();
                        /* Iterate tags array*/
                        foreach($request->tag_id as $i){
                            if(AssignedGeneralTag::where('p_id',$j)->where('tag_id',$i)->count() > 0){
                                continue;
                            }else{
                                AssignedGeneralTag::create([
                                    'tag_id' => $i,
                                    'p_id' => $j,
                                ]);    
                            }
                            
                        } /* end tags loop*/
                    } /* end tag count */
                    /* Assigned to products*/
                    $data = [];
                    if($request->product_theme_id== 0 || $request->product_theme_id == 1 || $request->product_theme_id == 2){
                        $data['p_theme'] = $request->product_theme_id;
                    }
                    if($request->home_slider_id == 1 || $request->home_slider_id == 2){
                        $data['p_slider_id'] = $request->home_slider_id;
                    }
                    if(isset($request->status_id) && ($request->status_id == 0 || $request->status_id == 1)){
                        $data['p_status'] = $request->status_id;
                    }
                    Product::where('id',$j)->update($data);
                }
            }/* end product loop*/
        }/* end product count*/
        return redirect('/products')->with('message', ' Actions performed..!');
    }
    public function view_product($id){
        $data = DB::table('products')
                ->join('assign_categories','assign_categories.p_id','=','products.id')
                ->join('categories','categories.id','=','assign_categories.category_id')
                ->select(['products.*','categories.cat_title','categories.theme_mode as product_mode'])
                ->where('products.id',$id)->first();
        return view('product/view-product',compact('data'));
    }
    public function view_tags($id){
        $data = DB::table('assigned_general_tags as at')
                ->join('general_tags as t','t.id','=','at.tag_id')
                ->join('products as p','p.id','=','at.p_id')
                ->where('p.id',$id)
                ->get(['t.*','at.p_id']);
        return view('product/view-tags',compact('data'));
    }
    public function tag_delete($id,$p_id){
        AssignedGeneralTag::where('tag_id',$id)->where('p_id',$p_id)->delete();
        return redirect()->back()->with('message','Tag Unassigned successfully..');
        
    }
    function create(){
        $categories = DB::table('categories')->get(['cat_title','id','product_mode']);
        $commodities = DB::table('commodities')->get();
        $sachets = DB::table('sachets')->get();

        return view('product/new')->with(['categories'=>$categories,'commodities'=>$commodities,'sachets'=>$sachets]);
    }

    function store(Request $request){
        //dd($request->attribute);
        // $this->validate($request, [
        //    'p_commodity_image.*' => 'required',
        //    'p_commodity_image' => [
        //        'required',
        //        'max:4', // make sure the input array is not empty
        //        'array',
               
        //    ],
        //    'p_sachet_image.*' => 'required',
        //    'p_sachet_image' => [
        //        'required',
        //        'max:7', // make sure the input array is not empty
        //        'array',
               
        //    ],

        //     'p_title'           => 'required',
        //     'p_category'        => 'required',
        //     'p_short_desc'      => 'required',
        //     'p_long_desc'       => 'required',
        //     /*'p_video_link'      => 'required',*/
        //     /*'p_theme'           => 'required',*/
        //     'p_main_image'      => 'image|mimes:jpeg,jpg,png,gif|required|max:2000',
        //     'p_bag_image'       => 'required',
        //     'p_bag_image.*'     => 'image|mimes:jpeg,jpg,png,gif|max:2000',
        //     'p_pdf'             => 'required|mimes:pdf|max:10000',
        // ]);

         $p_main_image   = '';
         $p_pdf = '';
         $p_og_img = '';
        $p_slug = str_slug($request->p_title,'-');
         if($request->hasFile('p_pdf')) {
            $file1 =  $request->file('p_pdf');
            $pdf = $file1->getClientOriginalName();
            $p_pdf = uniqid().$pdf;
            $file1->move('uploads/pdf',$p_pdf);
        }
       
        if($request->hasFile('p_main_image')) {
            $file1 =  $request->file('p_main_image');
            $img_name1 = $file1->getClientOriginalName();
            $p_main_image = uniqid().$img_name1;
            $file1->move('uploads/product',$p_main_image);
        }
        if($request->hasFile('p_og_img')) {
            $file1 =  $request->file('p_og_img');
            $img_name1 = $file1->getClientOriginalName();
            $p_og_img = uniqid().$img_name1;
            $file1->move('uploads/product',$p_og_img);
        }
        $table = new Product();
        $table->p_title         = $request->p_title;
        $table->p_slug          = $request->p_slug;
        $table->p_short_desc    = $request->p_short_desc;
        $table->p_long_desc     = $request->p_long_desc;
        $table->p_video_link    = $request->p_video_link;
        $table->p_theme         = $request->p_theme;
        $table->p_main_image    = $p_main_image;
        $table->p_pdf           = $p_pdf;

        $table->p_meta_desc     = $request->p_meta_desc;
        $table->p_meta_title    = $request->p_meta_title;
        $table->p_meta_keyword  = $request->p_meta_keyword;
        $table->p_og_tags       = $request->p_og_tags;
        $table->p_twitter_tags  = $request->p_twitter_tags;
        $table->p_og_img        = $p_og_img;

        $table->save();

        $last_id  = $table->id;

        if($files = $request->file('p_bag_image')){
            foreach($files as $file){
                $img_name = $file->getClientOriginalName();
                $p_bag_image = uniqid().$img_name;
                $file->move('uploads/product',$p_bag_image);

                $image                  = new ProductMainImage();
                $image->p_bag_image     = $p_bag_image;
                $image->p_id            = $last_id;
                $image->save();
            }
        }
        if(!empty($request->p_commodity_image))
        {
            foreach($request->p_commodity_image as $img){   
                $image                    = new ProductCommodityImage();
                $image->p_commodity_image = $img;
                $image->p_id              = $last_id;
                $image->save();
            }
        }
        if(!empty($request->p_sachet_image))
        {
            foreach($request->p_sachet_image as $img){   
                $image                    = new ProductSachetImage();
                $image->p_sachet_image = $img;
                $image->p_id              = $last_id;
                $image->save();
            }
        }
        if(!empty($request->attribute))
        {
            $attributes = array_filter($request->attribute);
            foreach($attributes as $key=>$value)
            {
             
                $res = DB::table('product_attributes')
                    ->where('cat_id','=',$request->p_category)
                    ->where('attribute_id','=',$key)
                    ->where('p_id','=',$last_id)
                    ->count();
                
                if($res > 0)
                {
                    
                    DB::table('product_attributes')
                    ->where('cat_id','=',$request->p_category)
                    ->where('attribute_id','=',$key)
                    ->where('p_id','=',$last_id)
                    ->update(['cat_id'=>$request->p_category,'attribute_id'=>$key,'p_id'=>$last_id,'name'=>$value]);
                }
                else
                {

                    DB::table('product_attributes')
                    ->insert(['cat_id'=>$request->p_category,'attribute_id'=>$key,'p_id'=>$last_id,'name'=>$value]);
                    
                }   
            }
        }

        DB::table('assign_categories')->insert(['p_id'=>$last_id,'category_id'=>$request->p_category]);
        return redirect('/products')->with('message', ' Product is added !');
    }

   
    function edit($id)
    {
         $bag_images        = DB::table('product_main_images')->where('p_id','=',$id)->get();
    
        $commodities = DB::table('commodities')->get();       
        $commodity_selected  = DB::table('product_commodity_images')->where('p_id','=',$id)->get(['p_commodity_image']);

        $selected_commodities = [];
        foreach($commodity_selected as $row)
        {
            $selected_commodities[] = $row->p_commodity_image;
        }
        $final_commodities = '';
        foreach($commodities as $i)
        {
            if(in_array($i->id,$selected_commodities))
            {
                $url = asset('uploads/commodity/'.$i->commodity_images);
                $final_commodities .= '<input title="" type="checkbox" checked class="commodity" name="p_commodity_image[]" value="{{$i->id}}"><span><img style="width:43px;height:47px;margin-left:10px;" src="'.$url.'"></span>';
            }
            else
            {   $url = asset('uploads/commodity/'.$i->commodity_images);
                $final_commodities .= '<input title="" type="checkbox" class="commodity" name="p_commodity_image[]" value="{{$i->id}}"><span><img style="width:43px;height:47px;margin-left:10px;" src="'.$url.'"></span>';
            }
        }

        $sachets = DB::table('sachets')->get();
        $sachet_selected    = DB::table('product_sachet_images')->where('p_id','=',$id)->get();
        $selected_sachets = [];
        foreach($sachet_selected as $row)
        {
            $selected_sachets[] = $row->p_sachet_image;
        }
        $final_sachets = '';
        foreach($sachets as $i)
        {
            if(in_array($i->id,$selected_sachets))
            {
                $url = asset('uploads/sachet/'.$i->sachet_image);
                $final_sachets .= '<input title="" type="checkbox" checked class="sachets" name="p_sachet_image[]" value="{{$i->id}}"><span><img style="width:26px;height:26px;margin-left:10px;margin-right:10px;" src="'.$url.'"></span>';
            }
            else
            {   $url = asset('uploads/sachet/'.$i->sachet_image);
                $final_sachets .= '<input title="" type="checkbox" class="sachets" name="p_sachet_image[]" value="{{$i->id}}"><span><img style="width:26px;height:26px;margin-left:10px;margin-right:10px;" src="'.$url.'"></span>';
            }
        }

        $data              = DB::table('products')
                            ->join('assign_categories','assign_categories.p_id','=','products.id')
                            ->join('categories','categories.id','=','assign_categories.category_id')
                            ->where('products.id','=',$id)
                            ->where('assign_categories.p_id','=',$id)
                            ->select('products.*','assign_categories.category_id','categories.theme_mode as product_mode')
                            ->first();

        $categories   = DB::table('categories')->get();


        $attributes = DB::table('product_attributes')
            ->join('categories','categories.id','=','product_attributes.cat_id')
            ->join('attributes','attributes.id','=','product_attributes.attribute_id')
            ->where('product_attributes.cat_id','=',$data->category_id)
            ->where('product_attributes.p_id','=',$id)
            ->get(['attributes.label','product_attributes.id','product_attributes.attribute_id as assigned_id','product_attributes.name']);

        $attributes_all = DB::table('assigned_attributes')
            ->join('categories','categories.id','=','assigned_attributes.cat_id')
            ->join('attributes','attributes.id','=','assigned_attributes.attribute_id')
            ->where('assigned_attributes.cat_id','=',$data->category_id)
            ->get(['attributes.label','assigned_attributes.attribute_id as assigned_id']);
        
        $attribute_ids = array();
        foreach($attributes as $i)
        {
            array_push($attribute_ids,$i->assigned_id);
        }
       
        return view('/product/edit')->with(['attributes'=>$attributes,'attributes_all'=>$attributes_all,'attribute_ids'=>$attribute_ids,'final_commodities'=>$final_commodities,'final_sachets'=>$final_sachets,'bag_images'=>$bag_images,'data'=>$data,'categories'=>$categories]);
    }

    function update(Request $request)
    {
        // $this->validate($request, [
        //     'p_title'           => 'required',
        //     'p_category'        => 'required',
        //     'p_short_desc'      => 'required',
        //     'p_long_desc'       => 'required',
        //     'p_video_link'      => 'required',
        //     /*'p_theme'           => 'required',*/
        //     'p_main_image'      => 'image|mimes:jpeg,png,gif|max:2000',
        //     'p_bag_image.*'     => 'image|mimes:jpeg,png,gif|max:2000',
        // ]);

        $p_main_image   = '';
        $p_pdf   = '';
        $p_og_img = '';

        $product            = DB::table('products')->where('id','=',$request->id)->first();
        $bag_images         = DB::table('product_main_images')->where('p_id','=',$request->id)->get();
        $commodity_images   = DB::table('product_commodity_images')
                                ->join('commodities','commodities.id','=','product_commodity_images.p_commodity_image')
                                ->where('p_id','=',$request->id)
                                ->get(['product_commodity_images.*','commodities.commodity_images']);
    
        $sachet_images      = DB::table('product_sachet_images')->where('p_id','=',$request->id)
                                ->join('sachets','sachets.id','=','product_sachet_images.p_sachet_image')
                                ->where('p_id','=',$request->id)
                                ->get(['product_sachet_images.*','sachets.sachet_image']);
        
        if($request->hasfile('p_main_image')){
            if(file_exists(public_path().'/uploads/product/'.$product->p_main_image))
            {
               unlink(public_path().'/uploads/product/'.$product->p_main_image);
            }
            $file1 =  $request->file('p_main_image');
            $img_name1 = $file1->getClientOriginalName();
            $p_main_image = uniqid().$img_name1;
            $file1->move('uploads/product',$p_main_image);
        }
        else
        {
            $p_main_image = $product->p_main_image;
        }
        if($request->hasfile('p_og_img')){
            if(file_exists(public_path().'/uploads/product/'.$product->p_og_img))
            {
               unlink(public_path().'/uploads/product/'.$product->p_og_img);
            }
            $file1 =  $request->file('p_og_img');
            $img_name1 = $file1->getClientOriginalName();
            $p_og_img = uniqid().$img_name1;
            $file1->move('uploads/product',$p_og_img);
        }
        else
        {
            $p_og_img = $product->p_og_img;
        }
        if($request->hasfile('p_pdf')){
            if(file_exists(public_path().'/uploads/pdf/'.$product->p_pdf))
            {
               unlink(public_path().'/uploads/pdf/'.$product->p_pdf);
            }

            $file1 =  $request->file('p_pdf');
            $pdf = $file1->getClientOriginalName();
            $p_pdf = uniqid().$pdf;
            $file1->move('uploads/pdf',$p_pdf);

        }
        else
        {
            $p_pdf = $product->p_pdf;
        }
        Product::where('id', $request->id)->update(array(
            'p_title'         => $request->p_title,
            'p_slug'          => $request->p_slug,
            /*'p_category'      => $request->p_category,*/
            'p_short_desc'    => $request->p_short_desc,
            'p_long_desc'     => $request->p_long_desc,
            'p_video_link'    => $request->p_video_link,
            'p_theme'         => $request->p_theme,
            'p_main_image'    => $p_main_image,
            'p_pdf'           => $p_pdf,
            'p_meta_desc'     => $request->p_meta_desc,
            'p_meta_title'    => $request->p_meta_title,
            'p_meta_keyword'  => $request->p_meta_keyword,
            'p_og_tags'       => $request->p_og_tags,
            'p_twitter_tags'  => $request->p_twitter_tags,
            'p_og_img'        => $p_og_img,
        ));

        if($files = $request->file('p_bag_image')){
            // unlink and delete preious images
            $size = sizeof($bag_images);
            for( $i = 0;$i < $size; $i++)
            {
                if(file_exists(public_path().'/uploads/product/'.$bag_images[$i]->p_bag_image))
                {
                   unlink(public_path().'/uploads/product/'.$bag_images[$i]->p_bag_image);
                }
            }
            DB::table('product_main_images')->where('p_id','=',$request->id)->delete();
            foreach($files as $file){
                $img_name = $file->getClientOriginalName();
                $p_bag_image = uniqid().$img_name;
                $file->move('uploads/product',$p_bag_image);

                $image                  = new ProductMainImage();
                $image->p_bag_image     = $p_bag_image;
                $image->p_id            = $request->id;
                $image->save();
            }
        }


        if(!empty($request->p_commodity_image))
        {

            $size = sizeof($commodity_images);
            for( $i = 0;$i < $size; $i++)
            {
                if(file_exists(public_path().'/uploads/commodity/'.$commodity_images[$i]->p_commodity_image))
                {
                   unlink(public_path().'/uploads/commodity/'.$commodity_images[$i]->p_commodity_image);
                }
            }
           
            DB::table('product_commodity_images')->where('p_id','=',$request->id)->delete();
            foreach($request->p_commodity_image as $img)
            {   
                $image                    = new ProductCommodityImage();
                $image->p_commodity_image = $img;
                $image->p_id              = $request->id;
                $image->save();
            }
        }
        if(!empty($request->p_sachet_image))
        {

            $size = sizeof($sachet_images);
            for( $i = 0;$i < $size; $i++)
            {
                if(file_exists(public_path().'/uploads/sachet/'.$sachet_images[$i]->p_sachet_image))
                {
                   unlink(public_path().'/uploads/sachet/'.$sachet_images[$i]->p_sachet_image);
                }
            }
           
            DB::table('product_sachet_images')->where('p_id','=',$request->id)->delete();
            
            foreach($request->p_sachet_image as $img)
            {   
                $image                    = new ProductSachetImage();
                $image->p_sachet_image    = $img;
                $image->p_id              = $request->id;
                $image->save();
            }
        }
        if(!empty($request->p_category))
        {

            /*DB::table('assign_categories')->where('category_id','=',$request->p_category)->where('p_id','=',$request->id)->delete();*/
            DB::table('assign_categories')->where('p_id','=',$request->id)->update(['p_id'=>$request->id,'category_id'=>$request->p_category]);
        }
        if(!empty($request->attribute))
        {
            $attributes = array_filter($request->attribute);
            foreach($attributes as $key=>$value)
            {
             
                $res = DB::table('product_attributes')
                    ->where('cat_id','=',$request->p_category)
                    ->where('attribute_id','=',$key)
                    ->where('p_id','=',$request->id)
                    ->count();
                
                if($res > 0)
                {
                    
                    DB::table('product_attributes')
                    ->where('cat_id','=',$request->p_category)
                    ->where('attribute_id','=',$key)
                    ->where('p_id','=',$request->id)
                    ->update(['cat_id'=>$request->p_category,'attribute_id'=>$key,'p_id'=>$request->id,'name'=>$value]);
                }
                else
                {

                    DB::table('product_attributes')
                    ->insert(['cat_id'=>$request->p_category,'attribute_id'=>$key,'p_id'=>$request->id,'name'=>$value]);
                    
                }   
            }
        }

        return redirect('/products')->with('message', 'Product is updated !');

    }

    function destroy(Request $request)
    {
        // Delete and unlink images

        $row = Product::find($request->id);
        if(file_exists(public_path().'/uploads/product/'.$row->p_main_image))
        {
           unlink(public_path().'/uploads/product/'.$row->p_main_image);
        }
        
        $bag_images        = DB::table('product_main_images')->where('p_id','=',$request->id)->get();
        $commodity_images  = DB::table('product_commodity_images')->where('p_id','=',$request->id)->get();
        $sachet_images     = DB::table('product_sachet_images')->where('p_id','=',$request->id)->get();
        $bag_size       = sizeof($bag_images);
       
        // Delete Bag Images
        for( $i = 0;$i < $bag_size; $i++)
        {
            if(file_exists(public_path().'/uploads/product/'.$bag_images[$i]->p_bag_image))
            {
               unlink(public_path().'/uploads/product/'.$bag_images[$i]->p_bag_image);
            }
        }
       
        $row->delete();
        DB::table('product_attributes')->where('p_id','=',$request->id)->delete();
        DB::table('assign_categories')->where('p_id','=',$request->id)->delete();
        return redirect('/products')->with('message', 'Product is deleted !');
    }
    public function get_bag_images()
    {
        $images = DB::table('product_main_images')->where('p_id','=',request('id'))->get();
        return $images;
    }
    public function get_commodity_images()
    {
        $images   = DB::table('product_commodity_images')
                    ->join('commodities','commodities.id','=','product_commodity_images.p_commodity_image')
                    ->where('product_commodity_images.p_id','=',request('id'))
                    ->get(['product_commodity_images.*','commodities.commodity_images as p_commodity_image']);
        return $images;
    }
    public function get_sachet_images()
    {
        
        $images    = DB::table('product_sachet_images')
                    ->join('sachets','sachets.id','=','product_sachet_images.p_sachet_image')
                    ->where('product_sachet_images.p_id','=',request('id'))
                    ->get(['product_sachet_images.*','sachets.sachet_image as p_sachet_image']);
        return $images;
    }
    public function change_product_mode()
    {
        $res = DB::table('products')->where('id','=',request('id'))->first();
        if(empty($res))
        {
            echo "Something went wrong";
        }
        else
        {
            if($res->p_theme  == request('product_mode'))
            {
                echo "Already exist..";
            }
            else
            {
                $response = DB::table('products')->where('id','=',request('id'))->update(['p_theme'=>request('product_mode')]);
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
    public function assign_category()
    {
        /*DB::table('assign_categories')->where('category_id','=',request('category'))->where('p_id','=',request('id'))->delete();*/
        $response = DB::table('assign_categories')->where('p_id','=',request('id'))->update(['p_id'=>request('id'),'category_id'=>request('category')]);
        if($response == true)
        {
            return 1;
        }
        else
        {
            echo "Something went wrong";
        }
    }
    public function change_status()
    {
        $res = DB::table('products')->where('id','=',request('id'))->first();
        if(empty($res))
        {
            echo "Something went wrong";
        }
        else
        {
            if($res->p_status  == request('status'))
            {
                echo "Already exist..";
            }
            else
            {
                $response = DB::table('products')->where('id','=',request('id'))->update(['p_status'=>request('status')]);
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
    public function assign_home_slider()
    {
        $res = DB::table('products')->where('id','=',request('id'))->first();
        if(empty($res))
        {
            echo "Something went wrong";
        }
        else
        {
            if($res->p_slider_id  == request('slider_id'))
            {
                echo "Already exist..";
            }
            else
            {
                $response = DB::table('products')->where('id','=',request('id'))->update(['p_slider_id'=>request('slider_id')]);
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
    public function get_attributes()
    {
        $attributes = DB::table('assigned_attributes')
            ->join('categories','categories.id','=','assigned_attributes.cat_id')
            ->join('attributes','attributes.id','=','assigned_attributes.attribute_id')
            ->where('assigned_attributes.cat_id','=',request('id'))
            ->get(['attributes.label','assigned_attributes.attribute_id as assigned_id']);
        return $attributes;
    }
    public function get_long_desc()
    {
        return $response = DB::table('products')->where('id','=',request('id'))->get(['p_long_desc']);
    }

    public function search(Request $request)
    {
        $this->validate($request, [
            'search' => 'required',
        ]);
        $tags = GeneralTag::all();
        $products  = DB::table('products')
            ->join('assign_categories','assign_categories.p_id','=','products.id')
            ->join('categories','categories.id','=','assign_categories.category_id')
            ->where('products.p_title','LIKE', '%'.$request->search.'%')
            ->select(['products.*','assign_categories.category_id','categories.theme_mode as product_mode'])
            ->paginate(10);
   
         $categories   = DB::table('categories')->get();
        return view('/product/all')->with(['products'=>$products,'categories'=>$categories,'tags'=>$tags]);
    }
}
