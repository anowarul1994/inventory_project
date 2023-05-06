
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('page_title') | Inventory</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        body{
            background: #30388d45;
            position: relative;
        }
        .card-custom{
            position: absolute;
            top: 50%;
            left: 50%;
            width: 30%;
            transform: translate(-50%, 50%);
            background: #178b85;
        }
    </style>
</head>
  <body>
    
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card card-custom">
                        <div class="card-header">
                            <h3>@yield('page_title')</h3>
                        </div>
                        <div class="card-body">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>







