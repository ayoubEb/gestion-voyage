@extends('layouts.master')
@section('content')
<div @class('card')>
  <div @class(['card-body','p-2'])>
    <form action="{{ route('profil.update',Auth::user()->email) }}" method="post">
      @csrf
      @method("PUT")
      <div @class(['row','justify-content-center'])>
        <div @class('col-lg-10')>
          <div @class(['row','row-cols-2','mb-2'])>
            <div @class(['col','mb-2'])>
              <div @class('form-group')>
                <label for="" @class('form-label')>Name</label>
                <input type="text" name="name" id="" value="{{ Auth::user()->name }}" class="form-control form-control-sm">
              </div>
            </div>
            <div @class(['col','mb-2'])>
              <div @class('form-group')>
                <label for="" @class('form-label')>E-mail</label>
                <input type="email" name="email" id="" value="{{ Auth::user()->email }}" class="form-control form-control-sm">
              </div>
            </div>

            <div @class(['col','mb-2'])>
              <div @class('form-group')>
                <label for="" @class('form-label')>Téléphone</label>
                <input type="text" name="phone" id="" value="{{ Auth::user()->phone }}" class="form-control form-control-sm">
              </div>
            </div>
            <div @class(['col','mb-2'])>
              <div @class('form-group')>
                <label for="" @class('form-label')>Rôle</label>
                <input type="text" name="role" id="" readonly value="{{ Auth::user()->role }}" class="form-control form-control-sm">
              </div>
            </div>

            <div @class(['col','mb-2'])>
              <div @class('form-group')>
                <label for="" @class('form-label')>Mot de passe</label>
                <input type="password" name="password" id=""  class="form-control form-control-sm">
              </div>
            </div>
            <div @class(['col','mb-2'])>
              <div @class('form-group')>
                <label for="" @class('form-label')>Confirmer le mot de passe</label>
                <input type="password" name="password_confirm" id="" class="form-control form-control-sm">
              </div>
            </div>
          </div>
          <h5>Autre information</h5>
        </div>
      </div>
      <div @class(['d-flex','justify-content-center'])>
        <button type="submit" @class(['btn','btn-sm','btn-info'])>Modifier</button>
      </div>
    </form>
  </div>
</div>
@endsection