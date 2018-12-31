<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Redirector;
use Illuminate\Http\Request;

class AddController extends Controller
{
    public function Add(Request $request, $id){
//            dd($request['aim']);
            DB::table('books')
            ->insert([
                'user_id'=>$id,
                'aim'=>$request["aim"]=='on'?1:0,
                'body'=>$request["body"],
                'book_way'=>$request["url"]
            ]);
            $user= DB::table('users')
                ->where('id','=',$id)
                ->select('name')
                ->get();
//            dd($user[0]->name);
        return redirect("/users/{$user[0]->name}");
    }
}
