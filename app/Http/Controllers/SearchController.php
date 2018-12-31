<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request){

        $books = DB::table('books')
            ->join('users', 'users.id', '=', 'books.user_id')
            ->where('books.body', '=', $request["query"])
            ->select('books.*', 'users.name as user')
            ->get();
//        dd($books);
        return view('search.index',['books'=>$books]);
    }
}
