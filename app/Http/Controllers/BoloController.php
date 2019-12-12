<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
 
class BoloController extends Controller
{
    public function writePost(){
    	return view('posts.writepost');
    }

    public function AddCategory(){
    	return view('posts.add_category');
    }

    public function StoreCategory(Request $request){
    	$validatedData = $request->validate([
        'name' => 'required|unique:categories|min:4|max:25',
        'slug' => 'required|unique:categories|min:4|max:25',
   		 ]);

    	$category = $request->input('name');
		$slug = $request->input('slug');
 
		$data=array('name'=>$category,"slug"=>$slug); 
	 

    	DB::table('categories')->insert($data);  

     	return back()->with('success', 'Data inserted Successfully');
    }

    public function AllCategory(){
    	$category = DB::table('categories')->get();
    	//return response()->json($category);

    	return view('posts.all_category',compact('category'));
    }

    public function ViewCategory($id){
    	$view_category = DB::table('categories')->where('id',$id)->first();

    	 
    	return view('posts.view_category')->with('cat',$view_category);
    }

    public function DeleteCategory($id){
    DB::delete('delete from categories where id = ?',[$id]);

   	return Redirect()->back();
	echo "Record deleted successfully.";
    }

    public function EditCategory($id){
    	$edit_category = DB::table('categories')->where('id',$id)->first();

    	return view('posts.edit_category',compact('edit_category'));
    }

    public function UpdateCategory(Request $request,$id){
    	$validatedData = $request->validate([
        'name' => 'required|min:4|max:25',
        'slug' => 'required|min:4|max:25',
   		 ]);

    	$category = $request->input('name');
		$slug = $request->input('slug');
 
		$data=array('name'=>$category,"slug"=>$slug); 
	 

    	DB::table('categories')->where('id',$id)->update($data);  

     	return back()->with('success', 'Data Updated Successfully');
    }
     
		 
}
