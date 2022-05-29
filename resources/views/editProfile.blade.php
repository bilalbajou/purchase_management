<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{url('css/app.css')}}">
    <link rel="stylesheet" href="{{url('css/custom.css')}}">
    <title>Profil</title>
</head>
<body>
    <div class="container">
        @if ($errors->any())
    <div class="alert alert-danger d-flex  justify-content-start mb-2">
        <ul>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </ul>
    </div>
      @endif
        @if (\Session::has('success'))
        <div class="alert alert-primary d-flex  justify-content-start mb-2" role="alert">
          {!! \Session::get('success') !!}
        </div>
        @endif
        <div class="row gutters">
     <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card h-100">
            <div class="card-body">
                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h6 class="mb-2 text-primary">Données personnelles</h6>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <form action="{{route('profil.update')}}" method="POST">
                            @csrf
                            @method('PUT')
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" name="name"  value="{{$user->name}}">
                        </div>
                        <div class="form-group">
                            <label for="prenom">Prénom</label>
                            <input type="text" class="form-control" name="first_name"  value="{{$user->first_name}}">
                        </div>
                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="email" class="form-control" name="email"  value="{{$user->email}}">
                        </div>
                        <div class="text-right mt-2">
                            <input type="submit" class="btn btn-primary " value="Modifier">
                            <input type="reset" class="btn btn-primary " value="Réinitialiser"> 
                        </div>
                    </form>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <form action="{{route('pass.update')}}" method="POST">
                            @csrf
                            @method('PUT')
                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="email" class="form-control"name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="pass">Nouveau mot de passe</label>
                            <input type="password" class="form-control"   name="pass" required>
                        </div>
                        <div class="form-group">
                            <label for="pass_confirmation">Confirmer</label>
                            <input type="password" class="form-control"   name="pass_confirmation" required>
                        </div>
                        <div class="text-right mt-2">
                            <input type="submit" class="btn btn-primary" value="Modifier">
                            <input type="reset" class="btn btn-primary" value="Réinitialiser"> 
                        </div>
                    </form>
                    </div>
                    
            </div>
        </div>
        </div>
        </div>
        </div>
</body>
</html>