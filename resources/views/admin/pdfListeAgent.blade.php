<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bon achat</title>
    <style>
    table, td {  
  border: 1px solid #ddd;
  text-align: center;
}
 h2{
     text-align: center;
       font-family: 'Courier New', Courier, monospace;
      font-style: normal;
     font-weight: bold }
table {
  border-collapse: collapse;
  width: 100%;
}

 td,tr{
  padding: 15px;

}
 
     </style>
     
</head>
<body>
    <h2>Liste des agents</h2>    
    <table>
      <tr>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Email</th>
        <th>État du compte</th>
      </tr>
      @foreach ($agent as $value)
        <tr class="text-center">
             <td>{{$value->name}}</td>
             <td>{{$value->first_name}}</td>
             <td>{{$value->email}}</td>
             @if ($value->etat_compte=="A")
             <td>Activé</td>   
             @else
             <td>Désactivé</td>   
             @endif
        </tr>
      @endforeach
   
    </table>
</body>
</html>