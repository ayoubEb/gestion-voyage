<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Carte de travail</title>
</head>
<body>
  <style>
    body{

      padding: 2%
    }
    *{
      padding: 0%;
      margin:0%;
      box-sizing: border-box;
      font-family: Arial, Helvetica, sans-serif;

    }

header{
  text-align: center;
  background: wheat;
  border-radius: .25rem;
  padding: 2%;
  margin-bottom: 5px;

}
footer{
  background: wheat;
  border-radius: .25rem;

}
ul{
  list-style: none;
}
.info{
  margin-top: 5px;
}
.info td{
  font-size: 12px;

}
.info td span:first-child(){
  font-weight: 500;
}
/* header img{
  float: left;
} */
.table {
  border-collapse: collapse;
  width: 100%;

  border-radius: 10%;
}
.table th{
  text-align: left;

}
.table td, .table th {
  border: 1px solid #F2D388;
  padding: 8px;
}
td > h5{
  font-weight: normal
}
.m-0{
  margin: 0;
}
.text-capitalize{
  text-transform: capitalize;
}
  </style>
  {{-- <img src=".img/back-carte.jpg" alt=""> --}}

    <header>


          <h4>Carte du travail</h4>


    </header>
    <section>
      <article>
        <table @class("table")>
          <tr>
            <th>
              <h5 @class(["m-0","text-capitalize"])>name</h5>
            </th>
            <td>
              <h5 @class(["m-0"])>{{ $employe->name }}</h5>
            </td>
          </tr>
          <tr>
            <th>
              <h5 @class(["m-0","text-capitalize"])>téléphone</h5>
            </th>
            <td>
              <h5 @class(["m-0"])>{{ $employe->telephone }}</h5>
            </td>
          </tr>
          <tr>
            <th>
              <h5 @class(["m-0","text-capitalize"])>travail</h5>
            </th>
            <td>
              <h5 @class(["m-0"])>{{ "A ".$employe->travail." d'agence" }}</h5>
            </td>
          </tr>
          <tr>
            <th>
              <h5 @class(["m-0","text-capitalize"])>poste</h5>
            </th>
            <td>
              <h5 @class(["m-0"])>{{ $employe->poste }}</h5>
            </td>
          </tr>
        </table>

      </article>
    </section>
    <footer>
      @foreach ($agence as $agence)

      <div class="info">
        <table class="table">
          <tbody>
            <tr>
              <td>{{ $agence->nom }}</td>
              <td>{{ $agence->email }}</td>
              <td><span>ICE : </span><span>{{ $agence->ice }}</span></td>
              <td><span>PATENTE : </span><span>{{ $agence->patente }}</span></td>
            </tr>
            <tr>
              <td colspan="4">{{ $agence->adresse." ".$agence->ville }}</td>
            </tr>
          </tbody>
        </table>
      </div>
            {{-- <img src="{{ URL::asset("images/agence/".$a->logo) }}" alt="" > --}}
      @endforeach
    </footer>

</body>
</html>