<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;



    public function articles(){
        return $this->morphedByMany(Article::class,"taggable");
    }

    public function items(){
        return $this->morphedByMany(Item::class,"taggable");
    }

}
