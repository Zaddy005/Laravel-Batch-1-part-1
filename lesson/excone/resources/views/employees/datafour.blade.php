<!DOCTYPE html>
<html>
<head>
    <title>Employee Page</title>
</head>
<body>

<h1>Welcome to Employee page</h1>
<p>This is Employee Index </p>

<h3>Hi there!! </h3>


<h3>{!! $greeting !!}</h3>

@php
    echo "<pre>".print_r($students,true)."</pre>";
@endphp


</body>
</html>
