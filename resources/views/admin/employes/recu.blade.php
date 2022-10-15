<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Reçu</title>
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
h3{
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
td>h5{
  font-weight: normal
}
h4{
  border-left: 4px solid darkcyan;
  padding-left: 4px;
  margin-bottom: .75rem
}

</style>
<header>
  <h2>
    Reçu du salaire d'employe {{ $employeSalaire->employe->prenom.' '.$employeSalaire->employe->nom }}
  </h2>

</header>
<h3>Mois :
  @if ($employeSalaire->mois=="1")
    <span @class("text-capitalize")>{{ $employeSalaire->mois.' janvier' }}</span>
  @elseif ($employeSalaire->mois=="2")
    <span @class("text-capitalize")>{{ $employeSalaire->mois.' février' }}</span>
  @elseif ($employeSalaire->mois=="3")
    <span @class("text-capitalize")>{{ $employeSalaire->mois.' mars' }}</span>
  @elseif ($employeSalaire->mois=="4")
    <span @class("text-capitalize")>{{ $employeSalaire->mois.' avril' }}</span>
  @elseif ($employeSalaire->mois=="5")
    <span @class("text-capitalize")>{{ $employeSalaire->mois.' mai' }}</span>
  @elseif ($employeSalaire->mois=="6")
    <span @class("text-capitalize")>{{ $employeSalaire->mois.' juin' }}</span>
  @elseif ($employeSalaire->mois=="7")
    <span @class("text-capitalize")>{{ $employeSalaire->mois.' juillet' }}</span>
  @elseif ($employeSalaire->mois=="8")
    <span @class("text-capitalize")>{{ $employeSalaire->mois.' août' }}</span>
  @elseif ($employeSalaire->mois=="9")
    <span @class("text-capitalize")>{{ $employeSalaire->mois.' septembre' }}</span>
  @elseif ($employeSalaire->mois=="10")
    <span @class("text-capitalize")>{{ $employeSalaire->mois.' october' }}</span>
  @elseif ($employeSalaire->mois=="11")
    <span @class("text-capitalize")>{{ $employeSalaire->mois.' novembre' }}</span>
  @elseif ($employeSalaire->mois=="12")
    <span @class("text-capitalize")>{{ $employeSalaire->mois.' december' }}</span>
  @endif
</h3>
<h4>Information d'employé</h4>
<table @class('table')>
  <tbody>
    <tr>
      <th><h5 @class(["text-capitalize","m-0"])>CNIE (Carte de national)</h5></th>
      <td><h5 @class(["m-0"])>{{ $employeSalaire->employe->cnie }}</h5></td>
    </tr>
    <tr>
      <th><h5 @class(["text-capitalize","m-0"])>name</h5></th>
      <td><h5 @class(["m-0"])>{{ $employeSalaire->employe->name }}</h5></td>
    </tr>
    <tr>
      <th><h5 @class(["text-capitalize","m-0"])>adresse</h5></th>
      <td><h5 @class(["m-0"])>{{ $employeSalaire->employe->adresse }}</h5></td>
    </tr>
    <tr>
      <th><h5 @class(["text-capitalize","m-0"])>ville</h5></th>
      <td><h5 @class(["m-0"])>{{ $employeSalaire->employe->ville }}</h5></td>
    </tr>
    <tr>
      <th><h5 @class(["text-capitalize","m-0"])>pays</h5></th>
      <td><h5 @class(["m-0"])>{{ $employeSalaire->employe->pays }}</h5></td>
    </tr>
    <tr>
      <th><h5 @class(["text-capitalize","m-0"])>nationalité</h5></th>
      <td><h5 @class(["m-0"])>{{ $employeSalaire->employe->nationalite }}</h5></td>
    </tr>
    <tr>
      <th><h5 @class(["text-capitalize","m-0"])>e-mail</h5></th>
      <td><h5 @class(["m-0"])>{{ $employeSalaire->employe->email }}</h5></td>
    </tr>
    <tr>
      <th><h5 @class(["text-capitalize","m-0"])>téléphone</h5></th>
      <td><h5 @class(["m-0"])>{{ $employeSalaire->employe->telephone }}</h5></td>
    </tr>
    <tr>
      <th><h5 @class(["text-capitalize","m-0"])>genre</h5></th>
      <td><h5 @class(["m-0"])>{{ $employeSalaire->employe->genre }}</h5></td>
    </tr>
    <tr>
      <th><h5 @class(["text-capitalize","m-0"])>poste</h5></th>
      <td><h5 @class(["m-0"])>{{ $employeSalaire->employe->poste }}</h5></td>8/6
    </tr>
    <tr>
      <th><h5 @class(["text-capitalize","m-0"])>travail</h5></th>
      <td><h5 @class(["m-0"])>{{ $employeSalaire->employe->travail }}</h5></td>8/6
    </tr>
    <tr>
      <th><h5 @class(["text-capitalize","m-0"])>date du salaire</h5></th>
      <td><h5 @class(["m-0"])>
        Le : {{ $employeSalaire->jour.' / '.$employeSalaire->mois.' / '.$employeSalaire->annee }}
      </h5></td>
    </tr>
    <tr>
      <th><h5 @class(["text-capitalize","m-0"])>Salaire</h5></th>
      <td><h5 @class(["m-0"])>{{ $employeSalaire->salaire.' DHS' }}</h5></td>
    </tr>
    {{-- <tr>
      <th>Etat du salaire</th>
      <td>
        {{ $employeSalaire->etat }}
      </td>
    </tr> --}}

  <tr>
    <th>
      <h5>Signature d'agence</h5>
    </th>
    <td></td>
  </tr>
  <tr>
    <th>
      <h5>Signature d'employe</h5>
    </th>
    <td></td>
  </tr>
  </tbody>
</table>
<h4>Information d'agence</h4>
</body>
</html>