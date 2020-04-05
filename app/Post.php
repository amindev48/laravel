<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $date = ['deleted_at'];

    protected $fillable = [
        'title','content','email','status','is_admin'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }


    public function comments(){
        return $this->morphMany(Comment::class , 'commetnable');
    }
    public function tags(){
        return $this->morphToMany(Tag::class , 'taggable');
    }

    // Accessor
    public function getTitleAttribute($value){
        return ucwords($value);
    }

    // mutator
    public function setTitleAttribute($val){
        $this->attributes['title'] = ucwords($val);
    }

    public function getPathAttribute($val){
        return "/images/".$val;
    }

    public function getContentAttribute($val){
            return substr($val,0,100);

    }
    
}
