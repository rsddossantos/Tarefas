<!-- Template do sistema-->

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/layout.css')}}" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <title>@yield('title') - LARAVEL</title>
</head>
<body>
    <div class="container">
        <header>
            <div class="header">
                <a href="{{asset('/tarefas')}}">
                    <h1>Tarefas <small style="text-align:right">v.{{$versao}}</small></h1>
                </a>
            </div><hr>
        </header>
        <section>
            @yield('content')
        </section>
        <footer>
        </footer>
    </div>
</body>
</html>
