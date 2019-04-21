<?php

namespace App\Http\Controllers;
use App\ProjectDetail;
use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function userProfile()
    {
    	$user = User::where('id',Auth::user()->id)->get();
    	return view('allViews.profile',['user' => $user]);
    }

    public function referFriend(Request $request)
    {
    	$user = User::where('id',Auth::user()->id)->get();
    	foreach ($user as $users)
    	{
    		if($users['reference_email'] == NULL)
    		{
    			$referenceUpdate = User::where('id',Auth::user()->id)->update(['reference_email' => $request->input('rf')]);
    			
    		}
    		else
    		{
    			return back()->with('success','<div class="text-center">You already refer someone.</div>');
    		}
    	}
    	
    	
    }
}
