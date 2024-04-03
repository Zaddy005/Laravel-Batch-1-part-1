@extends('layouts.app')

@section('title'," Index Page ")

@section('content')

    <h1> Index Page </h1>

    <div class="col-md-12 mb-3">
        <a href="{{ route("countries.create") }}" class="btn btn-info text-light" > Create new Country </a>
    </div>

    <div class="col-md-12" >
        <table class="table table-sm table-hover border mydata">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Capital</th>
                    <th>Currency</th>
                    <th>User Id</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                    <th>Drop</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $countries as $idx=>$country )
                    <tr>
                        <td> {{ ++$idx }} </td>
                        <td> <a href="{{ route("countries.show",$country->id) }}" >{{ $country->name }}</a> </td>
                        <td> {{ $country->capital }} </td>
                        <td> {{ $country->currency }} </td>
                        <td> {{ $country->user_id }} </td>
                        <td> {{ $country->created_at }} </td>
                        <td> {{ $country->updated_at }} </td>
                        <td class="d-flex align-items-center" >
                            <a href="{{ route('countries.edit',$country->id) }}" class="text-primary me-3" > <i class="fas fa-pen" ></i></a>

{{--                            {{ route("countries.destroy",$country->id) }}           --}}
{{--                            {{ route("countries.destroy",$country['id']) }}         --}}
{{--                                /countries/{{$country->id}}                         --}}
{{--                                /countries/{{$country['id']}}                       --}}
{{--                                {{ url('/countries',$country->id) }}                      --}}
{{--                                {{ url('/countries',$country['id']) }}                      --}}


                            <form class="formdelete" action="{{ route("countries.destroy",$country->id) }}" method="POST" >
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn" ><i class="fas fa-trash text-danger" ></i></button>
                            </form>

                            {{--                            <a href="{{ route("countries.delete",$country->id) }}" class="text-danger" > <i class="fas fa-trash" ></i></a>--}}

                        </td>
                        <td>
                            <a href="#" class="text-info me-3" ><i class="fas fa-pen" ></i></a>
                            <a href="#"  class="btn text-danger" onclick="event.preventDefault(); document.getElementById('formdelete-{{$country->id}}').submit()" ><i class="fas fa-trash" ></i></a>
                        </td>

                        <form id="formdelete-{{$country->id}}" action="{{route("countries.destroy",$country->id)}}" method="POST" >
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        </form>

                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>

@endsection


@section('script')

    <script type="text/javascript" >

        $(document).ready(function(){
            $('.formdelete').on('submit',function(){
                if(confirm("Are you sure you want to delete it?")){
                    return true;
                }else{
                    return false;
                }
            });
        });

    </script>

@endsection
