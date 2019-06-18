<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;
use App\Comments;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        if(!Auth::check()) {
            return Redirect::route('login');
        }

        $user  = Auth::user();

    	$request->validate([
            'text'=>'required',
            'article_id'=>'required',
        ]);
   
        $input = $request->all();
        $input['user_id'] = $user->id;
    
        Comments::create($input);
   
        return back()
        ->with('success','You have successfully commented.');
        
    }
}
