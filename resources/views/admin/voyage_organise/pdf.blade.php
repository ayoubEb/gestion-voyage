<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <style>
    /* *{
      padding: 0;
      margin: 0;
      box-sizing: border-box;
    } */
    table{
      width: 100%;
      margin: auto;
    }

      tbody, td, tfoot, th, thead, tr {
    /* border-color: inherit;
    border-style: solid; */
    padding: 5px;
    border: 0.5px solid;
    border-color: rgba(#000, #000, #000, 0.2);
    }
    .table{
      caption-side: bottom;
    border-collapse: collapse;
    }
    .table tbody tr:first-child(even){
      background: rgba(#000, #000, #000, 0.2);
    }
    .table tbody tr td:first-child(){
    text-transform: uppercase
    }
    h3{
      margin-bottom: 10px;
      border-left: 3px solid #0097a7;
      padding-left: 5px;
      color: #0097a7;
    }
  </style>
<div>
  <h3>Liste du voyage suggerès</h3>
  <table @class(['table','table-bordered'])>
    <thead>
      <tr>
        <th>Ville destination</th>
        <th>Heure départ</th>
        <th>Heure retour</th>
        <th>Nombre jours</th>
        <th>Prix</th>
        <th>Description</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($voyageOrganises as $voyageOrganise)
        <tr>
          <td>{{ $voyageOrganise->ville_destination }}</td>
          <td>{{ $voyageOrganise->heure_depart }}</td>
          <td>{{ $voyageOrganise->heure_retour }}</td>
          <td>{{ $voyageOrganise->nombre_jour }}</td>
          <td>{{ $voyageOrganise->prix.' DHS' }}</td>
          <td>{{ $voyageOrganise->description }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
</body>
</html>