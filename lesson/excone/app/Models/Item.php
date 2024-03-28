<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = "items";
    protected $primaryKey = "id";

    protected $fillable = [
        "name"
    ];


    public function tags(){
        return $this->morphToMany(Tag::class,"taggable");
    }

}
