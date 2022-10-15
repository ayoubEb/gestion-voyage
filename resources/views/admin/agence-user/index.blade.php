@extends('layouts.master')
@section('content')
<div @class('card')>
  <div @class(['card-header','d-flex','justify-content-between','align-items-center'])>
    <div @class(['card-title','fs-5'])>
      Liste d'agence utilisateurs
    </div>
    <a href="{{ route('agenceUser.create') }}" @class(['btn','btn-light','btn-sm'])>
      <i @class(['mdi','mdi-plus-thick'])></i>
    </a>
    <div @class(['card-title-desc','m-0'])>
      <ul @class(['list-unstyled','m-0','d-flex'])>
        <li>
          <a href="{{ route('home') }}">
            <i @class(['mdi','mdi-home'])></i>
            <span>Acceuil</span>
          </a>
        </li>
        <li @class(['mx-2'])>
          <i @class(['mdi','mdi-chevron-double-right'])></i>
        </li>
        <li>
          <a href="{{ route('agenceUser.index') }}">
            Liste d'agence utilisateurs
          </a>
        </li>
      </ul>
    </div>
  </div>
  <div @class(['card-body','p-2'])>
    <div @class('table-responsive')>
      <table @class(['table','table-sm','table-striped','m-0'])>
        <thead>
          <tr>
            <th colspan="3" @class(['bg-info','text-white','text-center'])>Agences</th>
            <th colspan="2" @class(['bg-warning','text-white','text-center'])>Utilisateurs</th>
          </tr>
          <tr>
            <th @class('table-info')>Nom</th>
            <th @class('table-info')>Email</th>
            <th @class('table-info')>Ville</th>
            <th @class('table-warning')>Name</th>
            <th @class('table-warning')>Email</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($agenceUsers as $agenceUser)
          <tr>
            <td>{{ $agenceUser->agence->nom }}</td>
            <td>{{ $agenceUser->agence->email }}</td>
            <td>{{ $agenceUser->agence->ville }}</td>
            <td>{{ $agenceUser->user->name }}</td>
            <td>{{ $agenceUser->user->email }}</td>
            <td>
              <a href="{{ route('agenceUser.edit',$agenceUser) }}" @class(['btn','btn-sm','p-0','text-info'])>
                <i @class(['mdi','mdi-pencil'])></i>
              </a>
              <form action="{{ route('agenceUser.destroy',$agenceUser) }}" method="post" @class('d-inline')>
                @csrf
                @method("DELETE")
                <button type="submit" @class(['btn','btn-sm','p-0','text-danger'])>
                  <i @class(['mdi','mdi-trash-can'])></i>
                </button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection