<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index(User $user){
//        dd($user);
        $books = DB::table('books')
            ->join('users', 'users.id', '=', 'books.user_id')
            ->where('users.name', '=', $user->name)
            ->select('books.*')
            ->get();
        return view('users.index',['books'=>$books, 'user'=>$user]);
    }


    public function follow(Request $request, User $user) {
        if ($request->user()->canFollow($user)){
            $request->user()->following()->attach($user->id);
        }
        return redirect()->back();
    }
    public function unfollow(Request $request, User $user) {
        if ($request->user()->canUnFollow($user)){
            $request->user()->following()->detach($user->id);
        }
        return redirect()->back();
    }
}
