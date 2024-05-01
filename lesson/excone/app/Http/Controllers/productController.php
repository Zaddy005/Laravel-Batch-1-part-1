<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class productController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products/index',compact("products"));
    }

    public function create()
    {
        return view("products/create");
    }

    public function store(Request $request)
    {
        // => 1. Public Folder ( public/customFolder )

        //$request->image->move('customFolder',$imagename);
        //$request->image->move(public_path('path'),$imagename);

        // => 2. Storage Folder ( storage/app/customFolder )
        // php artisan storage:link  ( if u don't run this code in terminal storage folder cah't access from method eg asset,... )
        //$request->image->store('path');

        //use Illuminate\Support\Facades\Storage;
        //Storage::disk("local").put($file,'content','optional');

        //$request->image->storeAs($file,$imagename,optional driver);

        // => 3. Local Driver ( storage/app/customFolder )

        $product = new Product();

        $product->name = $request['name'];
        $product->price = $request['price'];

        $file = $request->file('image');

        //1.Public Folder
//        if($file){
//            $fname = $file->getClientOriginalName();
//            $imagenewname = date("ymdHis").$fname; // 240421222450itachi2.jpg
//            $imagenewname = time().$fname; // 1713738319itachi2.jpg
//            $imagenewname = uniqid().$fname; // 662592a92fc1fitachi2.jpg
//
//            // image move into public > images folder
//            $file->move('images',$imagenewname);
//            $product->image = $imagenewname;
//        }

//        if($file){
//            $fname = $file->getClientOriginalName();
//            $imagenewname = time().$fname;
//
////            $fileurl = $file->move("images",$imagenewname); // 662594a00ff245d434299f8c68acf90aafd1a01184d3d.jpg
//
//            $fileurl = $file->move(public_path("images"),$imagenewname); // E:\anp\......\practice\Laravelb1\lesson\excone\public\images\1713742587plane.jpg
//
//            $product->image = $fileurl;
//       }

      //2. Storage > app > images Folder
//        if($request->hasFile('image')){
//            $fnameext = $file->getClientOriginalExtension(); // only file format
//            $imagenewname = time().".".$fnameext;
//
//            // images is under ( storage/app/images ) if images folder doesn't exist it will create by automatically
//            $file->storeAs("images",$imagenewname);
//
//            // images is under ( storage/app/public/images ) if images folder doesn't exist it will create by automatically
////            $file->storeAs("public/images",$imagenewname);
//
//            $product->image = $imagenewname;
//        }

//        if($request->hasFile('image')){
//            // create uniqid and move file by automatically
////            $fileurl = $file->store(); // storage/app/NIWouuAfkBPSvK0ETpQAxDGIuMUirAew6qo9srFm.jpg
//
//            // it u give parameter as folder name it will store under the folder that u give as a parameter
//            $fileurl = $file->store("images"); // storage/app/images/NIWouuAfkBPSvK0ETpQAxDGIuMUirAew6qo9srFm.jpg
//            $product->image = $fileurl;
//        }

//        Save with Storage Object
        if($request->hasFile('image')){
            $fnameext = $file->extension(); //
            $imagenewname = uniqid().".".$fnameext;

//            dd($file->get());
//            dd(file_get_contents($file));

            // Store in Storage/app/images
            Storage::disk("local")->put("images/".$imagenewname,file_get_contents($file),'public');

            $fileurl = "public/app/images/".$imagenewname;
            $product->image = $fileurl;

        }


        $product->save();
        return redirect(route("products.index"));
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view("products/edit")->with('product',$product);
    }

    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        $product->name = $request['name'];
        $product->price = $request['price'];

        // delete old file and update new file ( For public )
//        if($request){
//            $path = public_path('images/').$product->image;
//
//            if(File::exists($path)){
//                File::delete($path);
//            }
//        }

        // delete old file and update new file ( For Storage )
        if($request){
            $path = storage_path("app/public/images/").$product->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }

//        if($request->hasFile('image')){
//            $file = $request->file('image');
//            $fileext = $file->getClientOriginalExtension();
//            $imagenewname = uniqid().".".$fileext;
//
//            // move img public > images
//            $file->move("images",$imagenewname);
//
//            $product->image = $imagenewname;
//        }

//        if($request->hasFile('image')){
//            $file = $request->file("image");
//            $fileext = $file->getClientOriginalExtension();
//            $imagenewname = time().".".$fileext;
//
//            $file->storeAs("public/images",$imagenewname);
//            $product->image = $imagenewname;
//        }

//        if($request->hasFile('image')){
//            $file = $request->file("image");
//            $fileurl = $file->store("public/images");
//            $product->image = trim($fileurl,'public');
//        }

        if($request->hasFile("image")){
            $file = $request->file("image");
            $fileext = $file->getClientOriginalExtension();
            $imagenewname = time().".".$fileext;

            Storage::disk("local")->put('public/images/'.$imagenewname,File::get($file),"public");
            $product->image = $imagenewname;
        }

        $product->save();
        return redirect(route('products.index'));
    }

    public function destroy(string $id)
    {

    }
}
