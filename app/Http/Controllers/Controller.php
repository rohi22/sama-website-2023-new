<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Category;
use DB;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
   {

          $categories = DB::table('categories')->where('menu_mode','=',1)->orderBy('cat_order','ASC')->where('status','=',1)->get();

          foreach($categories as $key=>$value)
          {
            if($categories != null && !empty($value->id))
            {
              $subcat = DB::table('categories')->where('parent_id','=',$value->id)->get();
              $categories[$key]->subcategories = $subcat;  
            }
          }
   		//$categories = DB::table('categories')->where('menu_mode','=',1)->where('status','=',1)->whereIn('id','parent_id')->get();
   		$blog_menu_categories = DB::table('blog_categories')->where('cat_status','=',1)->where('menu_mode','=',1)->orderBy('id','DESC')->get();
   		$blog_categories = DB::table('blog_categories')->where('cat_status','=',1)->orderBy('id','DESC')->get();
   		$logos 		= DB::table('logos')->first();
   		$sama_posts = DB::table('blog_posts')
        		->join('blog_categories','blog_categories.id','blog_posts.p_category')
        		->take(2)
        		->orderBy('id','DESC')
        		->get(['blog_posts.*','blog_categories.cat_title','blog_categories.cat_slug']);
      $footer_posts = DB::table('blog_posts')
            ->join('blog_categories','blog_categories.id','blog_posts.p_category')
            ->take(4)
            ->orderBy('id','DESC')
            ->get(['blog_posts.*','blog_categories.cat_title','blog_categories.cat_slug']);
      
      $footer_feature_posts = DB::table('blog_posts')
            ->join('blog_categories','blog_categories.id','blog_posts.p_category')
            ->orderBy('blog_posts.id','DESC')
            ->where('blog_posts.p_feature','=',1)
            ->take(3)
            ->get(['blog_posts.*','blog_categories.cat_title','blog_categories.cat_slug']);
      $tags       = DB::table('blog_posts')
                    ->join('blog_post_tags','blog_post_tags.p_id','=','blog_posts.id')
                    ->take(12)
                    ->orderBy('id','DESC')
                    ->get(['blog_post_tags.*']);

      $footer_content 	 = DB::table('footer_sections')->first();
      $about       = DB::table('blog_abouts')->first(); 
        
        view()->share(['categories'=>$categories,'logos'=>$logos,'blog_categories'=>$blog_categories,'sama_posts'=>$sama_posts,'tags'=>$tags,'about'=>$about,'footer_posts'=>$footer_posts,'footer_feature_posts'=>$footer_feature_posts,'footer_content'=>$footer_content,'blog_menu_categories'=>$blog_menu_categories]);
   }
}
