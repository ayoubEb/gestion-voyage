@extends('layouts.master')
@section('content')
  <div @class('card')>
    <div @class(['card-body','p-2'])>
      <div @class(['d-flex','align-items-center','mb-4'])>
        <a href="{{ route('home') }}" @class(['btn','btn-outline-primary','btn-sm','me-2'])>
          <i @class(['mdi','mdi-home','mdi-18px'])></i>
        </a>
        <h4 @class(['m-0','ps-1','border','border-top-0','border-bottom-0','border-end-0','border-solid','border-3','border-info'])>
          Voyage organisé : {{ $voyageOrganise->reference }}
        </h4>
      </div>
      <h5 @class(['title','fw-bolder','mb-2'])>
        <i @class(['mdi','mdi-arrow-right-drop-circle-outline'])></i>
        <span>Voyage Oragnisé</span>
      </h5>
      <div @class(['row'])>
        <div @class(['col-lg-9'])>
          <div @class(['row','row-cols-2'])>
            <div @class(['col','mb-2'])>
              <table @class(['table','table-bordered','table-sm','m-0'])>
                <tbody>
                  <tr>
                    <th @class(['bg-light'])>Nom</th>
                    <td>{{ $voyageOrganise->nom }}</td>
                  </tr>
                  <tr>
                    <th @class(['bg-light'])>Référence</th>
                    <td>{{ $voyageOrganise->reference }}</td>
                  </tr>
                  <tr>
                    <th @class(['bg-light'])>Ville destination</th>
                    <td>{{ $voyageOrganise->ville_destination }}</td>
                  </tr>
                  <tr>
                    <th @class(['bg-light'])>Pays destination</th>
                    <td>{{ $voyageOrganise->pays_destination }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div @class(['col','mb-2'])>
              <table @class(['table','table-bordered','table-sm','m-0'])>
                <tbody>
                  <tr>
                    <th @class(['bg-light'])>Date Départ</th>
                    <td>{{ $voyageOrganise->date_depart }}</td>
                  </tr>
                  <tr>
                    <th @class(['bg-light'])>Date retour</th>
                    <td>{{ $voyageOrganise->date_retour }}</td>
                  </tr>
                  <tr>
                    <th @class(['bg-light'])>Nombre jours</th>
                    <td>{{ $voyageOrganise->nombre_jour }}</td>
                  </tr>
                  <tr>
                    <th @class(['bg-light'])>Prix</th>
                    <td>{{ $voyageOrganise->prix.' DHS' }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div @class(['col','w-100'])>
            <table @class(['table','table-bordered','table-sm','m-0'])>
              <tbody>
                <tr>
                  <th @class(['bg-light'])>Description</th>
                  <td>{{ $voyageOrganise->description }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div @class(['col-lg-3'])>
          <div @class(['card'])>
            <div @class(['card-body','p-1'])>
              <img src="{{ asset('images/voyage_organisés/'.$voyageOrganise->image) }}" alt="" @class(['img-fluid'])>
            </div>
          </div>
        </div>
      </div>
      <h5 @class(['title','fw-bolder','mt-3','mb-2'])>
        <i @class(['mdi','mdi-arrow-right-drop-circle-outline'])></i>
        <span>Caractéristiques</span>
      </h5>
      <div @class(['row','row-cols-4'])>
        @foreach ($voyageOrganise->voyage_caracteristique as $voyage_caracter)
        <div @class(['col'])>
          <input type="text" @class(['form-control','form-control-sm']) readonly value="{{ $voyage_caracter->caracteristique->nom }}">
        </div>
        @endforeach
      </div>
      <h5 @class(['title','fw-bolder','mt-3','mb-2'])>
        <i @class(['mdi','mdi-arrow-right-drop-circle-outline'])></i>
        <span>Programme</span></h5>
      <div @class(['col'])>
        <div @class(['table-reponsive'])>
          <table @class(['table','table-bordered','table-sm'])>
            <thead>
              <tr>
                <th>Jours</th>
                <th>Titre</th>
                <th>Description</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($voyageOrganise->voyage_programme as $voyage_programme)
                <tr>
                  <td @class(['text-primary','fw-bolder'])>{{ 'jour : '.$voyage_programme->jours }}</td>
                  <td>{{ $voyage_programme->titre }}</td>
                  <td>{{ $voyage_programme->description }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div @class(['d-flex','justify-content-between'])>
        <a href="{{ route('voyageOrganise.index') }}" @class(['btn','btn-sm','btn-primary'])>Retour</a>
        <a href="{{ route('voyageOrganise.edit',$voyageOrganise) }}" @class(['btn','btn-sm','btn-outline-info'])>Modifier</a>
      </div>
    </div>
  </div>
@endsection