<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

@if(!empty(Auth::user()->name))

    <div class="alert alert-primary" role="alert">
        {{Auth::user()->name}}
    </div>

    <div class="alert alert-secondary" role="alert">
        {{Auth::user()->email}}
    </div>

    <div class="alert alert-success" role="alert">
        {{Auth::user()->password}}
    </div>

@endif

<a class="btn btn-primary" href="{{route('t.login')}}">login</a>
<a class="btn btn-primary" href="{{route('t.register')}}">Cadastro</a>

@if(!empty(Auth::user()->name))

<a class="btn btn-primary" href="{{route('t.logout')}}">Logout</a>

@endif