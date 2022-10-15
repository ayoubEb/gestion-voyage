@extends('layouts.master')
@section('content')
<div @class('card')>
  <div @class(['card-header','py-2','d-flex','justify-content-between','align-items-center'])>
    <div @class(['card-title','m-0','fs-5'])>
        Modifier client : {{ $client->name }}
    </div>
    <div @class(['card-title-desc','m-0'])>
      <ul @class(['list-unstyled','m-0','d-flex','justify-content-between'])>
        <li>
          <a href="{{ route('home') }}">
            <i @class(['mdi','mdi-home'])></i>
            <span>Acceuil</span>
          </a>
        </li>
        <li @class('mx-2')>
          <i @class(['mdi','mdi-chevron-double-right'])></i>
        </li>
        <li>
          <a href="{{ route('client.index') }}">
            Liste du clients
          </a>
        </li>
        <li @class('mx-2')>
          <i @class(['mdi','mdi-chevron-double-right'])></i>
        </li>
        <li>
          <a href="{{ route('client.edit',$client) }}">
            Modifer client : {{ $client->name }}
          </a>
        </li>
      </ul>
    </div>
  </div>
  <div @class(['card-body','p-2'])>
    <div @class(['row','justify-content-center'])>
      <div @class('col-lg-8 ')>
        <form action="{{ route('client.update',$client) }}" method="post">
          @csrf
          @method("PUT")
          <div @class(['row','row-cols-2','mb-2'])>
            <div @class('col')>
              <div @class('form-group')>
                <label for="" @class('form-label')>Name</label>
                <input type="text" name="name" id="" value="{{ $client->name }}" class="form-control form-control-sm @error('name') is-invalid @enderror">
              </div>
            </div>
            <div @class('col')>
              <div @class('form-group')>
                <label for="" @class('form-label')>Téléphone</label>
                <input type="text" name="telephone" id="" value="{{ $client->telephone }}" class="form-control form-control-sm @error('telephone') is-invalid @enderror">
              </div>
            </div>
          </div>
          <div @class(['row','row-cols-2','mb-2'])>
            <div @class('col')>
              <div @class('form-group')>
                <label for="" @class('form-label')>E-mail</label>
                <input type="email" name="email" id="" value="{{ $client->email }}" class="form-control form-control-sm @error('email') is-invalid @enderror">
              </div>
            </div>
            <div @class('col')>
              <div @class('form-group')>
                <label for="" @class('form-label')>Genre</label>
                <select name="genre" id="" class="form-select form-select-sm ">
                  <option value="">Choisir le genre</option>
                  <option value="homme" {{ $client->genre==="homme" ? 'selected':'' }}>Homme</option>
                  <option value="femme" {{ $client->genre==="femme" ? 'selected':'' }}>Femme</option>
                </select>
              </div>
            </div>
          </div>
          <div @class(['d-flex','justify-content-center'])>
              <button type="submit" @class(['btn','btn-sm','btn-info'])>Modifier</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection