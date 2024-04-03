@extends('layouts.app')

@section('title',"Create Page")

@section('content')

    <h1>Create Page</h1>


{{--    <form action="/countries" method="POST" >--}}
        <form action="{{ route('countries.store') }}" method="POST" >

{{--        {{ csrf_field() }}--}}
{{--        <input type="hidden" name="_token" value="{{ csrf_token() }}" />--}}
        @csrf
        @method("POST")

        <div class="row" >
            <div class="col-md-6 form-group mb-3">
                <label for="name">Country Name</label>
                <input type="text" name="name" id="name" class="form-control form-control-sm rounded-0" placeholder="Enter Country Name " />
            </div>

            <div class="col-md-6 form-group mb-3">
                <label for="capital">Capital</label>
                <input type="text" name="capital" id="capital" class="form-control form-control-sm rounded-0" placeholder="Enter Capital" />
            </div>

            <div class="col-md-6 form-group mb-3">
                <label for="currency"> Currency </label>
                <input type="text" name="currency" id="currency" class="form-control form-control-sm rounded-0" placeholder="Enter currency" />
            </div>

            <div class="col-md-6 form-group mb-3">
                <label for="user_id">User ID</label>
                <input type="number" name="user_id" id="user_id" class="form-control form-control-sm rounded-0" placeholder="Enter User Id" />
            </div>

            <div class="col-md-12 form-group mb-3">
                <label for="content"> Content </label>
                <textarea name="content" id="content" class="form-control rounded-0" rows="3" ></textarea>
            </div>

            <div class="col-md-12">
                <div class="d-flex justify-content-end">
                    <a href="{{ route('countries.index') }}" class="btn btn-secondary btn-sm rounded-0 ">Cancel</a>
                    <button type="submit" class="btn btn-primary btn-sm rounded-0 ms-3">Register</button>
                </div>
            </div>

        </div>
    </form>


@endsection
