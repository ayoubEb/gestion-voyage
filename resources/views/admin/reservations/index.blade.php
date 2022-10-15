@extends('layouts.master')
@section('content')
<div @class('card')>
  <div @class(['card-header','d-flex','justify-content-between','align-items-center'])>
    <div @class(['card-title','m-0','fs-5'])>
      Liste du reservations
    </div>
    <a href="{{ route('reservation.create') }}" @class(['btn','btn-light','btn-sm'])>
      <i @class(['mdi','mdi-plus-thick'])></i>
    </a>
    <div @class(['card-title','m-0'])>
      <ul @class(['list-unstyled','m-0','d-flex'])>
        <li>
          <a href="{{ route('home') }}">
            <i @class(['mdi','mdi-home'])></i>
            <span>Acceuil</span>
          </a>
        </li>
        <li @class('mx-2')>
          <i @class(['mdi','mdi-chevron-double-right'])></i>
        </li>
        <li>
          <a href="{{ route('reservation.create') }}">
            Liste du reservations
          </a>
        </li>
      </ul>
    </div>
  </div>
  <div @class(['card-body','p-2'])>
    <div @class('table-responsive')>
      <table @class(['table','table-sm','m-0'])>
        <thead>
          <tr>
            <th>Name Cli</th>
            <th>E-mail Cli</th>
            <th>Téléphone Cli</th>
            <th>Genre Cli</th>
            <th>Voyage</th>
            <th>Mode Paiement</th>
            <th>Statut Payer</th>
            {{-- <th>PDF</th> --}}
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($reservations as $reservation)
            <tr>
              <td>{{ $reservation->client->name ?? '' }}</td>
              <td>{{ $reservation->client->email }}</td>
              <td>{{ $reservation->client->telephone }}</td>
              <td>{{ $reservation->client->genre }}</td>
              <td>{{ $reservation->voyage->nom }}</td>
              <td>{{ $reservation->voyage->mode_paiement ?? '' }}</td>
              <td>{{ $reservation->voyage->statut_payer ?? '' }}</td>
              {{-- <td>
                <a href="{{ route('exporter',$reservation) }}">
                df</a>
              </td> --}}
              <td>
                <a href="{{ route('reservation.show',$reservation) }}" @class(['btn','btn-sm','p-0'])>
                  <i @class(['mdi','mdi-eye'])></i>
                </a>
                <a href="{{ route('reservation.edit',$reservation) }}" @class(['btn','btn-sm','p-0'])>
                  <i @class(['mdi','mdi-pencil'])></i>
                </a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection