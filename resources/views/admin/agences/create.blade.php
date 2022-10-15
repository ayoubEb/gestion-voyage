@extends('layouts.master')
@section('content')
<div @class('card')>
  <div @class(['card-body','p-2'])>
    <div @class(['d-flex','align-items-center','mb-4'])>
      <a href="{{ route('home') }}" @class(['btn','btn-outline-primary','btn-sm','me-2'])>
        <i @class(['mdi','mdi-home','mdi-18px'])></i>
      </a>
      <h4 @class(['m-0','ps-1','border','border-top-0','border-bottom-0','border-end-0','border-solid','border-3','border-info'])>
        Ajouter un agence
      </h4>
    </div>
    <form action="{{ route('agence.store') }}" method="post">
      @csrf
      <div @class(['row','row-cols-1','row-cols-md-2','mb-md-2','mb-0'])>
        <div @class(['col','mb-md-0','mb-2'])>
          <input type="text" name="nom" id="" class="form-control form-control-sm @error('nom')
            is-invalid
          @enderror" value="{{ old('nom') }}" placeholder="nom">
          @error('nom')
            <strong @class('invalid-feedback')>{{ $message }}</strong>
          @enderror
        </div>
        <div @class(['col','mb-md-0','mb-2'])>
          <input type="email" name="email" id="" class="form-control form-control-sm @error('email')
            is-invalid
          @enderror" value="{{ old('email') }}" placeholder="email">
          @error('email')
            <strong @class('invalid-feedback')>{{ $message }}</strong>
          @enderror
        </div>
      </div>
      <div @class(['row','row-cols-1','row-cols-md-2','mb-md-2','mb-0'])>
        <div @class(['col','mb-md-0','mb-2'])>
          <input type="text" name="adresse" id="" class="form-control form-control-sm @error('adresse')
            is-invalid
          @enderror" value="{{ old('adresse') }}" placeholder="adresse">
          @error('adresse')
            <strong @class('invalid-feedback')>{{ $message }}</strong>
          @enderror
        </div>
        <div @class(['col','mb-md-0','mb-2'])>
          <input type="text" name="ville" id="" class="form-control form-control-sm @error('ville')
            is-invalid
          @enderror" value="{{ old('ville') }}" placeholder="ville">
          @error('ville')
            <strong @class('invalid-feedback')>{{ $message }}</strong>
          @enderror
        </div>
      </div>
      <div @class(['row','row-cols-1','row-cols-md-2','mb-md-2','mb-0'])>
        <div @class(['col','mb-md-0','mb-2'])>
          <input type="text" name="patente" id="" class="form-control form-control-sm @error('patente')
            is-invalid
          @enderror" value="{{ old('patente') }}" placeholder="patente">
          @error('patente')
            <strong @class('invalid-feedback')>{{ $message }}</strong>
          @enderror
        </div>
        <div @class(['col','mb-md-0','mb-2'])>
          <input type="text" name="ice" id="" class="form-control form-control-sm @error('ice')
            is-invalid
          @enderror" value="{{ old('ice') }}" placeholder="ice">
          @error('ice')
            <strong @class('invalid-feedback')>{{ $message }}</strong>
          @enderror
        </div>
      </div>
      <div @class(['d-flex','justify-content-between'])>
        <a href="{{ route('agence.index') }}" @class(['btn','btn-primary','btn-sm'])>Retour</a>
        <button type="submit" @class(['btn','btn-success','btn-sm'])>Enregistrer</button>
      </div>
    </form>
  </div>
@endsection