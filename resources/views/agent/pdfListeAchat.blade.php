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
    <h2>Liste des achats</h2>    
    <table>
      <tr class="text-center">
        <th>Libellé</th>
        <th>Date d'achat</th>
        <th>Montant</th>
        <th>Fournisseur</th>
      </tr>
      @foreach ($achats as $value)
        <tr class="text-center">
             <td>{{++$i}}</td>
             <td>{{$value->date_achat}}</td>
             <td>{{$value->montant_total}}</td>
             <td>{{$value->fournisseur}}</td>   
        </tr>
      @endforeach
   
    </table>
</body>
</html>