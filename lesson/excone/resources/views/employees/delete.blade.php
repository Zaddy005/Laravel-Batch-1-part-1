<!DOCTYPE html>
<html>
<head>
    <title>Employee Delete</title>
</head>
<body>

<h1>Welcome to Employee page</h1>
<p>This is Employee Edit </p>

@php
    echo "<pre>".print_r($employee,true)."</pre>";
    echo $employee['name']."<br/>";
    echo $employee['email']."<br/>";
    echo $employee['phone']."<br/>";
@endphp

</body>
</html>
