<?php

namespace App\Http\Controllers;

use App\Models\Blogtag;
use App\Models\Blogpost;
use App\Models\Blogcategory;
use App\Models\Events_Model;
use App\Models\Mixxes_Model;
use App\Models\Postcomments;
// use App\Models\User;
// use App\Models\Blogcomment
use Illuminate\Http\Request;
use App\Models\Products_Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class Home_Controller extends Controller
{
    public function homepage () {
        $events=Events_Model::latest()->take(4)->get();
        $blog=Blogpost::latest()->take(4)->get();
        $mixxes=Mixxes_Model::latest()->paginate(5);
        return view('frontend.index',compact('mixxes','events','blog'));
    }

    public function audiomixtapes () {
        $events=Events_Model::latest()->take(4)->get();
        $mixxes=Mixxes_Model::latest()->paginate(5);
        return view('frontend.mixtapes.audiomixtapes',compact('mixxes','events'));
    }

    public function download ($mix_audio)
    {   
        $mix = new Mixxes_Model;
        $filePath = public_path('mixtapes\\'.$mix_audio);
        return response()->file($filePath );
    }

    public function blog (){
        $events=Events_Model::latest()->take(4)->get();
        $cats=Blogcategory::all();
        $recent_posts= Blogpost::latest()->limit(5)->get();
        $posttags=Blogtag::all();
        $posts=Blogpost::orderby('id','desc')->paginate(4);
        return view('frontend.blogs.blogs',['events'=>$events,'cats'=>$cats,'posts'=>$posts,'recent_posts'=>$recent_posts,'posttags'=>$posttags]);
    }
    public function events (){
        
        $events=Events_Model::orderby('id','desc')->paginate(4);
        return view('frontend.events',['events'=>$events]);
    }
   
    public function singleevent ($slug){
        
        $events=Events_Model::latest()->take(4)->get();
        // $cats=Blogcategory::all();
        // Blogpost::find($post_id)->increment('views');
        // $postdetails=Blogpost::find($post_id);
        // $recent_posts= Blogpost::latest()->limit(5)->get();
        // $posttags=Blogtag::all();
        // $relatedposts=Blogpost::where('id',"!=",$post_id)->take(4)->get();
        return view('frontend.singleevent',['events'=>$events]);
    }

    public function postdetails (Request $request,$slug,$post_id){
        $events=Events_Model::latest()->take(4)->get();
        $cats=Blogcategory::all();
        Blogpost::find($post_id)->increment('views');
        $postdetails=Blogpost::find($post_id);
        $recent_posts= Blogpost::latest()->limit(5)->get();
        $posttags=Blogtag::all();
        $relatedposts=Blogpost::where('id',"!=",$post_id)->take(4)->get();
        $postcomments=Postcomments::where('post_id',$post_id)->get(); 
        return view('frontend.blogs.blogpost',['events'=>$events,'cats'=>$cats,'postdetails'=>$postdetails,'recent_posts'=>$recent_posts,'posttags'=>$posttags,'postcomments'=>$postcomments,'relatedposts'=>$relatedposts]);
    }

    // public function saveblogcomment (Request $request,$slug,$id){
        
    //     $request->validate([
    //         'comment'=>'required'
    //     ]);

    //     $data=new Postcomments;
    //     $data->user_id=$request->User()->id;
    //     $data->post_id=$id;
    //     $data->comment=$request->comment;
    //     $data->save();

    //     return redirect ('blogpost/'.$slug.'/'.$id)->with('success','Comment has been added Successfully');
    // }

    public function blogcategories (Request $request)
    {
        $posts=Blogpost::all();
        $recent_posts= Blogpost::latest()->limit(5)->get();
        $allcategories=Blogcategory::orderby('id','desc')->paginate(3);
        return view('frontend.blogs.blogcategories',['allcategories'=>$allcategories,'recent_posts'=>$recent_posts]);
    }

    public function blogcategory (Request $request, $cat_slug,$cat_id)
    {
        $events=Events_Model::latest()->take(4)->get();
        $cats=Blogcategory::all();
        $blogcategorys=Blogcategory::find($cat_id);
        $posttags=Blogtag::all();
        $blogposts=Blogpost::where('cat_id',$cat_id)->orderBy('id','desc')->paginate(5);
        $recent_posts= Blogpost::latest()->limit(5)->get();
        return view('frontend.blogs.blogcategory',['events'=>$events,'cats'=>$cats,'blogcategorys'=>$blogcategorys,'recent_posts'=>$recent_posts,'posttags'=>$posttags,'blogposts'=>$blogposts]);
    }

    public function posttags (Request $request,$tag_slug, $blogtag_id)
    {
        $posttags=Blogtag::find($blogtag_id);
        $blogposts=Blogpost::orderBy('id','desc')->paginate(3);
        $recent_posts= Blogpost::latest()->limit(5)->get();

        return view('frontend.blogs.posttags',['recent_posts'=>$recent_posts,'posttags'=>$posttags,'blogposts'=>$blogposts]);
    }

    
    
}
