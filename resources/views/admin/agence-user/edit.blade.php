@extends('layouts.master')
@section('content')
<div @class('card')>
  <div @class('card-header')>
    <div @class(['card-title','fs-5','mb-2'])>
      Modifier d'agence utilisateurs : {{ $agenceUser->agence->nom.' / '.$agenceUser->user->name }}
    </div>
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
        <li @class(['mx-2'])>
          <i @class(['mdi','mdi-chevron-double-right'])></i>
        </li>
        <li>
          <a href="{{ route('agence.edit',$agenceUser) }}">
            Modifier d'agence utilisateurs : {{ $agenceUser->agence->nom.' / '.$agenceUser->user->name }}
          </a>
        </li>
      </ul>
    </div>
  </div>
  <div @class(["card-body","p-2"])>
    <form action="{{ route('agenceUser.update',$agenceUser) }}" method="post">
      @csrf
      @method("PUT")
      <div @class("table-responsive")>
        <table @class(["table","table-bordered","m-0","table-sm"])>
          <thead>
            <tr>
              <th>Agence</th>
              <th>Utilisateur</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <select name="agence_id" id="" @class(["form-select","form-select-sm"])>
                  <option value="">Choisir d'agence</option>
                  @foreach ($agences as $agence)
                    <option value="{{ $agence->id }}" {{ $agenceUser->agence_id == $agenceUser->agence->id ? 'selected':'' }}>{{ $agence->nom }}</option>
                  @endforeach
                </select>
              </td>
              <td>
                <select name="user_id" id="" @class(["form-select","form-select-sm"])>
                  <option value="">Choisir d'utilisateur</option>
                  @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $agenceUser->user_id == $agenceUser->user->id ? 'selected':'' }}>{{ $user->name }}</option>
                  @endforeach
                </select>
              </td>
            </tr>
          </tbody>
        </table>
        <button type="submit" @class(['btn','btn-sm','btn-success'])>
          Modifier
        </button>
      </div>
    </form>
  </div>
</div>
@endsection