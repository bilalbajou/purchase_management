
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{url('css/login.css')}}" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">        
        <div class="card my-5">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
          <form class="card-body cardbody-color p-lg-5" method="POST" action="{{route('login')}}">
            @csrf
            <div class="text-center">
              <img src="{{url('images/login.png')}}" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3" width="200px" alt="profile">
            </div>
  
            <div class="mb-3">
              <input type="text" class="form-control" id="Email" aria-describedby="emailHelp" placeholder="Email" name="email" value="{{old('email')}}" autofocus>
            </div>
            <div class="mb-3">
              <input type="password" class="form-control" id="password" placeholder="Mot de passe" name="password">
            </div>
            <div class="text-center"><button type="submit" class="btn btn-color px-5 mb-3 w-100">Connecter</button></div>
              @if (Route::has('password.request'))
                <div id="emailHelp" class="form-text text-center mb-5 text-dark"><a href="{{route('password.request')}}" class="text-dark fw-bold">Mot de passe oublié ? </a>
              </div>
            @endif
          </form>
        </div>
  
      </div>
    </div>
  </div>
  <script src="{{ asset('js/app.js') }}" defer></script>

</body>
</html>



