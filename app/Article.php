<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = array('id');
    
    public function user() 
    {
        return $this->belongsTo('App\User');
    }
    
    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function like_by()
    {
        return Like::where('user_id', \Auth::user()->id)->first();
    }
    
    
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
    
}
