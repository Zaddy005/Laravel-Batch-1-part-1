<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


use Carbon\Carbon;


use App\Http\Controllers\countriesController;
use App\Http\Controllers\dashboardsController;
use App\Http\Controllers\employeesController;
use App\Http\Controllers\membersController;
use \App\Http\Controllers\productController;
use App\Http\Controllers\studentsController;
use App\Http\Controllers\staffsController;


use App\Models\Article;
use App\Models\Gender;
use App\Models\Item;
use App\Models\Tag;
use App\Models\Role;
use App\Models\Photo;
use App\Models\Phone;
use App\Models\User;
use App\Models\Comment;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//Route::view('/','welcome');

Route::view("/zaddy","welcome");

Route::view('/he','welcome');


Route::get('hel',function(){
    return "Hello Guys I'm Zaddy ";
})->name('greet');

// 3.27 May
//Route::view('/hello/company',"company");
//Route::get('company/{staff}/{city}',function($sf,$ct){
//    return view('company',['sf'=>"$sf","ct"=>"$ct"]);
//});


// redirect with call back function
//Route::get('hello/company/content',function(){
//    return redirect('https://www.youtube.com');
//});

// redirect
//Route::redirect("company","https:google.com");

// Route Group
//Route::group(["prefix"=>"students"],function(){
//    Route::get('/',[\App\Http\Controllers\studentsController::class,"index"])->name('students.index');
//    Route::get('/show',[\App\Http\Controllers\studentsController::class,"show"])->name('students.show');
//    Route::get('/edit',[\App\Http\Controllers\studentsController::class,"edit"])->name('students.edit');
//});


// Naming Route Group
//Route::name('students.')->group(function(){
//    Route::get('/students',[studentsController::class,"index"])->name('index');
//    Route::get('/students/show',[studentsController::class,"show"])->name('show');
//    Route::get('/students/edit',[studentsController::class,"edit"])->name('edit');
//});

//Route::name('students')->group(function(){
//    Route::get("/students",[studentsController::class,"index"])->name('.index');
//    Route::get('students/show',[studentsController::class,'show'])->name('.show');
//    Route::get('students/edit',[studentsController::class,'edit'])->name('.edit');
//});

// 4.28 May ( l3 controller )
Route::get('staffs',[staffsController::class,'index'])->name('staffs.home');

Route::get('staffsparty',[staffscontroller::class,'party'])->name('staffs.party');
// single para
Route::get('staffsparty/{total}',[staffsController::class,'total'])->name('staffs.total');
// multi para
Route::get("staffsparty/{total}/{confirm}",[staffsController::class,'confirm'])->name('staffs.status');

// 4.28 May (l4 blade )
Route::get('/employees',[employeesController::class,'index'])->name('employees.index');

// 5.4 June (l4 blade)
Route::get('employees/passingdataone',[employeesController::class,'passingdataone'])->name('employees.passingdataone');
Route::get('employees/passingdatatwo',[employeesController::class,'passingdatatwo'])->name('employees.pasingdatatwo');
Route::get('employees/passingdatathree',[employeesController::class,'passingdatathree'])->name('employees.passingdatathree');
Route::get('employees/passingdatafour',[employeesController::class,'passingdatafour'])->name('employees.passingdatafour');

// 6.11 June
Route::get('/employees/show',[employeesController::class,'show'])->name('employees.show');
Route::get('employees/edit',[employeesController::class,'edit'])->name('employees.edit');
Route::get('employees/delete',[employeesController::class,'delete'])->name('employees.delete');

// 6.11 June ( l5 yield )
Route::get('/dashboards',[dashboardsController::class,'index'])->name('dashboards.index');
Route::get('/members',[membersController::class,'index'])->name('members.index');

// 10.2 July ( l7 migration )
// => Data Insert From Route
Route::get("/types/insert",function(){
    DB::insert("INSERT INTO types(name) value(?)",["book"]);
    return "Successfully Inserted";
});
//
//Route::get("/types/read",function(){
//    $result = DB::select("SELECT * FROM types");
//    return var_dump($result);
//});

//Route::get("/types/read",function(){
//    $result = DB::select("SELECT * FROM types");
//    foreach($result as $type){
//       echo $type->id . " ". $type->name . "<br/>";
//    }
//});
//
//Route::get("/types/read",function(){
//    $result = DB::select("SELECT * FROM types WHERE id = ?",[1]);
//    return $result;
//});


// 11.16 July
Route::get("students/insert",function(){
    DB::insert("INSERT INTO students(fullname,phone,address) value(?,?,?)",["aung aung","12345","yangon"]);
    return "Data Inserted";
});

Route::get( "types/update",function(){
//    DB::update("UPDATE types SET name='ebook' WHERE id =?",["4"]);
    DB::update("UPDATE types SET name='pdf' WHERE id=? ",["4"]);
    return "Data Updated";
});

Route::get("shoppers/update",function(){
    DB::update("UPDATE shoppers SET fullname=?,phonenumber=?,city=? WHERE id=?",["kyaw kyaw","22222","bago",2]);
    return "Data Updated";
});

Route::get("shoppers/delete",function(){
    DB::delete("DELETE FROM shoppers WHERE id=?",["3"]);
    return "Data Deleted";
});

Route::get("shoppers/read",function(){
//    $result = DB::select("SELECT * FROM shoppers");
//    return $result;

//    $result = DB::select("SELECT * FROM shoppers WHERE id=?",['1']);
//    return $result;

//    $result = DB::table("shoppers")->get();
//    return $result;

//    =>select(columns)
//    =>selectRaw(expression)
//    DB::raw(value);

//    $rsesult = DB::table("shoppers")->select("*")->get();
//    $rsesult = DB::table("shoppers")->selectRaw("*")->get();

//    $rsesult = DB::table("shoppers")->select(DB::raw("*"))->get();
//    $result = DB::table("shoppers")->selectRaw(DB::raw("*"))->get();

//    select()
//    $result = DB::table("shoppers")->select("*")->where("id",6)->get();
//    $result = DB::table("shoppers")->select("fullname")->where("id",6)->get();
//    $result = DB::table("shoppers")->select("fullname","phonenumber")->where("id",6)->get();
//    $result = DB::table("shoppers")->select("fullname","phonenumber","city")->where("id",6)->get();
//    $result = DB::table("shoppers")->select("fullname","phonenumber","city")->where("id","<>",6)->get();

//    select() with DB::raw()
//      we can only use 1 parameter in DB::raw()
//      if you want select multi column put in 1 para like thhat DB::raw("fullname","phonenumber");
//    $result = DB::table("shoppers")->select(DB::raw("*"))->where("id",5)->get();
//    $result = DB::table("shoppers")->select(DB::raw("fullname"))->where("id",5)->get();
//    $result = DB::table("shoppers")->select(DB::raw("fullname,phonenumber,city"))->where("id",5)->get();
//    $result = DB::table("shoppers")->select(DB::raw("fullname,phonenumber,city"))->where("id","<>",5)->get();
//    return $result;

//    selectRaw() is same with DB::raw()
//    $result = DB::table("shoppers")->selectRaw("*")->where("id",5)->get();
//    $result = DB::table("shoppers")->selectRaw("fullname")->where("id",5)->get();
//    $result = DB::table("shoppers")->selectRaw("fullname,phonenumber")->where("id",5)->get();
//    $result = DB::table("shoppers")->selectRaw("fullname,phonenumber,city")->where("id",5)->get();
//    $result = DB::table("shoppers")->selectRaw("fullname,phonenumber,city")->where("id","<>",5)->get();
//    return $result;

//    selectRaw() with DB::raw()
//    $result = DB::table("shoppers")->selectRaw(DB::raw("*"))->where("id",5)->get();
//    $result = DB::table("shoppers")->selectRaw(DB::raw("fullname"))->where("id",5)->get();
//    $result = DB::table("shoppers")->selectRaw(DB::raw("fullname,phonenumber"))->where("id",5)->get();
//    $result = DB::table("shoppers")->selectRaw(DB::raw("fullname,phonenumber,city"))->where("id",5)->get();
//    $result = DB::table("shoppers")->selectRaw(DB::raw("fullname,phonenumber,city"))->where("id","<>",5)->get();
//    return $result;

//    error select can't use for expression
//    $result = DB::table("shoppes")->select("count(*) AS totalshopper,city")->where("id","<>",5)->get();

//     oki
//     1:00:30
//    $result = DB::table("shoppers")->select(DB::raw("count(*) AS totalshoppers,city"))->groupBy("city")->where("id","<>",5)->get();

//    $result = DB::table("shoppers")->selectRaw("count(*) AS totalshoppers,city")->where("id","<>",5)->groupBy("city")->get();
//    $result = DB::table("shoppers")->selectRaw(DB::raw("count(*) AS totalshoppers,city"))->where("id","<>",5)->groupBy("city")->get();
//    return $result;


//    $result = DB::table("shoppers")->first();
//    return $result;

//     =>pluck(column,key);
    $result = DB::table("shoppers")->pluck("fullname");             // array
    $result = DB::table("shoppers")->pluck("fullname","id");   // object
    return $result;

});


//12.22 July , 13.23 July
// => Database Eloquent ORM
// sro
Route::get("articles/read",function(){
//    $articles = Article::all();
//    return $articles;

//    $articles = Article::all();
//    return $articles;

    $articles = Article::all();
//    dd($articles);
//    return var_dump($articles);

    foreach($articles as $article){
        echo "$article->title <br/> $article->description <hr/>";
    }

});

Route::get("articles/find",function(){
//    $articles = Article::find(2);
//    return $articles;

//    =>Not Found Exception
//    $articles = Article::findOrFail(2);
//    return $articles; //  404 NOT FOUND
//    echo "$articles->title <br/> $articles->description <hr/>";

//    $artilces = Article::findOrFail(20);
//    echo "$articles->title <br/> $articles->description <hr/>";

//     findOr("id",callback)
//    $article = Article::findOr("500",function(){
//        return "Hello there is no result ";
//    });
//    return $article;

});


Route::get("/articles/where",function(){

//    $articles = Article::where("user_id",2)->get();
//    return $articles;

//     asc/desc
//    $articles = Article::where("user_id",1)->orderBy("id","asc")->get();
//    $articles = Article::where("id",1)->orderByDesc("id")->get();
//    return $articles;

//     take() & limit() both method are the same
//    $articles = Article::where("user_id",2)->orderBy("id","asc")->take(3)->get();
//    return $articles;
//
//    $articles = Article::where("user_id","<>",2)->orderBy("id","desc")->limit(3)->get();
//    return $articles;

//    first()
//    $articles = Article::where("id",2)->select("user_id","title","description")->first();
//    return $articles;

//    pluck(value,key)
//    $articles = Article::where("id",2)->pluck("description");       // array
//    $articles = Article::where("id",2)->pluck("description","id");  // object
//    return $articles;


//    13.23 July
//    firstWhere()
//    $article = Article::firstWhere("user_id",2);
//    return $article;

//     Not Found Exception for where()
//    $article = Article::where("id",">",55)->firstOrFail();
//    return $article;

//    firstOr(callback)
    $article = Article::where("user_id",3)->firstOr(function(){
        return "Hello sir there is no result ";
    });
    return $article;

});
// ---------------------------------------------------------------
//    =>Retreving Aggregates
Route::get("articles/aggregates",function(){

    $data = [
        ['price'=>100],
        ['price'=>200],
        ['price'=>300],
        ['price'=>400]
    ];

//    var_dump($data);
//    echo "<br/>";
//    var_dump(collect($data));

//    dd(
//        $data,
//        collect($data)
//    );

//    return collect($data)->count(); // 4

//    max(callback)
//    return collect($data)->max(); //   {"price":400}
//    $result = collect($data)->max(function ($num){
//        return $num['price'];
//    });
//    return $result;// 400

//    min(callback)
//    return collect($data)->min();   // {"price":100}
//    return collect($data)->min(function ($num){
//       return $num["price"];
//    });  // 100

//     average(callback)  /   avg(callback)
//    return collect($data)->average(function ($num){
//       return  $num["price"];
//    }); // 250

//    return collect($data)->avg(function ($val){
//        return $val['price'];
//    });

//    sum(callback)
//    return collect($data)->sum(function($sum){
//        return $sum['price'];
//    }); //  1000

//    $articles = Article::all()->count();
//    return $articles;   // 10

//    $articles = Article::where("user_id",2)->count();
//    return $articles;    // 5

//    $articles = Article::where("user_id",1)->min("rating");
//    return $articles;      // 2

//    $articles = Article::where("user_id",2)->max("rating");
//    return $articles;       // 4

//    $articles = Article::where("user_id",2)->average("rating");
//    $articles = Article::where("user_id",2)->avg("rating");
//    return $articles;       // 3.0000

//    $articles = Article::where("user_id",1)->sum("rating");
//    return $articles;       // 1

});

//    =>Retrieving Or Creating Data to Model
Route::get("articles/create",function(){
//    $article = Article::firstOrCreate([
//        "title"=>"this is new article 1"
//    ]);
//    return $article;

    $article = Article::firstOrCreate(
        ["title"=>"this is new article 13",],
        [
        "description"=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
        "user_id"=>3,
        "rating"=>3
    ]);
    return "Retrieving Data Or Insert " . $article;
});

Route::get("articles/filter",function(){
    $articles = Article::all()->filter(function($article){
        return $article->id > 5;
    });

    $articles = Article::get()->filter(function($article){
        return $article->id > 3;
    });

    $articles = Article::cursor()->filter(function($article){
        return $article->id > 4;
    });


    foreach($articles as $article){
        echo "$article->id <br/> $article->title <br/> $article->description <hr/>";
    };

});

Route::get("articles/reject",function (){
    $data = [
        100,
        200,
        300,
        0,
        "0",
        1,
        '1',
        'aung aung',
        "",
        " ",
        null,
        true,
        false,
        [],
        ["red","green","blue"],
        ["price"=>1000]
    ];
//    dd(
//        $data,
//        collect($data)
//    );
//
    $collections = collect($data);

//    return $collections->reject();  // {"3":0,"4":"0","8":"","9":null,"11":false,"12":[]}

//    return $collections->reject(function ($val){
//        return empty($val);     //{"0":100,"1":200,"2":300,"5":1,"6":"1","7":"aung aung","9":" ","11":true,"14":["red","green","blue"],"15":{"price":1000}}
//    });

    return  $collections->filter(function ($val){
//        return val;     //{"0":100,"1":200,"2":300,"5":1,"6":"1","7":"aung aung","9":" ","11":true,"14":["red","green","blue"],"15":{"price":1000}}
//        return empty($val);        //{"3":0,"4":"0","8":"","10":null,"12":false,"13":[]}
//        return is_numeric($val);    //[100,200,300,0,"0",1,"1"]
//        return is_string($val);         //{"4":"0","6":"1","7":"aung aung","8":"","9":" "}
//        return is_bool($val);               // {"11":true,"12":false}
//        return is_array($val);          //{"13":[],"14":["red","green","blue"],"15":{"price":1000}}
        return is_null($val);           //{"10":null}
    });
});

// 14.29 July
//=>whereColumn("column1","column2"); // compare and result same value
//=>whereColumn("column1","condition","column2") // compare and result same value
//=>whereColumn([ [],[] ]); // multi compare and result same value
Route::get("articles/wherecolumn",function(){
//    $article = Article::whereColumn("id","user_id")->get();
//    return $article;

//    $article = Article::whereColumn("created_date","updated_date")->get();
//    return $article;

//    $article = Article::whereColumn("created_date",">","updated_date")->get();
//    return $article;

//    $article = Article::whereColumn("created_date",">","updated_date")->orderByDesc("id")->get();
//    return $article;

    $article = Article::whereColumn([
        ["id","user_id"],
        ["created_date","updated_date"]
    ])->get();
    return $article;
});


// 27:53
Route::get("articles/insert",function(){

//     Method 1
//    $article = new Article;
//    $article->title = "this is new article 13";
//    $article->description = "Lorem Ipsum is simply dummy text of the printing and typesetting industry.";
//    $article->user_id = 1;
//    $article->rating =3;
//    $article->save();
//    return "data inserted $article";


//    Method 2
//    $article = Article::create([
//        "title"=>"this is new article 16",
//        "description"=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
//        "user_id"=>2,
//        "rating"=>5
//    ]);
//    return "Data Insert $article";

    $getdate = now("Asia/Yangon")->toDateTimeString();
    $today = date("Y-m-d H:i:s");

    //use Carbon\Carbon;
    $currenttime = Carbon::now();
//    echo $currenttime
//    var_dump($currenttime); // Object

    $article = DB::table("articles")->insert([
        "title"=>"this is new article 17",
        "description"=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
        "user_id"=>2,
        "rating"=>5,
        "created_date"=>$getdate,
        "updated_date"=>$currenttime
    ]);
    return "Data Insert $article";

});

//15.19 Aug
Route::get("articles/update",function(){

//    $article = Article::find(1);
//    $article->title = "this is new article 01";
//    $article->save();

//    $article = Article::findOrFail(10);
//    $article->title = "this is new article 010";
//    $article->user_id = 4;
//    $article->save();

//    $article = Article::where("rating",1)->update(["rating"=>2]);
//    $article = Article::where("user_id",2)
//                ->where("rating",5)
//                ->update(['rating'=>3]);

    $article = Article::updateOrCreate(
        ["title"=>"this is new articles 018","description"=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry."],
        ["user_id"=>1,"rating"=>5]
    );

    return "Data Update $article";
});

// 15.19 Aug 20:15
Route::get("articles/delete",function(){

//    $article = Article::find(1);

//    $article = Article::findOrFail(2);
//    $article->delete();

//    $article = Article::where("rating",3)->delete();
//    return "Data Delete Successfully $article";

//    Bulk Delete ( Note:: Must be primary keyy )
//    $article = Article::destroy(1);

//    $article = Article::destroy(2,3);

//    $article = Article::destroy([4,5,6]);
//    $article = Article::destroy(collect([7,8,9]));
//    return "Data Delete Successfully $article";

//     truncate ( Be Careful & Id will start from 1 )
//    Article::truncate();
//    return "Data Truncate Successfully";

//    $article = Article::find(10);
//    $article = Article::findOrFail(11);
//    $article->delete();

//    $article = Article::destroy(12,13,14);
//    $article = Article::destroy([15,16]);
    $article = Article::destroy(collect([19,20]));
    return "Data Delete Successfully $article";

});


// 16.20 Aug
Route::get("articles/restore",function(){

//        $articles = Article::all();
//        return $articles;

//    Article::withTrashed()->restore();
//    return "Restore From Trash Successfully";

    Article::withTrashed()
        ->where("rating",5)
        ->restore();

    return "Restore From Trash Successfully";

});


// 16.20Aug 17:27
Route::get("articles/forcedelete",function(){
//    $article = Article::findOrFail(10);
//    $article->delete();

//    $article = Article::findOrFail(11);
//    $article->forceDelete();

//    *Result = 404 not found. cuz 21 is already in soft delete
//    $article = Article::findOrFail(17);
//    $article->forceDelete();

    return "Data Force Delete Successfully";
});

// 16.20Aug 25: 39
Route::get("articles/gettrash",function(){

//    $articles = Article::all();
//    return $articles;     // not include from trash ( soft delete )

//    $articles = Article::withTrashed()->get();
//    return $articles;      // include from trash ( soft delete ) & non trash

//    $articles = Article::withTrashed()
//                ->where("rating",3)
//                ->get();
//    return $articles;       // include from trash ( soft delete ) & non trash by rating 3

//    $articles = Article::onlyTrashed()->get();
//    return $articles;       // all from trash only

//    $articles = Article::onlyTrashed()
//                ->where("rating",3)
//                ->get();
//    return $articles;       // all from trash only by rating 3

    $articles = Article::onlyTrashed()
                ->findOrFail(15);
    return $articles;
});


// 16.20Aug 40:50
Route::get("articles/restoresingle",function(){
//    $article = Article::findOrFail(5);
//    return $articles;   // 404  Not  Found

    $articles = Article::onlyTrashed()
                ->findOrFail(10)
                ->restore();

    return $articles;
});

// ---------------------------------------------------------------

// 17.26 Aug
// =>Eloquent Relationships
// =One to One
Route::get("users/{id}/article",function($id){
//    $article = User::findOrFail($id)->article->title;
//    $article = User::findOrFail($id)->article->description;
    $article = User::findOrFail($id)->article->rating;
    return $article;
});
//38 min

Route::get("articles/{id}/user",function($id){
    $article = Article::findOrFail($id)->user;
    return $article;
});

// 43:37
// One to Many
Route::get("articles/{id}/byusers",function($id){
    $articles = User::findOrFail($id);
    foreach($articles->articles as $article){
        echo $article."<br/>";
    }
});

// 52:47 -> 1:14:50 ( Info before lean Many to Many   )
// = Many to Many
Route::get("user/{id}/role",function($id){
//    $user = User::findOrFail($id);
//    foreach($user->roles as $role){
//        echo $role->name;
//        echo "<br/>";
//    }

    $user = User::findOrFail($id)->roles;
    return $user;
});

// 19.27 Aug part2
// 8:00
Route::get("user/{id}/rolecreatedate",function($id){
    $user = User::findOrFail($id);
    foreach($user->rolecreatedate as $role){
        echo $role->pivot->created_at ." created_at <br/>";
        echo $role->pivot->updated_at ."updated_at <br/>";
    }
});

//42:00
Route::get("gender/{id}/article",function($id){
    $gender = Gender::findOrFail($id);
    foreach($gender->articles as $article){
        echo $article->title . "<br/>";
    }

});

// 20.2 Sep
// Polymorphic Relationship
Route::get("user/{id}/photo",function($id){
    $user = User::findOrFail($id);

    foreach($user->photos as $photo){
        echo $photo->path."<br/>";
    }

});

Route::get("article/{id}/photo",function($id){
    $article = Article::findOrFail($id);
    foreach($article->photos as $photo){
        echo $photo->path."<br/>";
    }
});


//-----------------------

// = Reverse Thinking

Route::get("photo/{id}/result",function($id){
    $photo = Photo::findOrFail($id);
//    return $photo->imageable->title;
    return $photo->photoable;

});


//------------
// comment
Route::get("articles/{id}/comment",function($id){
    $article = Article::findOrFail($id);

    foreach ($article->comments as $comment){
        echo $comment->message."<br/>";
    }
});

Route::get("users/{id}/comment",function($id){
    $user = User::findOrFail($id);

    foreach($user->comments as $key=>$comment){
        echo "$comment <br/> $key <br/>";
    }
});

Route::get("comment/{id}/result",function($id){
    $cmt = Comment::findOrFail($id);
    echo $cmt->commentable;
});


//---------------------------------
// polymorphic relationship Many to Many
// items
Route::get("items/{id}/tag",function($id){
    $item = Item::findOrFail($id);
    foreach ($item->tags as $tag){
        echo $tag->name."<br/>";
    }
});

// Reverse
Route::get("tags/{id}/item",function($id){
    $tags = Tag::findOrFail($id);
    echo $tags->name."<br/>";
    echo "<br/>";

    foreach($tags->items as $item){
        echo $item ."<br/>";
        echo $item->name ."<br/>";
        echo "<br/>";

    }
});

// Article
Route::get("article/{id}/tag",function($id){
    $article = Article::findOrFail($id);
    foreach ($article->tags as $tag){
        echo $tag ."<br/>";
    }
});

// Tag
Route::get("tag/{id}/article",function($id){
    $tag = Tag::findOrFail($id);
    foreach ($tag->articles as $article ){
        echo $article->title ."<br/>";
    }
});


//---------------
// 22.9 Sep
// Create
Route::get("user/{id}/phone/insert",function($id){
//    Method 1
//    $user = User::findOrFail($id);
//    $phone = new Phone();
//    $phone->number = "0911111";
//    $phone->user_id = $user->id;
//    $phone->save();

//    Method 2
//    $user = User::findOrFail($id);
//    $phone = Phone::create([
//        "number"=>"0922222",
//        "user_id"=>$user->id
//    ]);

//    Method 3
//    $user = User::findOrFail($id);
//    $phone = new Phone();
//    $phone->number = "0933333";
//    $phone->user_id = $user->id;
//    $user->phone()->save($phone);

//    Method 4
//    $user = User::findOrFail($id);
//    $phone = new Phone([
//        "number"=>"0944444"
//    ]);
//    $user->phone()->save($phone);

//    Method 5
//    $user = User::findOrFail($id);
//    $user->phone()->save(new Phone([
//        "number"=>"0955555",
//        "user_id"=>$user->id
//    ]));

//    Method 6
    $user = User::findOrFail($id);
    $user->phone()->save(new Phone([
        "number"=>"0966666",
    ]));
    return "save";
});

//Update
Route::get("user/{id}/phone/update",function($id){
    $phones = Phone::whereUserId($id)->get();
    foreach($phones as $phone ){
        $phone->number = "0911111111";
        $phone->save();
    }
});

// Read
Route::get("user/{id}/phone/read",function($id){
    $user = User::findOrFail($id);
    return $user->phone;
});

// Delete
Route::get("user/{id}/phone/delete",function($id){
    $user = User::findOrFail($id);
//    return $user->phone->delete(); // single delete

//    return $user->phone()->delete(); // bulk delete
});


// Eloquent Relationship one to Many ( hasMany() )
// Create
Route::get("user/{id}/article/create",function($id){
    $user = User::findOrFail($id);
//    Method 1
//    $article = new Article();
//    $article->title = "this is new article 29";
//    $article->description = "Lorem Ipsum is simply dummy text of the printing and typesetting industry.";
//    $article->user_id = $user->id;
//    $article->rating = 3;
//    $article->save();

//    Method 2
//    $article = Article::create([
//        "title"=>"this is new article 30",
//        "description"=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
//        "user_id"=>$user->id,
//        "rating"=>4
//    ]);

//    Method 3
//    $article = new Article();
//    $article->title = "this is new article 31";
//    $article->description = "Lorem Ipsum is simply dummy text of the printing and typesetting industry.";
//    $article->user_id = $user->id;
//    $article->rating = 2;
//    $user->phone()->save($article);

//    Method 4
//    $article = new Article([
//        "title"=>"this is new article 32",
//        "description"=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
//        "rating"=>3
//    ]);
//    $user->phone()->save($article);

//    Method 5
//    $user->phone()->save(new Article([
//        "title"=>"this is new article 33",
//        "description"=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
//        "user_id"=>$user->id,
//        "rating"=>4
//    ]));


//    Method 6
//    $user->phone()->save(new Article([
//        "title"=>"this is new article 34",
//        "description"=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry.",
//        "rating"=>2
//    ]));
//
//    return "save";
});

// Update
Route::get("user/{id}/article/update",function($id){
//    single Update
//    $article = Article::whereUserId($id)->first();
//    $article->title = "this is new article 1000";
//    $article->save();
//    return "hello";

//    bulk Update
//    $articles = Article::whereUserId($id)->get();
//    foreach($articles as $article){
//        $article->title = "this is new article 11000";
//        $article->save();
//    }
//    return "hello";

//    Other Method
//    $user = User::findOrFail($id);
//    return $user->articles()->where("rating","=",3)->update([
//        "title"=>"this is update article 100"
//    ]);
});

// Read
Route::get("user/{id}/article/read",function($id){
//    $user = User::findOrFail($id);
//    foreach($user->articles as $article){
//        echo $article."<br/>";
//    }

//    $articles = Article::whereUserId($id)->get();
//    foreach ($articles as $article){
//        echo $article."<br/>";
//    }
});

// Delete
Route::get("user/{id}/article/delete",function($id){
    $user = User::findOrFail($id);
//    single delete
//    return $user->articles()->whereId(6)->get();

//    bulk delete
//    return $user->articles()->delete();
});


// Eloquent Many to Many Relationship ( belongsToMany() )
// create
Route::get("user/{id}/role/create",function($id){
    $user = User::findOrFail($id);
    $user->roles()->save(new Role([
        "name"=>"co-worker"
    ]));
    return "Hello";
});

// update
Route::get("user/{id}/role/update",function($id){
    $user = User::findOrFail($id);
    foreach($user->roles as $role){
        $role->whereId(3)->update([
            "name"=>"viewer"
        ]);
    }
});

// read
Route::get("user/{id}/role/read",function($id){
    $user = User::findOrFail($id);
    if($user->has("roles")){
        foreach($user->roles as $role){
            echo $role."<br/>";
            echo "<br/>";
            echo $role->name."<br/>";
            echo "<br/>";
        }
    }
});

// Delete
Route::get("user/{id}/role/delete",function ($id){
    $user = User::findOrFail($id);
//    foreach($user->roles as $role){
//        $role->whereId(4)->delete();
//    }

    $user->roles()->delete();

    return "data Delete";
});

// attach
Route::get("user/{id}/role/attach",function($id){
    $user = User::findOrFail($id);
    $user->roles()->attach(4);
    return "hello";
});


// Detach
Route::get("user/{id}/role/detach",function($id){
    $user = User::findOrFail($id);

    $user->roles()->detach(4);

    return "Detached";
});

// Sync
Route::get("user/{id}/role/sync",function($id){
    $user = User::findOrFail($id);

//    Note :: check Role table & UserRole table (no-action/action)

//    Note :: want to keep only role id 2 for refer user id
//    $user->roles()->sync(2);

//    Meaning :: want to keep only role id 2,4 for refer user id
    $user->roles()->sync([2,4]);

//    Meaning :: want to keep existing role id 2,4 and add more role id 1,5 for refer user id
    $user->roles()->sync([1,2,4,5]);

    return "Sync";
});


//-------------------------------------------------------------------------------------
// => Eloquent Polymorphic Relationship
// Photo Insert
Route::get("user/{id}/photo/insert",function($id){
    $user = User::findOrFail($id);

    $photo = new Photo([
        'path'=>"public\assets\photo\user7.jpg"
    ]);
    $user->photos()->save($photo);

    return "Data Insert";
});

// Article
// Insert
Route::get("article/{id}/photo/insert",function($id){
    $article = Article::findOrFail($id);

    $article->photos()->create([
        'path'=>"public\assets\photo\articlepic5.jpg"
    ]);

    return "hello";
});


// Read
Route::get("user/{id}/photo/read",function($id){
    $user = User::findOrFail($id);
    foreach($user->photos as $photo){
        echo $photo->path ."<br/>";
    }
});

Route::get("article/{id}/photo/read",function($id){
    $article = Article::findOrFail($id);
    foreach ($article->photos as $photo){
        echo $photo->path ."<br/>";
    }
});

// Update
Route::get("user/{id}/photo/update",function($id){
    $user = User::findOrFail($id);

    $photo =  $user->photos()->whereId(15)->first();
    $photo->path = "public\assets\photo\userUpdate1.jpg";
    $photo->save();

    return $photo;
});

    // Imageable type update
Route::get("users/{id}/photo/imageabletype",function($id){
    $user = User::findOrFail($id);
    $photo = Photo::findOrFail(16);

    $user->photos()->save($photo);

});


// Delete
Route::get("user/{id}/photo/delete",function($id){
    $user = User::findOrFail($id);

//    Single Delete
//    $user->photos()->whereId(16)->delete();

//    Bulk Delete
    $user->photos()->delete();

    return "deleted";
});

//----------------------------------------------------------
// => Eloquent Polymorphic Many To Many Relationship       morphToMany(relatedtable,name);
//Insert
Route::get("tag/{id}/item/insert",function($id){
    $tag = Tag::findOrFail($id);

    $item = Item::create([
        "name"=>"Overtin"
    ]);

//    $item->tags()->save($tag);     //  |    -> both of those are work
    $tag->items()->save($item);      //  |

    return "hello";
});

//Read
Route::get("item/{id}/tag/read",function($id){
    $item = Item::findOrFail($id);

    foreach ($item->tags as $tag){
        echo $tag->name ."<br/>";
    }

});


// Update
Route::get("item/{id}/tag/update",function($id){
//    $item = Item::findOrFail($id);
//    if($item->has("tags")){
//        foreach($item->tags as $tag){
//            return $tag->whereId(4)->update([
//                'name'=>"Insert killer"
//            ]);
//        }
//    }

//    $item = Item::findOrFail($id);            // Create
//    $tag = Tag::findOrFail($id);
//    $item->tags()->save($tag);

//    $item = Item::findOrFail($id);              // Create
//    $tag = Tag::findOrFail(6);
//    $item->tags()->attach($tag);

    $item = Item::findOrFail($id);
    $item->tags()->sync([1,2]);

});


// Delete
Route::get("item/{id}/tag/delete",function($id){
//    $item = Item::findOrFail($id); // Single Delete
//    if($item->has('tags')){
//        foreach($item->tags as $tag){
//            $tag->whereId(1)->delete();
//        }
//    }

    $item = Item::findOrFail($id); // Bulk Delete
    $item->tags()->delete();

    return "delete";
});



// 26.23 Sep
// From CRUD

Route::resource("countries",countriesController::class);

//Route::resource('countries',countriesController::class)->except("destroy");
//Route::get("countries/delete/{id}",[countriesController::class,'destroy'])->name("countries.delete");
        // for index page
//<a href="{{ route("countries.delete",$country->id) }}" class="text-danger" > <i class="fas fa-trash" ></i></a>

// 28.7 Oct
Route::get("/dates",function (){

    $date = new DateTime();
    echo $date->format('d m Y');  // 03 04 2024
    echo "<br/>";

    echo $date->format('Y m d');  // 2024 04 03
    echo "<br/>";

    echo $date->format('m d Y');  // 04 03 2024
    echo "<br/>";

    echo $date->format('d/m/Y');  // 03/04/2024
    echo "<br/>";


    echo $date->format('d-m-Y');  // 03-04-2024

    echo "<hr/>";

    $date = new DateTime("+5day");
    echo $date->format('d-m-Y');
    echo "<br/>";

    $date = new DateTime("+ 1 week");
    echo $date->format('d-m-Y');
    echo "<br/>";

    echo Carbon::now();  // 2024-04-03 22:10:02
    echo "<br/>";

    echo Carbon::now()->addDays(10); // 2024-04-13 22:10:37
    echo "<br/>";

    echo Carbon::now()->addDays(3)->diffForHumans(); // 2 days from now
    echo "<br/>";

    echo Carbon::now()->addDays(10)->diffForHumans(); // 1 week from now
    echo "<br/>";

    echo Carbon::now()->subDay(1); // 2024-04-02 22:15:24
    echo "<br/>";

    echo Carbon::now()->subDay(3)->diffForHumans(); // 3 days ago
    echo "<br/>";

    echo Carbon::now()->subDay(10)->diffForHumans(); // 1 week ago
    echo "<br/>";

    echo Carbon::now()->addMonths(1); // 2024-05-03 22:17:51
    echo "<br/>";

    echo Carbon::now()->addMonths(1)->diffForHumans(); // 4 weeks from now
    echo "<br/>";

    echo Carbon::now()->addMonths(3)->diffForHumans(); // 2 months from now
    echo "<br/>";

    echo Carbon::now()->addMonths(10)->diffForHumans(); // 9 months from now
    echo "<br/>";

    echo Carbon::now()->subMonths(1); // 2024-03-03 22:20:50
    echo "<br/>";

    echo Carbon::now()->subMonths(1)->diffForHumans(); // 1 month ago
    echo "<br/>";

    echo Carbon::now()->subMonths(3)->diffForHumans(); // 3 months ago
    echo "<br/>";

    echo Carbon::now()->subMonths(10)->diffForHumans(); // 10 months ago
    echo "<br/>";

    echo Carbon::now()->yesterday()->diffForHumans(); // 1 day ago
    echo "<br/>";

    echo Carbon::now()->tomorrow()->diffForHumans();
    echo "<br/>";

});

// Image Upload
// Single Upload
Route::resource("products",productController::class);
