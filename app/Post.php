<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [''];

    public function user(){
        return $this->belongsTo('App\User');
    }


    public function photo(){
        return $this->belongsTo('App\Photo'); //ya automatically id ko lower case sumjta ha islia yahan define krdiya cuz db me b yahi column banaya tha
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }
}
