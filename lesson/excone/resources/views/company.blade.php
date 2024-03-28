<!DOCTYPE html>
<html>
<head>
    <title>Company</title>
</head>
<body>
    <h1>Hello welcome from Our Site</h1>
    <p>This is Company site</p>
    <b style="color:red" >Are you looking for {{ $sf }} From {{ $ct }}</b>
<a href="{{URL::to('hello')}}" >hello</a>
<a href="{{route('greet')}}" >Greet</a>
{{--    <a href="{{URL::to('hello')}}" >hello</a>--}}
{{--    <a href="{{route('staffs.home')}}" >greet</a>--}}
</body>
</html>
