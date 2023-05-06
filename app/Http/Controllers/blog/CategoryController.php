<?php

namespace App\Http\Controllers\blog;
use Session;
use App\blog\BlogCategory;
use App\blog\BlogCategoryTag;
use App\blog\BlogCategoryMetaTag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    function index(){
        $categories = DB::table('blog_categories')->get();
        return view('/blog/category/all')->with(['categories'=>$categories]);
    }
    function create()
    {
        return view('blog/category/new');
    }
    function store(Request $request)
    {
        $this->validate($request, [
            'cat_title'         => 'required',
            'cat_desc'          => 'required',
            'cat_meta_desc'     => 'required',
            'cat_meta_keyword'  => 'required',
            'cat_meta_tags'     => 'required',
        ]);
        
        $cat_slug = str_slug($request->cat_title,'-');
        $table                  = new BlogCategory();
        $table->cat_title       = $request->cat_title;
        $table->cat_slug        = $cat_slug;
        $table->cat_desc        = $request->cat_desc;
        $table->cat_meta_desc   = $request->cat_meta_desc;
        $table->save();

        $last_id  = $table->id;

        $tags_array = explode(",",$request->cat_meta_keyword);
        $size = sizeof($tags_array);
        for( $i = 0;$i < $size;$i++)
        {
            $tag            = new BlogCategoryTag();
            $tag->cat_id    = $last_id;
            $tag->tag       = $tags_array[$i];
            $tag->save();
        }
        $meta_tags_array = explode(",",$request->cat_meta_tags);
        $meta_size = sizeof($meta_tags_array);
        for( $i = 0;$i < $meta_size;$i++)
        {
            $tag            = new BlogCategoryMetaTag();
            $tag->cat_id    = $last_id;
            $tag->meta_tag  = $meta_tags_array[$i];
            $tag->save();
        }

        return redirect('/blog/categories')->with('message', ' Category is added !');
    }

    function edit($id)
    {

        $res        = DB::table('blog_categories')
                        ->join('blog_category_tags','blog_category_tags.cat_id','=','blog_categories.id')
                        ->where('blog_category_tags.cat_id','=',$id)
                        ->get(['blog_category_tags.*']);
        $tags = '';                 
        foreach($res as $i)
        {
            $tags .= $i->tag.',';
        }
        $meta_res        = DB::table('blog_categories')
                        ->join('blog_category_meta_tags','blog_category_meta_tags.cat_id','=','blog_categories.id')
                        ->where('blog_category_meta_tags.cat_id','=',$id)
                        ->get(['blog_category_meta_tags.*']);
        $meta_tags = '';                 
        foreach($meta_res as $i)
        {
            $meta_tags .= $i->meta_tag.',';
        }           

        $data       = DB::table('blog_categories')->where('id','=',$id)->first();
        return view('/blog/category/edit')->with(['tags'=>$tags,'data'=>$data,'meta_tags'=>$meta_tags]);
    }
    function update(Request $request)
    {

        $this->validate($request, [
            'cat_title'         => 'required',
            'cat_desc'          => 'required',
            'cat_meta_desc'     => 'required',
            'cat_meta_keyword'  => 'required',
            'cat_meta_tags'     => 'required',
        ]);

        $cat_slug = str_slug($request->cat_title,'-');
          BlogCategory::where('id', $request->id)->update(array(
                'cat_title'         => $request->cat_title,
                'cat_slug'          => $cat_slug,
                'cat_desc'          => $request->cat_desc,
                'cat_meta_desc'     => $request->cat_meta_desc,
            ));

        if(!empty($request->cat_meta_keyword))
        {
            DB::table('blog_category_tags')->where('cat_id','=',$request->id)->delete();    
            $tags_array = explode(",",$request->cat_meta_keyword);
            $size = sizeof(array_filter($tags_array));
            for( $i = 0;$i < $size;$i++)
            {
                $tag            = new BlogCategoryTag();
                $tag->cat_id    = $request->id;
                $tag->tag       = $tags_array[$i];
                $tag->save();
            }    
        }
        if(!empty($request->cat_meta_tags))
        {
            DB::table('blog_category_meta_tags')->where('cat_id','=',$request->id)->delete();    
            $tags_array = explode(",",$request->cat_meta_tags);
            $size = sizeof(array_filter($tags_array));
            for( $i = 0;$i < $size;$i++)
            {
                $tag            = new BlogCategoryMetaTag();
                $tag->cat_id    = $request->id;
                $tag->meta_tag  = $tags_array[$i];
                $tag->save();
            }    
        }
        

        return redirect('/blog/categories')->with('message', 'Category is updated !');
    }
    function destroy(Request $request)
    {
        BlogCategory::where('id', $request->id)->delete();
        return redirect('/blog/categories')->with('message', 'Category is deleted !');
    }
    public function change_status()
    {
        $res = DB::table('blog_categories')->where('id','=',request('id'))->first();
        if(empty($res))
        {
            echo "Something went wrong";
        }
        else
        {
            if($res->cat_status  == request('status'))
            {
                echo "Already exist..";
            }
            else
            {
                $response = DB::table('blog_categories')->where('id','=',request('id'))->update(['cat_status'=>request('status')]);
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
        $tags = DB::table('blog_category_tags')->where('cat_id','=',request('id'))->get();
        return $tags;
    }
    public function get_meta_tags()
    {
        $tags = DB::table('blog_category_meta_tags')->where('cat_id','=',request('id'))->get();
        return $tags;
    }
     public function change_menu()
    {
        $res = DB::table('blog_categories')->where('id','=',request('id'))->first();
        if(empty($res))
        {
            echo "Something went wrong";
        }
        else
        {
            if($res->menu_mode  == request('menu'))
            {
                echo "Already exist..";
            }
            else
            {
                $response = DB::table('blog_categories')->where('id','=',request('id'))->update(['menu_mode'=>request('menu')]);
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
