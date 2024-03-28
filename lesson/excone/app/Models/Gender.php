<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Termwind\renderUsing;

class Gender extends Model
{
    protected $table = "genders";
    protected $primaryKey = "id";

    use HasFactory;

    public function articles(){
        // hasManyThrough(related,through);
//         return $this->hasManyThrough(Article::class,User::class);

        // hasManyThrough(related,through,through_key,related_key);
        return $this->hasManyThrough(Article::class,User::class,"gender_id","user_id");
    }

}
