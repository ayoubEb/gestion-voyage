@extends('layouts.master')
@section('content')
<div @class('card')>
  <div @class(['card-body'])>
          <p @class('mb-2')>
            <span @class('fw-bolder')>Name : </span>
            <span>{{ Auth::user()->name }}</span>
          </p>
          <p @class('mb-2')>
            <span @class('fw-bolder')>E-mail : </span>
            <span>{{ Auth::user()->email }}</span>
          </p>
          <p @class('mb-2')>
            <span @class('fw-bolder')>Téléphone : </span>
            <span>{{ Auth::user()->phone }}</span>
          </p>
          <p @class('mb-2')>
            <span @class('fw-bolder')>Rôle : </span>
            <span>{{ Auth::user()->role }}</span>
          </p>
          <a href="{{ route('profil.edit',Auth::user()->email ) }}" @class(['btn','btn-sm','btn-info'])>Modifier</a>



  </div>
</div>
@endsection