<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use test\Mockery\ReturnTypeUnionTypeHint;

class User extends Authenticatable
{
    protected $table = "users";
    protected $primaryKey = "id";

    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function article(){
//      Method 1
//        return $this->hasOne('App\Models\Article');
//        Method 2
        return $this->hasOne(Article::class);
    }

    public function articles(){
        return $this->hasMany(Article::class);
    }

    public function roles(){

        // return $this->belongsToMany(Role::class);     // obye by naming conversion

        // = For Custom Table Name
        // belongsToMany(primarytable,secondarytable,secondarytable_fk,primary_fk)
        // belongsToMany(related class,table,foreignPivotKey,relativePivotKey);

        return $this->belongsToMany(Role::class,"userroles","user_id","role_id");
    }


    public function rolecreatedate(){
        // return $this->belongsToMany(Role::class)->withPivot("created_at");
        // Error Base table not found Cuz not obye by naming conversion from Laravel

        return $this->belongsToMany(Role::class,"userroles","user_id","role_id")->withPivot("created_at","updated_at");

    }

    public function photos(){
        return $this->morphMany(Photo::class,"imageable");
    }

    public function comments(){
        return $this->morphMany(Comment::class,"commentable");
    }

    public function phone(){
        return $this->hasOne(Phone::class);
    }

    // 26.23 Sep
    public function countries(){
        return $this->hasMany(Country::class);
    }

}

