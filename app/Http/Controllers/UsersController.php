<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UsersController extends Controller
{
    public function getUser()
    {
    	$users = User::all();

    	return view('members')->with('users', $users);
    }

	public function searchUsers(Request $request)
    {
    	$term = $request->get('term');
    	$users =DB::table('users')
            ->where('name','like','%' . $term . '%')
            ->orderBy("id","desc")
            ->paginate(5);
    	
  //   	if ( !$users ) {
  //   		$users = NULL;
		// }

    	return view('members')->with('users', $users);
    }   

    public function autocomplete(Request $request)
     {

     	

     	$term = $request->get('term');
     		
    	$term = $request->get('term');
    	$users =DB::table('users')
            ->where('name','like','%' . $term . '%')
            ->orderBy("id","desc")
            ->paginate(5);

        $results = [];
        foreach ($users as $user) {
            $results[] = ['id'=> $user->id,'value'=>$user->name];
             }
           return response()->json($results);
        }

     
}
