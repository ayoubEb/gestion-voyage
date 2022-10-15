@extends('layouts.master')
@section('content')
  <div @class('card')>
    <div @class(['card-body','p-2'])>
      <div @class(['d-flex','align-items-center','mb-2'])>
        <a href="{{ route('home') }}" @class(['btn','btn-outline-primary','btn-sm','me-4'])>
          <i @class(['mdi','mdi-home','mdi-18px'])></i>
        </a>
        <h4 @class(['m-0','ps-1','border','border-top-0','border-bottom-0','border-end-0','border-solid','border-3','border-info'])>
          Modifier Voyage Organisés : {{ $voyageOrganise->reference }}
        </h4>
      </div>
      <form action="{{ route('voyageOrganise.store') }}" method="post">
        @csrf
        <div @class(['row'])>
          <div @class(['col-lg-8'])>
            <div @class(['row','row-cols-2','mb-2'])>
              <div @class(['col'])>
                <div @class('form-group')>
                  <label for="" @class('form-label')>Ville destination</label>
                  <input type="text" name="ville_destination" id="" class="form-control form-control-sm @error('ville_destination') is-invalid @enderror" value="{{ $voyageOrganise->ville_destination }}">
                  @error('ville_destination')
                    <strong @class('invalid-feedback')>{{ $message }}</strong>
                  @enderror
                </div>
              </div>
              <div @class(['col'])>
                <div @class('form-group')>
                  <label for="" @class('form-label')>Nombre du jour</label>
                  <input type="number" name="nombre_jour" min="1" id="" class="form-control form-control-sm @error('nombre_jour') is-invalid @enderror" value="{{ $voyageOrganise->nombre_jour }}">
                  @error('nombre_jour')
                    <strong @class('invalid-feedback')>{{ $message }}</strong>
                  @enderror
                </div>
              </div>
            </div>
            <div @class(['row','row-cols-2','mb-2'])>
              <div @class(['col'])>
                <div @class('form-group')>
                  <label for="" @class('form-label')>Date départ</label>
                  <input type="date" name="date_depart" id="" class="form-control form-control-sm @error('date_depart') is-invalid @enderror" value="{{ $voyageOrganise->date_depart }}">
                  @error('date_depart')
                    <strong @class('invalid-feedback')>{{ $message }}</strong>
                  @enderror
                </div>
              </div>
              <div @class(['col'])>
                <div @class('form-group')>
                  <label for="" @class('form-label')>Date retour</label>
                  <input type="date" name="date_retour" id="" class="form-control form-control-sm @error('date_retour') is-invalid @enderror" value="{{ $voyageOrganise->date_retour }}">
                  @error('date_retour')
                    <strong @class('invalid-feedback')>{{ $message }}</strong>
                  @enderror
                </div>
              </div>
            </div>
            <div @class(['row','row-cols-2','mb-2'])>
              <div @class(['col'])>
                <div @class('form-group')>
                  <label for="" @class('form-label')>Prix</label>
                  <input type="text" name="prix" id="" class="form-control form-control-sm @error('prix') is-invalid @enderror" value="{{ $voyageOrganise->prix }}">
                  @error('prix')
                    <strong @class('invalid-feedback')>{{ $message }}</strong>
                  @enderror
                </div>
              </div>
              <div @class(['col'])>
                <div @class('form-group')>
                  <label for="" @class('form-label')>Description</label>
                  <input type="text" name="description" id="" class="form-control form-control-sm @error('description') is-invalid @enderror" value="{{ $voyageOrganise->descrption }}">
                  @error('description')
                    <strong @class('invalid-feedback')>{{ $message }}</strong>
                  @enderror
                </div>
              </div>
            </div>
          </div>
          <div @class(['col-lg-4'])>
            <div @class(['card','border','border-solid','border-1','border-secondary'])>
              <div @class(['card-header'])>
                <h5 @class('m-0')>Les caractéristiques</h5>
              </div>
              <div @class(['card-body','p-2'])>
                {{-- <label>{{ Form::checkbox('caracter[]', $caracter->caracter, in_array($caracter, $rolePermissions) ? true : false, array('class' => 'name')) }}
                  {{ $value->name }}</label> --}}
                @foreach ($caracteristiques as $caracter)
                  <div @class(['form-check','p-0'])>
                    <input type="checkbox" name="caracter[]" id="{{ $caracter->id }}" value="{{ $caracter->id }}">
                    <label for="{{ $caracter->id }}" @class(['form-label','m-0'])>{{ $caracter->nom }}</label>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
        <div @class(['d-flex','justify-content-between'])>
          <a href="{{ route('voyageOrganise.index') }}" @class(['btn','btn-sm','btn-primary'])>Retour</a>
          <button type="submit" @class(['btn','btn-sm','btn-info'])>Enregistrer</button>
        </div>
      </form>
    </div>
  </div>
@endsection