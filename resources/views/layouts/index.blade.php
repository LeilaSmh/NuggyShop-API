<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
</head>

<body class="dark:bg-gray-900">
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#ff6699;">
            <a class="navbar-brand" href="https://nuggyshop.azurewebsites.net" style="font-size: 1.5em;">NuggyShop</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
        <br /><br /><br />
    </div>

    <div id="main">
        @yield('content')
    </div>
</body>

</html>