<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    // protected $guarded=[];
    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function blog(){
        return $this->belongsTo(Blog::class);
    }
}
