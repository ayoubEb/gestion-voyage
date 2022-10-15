@extends('layouts.master')
@section('content')
<div @class('card')>
  <div @class(['card-header','py-2','d-flex','justify-content-between','align-items-center'])>
    <div @class(['card-title','m-0','fs-4'])>Modifier de voyage : {{ $voyage->nom }}</div>
    <div @class(['card-title-desc','m-0'])>
      <ul @class(['d-flex','align-items-center','list-unstyled','mb-0'])>
        <li>
          <a href="">
            <i @class(['mdi', 'mdi-home'])></i>
            <span>Acceuil</span>
          </a>
        </li>
        <li @class(['mx-2'])>
          <span @class(['fs-5'])>
            <i @class(['mdi', 'mdi-chevron-double-right'])></i>
          </span>
        </li>
        <li>
          <a href="{{ route('voyage.index') }}">
            <span>Lists du voyages</span>
          </a>
        </li>
        <li @class(['mx-2'])>
          <span @class(['fs-5'])>
            <i @class(['mdi', 'mdi-chevron-double-right'])></i>
          </span>
        </li>
        <li>
          <a href="{{ route('voyage.edit',$voyage->nom) }}">
            <span>Modifier de voyage : {{ $voyage->nom }}</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
  <div @class(['card-body', 'p-2'])>
    <form action="{{ route('voyage.update',$voyage) }}" method="post">
      @csrf
      @method("PUT")

      <div @class(['row','row-cols-1','row-cols-md-2','mb-md-2','mb-0'])>
        <div @class(['col','mb-md-0','mb-2'])>
          <table @class(['table','table-bordered','table-sm','mb-0'])>
            <tbody>
              <tr>
                <th @class('align-middle')>Nom</th>
                <td @class('p-0')>
                  <input type="text" name="nom" id="" class="form-control form-control-sm border-0 @error('nom') is-invalid @enderror" value="{{ $voyage->nom }}">
                </td>
              </tr>
              <tr>
                <th @class('align-middle')>Date du départ</th>
                <td @class('p-0')>
                  <input type="date" name="date_depart" id="" class="form-control form-control-sm border-0 @error('date_depart') is-invalid @enderror" value="{{ $voyage->date_depart }}">
                </td>
              </tr>
              <tr>
                <th @class('align-middle')>Date du retour</th>
                <td @class('p-0')>
                  <input type="date" name="date_retour" id="" class="form-control form-control-sm border-0 @error('date_retour') is-invalid @enderror" value="{{ $voyage->date_retour }}">
                </td>
              </tr>
              <tr>
                <th @class('align-middle')>L'heure du lancer</th>
                <td @class('p-0')>
                  <input type="time" name="heure_lance" id="" class="form-control form-control-sm border-0 @error('heure_lance') is-invalid @enderror" value="{{ $voyage->heure_lance }}">
                </td>
              </tr>
              <tr>
                <th @class('align-middle')>L'heure du retour</th>
                <td @class('p-0')>
                  <input type="time" name="heure_retour" id="" class="form-control form-control-sm border-0 @error('heure_retour') is-invalid @enderror" value="{{ $voyage->heure_retour }}">
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div @class(['col','mb-md-0','mb-2'])>
          <table @class(['table','table-bordered','table-sm','mb-0'])>
            <tbody>
              <tr>
                <th @class('align-middle')>Ville du départ</th>
                <td @class('p-0')>
                  <input type="text" name="ville_depart" id="" class="form-control form-control-sm border-0 @error('ville_depart') is-invalid @enderror" value="{{ $voyage->ville_depart }}">
                </td>
              </tr>
              <tr>
                <th @class('align-middle')>Ville du destination</th>
                <td @class('p-0')>
                  <input type="text" name="ville_destination" id="" class="form-control form-control-sm border-0 @error('ville_destination') is-invalid @enderror" value="{{ $voyage->ville_destination }}">
                </td>
              </tr>
              <tr>
                <th @class('align-middle')>Prix</th>
                <td @class('p-0')>
                  <input type="text" name="prix" id="" class="form-control form-control-sm border-0 @error('prix') is-invalid @enderror" value="{{ $voyage->prix.' DHS' }}">
                </td>
              </tr>
              <tr>
                <th @class('align-middle')>Jours du voyage</th>
                <td @class('p-0')>
                  <input type="text" name="nombre_jour" id="" class="form-control form-control-sm border-0 @error('nombre_jour') is-invalid @enderror" value="{{ $voyage->nombre_jour }}" readonly>
                </td>
              </tr>
              <tr>
                <th @class('align-middle')>Date du création</th>
                <td @class('p-0')>
                  <input type="date" name="" id="" class="form-control form-control-sm border-0" value="<?php echo date_format($voyage->created_at,"Y-m-d"); ?>" readonly>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <h5 @class(["text-info","my-2"])>
        Chauffeurs
      </h5>
      <div @class("table-responsive")>
        <table @class(["table","table-bordered","table-sm","m-0"])>
          <thead>
            <tr>
              <th>ID</th>
              <th>Nom</th>
              <th>Téléphone</th>
              <th>Email</th>
              <th>Expérience</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($chauffeurs as $chauffeur)
              <tr>
                <td>
                  <input type="radio" name="chauffeur" id="" value="{{ $chauffeur->id }}" {{
                    $voyage->chauffeur_id === $chauffeur->id ? 'checked':'' }}>
                </td>
                <td>{{ $chauffeur->nom }}</td>
                <td>{{ $chauffeur->telephone }}</td>
                <td>{{ $chauffeur->email }}</td>
                <td>{{ $chauffeur->experience }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <h5 @class(["text-info","my-2"])>
        Transport
      </h5>
      <div @class("table-responsive")>
        <table @class(["table","table-bordered","table-sm","m-0"])>
          <thead>
            <tr>
              <th>ID</th>
              <th>Matricule</th>
              <th>Capacité</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($transports as $transport)
              <tr>
                <td>
                  <input type="radio" name="transport" id="" value="{{ $transport->id }}" {{ $voyage->transport_id === $transport->id ? 'checked':'' }}>
                </td>
                <td>{{ $transport->matricule }}</td>
                <td>{{ $transport->capacite }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <h5 @class(["text-info","my-2"])>
        Hotel caractéristique
      </h5>
      <div @class("table-responsive")>
        <table @class(["table","table-sm","table-bordered"])>
          <thead>
            <tr>
              <th>ID</th>
              <th>Nom d'hotel</th>
              <th>Caractéristique</th>
              <th>Valeur</th>
              <th>Prix</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($hotel_caracteristique as $hotel_caracter)
              <tr>
                <td><input type="radio" name="hotel_caracteristique" id="" value="{{ $hotel_caracter->id }}" {{ $hotel_caracter->hotel_id === $hotel_caracter->hotel->id ? 'checked' : '' }}></td>
                <td>{{ $hotel_caracter->hotel->nom }}</td>
                <td>{{ $hotel_caracter->caracteristique->nom }}</td>
                <td>{{ $hotel_caracter->caracteristique_valeur->valeur }}</td>
                <td>{{ $hotel_caracter->prix.' DHS' }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div @class(['form-group','d-flex','justify-content-center'])>
        <button type="submit" @class(['btn','btn-success'])>Modifier</button>
      </div>
    </form>
  </div>
</div>
@endsection