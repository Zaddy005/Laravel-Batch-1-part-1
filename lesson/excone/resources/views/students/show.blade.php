<!DOCTYPE html>
<html>
<head>
    <title>Student Page</title>
</head>
<body>

<h1>Welcome to Our site</h1>
<p>This is Student Show</p>
<ul>
    <li><a href="{{ route('students.index') }}" >Index</a></li>
    <li><a href="{{ route('students.edit') }}" >Edit</a></li>
</ul>
</body>
</html>
