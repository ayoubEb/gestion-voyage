@extends('layouts.master')
@section('content')
  <div @class('card')>
    <div @class(['card-body','p-2'])>
      <div @class(['d-flex','justify-content-between','mb-3','align-items-center'])>
        <div @class(['d-flex','align-items-center'])>
          <a href="{{ route('home') }}" @class(['btn','btn-outline-primary','btn-sm','me-2'])>
            <i @class(['mdi','mdi-home','mdi-18px'])></i>
          </a>
          <h4 @class(['m-0','ps-1','border','border-top-0','border-bottom-0','border-end-0','border-solid','border-3','border-info'])>
            Liste du classes places
          </h4>
        </div>
        <a href="{{ route('classe-place.create') }}" @class(['btn','btn-info','btn-sm','d-flex','align-items-center','fw-bolder'])>
          <i @class(['mdi','mdi-plus-circle-outline','mdi-18px','me-1'])></i>
          <span>Ajouter un classe places</span>
        </a>
      </div>
      <div @class(["row","row-cols-8"])>
        @foreach ($classePlaces as $item)
          <div @class(["col","mb-2"])>
            <table @class(["table","table-bordered","table-sm","mb-0","border","border-dark","border-solid","border-1"])>
              <thead>
                <tr>
                  <th @class('bg-light')>Classe</th>
                  <th @class('bg-light')>Place</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td> {{ $item->avion_classe->classe }}</td>
                  <td> {{ $item->nombre_place }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        @endforeach
      </div>

    </div>
  </div>
@endsection