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

 td {
  padding: 15px;
}
 
     </style>
     
</head>
<body>
    <h2>Bon d'achat</h2>    
    <table>
      <tr>
        <td>Libellé</td>
        <td>{{$achat_pdf->libellé}}</td>
      </tr>
      <tr>
        <td>Date d'achat</td>
        <td>{{$achat_pdf->date_achat}}</td>
      </tr>
      <tr>
        <td>Montant</td>
        <td>{{$achat_pdf->montant_total}} DH</td>

      </tr>
      <tr>
        <td>Agent</td>
        <td>{{$achat_pdf->agent}}</td>
      </tr>
      <tr>
        <td>Fournisseur</td>
        <td>{{$achat_pdf->fournisseur}}</td>
      </tr>
    </table>
</body>
</html>