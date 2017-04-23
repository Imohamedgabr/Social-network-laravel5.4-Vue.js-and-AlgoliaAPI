<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function getUser()
    {
    	$users = User::all();

    	return view('members')->with('users', $users);
    }
}
