<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function comments(){
        return $this->morphMany(Comment::class , 'commetnable');
    }


    public function  tags(){
        return $this->morphToMany(Tag::class , 'taggable');
    }

}
