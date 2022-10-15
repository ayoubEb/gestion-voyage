<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>
    Année : @foreach ($getAnnee as $item)
    {{ $item->annee }}
    @endforeach
  </title>
</head>
<body>
  <style>
    *{
      font-family: Arial, Helvetica, sans-serif;
    }
    header{
      border: 1px solid black;
      width: 75%;
      margin: auto;
      border-radius: 2%;
      margin-bottom: 0
    }
    header h2{
      text-align: center;
      /* margin: 0; */
    }
   #year{
  width: 30%;
  margin: 0 auto;
  text-align: center;
  padding: .75rem 0;
  border-bottom: 1px solid black;
  border-left: 1px solid black;
  border-right: 1px solid black;
  border-bottom-left-radius: 2%;
  border-bottom-right-radius: 2%;
  margin-bottom: 10px
}
.table {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

.table td, .table th {
  border: 1px solid #ddd;
  padding: 8px;
}

.table tr:nth-child(even){background-color: #f2f2f2;}

.table tr:hover {background-color: #ddd;}

.table th {
  padding-top: 8px;
  padding-bottom: 8px;
  text-align: left;
background: #f1f5f7;

}


.text-capitalize{
  text-transform: capitalize;
}
.m-0{
  margin: 0px;
}
h4{
  border-left: 4px solid darkcyan;
  padding-left: 4px;
  margin-bottom: .75rem
}
td>h5{
  font-weight: normal
}
</style>
<header>
  <h2>
    Fiche du salaire d'employe
    {{ $emp->prenom.' '.$emp->nom }}
  </h2>

</header>
<h3 id="year">Année :
{{ $item->annee }}
</h3>
<h4>Information d'employé</h4>
<table @class('table')>
  <tbody>
    <tr>
      <th><h5 @class(["text-capitalize","m-0"])>CNIE</h5></th>
      <td><h5 @class(["m-0"])>{{ $emp->cnie }}</h5></td>
    </tr>
    <tr>
      <th><h5 @class(["text-capitalize","m-0"])>name</h5></th>
      <td><h5 @class(["m-0"])>{{ $emp->name }}</h5></td>
    </tr>
    <tr>
      <th><h5 @class(["text-capitalize","m-0"])>adresse</h5></th>
      <td><h5 @class(["m-0"])>{{ $emp->adresse }}</h5></td>
    </tr>
    <tr>
      <th><h5 @class(["text-capitalize","m-0"])>ville</h5></th>
      <td><h5 @class(["m-0"])>{{ $emp->ville }}</h5></td>
    </tr>
    <tr>
      <th><h5 @class(["text-capitalize","m-0"])>pays</h5></th>
      <td><h5 @class(["m-0"])>{{ $emp->pays }}</h5></td>
    </tr>
    <tr>
      <th><h5 @class(["text-capitalize","m-0"])>nationalité</h5></th>
      <td><h5 @class(["m-0"])>{{ $emp->nationalite }}</h5></td>
    </tr>
    <tr>
      <th><h5 @class(["text-capitalize","m-0"])>e-mail</h5></th>
      <td><h5 @class(["m-0"])>{{ $emp->email }}</h5></td>
    </tr>
    <tr>
      <th><h5 @class(["text-capitalize","m-0"])>téléphone</h5></th>
      <td><h5 @class(["m-0"])>{{ $emp->telephone }}</h5></td>
    </tr>
    <tr>
      <th><h5 @class(["text-capitalize","m-0"])>genre</h5></th>
      <td><h5 @class(["m-0"])>{{ $emp->genre }}</h5></td>
    </tr>
    <tr>
      <th><h5 @class(["text-capitalize","m-0"])>poste</h5></th>
      <td><h5 @class(["m-0"])>{{ $emp->poste }}</h5></td>
    </tr>
    <tr>
      <th><h5 @class(["text-capitalize","m-0"])>travail</h5></th>
      <td><h5 @class(["m-0"])>{{ $emp->travail }}</h5></td>
    </tr>
  </tbody>
</table>
<h4>Information du salaires</h4>
<table @class('table')>
  <thead>
    <tr>
      <th><h5 @class(["m-0","text-capitalize"])>jours</h5></th>
      <th><h5 @class(["m-0","text-capitalize"])>mois</h5></th>
      <th><h5 @class(["m-0","text-capitalize"])>année</h5></th>
      <th><h5 @class(["m-0","text-capitalize"])>salaires</h5></th>
      <th><h5 @class(["m-0","text-capitalize"])>état</h5></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($item->items as $row)
    @if ($row->employe_id==$emp->id )
    <tr>
    <td><h5 @class(["m-0"])>{{ $row->jour }}</h5></td>
    <td><h5 @class(["m-0"])>{{ $row->mois }}</h5></td>
    <td><h5 @class(["m-0"])>{{ $row->annee }}</h5></td>
    <td><h5 @class(["m-0"])>{{ $row->salaire.' DHS' }}</h5></td>
    <td><h5 @class(["m-0"])>{{ $row->etat }}</h5></td>

  </tr>
    @endif



    @endforeach
  </tbody>
</table>
<h3>Total : {{ $sum.' DHS' }}</h3>

</body>
</html>