@extends('layouts.master')
@section('content')
  <div @class('card')>
    <div @class(['card-header','py-2','d-flex','justify-content-between','align-items-center'])>
      <div @class(['card-title','m-0','fs-4'])>Voyage : {{ $voyage->nom }}</div>
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
            <a href="{{ route('voyage.show',$voyage->nom) }}">
              <span>Voyage : {{ $voyage->nom }}</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div @class(['card-body','p-2'])>
      <div @class(["row","row-cols-md-2","row-cols-1"])>
        <div @class('col')>
          <table @class(['table','mb-0','table-bordered','table-sm'])>
            <tr>
              <th>Nom</th>
              <td>{{ $voyage->nom }}</td>
            </tr>
            <tr>
              <th>Date du départ</th>
              <td>{{ $voyage->date_depart }}</td>
            </tr>
            <tr>
              <th>Date du retour</th>
              <td>{{ $voyage->date_retour }}</td>
            </tr>
            <tr>
              <th>L'heure du lancer</th>
              <td>{{ $voyage->heure_lance }}</td>
            </tr>
            <tr>
              <th>L'heure du retour</th>
              <td>{{ $voyage->heure_retour }}</td>
            </tr>
          </table>
        </div>
        <div @class('col')>
          <table @class(['table','mb-0','table-bordered','table-sm'])>
            <tr>
              <th>Ville du départ</th>
              <td>{{ $voyage->ville_depart }}</td>
            </tr>
            <tr>
              <th>Ville du destination</th>
              <td>{{ $voyage->ville_destination }}</td>
            </tr>
            <tr>
              <th>Prix</th>
              <td>{{ $voyage->prix.' DHS' }}</td>
            </tr>
            <tr>
              <th>Jours du voyage</th>
              <td>{{ $voyage->nombre_jour }}</td>
            </tr>
            <tr>
              <th>Date création</th>
              <td>{{ date('d-m-Y',strtotime($voyage->created_at)) }}</td>
            </tr>
          </table>
        </div>
      </div>
      <h5 @class(["text-info","text-center","my-2"])>
        <i @class(["mdi","mdi-svg"])></i>
        <span>Chauffeur</span>
        <i @class(["mdi","mdi-svg"])></i>
      </h5>
      <div @class(["row","row-cols-md-2","row-cols-1"])>
        <div @class('col')>
          <table @class(['table','table-bordered','table-sm','m-0'])>
            <tbody>
              <tr>
                <th>Nom</th>
                <td>{{ $voyage->chauffeur->nom }}</td>
              </tr>
              <tr>
                <th>Email</th>
                <td>{{ $voyage->chauffeur->email }}</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div @class('col')>
          <table @class(['table','table-bordered','table-sm','m-0'])>
            <tbody>
              <tr>
                <th>Téléphone</th>
                <td>{{ $voyage->chauffeur->telephone }}</td>
              </tr>
              <tr>
                <th>Expérience</th>
                <td>{{ $voyage->chauffeur->experience.' ans' }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <h5 @class(["text-info","text-center","my-2"])>
        <i @class(["mdi","mdi-svg"])></i>
        <span>Transport</span>
        <i @class(["mdi","mdi-svg"])></i>
      </h5>
      <table @class(['table','table-bordered','table-sm','m-0 '])>
        <thead>
          <tr>
            <th>Matricule</th>
            <th>Capacité</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{ $voyage->transport->matricule }}</td>
            <td>{{ $voyage->transport->capacite }}</td>
          </tr>
        </tbody>
      </table>
      <h5 @class(["text-info","text-center","my-2"])>
        <i @class(["mdi","mdi-svg"])></i>
        <span>Hotel</span>
        <i @class(["mdi","mdi-svg"])></i>
      </h5>
      <div @class(["row","row-cols-md-2","row-cols-1"])>
        <div @class("col")>
          <table @class(['table','table-bordered','table-sm','m-0'])>
            <tbody>
              <tr>
                <th>Nom</th>
                <td>{{ $voyage->hotel_caracter->hotel->nom }}</td>
              </tr>
              <tr>
                <th>Email</th>
                <td>{{ $voyage->hotel_caracter->hotel->email }}</td>
              </tr>
              <tr>
                <th>Adresse</th>
                <td>{{ $voyage->hotel_caracter->hotel->adresse }}</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div @class("col")>
          <table @class(['table','table-bordered','table-sm','m-0'])>
            <tbody>
              <tr>
                <th>Ville</th>
                <td>{{ $voyage->hotel_caracter->hotel->ville }}</td>
              </tr>
              <tr>
                <th>Téléphone</th>
                <td>{{ $voyage->hotel_caracter->hotel->telephone }}</td>
              </tr>
              <tr>
                <th>Fix</th>
                <td>{{ $voyage->hotel_caracter->hotel->fix }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <h5 @class(["text-info","text-center","my-2"])>
        <i @class(["mdi","mdi-svg"])></i>
        <span>Hotel caractéristique</span>
        <i @class(["mdi","mdi-svg"])></i>
      </h5>
      <table @class(['table','table-bordered','table-sm'])>
        <thead>
          <tr>
            <th>Nom d'hotel</th>
            <th>Caractéristique</th>
            <th>Valeur</th>
            <th>Prix</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{ $voyage->hotel_caracter->hotel->nom }}</td>
            <td>{{ $voyage->hotel_caracter->caracteristique->nom }}</td>
            <td>{{ $voyage->hotel_caracter->caracteristique_valeur->valeur }}</td>
            <td>{{ $voyage->hotel_caracter->prix.' DHS' }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
@endsection