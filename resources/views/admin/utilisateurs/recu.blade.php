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
    Reçu du salaire d'utilisateur {{ $userSalaire->user->name }}
  </h2>

</header>
<h3>Mois :
  @if ($userSalaire->mois=="1")
    <span @class("text-capitalize")>{{ $userSalaire->mois.' janvier' }}</span>
  @elseif ($userSalaire->mois=="2")
    <span @class("text-capitalize")>{{ $userSalaire->mois.' février' }}</span>
  @elseif ($userSalaire->mois=="3")
    <span @class("text-capitalize")>{{ $userSalaire->mois.' mars' }}</span>
  @elseif ($userSalaire->mois=="4")
    <span @class("text-capitalize")>{{ $userSalaire->mois.' avril' }}</span>
  @elseif ($userSalaire->mois=="5")
    <span @class("text-capitalize")>{{ $userSalaire->mois.' mai' }}</span>
  @elseif ($userSalaire->mois=="6")
    <span @class("text-capitalize")>{{ $userSalaire->mois.' juin' }}</span>
  @elseif ($userSalaire->mois=="7")
    <span @class("text-capitalize")>{{ $userSalaire->mois.' juillet' }}</span>
  @elseif ($userSalaire->mois=="8")
    <span @class("text-capitalize")>{{ $userSalaire->mois.' août' }}</span>
  @elseif ($userSalaire->mois=="9")
    <span @class("text-capitalize")>{{ $userSalaire->mois.' septembre' }}</span>
  @elseif ($userSalaire->mois=="10")
    <span @class("text-capitalize")>{{ $userSalaire->mois.' october' }}</span>
  @elseif ($userSalaire->mois=="11")
    <span @class("text-capitalize")>{{ $userSalaire->mois.' novembre' }}</span>
  @elseif ($userSalaire->mois=="12")
    <span @class("text-capitalize")>{{ $userSalaire->mois.' december' }}</span>
  @endif
</h3>
<h4>Information d'employé</h4>
<table @class('table')>
  <tbody>
    <tr>
      <th><h5 @class(["text-capitalize","m-0"])>CNIE (Carte de national)</h5></th>
      <td><h5 @class(["m-0"])>{{ $userSalaire->user->cnie }}</h5></td>
    </tr>
    <tr>
      <th><h5 @class(["text-capitalize","m-0"])>name</h5></th>
      <td><h5 @class(["m-0"])>{{ $userSalaire->user->name }}</h5></td>
    </tr>
    <tr>
      <th><h5 @class(["text-capitalize","m-0"])>adresse</h5></th>
      <td><h5 @class(["m-0"])>{{ $userSalaire->user->adresse }}</h5></td>
    </tr>
    <tr>
      <th><h5 @class(["text-capitalize","m-0"])>ville</h5></th>
      <td><h5 @class(["m-0"])>{{ $userSalaire->user->ville }}</h5></td>
    </tr>
    <tr>
      <th><h5 @class(["text-capitalize","m-0"])>pays</h5></th>
      <td><h5 @class(["m-0"])>{{ $userSalaire->user->pays }}</h5></td>
    </tr>
    <tr>
      <th><h5 @class(["text-capitalize","m-0"])>nationalité</h5></th>
      <td><h5 @class(["m-0"])>{{ $userSalaire->user->nationalite }}</h5></td>
    </tr>
    <tr>
      <th><h5 @class(["text-capitalize","m-0"])>e-mail</h5></th>
      <td><h5 @class(["m-0"])>{{ $userSalaire->user->email }}</h5></td>
    </tr>
    <tr>
      <th><h5 @class(["text-capitalize","m-0"])>téléphone</h5></th>
      <td><h5 @class(["m-0"])>{{ $userSalaire->user->telephone }}</h5></td>
    </tr>
    <tr>
      <th><h5 @class(["text-capitalize","m-0"])>genre</h5></th>
      <td><h5 @class(["m-0"])>{{ $userSalaire->user->genre }}</h5></td>
    </tr>
    <tr>
      <th><h5 @class(["text-capitalize","m-0"])>poste</h5></th>
      <td><h5 @class(["m-0"])>{{ $userSalaire->user->poste }}</h5></td>8/6
    </tr>
    <tr>
      <th><h5 @class(["text-capitalize","m-0"])>travail</h5></th>
      <td><h5 @class(["m-0"])>{{ $userSalaire->user->travail }}</h5></td>8/6
    </tr>
    <tr>
      <th><h5 @class(["text-capitalize","m-0"])>date du salaire</h5></th>
      <td><h5 @class(["m-0"])>
        Le : {{ $userSalaire->jour.' / '.$userSalaire->mois.' / '.$userSalaire->annee }}
      </h5></td>
    </tr>
    <tr>
      <th><h5 @class(["text-capitalize","m-0"])>Salaire</h5></th>
      <td><h5 @class(["m-0"])>{{ $userSalaire->salaire.' DHS' }}</h5></td>
    </tr>
    {{-- <tr>
      <th>Etat du salaire</th>
      <td>
        {{ $userSalaire->etat }}
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