@extends('layouts.master')
@section('content')
<div @class('card')>
  <div @class(['card-header','d-flex','justify-content-between','align-items-center'])>
    <div @class(['card-title','m-0','fs-5'])>
      Reservation du client : {{ $reservation->client->name }}
    </div>
    <div @class(['card-title-desc','m-0'])>
      <ul @class(['list-unstyled','m-0','d-flex'])>
        <li>
          <a>
            <i @class(['mdi','mdi-home'])></i>
            <span>Acceuil</span>
          </a>
        </li>
        <li @class('mx-2')>
          <i @class(['mdi','mdi-chevron-double-right'])></i>
        </li>
        <li>
          <a href="{{ route('reservation.index') }}">
            Liste du reservation
          </a>
        </li>
        <li @class('mx-2')>
          <i @class(['mdi','mdi-chevron-double-right'])></i>
        </li>
        <li>
          <a href="{{ route('reservation.show',$reservation) }}">
            Reservation du client : {{ $reservation->client->name }}
          </a>
        </li>
      </ul>
    </div>
  </div>
  <div @class(['card-body','p-2'])>
    <h5>
      Client
    </h5>
    <div @class(['row','row-cols-2'])>
      <div @class('col')>
        <table @class(['table','table-bordered','table-sm'])>
          <tbody>
            <tr>
              <th>Name</th>
              <td>{{ $reservation->client->name }}</td>
            </tr>
            <tr>
              <th>Téléphone</th>
              <td>{{ $reservation->client->telephone }}</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div @class('col')>
        <table @class(['table','table-bordered','table-sm'])>
          <tbody>
            <tr>
              <th>Genre</th>
              <td>{{ $reservation->client->genre }}</td>
            <tr>
            </tr>
              <th>E-mail</th>
              <td>{{ $reservation->client->email }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <h5>
      Voyage : {{ $reservation->voyage->nom }}
    </h5>
    <div @class(['row','row-cols-2'])>
      <div @class('col')>
        <table @class(['table','table-bordered','table-sm'])>
          <tbody>
            <tr>
              <th>Date du départ</th>
              <td>{{ $reservation->voyage->date_depart }}</td>
            </tr>
            <tr>
              <th>Date du retour</th>
              <td>{{ $reservation->voyage->date_retour }}</td>
            </tr>
            <tr>
              <th>Heure du lance</th>
              <td>{{ $reservation->voyage->heure_lance }}</td>
            </tr>
            <tr>
              <th>Heure du retour</th>
              <td>{{ $reservation->voyage->heure_retour }}</td>
            </tr>
            <tr>
              <th>Mode paiement</th>
              <td>{{ $reservation->voyage->mode_paiement }}</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div @class('col')>
        <table @class(['table','table-bordered','table-sm'])>
          <tbody>
            </tr>
              <th>Ville du destination</th>
              <td>{{ $reservation->voyage->ville_destination }}</td>
            </tr>
            </tr>
              <th>Nombre du jour</th>
              <td>{{ $reservation->voyage->nombre_jour.' jours' }}</td>
            </tr>
            </tr>
              <th>Prix</th>
              <td>{{ $reservation->voyage->prix.' DHS' }}</td>
            </tr>
            </tr>
              <th>Gens voyage</th>
              <td>{{ $reservation->voyage->gens_voyage }}</td>
            </tr>
            </tr>
              <th>Statut paiement</th>
              <td class="{{ $reservation->voyage->statut_payer==='payer' ? 'bg-success text-white':'' }}">{{ $reservation->voyage->statut_payer }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <h5>
      Agence : {{ $reservation->agence->nom }}
    </h5>
    <div @class(['row','row-cols-2'])>
      <div @class(['col'])>
        <table @class(['table','table-bordered','table-sm'])>
          <tr>
            <th>Nom</th>
            <td>{{ $reservation->agence->nom }}</td>
          </tr>
          <tr>
            <th>E-mail</th>
            <td>{{ $reservation->agence->email }}</td>
          </tr>
          <tr>
            <th>Adresse</th>
            <td>{{ $reservation->agence->adresse }}</td>
          </tr>
        </table>
      </div>
      <div @class(['col'])>
        <table @class(['table','table-bordered','table-sm'])>
          <tr>
            <th>Ville</th>
            <td>{{ $reservation->agence->ville }}</td>
          </tr>
          <tr>
            <th>ICE</th>
            <td>{{ $reservation->agence->ice }}</td>
          </tr>
          <tr>
            <th>Patente</th>
            <td>{{ $reservation->agence->patente }}</td>
          </tr>
        </table>
      </div>
    </div>
    <div @class(['d-flex','justify-content-between'])>
      @if ($reservation->valid_reservation=="valider")
      <a href="{{ route('exporter',$reservation ) }}" @class(['btn','btn-sm','btn-warning','text-center'])>
        Importer la reservation
      </a>
      @endif
      @if ($reservation->valid_reservation=="valider")
        <span @class(['d-flex','align-items-center','text-success'])>
          <i @class(['mdi','mdi-check'])></i>
          Valider
        </span>
      @elseif($reservation->valid_reservation=="non valider")
        <span @class(['d-flex','align-items-center','text-danger'])>
          <i @class(['mdi','mdi-close-thick','mdi-24px'])></i>
          Non Valider
        </span>
      @endif
    </div>
  </div>
</div>
@endsection