<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
      <script src="{{ asset('js/app.js') }}" ></script>

    <style>
        .form-gap {
    padding-top: 70px;
}
    </style>
    <title>Réinitialiser</title>
</head>
<body>
<div class="form-gap"></div>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Mot de passe oublié?</h2>
                  <p>Vous pouvez réinitialiser votre mot de passe ici.</p>
                  <div class="panel-body">
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                    @if ($errors->any())
                        <div class="alert alert-danger">
        
                              <p>Nous ne trouvons pas d'utilisateur avec cette adresse e-mail.</p>
                       </div>
                        @endif
                    
                    <form id="register-form" role="form" autocomplete="off" class="form" method="post" action="{{ route('password.email')}}">
                              @csrf
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="email" name="email" placeholder="email address" class="form-control"  type="email" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Réinitialiser le mot de passe" type="submit">
                      </div>
                      
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>
</body>
</html>
