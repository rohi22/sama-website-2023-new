<?php

namespace App\Http\Controllers\blog;
use Session;
use App\blog\BlogCategoryTag;
use App\blog\BlogCategoryMetaTag;
use App\blog\BlogCategory;
use App\blog\BlogPostTag;
use App\blog\BlogPost;
use App\blog\BlogSubscribeEmail;
use App\blog\BlogPostMetaTag;
use App\blog\BlogComment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
   	public function __construct()
	{
	    parent::__construct();
       
	}
   public function index()
   {

    
   	$posts = DB::table('blog_posts')
        		->join('blog_categories','blog_categories.id','blog_posts.p_category')
        		->orderBy('blog_posts.id','DESC')
        		->select('blog_posts.*','blog_categories.cat_slug','blog_categories.cat_title')
                ->paginate(5);

    $tags       = DB::table('blog_posts')
                ->join('blog_post_tags','blog_post_tags.p_id','=','blog_posts.id')
                ->get(['blog_post_tags.*']);

    $feature_posts = DB::table('blog_posts')
        		->join('blog_categories','blog_categories.id','blog_posts.p_category')
        		->orderBy('blog_posts.id','DESC')
        		->where('blog_posts.p_feature','=',1)
        		->get(['blog_posts.*','blog_categories.cat_title','blog_categories.cat_slug']);

    $sliders = DB::table('blog_sliders')->get();
   	 return view('blog/index')->with(['posts'=>$posts,'feature_posts'=>$feature_posts,'sliders'=>$sliders]);
   }
   public function subscribe_email(Request $request)
    {
        $this->validate($request, [
            'email'     => 'required|email',
            'captcha'   => 'required|captcha',
        ]);
        $table = new BlogSubscribeEmail();
        $table->email    = request('email');
        $table->save();
        return 'You will receive the latest news and updates:';
    }

    public function single_post($category,$title)
    {

    	 $post = DB::table('blog_posts')
        		->join('blog_categories','blog_categories.id','blog_posts.p_category')
        		->where('blog_categories.cat_slug','=',$category)
        		->where('blog_posts.p_slug','=',$title)
        		->select('blog_posts.*','blog_categories.cat_title','blog_categories.cat_slug')
        		->first();
        if(empty($post)){
            return redirect('blog/packaging-machines');
        }
        
        $tags       = DB::table('blog_posts')
                    ->join('blog_post_tags','blog_post_tags.p_id','=','blog_posts.id')
                    ->where('blog_posts.p_slug','=',$title)
                    ->get(['blog_post_tags.*']);

        $comments       = DB::table('blog_comments')
                    ->join('blog_posts','blog_posts.id','=','blog_comments.p_id')
                    ->where('blog_posts.p_slug','=',$title)
                    ->where('blog_comments.status','=',1)
                    ->get(['blog_comments.*']);


        $related_posts = DB::table('blog_posts')
        		->join('blog_categories','blog_categories.id','blog_posts.p_category')
        		->where('blog_categories.cat_slug','=',$category)
        		->get(['blog_posts.*','blog_categories.cat_title','blog_categories.cat_slug']);            

    	return view('blog/single_post')->with(['post'=>$post,'single_post_tags'=>$tags,'related_posts'=>$related_posts,'comments'=>$comments]);
    }
    public function category($category)
    {
		$posts = DB::table('blog_posts')
    		->join('blog_categories','blog_categories.id','blog_posts.p_category')
    		->where('blog_categories.cat_slug','=',$category)
    		->orderBy('blog_posts.id','DESC')
    		->select('blog_posts.*','blog_categories.cat_title','blog_categories.cat_slug')
            ->paginate(5);

		return view('blog/blog_listing')->with(['posts'=>$posts,'category'=>$category,'nav'=>$category]);
    }
    public function submit_comment()
    {
        $table                = new BlogComment();
        $table->p_id          = request('id');
        $table->comment       = request('comment');
        $table->email         = request('email');
        $table->name          = request('name');
        $table->url           = request('url');
        $table->save();        
        //return  "Comment send successfully..!";
        $comments    = DB::table('blog_comments')->where('p_id','=',request('id'))->where('status','=',1)->get();
        return $comments;
                    
    }
    public function get_tag_filter($tag)
    {
        $posts = DB::table('blog_posts')
                ->join('blog_categories','blog_categories.id','blog_posts.p_category')
                ->join('blog_post_tags','blog_post_tags.p_id','blog_posts.id')
                ->orderBy('blog_posts.id','DESC')
                ->where('blog_post_tags.tag_slug','LIKE','%'.$tag.'%')
                ->select('blog_posts.*','blog_categories.cat_title','blog_categories.cat_slug')
                ->paginate(5);

         return view('blog/blog_listing')->with(['posts'=>$posts,'tag'=>$tag]);
    }
}
