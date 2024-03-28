<!DOCTYPE html>
<html>
<head>
    <title>Staffs Party Page</title>
</head>
<body>

<h1>Welcome to Staffs page</h1>
<p>This is Staffs Party Page </p>
<p>Staffs is {{$total}} </p>
<ul>
    <li><a href="{{URL::to('staffs')}}" >Index</a></li>
    <li><a href="{{route('staffs.party')}}" >Party</a></li>
    <li><a href="" >Edit</a></li>
</ul>
</body>
</html>
