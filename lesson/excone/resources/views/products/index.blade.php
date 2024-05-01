@extends('layouts.app')

@section('title'," Product Page ")

@section('style')

    <style type="text/css" >
        img{
            width: 50px;
            object-fit: cover;

        }
    </style>

@endsection

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
                </tr>
            </thead>
            <tbody>
                @foreach( $products as $idx=>$product )
                    <tr>
                        <td> {{ ++$idx }} </td>
                        <td>
                            {{--  asset,url for public > images folder --}}
                            <img src="{{ asset($product->image) }}" class="rounded-circle"  alt="{{$product->image}}" />
                            <img src="{{ asset('images/'.$product->image) }}" class="rounded-circle" alt="{{$product->image}}" />

                            <img src="{{ url($product->image) }}" class="rounded-circle" alt="{{$product->image}}" />
                            <img src="{{ url("images/".$product->image) }}" class="rounded-circle" alt="{{$product->image}}" />

                            <img src="{{ URL::asset($product->image) }}" class="rounded-circle" alt="{{$product->image}}" />
                            <img src="{{ URL::asset("images/".$product->image) }}" class="rounded-circle" alt="{{$product->image}}" />

                            {{-- storage > images --}}
                            <img src="{{ asset("storage/".$product->image) }}" class="rounded-circle" alt="{{$product->image}}" />
                            <img src="{{ asset("storage/images/".$product->image) }}" class="rounded-circle" alt="{{$product->image}}" />

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
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>

@endsection


@section('script')

    <script type="text/javascript" >
    </script>

@endsection
