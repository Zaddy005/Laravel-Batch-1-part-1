@extends('layouts.app')

@section('title'," Product Page ")

@section('content')

    <h1> Index Page </h1>

    <div class="col-md-12 mb-3">
        <a href="{{ route("products.create") }}" class="btn btn-info text-light" > Create new Product  </a>
    </div>

    <div class="col-md-12" >
        <table class="table table-sm table-hover border mydata">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                    <th>Drop</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $products as $idx=>$product )
                    <tr>
                        <td> {{ ++$idx }} </td>
                        <td>
                            <img src="{{ asset('images',$product->image) }}" class="rounded-circle" style="width:50px;" alt="{{$product->image}}" />
                        </td>
                        <td> {{ $product->name }} </td>
                        <td> {{ $product->price }} </td>
                        <td> {{ $product->created_at }} </td>
                        <td> {{ $product->updated_at }} </td>
                        <td class="d-flex align-items-center" >
                            <a href="{{ route('products.edit',$product->id) }}" class="text-primary me-3" > <i class="fas fa-pen" ></i></a>


                            <form class="formdelete" action="{{ route("products.destroy",$product->id) }}" method="POST" >
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn" ><i class="fas fa-trash text-danger" ></i></button>
                            </form>

                        </td>
                        <td>
                            <a href="#" class="text-info me-3" ><i class="fas fa-pen" ></i></a>
                            <a href="#"  class="btn text-danger" onclick="event.preventDefault(); document.getElementById('formdelete-{{$product->id}}').submit()" ><i class="fas fa-trash" ></i></a>
                        </td>

                        <form id="formdelete-{{$product->id}}" action="{{route("products.destroy",$product->id)}}" method="POST" >
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
