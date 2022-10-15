@extends('layouts.master')
@section('content')
  <div @class('card')>
    <div @class(['card-body','p-2'])>
      <div @class(['d-flex','align-items-center','mb-2'])>
        <a href="{{ route('home') }}" @class(['btn','btn-outline-primary','btn-sm','me-2'])>
          <i @class(['mdi','mdi-home','mdi-18px'])></i>
        </a>
        <h4 @class(['m-0','ps-1','border','border-top-0','border-bottom-0','border-end-0','border-solid','border-3','border-info'])>
          Utilisateur : {{ $user->name }}
        </h4>
      </div>
      <div @class(['row','justify-content-center'])>
        <div @class(['col-lg-5'])>
          <div @class(['mb-2'])>
            <label for="" @class('form-label')>Name</label>
            <input type="text" @class(['form-control','form-control-sm']) readonly value="{{ $user->name }}">
          </div>
          <div @class(['mb-2'])>
            <label for="" @class('form-label')>Email</label>
            <input type="text" @class(['form-control','form-control-sm']) readonly value="{{ $user->email }}">
          </div>
          <div @class(['mb-2'])>
            <label for="" @class('form-label')>Téléphone</label>
            <input type="text" @class(['form-control','form-control-sm']) readonly value="{{ $user->phone }}">
          </div>
        </div>
      </div>
      <div @class(['d-flex', 'justify-content-between'])>
        <a href="{{ route('users.index') }}" @class(['btn','btn-sm','btn-success'])>Retour</a>
        <a href="{{ route('users.edit',$user) }}" @class(['btn','btn-sm','btn-primary'])>Modifier</a>
      </div>
    </div>
  </div>
@endsection