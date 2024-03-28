@extends('layouts.app')

@section('title'," Index Page ")

@section('content')

    <h1> Index Page </h1>

    <div class="col-md-12" >
        <table class="table border mydata">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Name</th>
                    <th>Capital</th>
                    <th>Currency</th>
                    <th>User Id</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $countries as $idx=>$country )
                    <tr>
                        <td> {{ ++$idx }} </td>
                        <td> {{ $country->name }} </td>
                        <td> {{ $country->capital }} </td>
                        <td> {{ $country->currency }} </td>
                        <td> {{ $country->user_id }} </td>
                        <td> {{ $country->created_at }} </td>
                        <td> {{ $country->updated_at }} </td>
                        <td>
                            <a href="#" class="text-info" > <i class="fas fa-pen" ></i></a>
                            <a href="#" class="text-danger" > <i class="fas fa-trash" ></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>

@endsection
