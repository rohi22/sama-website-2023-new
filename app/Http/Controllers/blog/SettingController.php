<?php
namespace App\Http\Controllers\blog;
use Session;
use App\blog\BlogCategory;
use App\blog\BlogPostTag;
use App\blog\BlogPost;
use App\blog\BlogPostMetaTag;
use App\blog\BlogAbout;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
   
    public function about_us()
    {

       	$about 	 = DB::table('blog_abouts')->first();
    	return view('blog/setting/about')->with(['about'=>$about]);
    }
    public function about_store(Request $request)
    {

    	if(DB::table('blog_abouts')->count())
        {
        	$about 	 = DB::table('blog_abouts')->first();
	    	$this->validate($request, [
	            'title'       => 'required',
	            'desc'        => 'required',
	        ]);
	   
	        BlogAbout::where('id', $about->id)->update(array(
                'title'     => $request->title,
                'desc'      => $request->desc,
            ));

	       return redirect('/blog/about-us')->with('message', 'Content Updated !');
	    }
	    else
	    {	dd('sdsad');
	    	$this->validate($request, [
	            'title'       => 'required',
	            'desc'        => 'required',
	        ]);
	   
	    	$table = new BlogAbout();
	        $table->title     = $request->title;
	        $table->desc      = $request->desc;
	        $table->save();

	       return redirect('/blog/about-us')->with('message', 'Content submitted !');
	    }
    }
    public function subscription()
    {
    	$data 	 = DB::table('blog_subscribe_emails')->get();
    	return view('blog/setting/subscribe_list')->with(['data'=>$data]);
    }
    public function subscribe_delete($id)
    {
    	DB::table('blog_subscribe_emails')->where('id','=',$id)->delete();
        return redirect('/blog/subscription')->with('message', 'Subscription is deleted !');
    }
    public function comments()
    {

        $data    = DB::table('blog_comments')->get();
        return view('blog/setting/comments')->with(['data'=>$data]);
    }
    public function comment_delete($id)
    {
        DB::table('blog_comments')->where('id','=',$id)->delete();
        return redirect('/blog/comments')->with('message', 'Comment is deleted !');
    }
    public function change_status()
    {
        $res = DB::table('blog_comments')->where('id','=',request('id'))->first();
        if(empty($res))
        {
            echo "Something went wrong";
        }
        else
        {
            if($res->status  == request('status'))
            {
                echo "Already exist..";
            }
            else
            {
                $response = DB::table('blog_comments')->where('id','=',request('id'))->update(['status'=>request('status')]);
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
