<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index(){
		$books = DB::select("select * from books");
		return response()->json($books);
	}
	
	public function insertBook(Request $req){
		$status = DB::insert("insert into books (title, author, book_num) values(?,?,?)",
		[
			$req->input['title'],
			$req->input['author'],
			$req->input['book_num']
		]);
		return response()->json($status);
	}
}
