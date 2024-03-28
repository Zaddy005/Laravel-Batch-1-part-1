<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
</head>
<body>
<h1>Welcome to Our Site</h1>
<p>This is @yield('heading')</p>

@yield('content')

<div>
    <h4>This is our company info form layout</h4>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
</div>

@yield('footer')
</body>
</html>



















