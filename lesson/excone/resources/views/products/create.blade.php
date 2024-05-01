@extends('layouts.app')

@section('title',"Create Page")


@section("style")

    <style type="text/css" >
        .gallery{
            width: 100%;
            background-color: #eee;
            color: #aaa;

            text-align: center;
            padding: 10px;
        }

        .gallery img{
            width: 100px;
            height: 100px;
            border: 2px dashed #aaa;
            border-radius: 10px;
            object-fit: cover;

            padding: 5px;
            margin: 0 5px;
        }

        .removetxt span{
            display: none;
        }
    </style>

@endsection

@section('content')

    <h1>Create Page</h1>


        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" >

        @csrf
        @method("POST")

        <div class="row" >

            <div class="col-md-12" >
                <div class="gallery">
                    <span>Choose Image</span>
                </div>
            </div>

            <div class="col-md-6 form-group mb-3">
                <label for="name">products Name</label>
                <input type="text" name="name" id="name" class="form-control form-control-sm rounded-0" placeholder="Enter products Name " />
            </div>

            <div class="col-md-6 form-group mb-3">
                <label for="price">Price</label>
                <input type="number" name="price" id="price" class="form-control form-control-sm rounded-0" placeholder="Enter price" />
            </div>

            <div class="col-md-6 form-group mb-3">
                <label for="image"> Products Photo </label>
                <input type="file" name="image" id="image" class="form-control form-control-sm rounded-0" placeholder="Enter image" />
            </div>

            <div class="col-md-12">
                <div class="d-flex justify-content-end">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary btn-sm rounded-0 ">Cancel</a>
                    <button type="submit" class="btn btn-primary btn-sm rounded-0 ms-3">Register</button>
                </div>
            </div>

        </div>
    </form>


@endsection

@section('script')

    <script type="text/javascript" >

        $(document).ready(function(){

            // console.log('hi');

            var previewimages = function(input,output){

                // console.log(input.files);

                if(input.files){
                    var totalfiles = input.files.length;
                    // console.log(totalfiles);


                    if(totalfiles > 0 ){
                        $(".gallery").addClass("removetxt");
                    }else{
                        $(".gallery").removeClass("removetxt");
                    }

                    for(var i=0 ; i < totalfiles ; i++){

                        var filereader = new FileReader();

                        filereader.onload = function(e){
                            $($.parseHTML("<img>")).attr("src",e.target.result).appendTo(output);
                        }

                        filereader.readAsDataURL(input.files[i]);
                    }
                }
            };

            $("#image").change(function(){
                previewimages(this,'.gallery');
            });

        });

    </script>

@endsection
