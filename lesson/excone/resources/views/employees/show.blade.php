<!DOCTYPE html>
<html>
<head>
    <title>Employee Show</title>
</head>
<body>

<h1>Welcome to Employee page</h1>
<p>This is Employee show </p>

@php
    echo "<pre>".print_r($employees,true)."</pre>";
    echo $employees['name']."<br/>";
    echo $employees['email']."<br/>";
    echo $employees['phone']."<br/>";

@endphp


</body>
</html>
