<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PostController extends Controller
{
     public function writePost(){
     	$category = DB::table('categories')->get();

    	return view('posts.writepost',compact('category'));
    }

    public function StorePost(Request $request){
    	$validatedData = $request->validate([
        'title' => 'required|max:200',
        'details' => 'required',
        'image'=>'mimes:jpeg,jpg,png,PNG|max:1000',
   		 ]);

    	$data = array();
    	$data['title']=$request->title;
    	$data['category_id']=$request->category_id;
    	$data['details']=$request->details;
    	$image=$request->file('image');
    	if ($image) {
    		 $image_name = hexdec(uniqid());
    		 $ext = strtolower($image->getClientOriginalExtension());
    		 $image_full_name = $image_name.'.'.$ext;
    		 $upload_path = 'public/frontend/image/';
    		 $image_url = $upload_path.$image_full_name;
    		 $success=$image->move($upload_path,$image_full_name);
    		 $data['image']=$image_url;
    		 DB::table('posts')->insert($data);
    		 return back()->with('success', 'Data inserted Successfully');
    	}else{
    		DB::table('posts')->insert($data);
    		return back()->with('success', 'Data inserted Successfully');

    	}
 
    }

    public function AllPost(){
    	$posts = DB::table('posts')
    	->join('categories','posts.category_id','categories.id')
    	->select('posts.*','categories.name')
    	->get();

    	return view('posts.all_posts',compact('posts'));
    }


 public function EditPost ($id){
    	$category = DB::table('categories')->get();
    	$post = DB::table('posts')->where('id',$id)->first();


    	return view('posts.edit_post',compact('category','post'));
    }

    public function UpdatePost(Request $request,$id){
    	$validatedData = $request->validate([
        'title' => 'required|max:200',
        'details' => 'required',
        'image'=>'mimes:jpeg,jpg,png,PNG|max:1000',
   		 ]);

    	$data = array();
    	$data['title']=$request->title;
    	$data['category_id']=$request->category_id;
    	$data['details']=$request->details;
    	$image=$request->file('image');
    	if ($image) {
    		 $image_name = hexdec(uniqid());
    		 $ext = strtolower($image->getClientOriginalExtension());
    		 $image_full_name = $image_name.'.'.$ext;
    		 $upload_path = 'public/frontend/image/';
    		 $image_url = $upload_path.$image_full_name;
    		 $success=$image->move($upload_path,$image_full_name);
    		 $data['image']=$image_url;
    		 unlink($request->old_img);
    		 DB::table('posts')->where('id',$id)->update($data);
    		 return Redirect()->route('all.post')->with('success', 'Data updated with pic Successfully');
    	}else{
    		$data['image']=$request->old_img;
    		DB::table('posts')->where('id',$id)->update($data);
    		return Redirect()->route('all.post')->with('success', 'Data updated without pic Successfully');

    	}
    }
  

    public function ViewPost($id){


    	$view_posts = DB::table('posts')
    	->join('categories','posts.category_id','categories.id')
    	->select('posts.*','categories.name')
    	->where('posts.id',$id)
    	->first();

    	 
    	return view('posts.view_post')->with('post',$view_posts);
    }


    public function DeletePost($id){
    	$post = DB::table('posts')->where('id',$id)->first();
    	$old_image_catch = $post->image; 

    	//return response()->json($old_image_catch );
    	$delete = DB::delete('delete from posts where id = ?',[$id]);
    	if ($delete) {
    		unlink($old_image_catch);
    		return Redirect()->back();
			echo "Record deleted successfully.";
    	}
    	else{
    		return Redirect()->back();
			echo "Record did not deleted.!";
    	}
	   	
		 
    }
}
