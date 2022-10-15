@extends('layouts.master')
@section('content')
<div @class('card')>
  <div @class(['card-header','py-2','d-flex','justify-content-between'])>
    <div @class(['card-title','m-0','fs-5'])>Modifier du reservation : {{ $reservation->client->name }}</div>
    <div @class(['card-title-desc','m-0'])>
      <ul @class(['list-unstyled','m-0','d-flex','align-items-center'])>
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
          <a href="{{ route('reservation.index') }}">
            Liste du reservation
          </a>
        </li>
        <li @class(['mx-2'])>
          <i @class(['mdi','mdi-chevron-double-right'])></i>
        </li>
        <li>
          <a href="{{ route('reservation.edit',$reservation) }}">
            Modifier du reservation : {{ $reservation->client->name }}
          </a>
        </li>
      </ul>
    </div>
  </div>
  <div @class(['card-body','p-2'])>
    <form action="{{ route('reservation.update',$reservation) }}" method="post">
      @csrf
      @method("PUT")
      <h5 @class(['title','my-2','m-0','ps-1','border','border-top-0','border-bottom-0','border-end-0','border-solid','border-3','border-info'])>
        Client
      </h5>
      <div @class(['row','row-cols-2','mb-2'])>
        <div @class('col')>
          <table @class(['table','table-sm','table-bordered','m-0'])>
            <tr>
              <th @class('align-middle')>Name</th>
              <td><input type="text" name="name" value="{{ $reservation->client->name }}" id="" class="form-control form-control-sm"></td>
            </tr>
            <tr>
              <th @class('align-middle')>Téléphone</th>
              <td><input type="text" name="telephone" value="{{ $reservation->client->telephone }}" id="" class="form-control form-control-sm"></td>
            </tr>
          </table>
        </div>
        <div @class('col')>
          <table @class(['table','table-sm','table-bordered','m-0'])>
            <tr>
              <th @class('align-middle')>E-mail</th>
              <td><input type="email" name="email" value="{{ $reservation->client->email }}" id="" class="form-control form-control-sm"></td>
            </tr>
            <tr>
              <th @class('align-middle')>Genre</th>
              <td>
                <select name="genre" id="" class="form-select form-select-sm">
                  <option value="homme" {{ $reservation->client->genre === "homme" ? 'selected':'' }}>Homme</option>
                  <option value="femme" {{ $reservation->client->genre === "femme" ? 'selected':'' }}>Femme</option>
                </select>
              </td>
            </tr>
          </table>
        </div>
      </div>
      <h5 @class(['title','my-2','m-0','ps-1','border','border-top-0','border-bottom-0','border-end-0','border-solid','border-3','border-info'])>
        Voyage : {{ $reservation->voyage->nom }}
      </h5>
      <div @class(['row','row-cols-2','mb-2'])>
        <div @class('col')>
          <table @class(['table','table-sm','table-bordered','m-0'])>
            <tr>
              <th @class('align-middle')>Date départ</th>
              <td><input type="date" name="date_depart" value="{{ $reservation->voyage->date_depart }}" id="" class="form-control form-control-sm"></td>
            </tr>
            <tr>
              <th @class('align-middle')>Date retour</th>
              <td><input type="date" name="date_retour" value="{{ $reservation->voyage->date_retour }}" id="" class="form-control form-control-sm"></td>
            </tr>
            <tr>
              <th @class('align-middle')>Heure lancer</th>
              <td><input type="time" name="heure_lance" value="{{ $reservation->voyage->heure_lance }}" id="" class="form-control form-control-sm"></td>
            </tr>
            <tr>
              <th @class('align-middle')>Heure retour</th>
              <td><input type="time" name="heure_retour" value="{{ $reservation->voyage->heure_retour }}" id="" class="form-control form-control-sm"></td>
            </tr>
          </table>
        </div>
        <div @class('col')>
          <table @class(['table','table-sm','table-bordered','m-0'])>
            <tr>
              <th @class('align-middle')>Ville destination</th>
              <td><input type="text" name="ville_destination" value="{{ $reservation->voyage->ville_destination }}" id="" class="form-control form-control-sm"></td>
            </tr>
            <tr>
              <th @class('align-middle')>Nombre jour</th>
              <td><input type="text" name="telephone" value="{{ $reservation->voyage->nombre_jour}}" id="" class="form-control form-control-sm"></td>
            </tr>
            <tr>
              <th @class('align-middle')>Prix</th>
              <td><input type="text" name="telephone" value="{{ $reservation->voyage->prix }}" id="" class="form-control form-control-sm"></td>
            </tr>
            <tr>
              <th @class('align-middle')>Gens voyage</th>
              <td>
                <select name="gens_voyage" id="" class="form-select form-select-sm">
                  <option value="amis" {{ $reservation->voyage->gens_voyage=="amis" ? 'selected':'' }}>Amis</option>
                  <option value="en couple" {{ $reservation->voyage->gens_voyage=="en couple" ? 'selected':'' }}>En Couple</option>
                  <option value="famille" {{ $reservation->voyage->gens_voyage=="famille" ? 'selected':'' }}>Famille</option>
                </select>
              </td>
            </tr>
          </table>
        </div>

      </div>

      <h5 @class(['title','my-2','m-0','ps-1','border','border-top-0','border-bottom-0','border-end-0','border-solid','border-3','border-info'])>
        Paiement
      </h5>
      <div @class(['row','row-cols-2','mb-2'])>
        <div @class('col')>
          <table @class(['table','table-sm','table-bordered','m-0'])>
            <tr>
              <th @class('align-middle')>Mode paiement</th>
              <td>
                <select name="mode_paiement" id="" class="form-select form-select-sm">
                  <option value="espèce" {{ $reservation->voyage->mode_paiement=="espèce" ? 'selected':'' }}>Espèce</option>
                  <option value="cash" {{ $reservation->voyage->mode_paiement=="cash" ? 'selected':'' }}>Cash</option>
                </select>
              </td>
            </tr>
          </table>
        </div>
        <div @class('col')>
          <table @class(['table','table-sm','table-bordered','m-0'])>
            <tr>
              <th @class('align-middle')>Statut du payer</th>
              <td>
                <select name="statut_payer" id="" class="form-select form-select-sm">
                  <option value="payer" {{ $reservation->voyage->statut_payer=="payer" ? 'selected':'' }}>Payer</option>
                  <option value="en cours" {{ $reservation->voyage->statut_payer=="en cours " ? 'selected':'' }}>En cours</option>
                </select>
              </td>
            </tr>
          </table>
        </div>

      </div>

      <h5 @class(['title','my-2','m-0','ps-1','border','border-top-0','border-bottom-0','border-end-0','border-solid','border-3','border-info'])>
        Agence : {{ $reservation->agence->nom }}
      </h5>
      <div @class(['row','row-cols-2','mb-2'])>
        <div @class('col')>
          <table @class(['table','table-sm','table-bordered','m-0'])>
            <tr>
              <th @class('align-middle')>Nom</th>
              <td><input type="text" name="nom" value="{{ $reservation->agence->nom }}" id="" class="form-control form-control-sm"></td>
            </tr>
            <tr>
              <th @class('align-middle')>E-mail</th>
              <td><input type="email" name="email" value="{{ $reservation->agence->email }}" id="" class="form-control form-control-sm"></td>
            </tr>
            <tr>
              <th @class('align-middle')>Adresse</th>
              <td><input type="text" name="adresse" value="{{ $reservation->agence->adresse }}" id="" class="form-control form-control-sm"></td>
            </tr>

          </table>
        </div>
        <div @class('col')>
          <table @class(['table','table-sm','table-bordered','m-0'])>
            <tr>
              <th @class('align-middle')>Ville</th>
              <td><input type="text" name="ville" value="{{ $reservation->agence->ville }}" id="" class="form-control form-control-sm"></td>
            </tr>
            <tr>
              <th @class('align-middle')>ICE</th>
              <td><input type="text" name="ice" value="{{ $reservation->agence->ice }}" id="" class="form-control form-control-sm"></td>
            </tr>
            <tr>
              <th @class('align-middle')>PATENTE</th>
              <td><input type="text" name="patente" value="{{ $reservation->agence->patente }}" id="" class="form-control form-control-sm"></td>
            </tr>
          </table>
        </div>
      </div>
      @if ($reservation->valid_reservation=="valider")
        <div @class(['d-flex','justify-content-between','align-items-center'])>
          <p @class('m-0')>
            <span @class(['fw-bolder','text-danger'])>Remarque</span>
            <span> : Pour valider la reservation non modifier information du reservation</span>
          </p>
          <a href="{{ route('exporter',$reservation) }}" @class(['btn','btn-sm','btn-warning'])>Exporter la reservation</a>
          <span @class(['d-flex','align-items-center','text-success'])>
            <i @class(['mdi','mdi-check','me-2','mdi-24px'])></i>
            Valider
          </span>
        </div>
      @elseif ($reservation->valid_reservation=="non valider")
        <div @class(['row'])>
          <div @class('col')>
            <span @class(['fw-bolder','text-danger'])>Remarque</span>
            <span> : Pour valider la reservation non modifier information du reservation</span>
          </div>
          <div @class('col-lg-3')>
            <select name="valid_reservation" id="" class="form-select form-select-sm">
              <option value="valider" {{ $reservation->valid_reservation=='valider' ? 'selected':'' }}>Valider</option>
              <option value="non valider" {{ $reservation->valid_reservation=='non valider' ? 'selected':'' }}>Non Valider</option>
            </select>
          </div>
          <div @class('col-lg-1')>
            <button type="submit" @class(['btn','btn-info','btn-sm'])>Modifier</button>
          </div>

        </div>

      @endif
    </form>

  </div>
</div>
@endsection