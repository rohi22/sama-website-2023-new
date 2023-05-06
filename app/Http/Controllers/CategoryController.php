<?php

namespace App\Http\Controllers;
use Session;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    function index(){
        
        $categories = DB::table('categories')->where('parent_id','=',NULL)->get();
        $category_orders = DB::table('categories')->get();
        $tags       = DB::table('categories')
                    ->join('tags','tags.cat_id','=','categories.id')
                    ->get(['tags.*']);

        return view('/category/all')->with(['categories'=>$categories,'tags'=>$tags,'category_orders'=>$category_orders]);
    }
    function create()
    {
        $categories = DB::table('categories')->get();
        // dd($categories);
        return view('category/new')->with(['categories'=>$categories]);
    }
    function store(Request $request){
        //return dd($request->all());
        $this->validate($request, [
            'cat_title'         => 'required',
            'cat_desc'          => 'required',
            'cat_meta_desc'     => 'required',
            'cat_meta_keyword'  => 'required',
            'cat_image'         => 'required',
            'cat_icon'          => 'required',
        ]);
        $cat_image  = '';
        $cat_icon   = '';
        $cat_og_img = '';
        if($request->hasFile('cat_image')) {
            $file1 =  $request->file('cat_image');
            $img_name1 = $file1->getClientOriginalName();
            $cat_image = uniqid().$img_name1;
            $file1->move('uploads',$cat_image);
        }
        if($request->hasFile('cat_icon')) {
            $file1 =  $request->file('cat_icon');
            $img_name1 = $file1->getClientOriginalName();
            $cat_icon = uniqid().$img_name1;
            $file1->move('uploads',$cat_icon);
        }
        if($request->hasFile('cat_og_img')) {
            $file1 =  $request->file('cat_og_img');
            $img_name1 = $file1->getClientOriginalName();
            $cat_og_img = uniqid().$img_name1;
            $file1->move('uploads',$cat_og_img);
        }
        $table                  = new Category();
        $table->cat_title       = $request->cat_title;
        $table->cat_slug        = $request->cat_slug;
        $table->cat_desc        = $request->cat_desc;
        $table->cat_meta_desc   = $request->cat_meta_desc;
        $table->cat_image       = $cat_image;
        $table->cat_icon        = $cat_icon;
        $table->parent_id       = $request->parent_id;
        
        $table->cat_meta_title  = $request->cat_meta_title;
        $table->cat_og_tags     = $request->cat_og_tags;
        $table->cat_twitter_tags= $request->cat_twitter_tags;
        $table->cat_og_img      = $cat_og_img;
        $table->save();

        $last_id  = $table->id;

        $tags_array = explode(",",$request->cat_meta_keyword);
        $size = sizeof($tags_array);
        for( $i = 0;$i < $size;$i++)
        {
            $tag            = new Tag();
            $tag->cat_id    = $last_id;
            $tag->tag       = $tags_array[$i];
            $tag->parent_id = $request->parent_id;
            $tag->save();
        }

        return redirect('/categories')->with('message', ' Category is added !');
    }

    function edit($id){
        $categories = DB::table('categories')->get();
        $res        = DB::table('categories')
                        ->join('tags','tags.cat_id','=','categories.id')
                        ->where('tags.cat_id','=',$id)
                        ->get(['tags.*']);
        $tags = '';                 
        foreach($res as $i)
        {
            $tags .= $i->tag.',';
        }           

        $data       = DB::table('categories')->where('id','=',$id)->first();
        return view('/category/edit')->with(['categories'=>$categories,'tags'=>$tags,'data'=>$data]);
    }

    function update(Request $request){
        $this->validate($request, [
            'cat_title'         => 'required',
            'cat_desc'          => 'required',
            'cat_meta_desc'     => 'required',
            'cat_meta_keyword'  => 'required',
        ]);
        $cat_image  = '';
        $cat_icon   = '';
        $cat_og_img = '';

            $category = Category::find($request->id);
            if($request->hasfile('cat_icon')){
                if(file_exists(public_path().'/uploads/'.$category->cat_icon)){
                   unlink(public_path().'/uploads/'.$category->cat_icon);
                }
                $file1 =  $request->file('cat_icon');
                $img_name1 = $file1->getClientOriginalName();
                $cat_icon = uniqid().$img_name1;
                $file1->move('uploads',$cat_icon);
            }else{
                $cat_icon = $category->cat_icon;
            }
            if($request->hasfile('cat_image')){
                if(file_exists(public_path().'/uploads/'.$category->cat_image)){
                   unlink(public_path().'/uploads/'.$category->cat_image);
                }
                $file1 =  $request->file('cat_image');
                $img_name1 = $file1->getClientOriginalName();
                $cat_image = uniqid().$img_name1;
                $file1->move('uploads',$cat_image);
            }else{
                $cat_image = $category->cat_image;
            }
            if($request->hasfile('cat_og_img')){
                if(file_exists(public_path().'/uploads/'.$category->cat_og_img)){
                   unlink(public_path().'/uploads/'.$category->cat_og_img);
                }
                $file1 =  $request->file('cat_og_img');
                $img_name1 = $file1->getClientOriginalName();
                $cat_og_img = uniqid().$img_name1;
                $file1->move('uploads',$cat_og_img);
            }else{
                $cat_og_img = $category->cat_og_img;
            }
            Category::where('id', $request->id)->update(array(
                'cat_title'         => $request->cat_title,
                'cat_slug'          => $request->cat_slug,
                'cat_desc'          => $request->cat_desc,
                'cat_meta_desc'     => $request->cat_meta_desc,
                'cat_image'         => $cat_image,
                'cat_icon'          => $cat_icon,
                'parent_id'         => $request->parent_id,

                'cat_meta_title'    => $request->cat_meta_title,
                'cat_og_tags'       => $request->cat_og_tags,
                'cat_twitter_tags'  => $request->cat_twitter_tags,
                'cat_og_img'        => $cat_og_img,
            ));

        DB::table('tags')->where('cat_id','=',$request->id)->delete();    
        $tags_array = explode(",",$request->cat_meta_keyword);
        $size = sizeof($tags_array);
        for( $i = 0;$i < $size;$i++){
            $tag            = new Tag();
            $tag->cat_id    = $request->id;
            $tag->tag       = $tags_array[$i];
            $tag->parent_id = $request->parent_id;
            $tag->save();
        }

        return redirect('/categories')->with('message', 'Category is updated !');
    }
    function destroy(Request $request){
        Category::where('id', $request->id)->delete();
        Category::where('parent_id', $request->id)->delete();
        return redirect('/categories')->with('message', 'Category is deleted !');
    }
    public function view_subheads($id)
    {
        $categories = DB::table('categories')->where('parent_id','=',$id)->get();
        $category_orders = DB::table('categories')->get();
        $tags       = DB::table('categories')
                        ->join('tags','tags.cat_id','=','categories.id')
                        ->get(['tags.*']);
        if(empty($categories[0]))
        {
            return back()->withMessage("No Child Category found..");
        }
        else
        {
            return view('/category/subheads')->with(['categories'=>$categories,'tags'=>$tags,'category_orders'=>$category_orders]);
        }                
        
    }
    public function change_status()
    {
        /*$res = DB::table('categories')->where('id','=',request('id'))->where('parent_id','=',NULL)->first();
        if(empty($res))
        {
            echo "Something went wrong";
        }
        else
        {*/
            /*if($res->status  == request('status'))
            {
                echo "Already exist..";
            }
            else
            {*/
                $response = DB::table('categories')->where('id','=',request('id'))->update(['status'=>request('status')]);
                if($response == true)
                {
                    $status = DB::table('categories')->where('id','=',request('id'))->first();
                    echo $status->status;
                }
                else
                {
                    echo "Something went wrong";
                }
            //}    
        //}        
    }
    public function field_list($id)
    {
        return view('category/field_list');
    }
    public function change_menu()
    {
        $res = DB::table('categories')->where('id','=',request('id'))->first();
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
                $response = DB::table('categories')->where('id','=',request('id'))->update(['menu_mode'=>request('menu')]);
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
    public function change_product_mode()
    {
        $res = DB::table('categories')->where('id','=',request('id'))->first();
        if(empty($res))
        {
            echo "Something went wrong";
        }
        else
        {
            if($res->product_mode  == request('product_mode'))
            {
                echo "Already exist..";
            }
            else
            {
                $response = DB::table('categories')->where('id','=',request('id'))->update(['product_mode'=>request('product_mode')]);
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
    public function change_theme_mode()
    {
        $res = DB::table('categories')->where('id','=',request('id'))->first();
        if(empty($res))
        {
            echo "Something went wrong";
        }
        else
        {
            if($res->theme_mode  == request('theme_mode'))
            {
                echo "Already exist..";
            }
            else
            {
                $response = DB::table('categories')->where('id','=',request('id'))->update(['theme_mode'=>request('theme_mode')]);
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
    public function get_attribute_list()
    {
        $res = DB::table('attributes')->get();
        $attributes = DB::table('assigned_attributes')
            ->join('categories','categories.id','=','assigned_attributes.cat_id')
            ->join('attributes','attributes.id','=','assigned_attributes.attribute_id')
            ->where('assigned_attributes.cat_id','=',request('id'))
            ->get(['attributes.id']);
        
        $selected_attributes = [];
        foreach($attributes as $row)
        {
            $selected_attributes[] = $row->id;
        }
        $html = '';
        foreach($res as $i)
        {
            if(in_array($i->id,$selected_attributes))
            {
                $html .= '<label class="container" style=" font-size: inherit;">'.$i->label.'<input type="checkbox" checked class ="attribute" name="attribute[]" value="'.$i->id.'"><span class="checkmark"></span></label>';
            }
            else
            {
                $html .= '<label class="container" style=" font-size: inherit;">'.$i->label.'<input type="checkbox" class ="attribute" name="attribute[]" value="'.$i->id.'"><span class="checkmark"></span></label>';
            }
        }
        return $html;
               
    }
    public function assign_attribute()
    {
        $id =  request('id');
        $attributes_list =  request('selected_attribute');
        unset($attributes_list[0]);
        $attributes = $attributes_list;
        DB::table('assigned_attributes')->where('cat_id','=',$id)->delete();

        foreach($attributes as $i)
        {

            DB::table('assigned_attributes')->insert(['cat_id'=>$id,'attribute_id'=>$i]);
        }
        return 1;
    }
    public function search(Request $request)
    {
        $this->validate($request, [
            'search' => 'required',
        ]);

        $categories = DB::table('categories')
                        ->where('cat_title','LIKE', '%'.$request->search.'%')
                        ->get();
        $category_orders = DB::table('categories')->get();
        $tags       = DB::table('categories')
                    ->join('tags','tags.cat_id','=','categories.id')
                    ->where('categories.cat_title','LIKE', '%'.$request->search.'%')
                    ->get(['tags.*']);

        return view('/category/all')->with(['categories'=>$categories,'tags'=>$tags,'category_orders'=>$category_orders]);
    }
    public function change_cat_order()
    {
        
        $response = DB::table('categories')->where('id','=',request('current_order'))->update(['cat_order'=>request('new_order')]);
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
