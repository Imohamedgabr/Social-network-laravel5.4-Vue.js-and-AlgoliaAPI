<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function index($slug)
    {
        $user = User::where('slug', $slug)->first();
        return view('profiles.profile')
            ->with('user', $user);
    }

    public function edit()
    {
        return view('profiles.edit')->with('info', Auth::user()->profile);
    }

    public function update(Request $r)
    {

        $this->validate($r, [
            'location' => 'required',
            'about' => 'required|max:255'
        ]);

        Auth::user()->profile()->update([
            'location' => $r->location,
            'about' => $r->about
        ]);

        
        if ($r->hasFile('avatar')) {

            $avatar = $r->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            $destination = base_path() . '/public/uploads';
            $r->file('avatar')->move($destination,$filename);
           
            Auth::user()->update([
                'avatar' => $filename
            ]);

        }
        
        return redirect()->route('profile', ['slug' => Auth::user()->slug]);

    }

}
