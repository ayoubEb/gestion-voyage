@extends('layouts.master')
@section('content')
<div @class('card')>
  <div @class(['card-header','py-2','d-flex','justify-content-between','align-items-center'])>
    <div @class(['card-title','m-0','fs-4'])>Liste du voyages</div>
    {{-- <a href="{{ route('voyage.create') }}" @class(['btn', 'btn-sm','btn-light'])>
      <i @class(['mdi','mdi-plus-thick'])></i>
    </a> --}}
    <div @class(['card-title-desc','m-0'])>
      <ul @class(['d-md-flex','align-items-center','list-unstyled','mb-0'])>
        <li>
          <a href="">
            <i @class(['mdi', 'mdi-home'])></i>
            <span>Acceuil</span>
          </a>
        </li>
        <li @class('mx-2')>
          <span @class('fs-5')>
            <i @class(['mdi', 'mdi-chevron-double-right'])></i>
          </span>
        </li>
        <li>
          <a href="{{ route('voyage.index') }}">
            <span>Liste du voyages</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
  <div @class(['card-body','p-2'])>
    <a href="{{ route('exporter-voyages') }}" @class(['btn','btn-sm','btn-info'])>
      Exporter liste du voyages
    </a>
    <div @class('table-responsive')>
      <table @class(['table','table-striped','table-sm','mb-0'])>
        <thead>
          <tr>
            <th>Nom</th>
            <th>Date départ</th>
            <th>Prix (MAD)</th>
            <th>Ville départ</th>
            <th>Ville destination</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @if (count($voyages)>0)
            @foreach ($voyages as $voyage)
              <tr>
                <td @class('align-middle')>{{ $voyage->nom ?? '' }}</td>
                <td @class('align-middle')>{{ $voyage->date_depart ?? '' }}</td>
                <td @class('align-middle')>{{ $voyage->prix.' MAD' }}</td>
                <td @class('align-middle')>{{ $voyage->ville_depart ?? '' }}</td>
                <td @class('align-middle')>{{ $voyage->ville_destination ?? '' }}</td>
                <td @class('align-middle')>
                  <a href="{{ route('voyage.show',$voyage) }}" @class(['btn','p-0','text-success'])>
                    <i @class(['mdi','mdi-eye'])></i>
                  </a>
                  <a href="{{ route('voyage.edit',$voyage) }}" @class(['btn','p-0','text-info'])>
                    <i @class(['mdi','mdi-pencil'])></i>
                  </a>
                  <form action="{{ route('voyage.destroy',$voyage) }}" method="post" @class('d-inline')>
                    @csrf
                    @method("DELETE")
                    <button type="submit" @class(['btn','p-0','text-danger'])>
                      <i @class(['mdi','mdi-trash-can'])></i>
                    </button>
                  </form>
                </td>
              </tr>
            @endforeach
          @else

          @endif
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection