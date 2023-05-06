<?php

namespace App\Http\Controllers\blog;
use Session;
use App\blog\BlogCategory;
use App\blog\BlogPostTag;
use App\blog\BlogPost;
use App\blog\BlogPostMetaTag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    function index(){

        $posts = DB::table('blog_posts')
        		->join('blog_categories','blog_categories.id','blog_posts.p_category')
        		->get(['blog_posts.*','blog_categories.cat_title']);
        $tags       = DB::table('blog_posts')
                    ->join('blog_post_tags','blog_post_tags.p_id','=','blog_posts.id')
                    ->get(['blog_post_tags.*']);

        return view('/blog/post/all')->with(['posts'=>$posts,'tags'=>$tags]);
    }
    function create()
    {
    	$categories = DB::table('blog_categories')->get();
        return view('blog/post/new')->with(['categories'=>$categories]);
    }
    function store(Request $request)
    {
        $this->validate($request, [
            'p_title'         => 'required',
            'p_category'      => 'required',
            'p_desc'     	  => 'required',
            'p_meta_desc'  	  => 'required',
            'p_tag'  		  => 'required',
            'p_meta_tags'  	  => 'required',
            'p_image'      	  => 'image|mimes:jpeg,jpg,png,gif|required|max:2000',
        ]);
        $p_image = '';
        $p_slug = str_slug($request->p_title,'-');
        if($request->hasFile('p_image')) {
            $file1 =  $request->file('p_image');
            $img_name1 = $file1->getClientOriginalName();
            $p_image = uniqid().$img_name1;
            $file1->move('uploads/blog/post',$p_image);
        }
        $table                = new BlogPost();
        $table->p_title       = $request->p_title;
        $table->p_slug        = $p_slug;
        $table->p_category    = $request->p_category;
        $table->p_desc   	  = $request->p_desc;
        $table->p_meta_desc   = $request->p_meta_desc;
        $table->p_image       = $p_image;
        $table->p_link   	  = $request->p_link;
        $table->save();

        $last_id  = $table->id;

        $tags_array = explode(",",$request->p_tag);
        $size = sizeof($tags_array);
        for( $i = 0;$i < $size;$i++)
        {
            $tag            = new BlogPostTag();
            $tag->p_id      = $last_id;
            $tag->tag       = $tags_array[$i];
            $tag->save();
        }

        $meta_tags_array = explode(",",$request->p_meta_tags);
        $meta_size = sizeof($meta_tags_array);
        for( $i = 0;$i < $meta_size;$i++)
        {
            $tag            = new BlogPostMetaTag();
            $tag->p_id    = $last_id;
            $tag->meta_tag  = $meta_tags_array[$i];
            $tag->save();
        }

        return redirect('/blog/posts')->with('message', ' Post is added !');
    }

    function edit($id)
    {

        $res        = DB::table('blog_posts')
                        ->join('blog_post_tags','blog_post_tags.p_id','=','blog_posts.id')
                        ->where('blog_post_tags.p_id','=',$id)
                        ->get(['blog_post_tags.*']);
        $tags = '';                 
        foreach($res as $i)
        {
            $tags .= $i->tag.',';
        }

        $meta_res        = DB::table('blog_posts')
                        ->join('blog_post_meta_tags','blog_post_meta_tags.p_id','=','blog_posts.id')
                        ->where('blog_post_meta_tags.p_id','=',$id)
                        ->get(['blog_post_meta_tags.*']);
        $meta_tags = '';                 
        foreach($meta_res as $i)
        {
            $meta_tags .= $i->meta_tag.',';
        }                     

        $data       = DB::table('blog_posts')->where('id','=',$id)->first();
        $categories = DB::table('blog_categories')->get();
        return view('/blog/post/edit')->with(['tags'=>$tags,'meta_tags'=>$meta_tags,'data'=>$data,'categories'=>$categories]);
    }
    function update(Request $request)
    {

        $this->validate($request, [
            'p_title'         => 'required',
            'p_category'      => 'required',
            'p_desc'     	  => 'required',
            'p_meta_desc'  	  => 'required',
            'p_tag'  		  => 'required',
            'p_meta_tags'  	  => 'required',
            'p_image'      	  => 'image|mimes:jpeg,jpg,png,gif|max:2000',
        ]);
        $p_image = '';
        $post            = DB::table('blog_posts')->where('id','=',$request->id)->first();
        if($request->hasfile('p_image')){
            if(file_exists(public_path().'/uploads/blog/post/'.$post->p_image))
            {
               unlink(public_path().'/uploads/blog/post/'.$post->p_image);
            }
            $file1 =  $request->file('p_image');
            $img_name1 = $file1->getClientOriginalName();
            $p_image = uniqid().$img_name1;
            $file1->move('uploads/blog/post',$p_image);
        }
        else
        {
            $p_image = $post->p_image;
        }

        $p_slug = str_slug($request->p_title,'-');
          BlogPost::where('id', $request->id)->update(array(
                'p_title'       => $request->p_title,
                'p_slug'        => $p_slug,
		        'p_category'    => $request->p_category,
		        'p_desc'   	  	=> $request->p_desc,
		        'p_meta_desc'   => $request->p_meta_desc,
		        'p_image'   	=> $p_image,
                'p_link'        => $request->p_link
            ));
        if(!empty($request->p_tag))
        {
	        DB::table('blog_post_tags')->where('p_id','=',$request->id)->delete();    
	        $tags_array = explode(",",$request->p_tag);
	        $size = sizeof(array_filter($tags_array));
	        for( $i = 0;$i < $size;$i++)
	        {
	            $tag            = new BlogPostTag();
	            $tag->p_id      = $request->id;
	            $tag->tag       = $tags_array[$i];
	            $tag->save();
	        }
	    }
	     if(!empty($request->p_meta_tags))
        {
	        DB::table('blog_post_meta_tags')->where('p_id','=',$request->id)->delete();    
	        $tags_array = explode(",",$request->p_meta_tags);
	        $size = sizeof(array_filter($tags_array));
	        for( $i = 0;$i < $size;$i++)
	        {
	            $tag            = new BlogPostMetaTag();
	            $tag->p_id      = $request->id;
	            $tag->meta_tag  = $tags_array[$i];
	            $tag->save();
	        }
	    }

        

        return redirect('/blog/posts')->with('message', 'Post is updated !');
    }
    function destroy(Request $request)
    {
    	$row = BlogPost::find($request->id);
        if(file_exists(public_path().'/uploads/blog/post/'.$row->p_image))
        {
           unlink(public_path().'/uploads/blog/post/'.$row->p_image);
        }
        
        $row->delete();
        return redirect('/blog/posts')->with('message', 'Post is deleted !');
    }
    public function change_status()
    {
        $res = DB::table('blog_posts')->where('id','=',request('id'))->first();
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
                $response = DB::table('blog_posts')->where('id','=',request('id'))->update(['p_status'=>request('status')]);
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
    public function get_tags()
    {
    	$tags = DB::table('blog_post_tags')->where('p_id','=',request('id'))->get();
        return $tags;
    }
    public function get_meta_tags()
    {
        $tags = DB::table('blog_post_meta_tags')->where('p_id','=',request('id'))->get();
        return $tags;
    }
    public function post_feature()
    {
        $res = DB::table('blog_posts')->where('id','=',request('id'))->first();
        if(empty($res))
        {
            echo "Something went wrong";
        }
        else
        {
            if($res->p_feature  == request('feature'))
            {
                echo "Already exist..";
            }
            else
            {
                $response = DB::table('blog_posts')->where('id','=',request('id'))->update(['p_feature'=>request('feature')]);
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
    public function assign_slider()
    {
        $res = DB::table('blog_posts')->where('id','=',request('id'))->first();
        if(empty($res))
        {
            echo "Something went wrong";
        }
        else
        {
            if($res->p_slider  == request('slider'))
            {
                echo "Already exist..";
            }
            else
            {
                $response = DB::table('blog_posts')->where('id','=',request('id'))->update(['p_slider'=>request('slider')]);
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
    public function assign_caseStudies()
    {
      
        $res = DB::table('blog_posts')->where('id','=',request('id'))->first();
    
        if(empty($res))
        {
            echo "Something went wrong";
        }
        else
        {
            if($res->p_case_studies  == request('caseStudies'))
            {
                echo "Already exist..";
            }
            else
            {
                $response = DB::table('blog_posts')->where('id','=',request('id'))->update(['p_case_studies'=>request('caseStudies')]);
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
    
}
