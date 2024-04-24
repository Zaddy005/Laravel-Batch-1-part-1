@extends('layouts.app')

@section('title',"Create Page")

@section('content')

    <h1>Create Page</h1>


        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" >

        @csrf
        @method("POST")

        <div class="row" >
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
