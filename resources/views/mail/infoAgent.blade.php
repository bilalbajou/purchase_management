<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
          h1{
               text-align: center;
           }
           p{
               font-family:alphabetic;
               font-size: 2rem;
             text-align:center;
               
           }
           #table {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#table td, #table th {
  border: 1px solid #ddd;
  padding: 8px;
}

#table tr:nth-child(even){background-color: #f2f2f2;}

#table tr:hover {background-color: #ddd;}

#table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
 .btn{
       display: flex;
       justify-content: center;
       align-items: center;
       margin-top:10px;
       
 }
  button{
       padding: 10px;
       border-radius: 15px;
       background-color: violet;
       border-style:none;
       

  }
.logo{
     display:flex;
      justify-content:center;
      margin-top:20px;
}
.copyright p{
      text-align:center;
      font-size:20px;
      font-family:baseline;
}
    </style>
</head>
<body>  
    <h1 class="display-2 text-center">Informations de compte</h1>
      <div class="container">
        <table id="table">
              <tr>
                  <td>Nom & Prénom</td>
                  <td>{{$user->name}} {{$user->first_name}}</td>
              </tr>
              <tr>
                <td>Email</td>
                <td>{{$user->email}}</td>
            </tr>
            <tr>
                <td>Mot de passe</td>
                <td>{{$pass}}</td>
            </tr>
            
          </table>
      </div>
    
</body>
</html>