<!DOCTYPE html>
<html>
<head>
    <title>Employee Page</title>
</head>
<body>

<h1>Welcome to Employee page</h1>
<p>This is Employee Index </p>

<?php
//    foreach($employees as $value){
//        echo $value."<br/>";
//    }
?>

<!--
    @php
    foreach($employees as $value){
          echo $value."<br/>";
      }
@endphp
    -->

<ul>
    @foreach($employees as $value)
        {{--        <li>{{$value}}</li>--}}
        <li> {!! $value !!} </li>
    @endforeach
</ul>

@php
    $city = "yangon";
@endphp

@php
    echo $city;
@endphp

@if($city === "yangon")
    <h3>correct</h3>
@else
    <h3>You were wrong</h3>
@endif

<footer>{{ $thanks }}</footer>

</body>
</html>



















