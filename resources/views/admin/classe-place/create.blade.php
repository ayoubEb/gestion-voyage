@extends('layouts.master')
@section('content')
  <div @class('card')>
    <div @class(["card-body","p-2"])>
      <div @class(['d-flex','align-items-center',"mb-3"])>
        <a href="{{ route('home') }}" @class(['btn','btn-outline-primary','btn-sm','me-2'])>
          <i @class(['mdi','mdi-home','mdi-18px'])></i>
        </a>
        <h4 @class(['m-0','ps-1','border','border-top-0','border-bottom-0','border-end-0','border-solid','border-3','border-info'])>
          Ajouter du classes places
        </h4>
      </div>
      <form action="" method="post">
        <div @class(['row','justify-content-center'])>
          <div @class(['col-lg-4'])>
            <div @class(["form-group","mb-2"])>
              <label for="" @class('form-label')>Classes</label>
              <select name="" id="" class="form-select form-select-sm">
                <option value="">Choisir du classe</option>
                @foreach ($avionClasse as $item)
                  <option value="{{ $item->id }}">{{ $item->classe }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection