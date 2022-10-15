@extends('layouts.master')
@section('content')
  <div @class('card')>
    <div @class(['card-body','p-2'])>
      <div @class(['d-flex','align-items-center','mb-2'])>
        <a href="{{ route('home') }}" @class(['btn','btn-outline-primary','btn-sm','me-2'])>
          <i @class(['mdi','mdi-home','mdi-18px'])></i>
        </a>
        <h4 @class(['m-0','ps-1','border','border-top-0','border-bottom-0','border-end-0','border-solid','border-3','border-info'])>
          Modifier transport : {{ $transport->matricule }}
        </h4>
      </div>
      <div @class(['row','justify-content-center'])>
        <div @class(['col-md-6'])>
          <form action="{{ route('transport.update',$transport->matricule) }}" method="post">
            @csrf
            @method("PUT")
            <div @class(['form-group','mb-2'])>
              <label for="" @class('form-label')>Matricule</label>
              <input type="text" name="matricule" id="" @class(['form-control','form-control-sm']) value="{{ $transport->matricule }}">
            </div>
            <div @class(['form-group','mb-2'])>
              <label for="" @class('form-label')>Capacité</label>
              <input type="number" name="capacite" id="" @class(['form-control','form-control-sm']) value="{{ $transport->capacite }}">
            </div>
            <div @class(['form-group','d-flex','justify-content-between'])>
              <a href="{{ route('transport.index') }}" @class(['btn','btn-sm','btn-primary'])>Retour</a>
              <button type="submit" @class(['btn','btn-info','btn-sm'])>Modifier</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection