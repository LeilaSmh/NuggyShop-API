<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<body class="dark:bg-gray-900">
    <div>
        @include('includes.header')
    </div>
    
    <div id="main">
        @yield('content')
    </div>
</body>
</html>