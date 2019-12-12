<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class StudDeleteController extends Controller
{
    public function index(){
	$users = DB::select('select * from categories');
	return view('stud_delete_view',['users'=>$users]);
	}
	public function destroy($id) {
	DB::delete('delete from categories where id = ?',[$id]);
	echo "Record deleted successfully.
	";
	echo 'Click Here to go back.';
	}
}
