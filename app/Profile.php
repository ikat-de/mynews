<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        'name' => 'required',
        'gender' => 'required',
        'hobby' => 'required',
        'introduction' => 'required',
    );
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function profile_histories()
    {
      return $this->hasMany('App\Profile_history');

    }    
}
