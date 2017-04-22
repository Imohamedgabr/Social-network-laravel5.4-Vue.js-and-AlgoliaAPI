<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // this is eager loading, with each post we load the user object
    // we add the function name here which we define down there
    public $with = ['user','likes'];

    protected $fillable = ['content','user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function likes()
    {
        return $this->hasMany('App\Like');
    }
}
