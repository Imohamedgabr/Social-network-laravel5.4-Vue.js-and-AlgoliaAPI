<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

class FriendshipsController extends Controller
{
    public function check($id)
    {
        if(Auth::user()->is_friends_with($id) === 1)
        {
            return [ "status" => 'friends' ];
        }
        
        if(Auth::user()->has_pending_friend_request_from($id))
        {
            return [ "status" => 'pending' ];
        }

        if(Auth::user()->has_pending_friend_request_sent_to($id))
        {
        	return [ "status" => 'waiting' ];
            // return response()->json(['status' => 'waiting']);
        }

        return [ "status" => 0 ];
    }

    public function add_friend($id)
    {
        //sending notifications, emails, broadcasting.
       return Auth::user()->add_friend($id);
      
    }

    public function accept_friend($id)
    {
        // sending nots
        return Auth::user()->accept_friend($id);
    }
}
