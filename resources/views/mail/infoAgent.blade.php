<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <h1 class="display-2 text-center">Informations du compte</h1>
      <div class="container">
        <table class="table table-bordered">
              <tr>
                  <td>Nom</td>
                  <td>{{$user->name}}</td>
              </tr>
              <tr>
                <td>Prénom</td>
                <td>{{$user->first_name}}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{$user->email}}</td>
            </tr>
            <tr>
                <td>Mot de passe</td>
                <td>{{$pass}}</td>
            </tr>
            <tr>
                <td>Type de compte</td>
                <td>{{$user->type_utilisateur}}</td>
            </tr>
          </table>
      </div>
</body>
</html>