@extends('layouts.master')
@section('content')
<div @class('card')>
  <div @class(['card-header','py-2','d-flex','justify-content-between','align-items-center'])>
    <div @class(['card-title','m-0','fs-4'])>Modifier du hotel : {{ $hotel->nom }}</div>
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
          <a href="{{ route('hotel.index') }}">
            <span>Liste du hotels</span>
          </a>
        </li>
        <li @class(['mx-2'])>
          <span @class(['fs-5'])>
            <i @class(['mdi', 'mdi-chevron-double-right'])></i>
          </span>
        </li>
        <li>
          <a href="{{ route('hotel.edit',$hotel) }}">
            <span>Modifier du hotel : {{ $hotel->nom }}</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
  <div @class(['card-body', 'p-2'])>
    <form action="{{ route('hotel.update',$hotel) }}" method="post">
      @csrf
      @method("PUT")
      <div @class(['row','row-cols-2','row-cols-1','mb-md-2','mb-0'])>
        <div @class(['col','mb-md-0','mb-2'])>
          <div @class('form-group')>
            <label for="" @class('form-label')>Nom</label>
            <input type="text" name="nom" id="" class="form-control @error('nom')
            is-invalid
            @enderror" value="{{ $hotel->nom ?? '' }}">
            @error('nom')
              <strong @class('invalid-feedback')>{{ $message }}</strong>
            @enderror
          </div>
        </div>
        <div @class(['col','mb-md-0','mb-2'])>
          <div @class('form-group')>
            <label for="" @class('form-label')>Email</label>
            <input type="email" name="email" id="" class="form-control @error('email')
              is-invalid
            @enderror" value="{{ $hotel->email }}">
            @error('email')
              <strong @class('invalid-feedback')>{{ $message }}</strong>
            @enderror
          </div>
        </div>
      </div>
      <div @class(['row','row-cols-2','row-cols-1','mb-md-2','mb-0'])>
        <div @class(['col','mb-md-0','mb-2'])>
          <div @class('form-group')>
            <label for="" @class('form-label')>Adresse</label>
            <input type="text" name="adresse" id="" class="form-control @error('adresse')
              is-invalid
            @enderror" value="{{ $hotel->adresse }}">
            @error('adresse')
              <strong @class('invalid-feedback')>{{ $message }}</strong>
            @enderror
          </div>
        </div>
        <div @class(['col','mb-md-0','mb-2'])>
          <div @class('form-group')>
            <label for="" @class('form-label')>Ville</label>
            <input type="text" name="ville" id="" class="form-control @error('ville')
              is-invalid
            @enderror" value="{{ $hotel->ville }}">
            @error('ville')
              <strong @class('invalid-feedback')>{{ $message }}</strong>
            @enderror
          </div>
        </div>
      </div>
      <div @class(['row','row-cols-2','row-cols-1','mb-md-2','mb-0'])>
        <div @class(['col','mb-md-0','mb-2'])>
          <div @class('form-group')>
            <label for="" @class('form-label')>Téléphone</label>
            <input type="text" name="telephone" id="" class="form-control @error('telephone')
              is-invalid
            @enderror" value="{{ $hotel->telephone }}">
            @error('telephone')
              <strong @class('invalid-feedback')>{{ $message }}</strong>
            @enderror
          </div>
        </div>
        <div @class(['col','mb-md-0','mb-2'])>
          <div @class('form-group')>
            <label for="" @class('form-label')>Fix</label>
            <input type="text" name="fix" id="" class="form-control @error('fix')
              is-invalid
            @enderror" value="{{ $hotel->fix }}">
            @error('fix')
              <strong @class('invalid-feedback')>{{ $message }}</strong>
            @enderror
          </div>
        </div>
      </div>
      <div @class(['form-group','d-flex','justify-content-center'])>
        <button type="submit" @class(['btn','btn-info'])>Modfier</button>
      </div>
    </form>
  </div>
</div>
@endsection