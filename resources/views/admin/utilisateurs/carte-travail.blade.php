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
    body{
      background:#5CB8E4;
    }
    *{
      padding: 0%;
      margin:0%;
      box-sizing: border-box;
      font-family: Arial, Helvetica, sans-serif;

    }
div{
  padding: 2%;

}
header{
  text-align: center;
  background: wheat;
  padding: 1rem 0;
  border-radius: 5%
}
    .table {
  border-collapse: collapse;
  width: 100%;
}
.table th{
  text-align: left
}
.table td, .table th {
  border: 1px solid #ddd;
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
  <div>
    <header>
      <h2>Carte du travail</h2>
    </header>
    <table @class("table")>
      <tr>
        <th>
          <h5 @class(["m-0","text-capitalize"])>name</h5>
        </th>
        <td>
          <h5 @class(["m-0"])>{{ $user->name }}</h5>
        </td>
      </tr>
      <tr>
        <th>
          <h5 @class(["m-0","text-capitalize"])>genre</h5>
        </th>
        <td>
          <h5 @class(["m-0"])>{{ $user->genre }}</h5>
        </td>
      </tr>
      <tr>
        <th>
          <h5 @class(["m-0","text-capitalize"])>travail</h5>
        </th>
        <td>
          <h5 @class(["m-0"])>{{ "A l'".$user->travail." d'agence" }}</h5>
        </td>
      </tr>
      <tr>
        <th>
          <h5 @class(["m-0","text-capitalize"])>poste</h5>
        </th>
        <td>
          <h5 @class(["m-0"])>{{ $user->poste }}</h5>
        </td>
      </tr>
    </table>
    <footer>

    </footer>
  </div>
</body>
</html>