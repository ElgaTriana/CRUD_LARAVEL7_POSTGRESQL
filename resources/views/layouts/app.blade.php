<!DOCTYPE html>
<html>
<head>
    <title>PUNINAR</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="javascipt:void();">Puninar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="{{URL::to('powerunit')}}">Soal 1 <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{URL::to('soalno2')}}">Soal 2</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{URL::to('soalno5')}}">Soal 5</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{URL::to('soalno7')}}">Soal 7</a>
              </li>
            </ul>
            <span class="navbar-text">
              Navbar text with an inline element
            </span>
        </div>
    </nav>
      
    <div class="container">
        <br>
        @yield('content')
    </div>    
    
    @yield('js')
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.2/css/jquery.dataTables.min.css">
 
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" defer></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
</body>
</html>