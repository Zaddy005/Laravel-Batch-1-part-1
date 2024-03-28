<!DOCTYPE html>
<html>
<head>
    <title>Employee edit</title>
</head>
<body>

<h1>Welcome to Employee page</h1>
<p>This is Employee Edit </p>

@php
    echo "<pre>".print_r($data,true)."</pre>";
    echo $data['employees']['name']."<br/>";
    echo $data['employees']['email']."<br/>";
    echo $data['employees']['phone']."<br/>";
@endphp

</body>
</html>
