<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function commetnable(){
        return $this->morphTo();
    }

    public function user(){
        return $this->hasOne(User::class);
    }
}
