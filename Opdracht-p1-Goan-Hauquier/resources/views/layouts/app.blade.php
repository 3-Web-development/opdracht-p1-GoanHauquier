<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Goan Hauquier</title>
    
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
    <header class="masthead col-md-8 col-lg-8">
        <h1>Header</h1>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-8">
                @include('inc.errors')
                @yield('content')  
               
            </div>
            <div class="col-md-4 col-lg-4">
                @yield('right')
            </div>
        </div>
    </div>
</body>
</html>