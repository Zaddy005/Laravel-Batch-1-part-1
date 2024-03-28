<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $table = "photos";
    protected $primaryKey = "id";
    protected $fillable = [
        'path',
        'imageable_id',
        'imageable_type'
    ];

    public function imageable(){
        //morphTo();
        return $this->morphTo();
    }

    public function photoable(){
        //morphTo(name);
        return $this->morphTo("imageable"); // Note:: if you use imageable_id ,imageable_type !! set here iamgeable
    }

}
