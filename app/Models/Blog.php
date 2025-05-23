<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    // protected $guarded=['id'];
    // protected $fillable=['title','intro','body'];
    protected $with = ['category','author'];

    public function scopeFilter($query,$filter)//blog::latest()->filter
    {
      
        $query->when($filter['search']??false,function($query,$search){
    $query->where('title','LIKE','%'.$search.'%')->orWhere('body','LIKE','%'.$search.'%');
        });//$query -> blog,$search ->request
   
          $query->when($filter['category']??false,function($query,$slug){
            $query->whereHas('category',function($query) use ($slug)//for category
            {
                $query->where('slug',$slug);
            });
          });
          $query->when($filter['author']??false,function($query,$username){
            $query->whereHas('author',function($query) use ($username){
                $query->where('username',$username);
            });
          });
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function subscribers(){
        return $this->belongsToMany(User::class);//blog_user
    }
    public function unSubscribe(){
        $this->subscribers()->detach(auth()->id());//this is blog_id
    }
    public function subscribe(){
        $this->subscribers()->attach(auth()->id());
    }
}
