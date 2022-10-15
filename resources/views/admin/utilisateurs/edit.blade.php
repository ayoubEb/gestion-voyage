@extends('layouts.master')
@section('content')
@include('sweetalert::alert')
  <div class="card">
    <div class="card-body p-2">
      <div class="d-flex align-items-center mb-4">
        <a href="{{ route('home') }}" class="btn btn-outline-primary btn-sm me-2">
          <i class="mdi mdi-home mdi-18px"></i>
        </a>
        <h4 class="m-0 ps-1 border border-top-0 border-bottom-0 border-end-0 border-solid border-3 border-info">
          Modifier d'utilisateur : {{ $user->name }}
        </h4>
      </div>
        {{-- <a href="{{ route('users.create') }}" class="btn btn-outline-info d-flex align-items-center fw-bolder">
          <i class="mdi mdi-plus-circle-outline mdi-18px me-1"></i>
          <span>Ajouter un n'utilisateur</span>
        </a> --}}
      <form action="{{ route('user.update',$user) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="row justify-content-center mb-2">
          <div class="col-lg-3">
                <input type="file" name="photo" id="" class="form-control form-control-sm mb-1">
                  <img src="{{ "http://localhost:8000/images/user/".$user->photo }}" alt="" class="img-fluid rounded w-100">


          </div>
        </div>
        <div class="row row-cols-md-3 row-cols-1">
          <div class="col mb-2">
            <div class="form-group">
              <label for="" class="form-label">Name</label>
              <input type="text" name="name" id="" class="form-control form-control-sm @error('name') is-invalid @enderror" value="{{ $user->name }}" >
              @error('name')
                <strong class="invalid-feedback">{{ $message }}</strong>
              @enderror
            </div>
          </div>
          <div class="col mb-2">
            <div class="form-group">
              <label for="" class="form-label">Téléphone</label>
              <input type="text" name="telephone" id="" class="form-control form-control-sm @error('telephone') is-invalid @enderror" value="{{ $user->telephone }}">
              @error('telephone')
                <strong class="invalid-feedback">{{ $message }}</strong>
              @enderror
            </div>
          </div>
          <div class="col mb-2">
            <div class="form-group">
              <label for="" class="form-label">Role</label>
              <input type="text" name="role" id="" class="form-control form-control-sm' value="user" readonly>
            </div>
          </div>
          <div class="col mb-2">
            <div class="form-group">
              <label for="" class="form-label">Email</label>
              <input type="email" name="email" id="" class="form-control form-control-sm @error('email')
                is-invalid
              @enderror" value="{{ $user->email }}">
              @error('email')
              <strong class="invalid-feedback">{{ $message }}</strong>
              @enderror
            </div>
          </div>

          <div class="col mb-2">
            <label for="" class="form-label">Mot de passe</label>
            <div class="input-group input-group-sm">
              <input type="password" name="password" id="pwd" class="form-control form-control-sm mb-1 @error('password') is-invalid @enderror" placeholder="Mot de passe">
              <div class="input-group-append toggle-password">
                <span class="input-group-text mdi mdi-eye-outline mdi-18px py-0 px-2"></span>
              </div>
            </div>
            @error('password')
            <strong class="invalid-feedback">{{ $message }}</strong>
            @enderror
          </div>
          <div class="col mb-2">
            <label for="" class="form-label">Confirmer le mot de passe</label>
            <div class="input-group input-group-sm">
              <input id="password-confirm" type="password" class="form-control form-control-sm mb-1" name="password_confirmation" placeholder="Confirmer le mot de passe">
              <div class="input-group-append toggle-password">
                   <span class="input-group-text mdi mdi-eye-outline mdi-18px py-0 px-2"></span>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group mb-2">
          <label for="" class="form-label">Roles</label>
          {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control form-control-sm multiple')) !!}
        </div>
        <h5 class="text-center my-3 autre">Autre Information Remplir</h5>
        <div class="row row-cols-3">
          <div class="col mb-2">
            <div class="form-group">
              <label for="" class="form-label">CNIE</label>
              <input type="text" name="cnie" id="" class="form-control form-control-sm @error('cnie') is-invalid @enderror" value="{{ $user->cnie }}">
              @error('cnie')
              <strong class="invalid-feedback">{{ $message }}</strong>
              @enderror
            </div>
          </div>
          <div class="col mb-2">
            <div class="form-group">
              <label for="" class="form-label">Téléphone</label>
              <input type="text" name="telephone" id="" class="form-control form-control-sm @error('telephone') is-invalid @enderror" placeholder="téléphone" value="{{ $user->telephone }}">
              @error('telephone')
              <strong class="invalid-feedback">{{ $message }}</strong>
              @enderror
            </div>
          </div>
          <div class="col mb-2">
            <div class="form-group">
              <label for="" class="form-label">Adresse</label>
              <input type="text" name="adresse" id="" class="form-control form-control-sm @error('adresse') is-invalid @enderror" placeholder="adresse" value="{{ $user->adresse }}">
              @error('adresse')
                <strong class="invalid-feedback">{{ $message }}</strong>
              @enderror
            </div>
          </div>
          <div class="col mb-2">
            <div class="form-group">
              <label for="" class="form-label">Ville</label>
              <input type="text" name="ville" id="" class="form-control form-control-sm @error('ville') is-invalid @enderror" placeholder="ville" value="{{ $user->ville }}">
              @error('ville')
                <strong class="invalid-feedback">{{ $message }}</strong>
              @enderror
            </div>
          </div>
          <div class="col mb-2">
            <div class="form-group">
              <label for="" class="form-label">Nationalité</label>
              <input type="text" name="nationalite" id="" class="form-control form-control-sm @error('nationalite') is-invalid @enderror" placeholder="nationalité" value="{{ $user->nationalite }}">
              @error('nationalite')
                <strong class="invalid-feedback">{{ $message }}</strong>
              @enderror
            </div>
          </div>
          <div class="col mb-2">
            <div class="form-group">
              <label for="" class="form-label">Pays</label>
              <input type="text" name="pays" id="" class="form-control form-control-sm @error('pays') is-invalid @enderror" placeholder="pays" value="{{ $user->pays }}">
              @error('pays')
                <strong class="invalid-feedback">{{ $message }}</strong>
              @enderror
            </div>
          </div>
          <div class="col mb-2">
            <div class="form-group">
              <label for="" class="form-label">Travail</label>
              <select name="travail" id="" class="form-select form-select-sm @error('travail') is-invalid @enderror">
                <option value="">Choisir le travail d'employés</option>
                <option value="intérieur" {{ $user->travail == 'intérieur' ? 'selected':'' }}>A l'intérieur de l'agence</option>
              </select>
              @error('travail')
                <strong class="invalid-feedback">{{ $message }}</strong>
              @enderror
            </div>
          </div>
          <div class="col mb-2">
            <div class="form-group">
              <label for="" class="form-label">Poste</label>
              <select name="poste" id="poste" class="form-select form-select-sm @error('poste') is-invalid @enderror">
                <option value="">Choisir le poste a l'extérieur de l'agence</option>
                <option value="Employée de réservation voyages" {{ $user->poste == 'Employée de réservation voyages' ? 'selected':'' }}>Employée de réservation voyages</option>
                <option value="Sécritaire" {{ $user->poste == 'Sécritaire' ? 'selected':'' }}>Sécritaire</option>
                <option value="Chef agence" {{ $user->poste == 'Chef agence' ? 'selected':'' }}>Chef Agence</option>
              </select>
              @error('poste')
                <strong class="invalid-feedback">{{ $message }}</strong>
              @enderror
            </div>
          </div>
          <div class="col mb-2">
            <div class="form-group">
              <label for="" class="form-label">Genre</label>
              <select name="genre" id="" class="form-select form-select-sm @error('genre') is-invalid @enderror">
                <option value="">Choisir le genre</option>
                <option value="homme" {{ $user->genre=="homme" ? 'selected':'' }}>Homme</option>
                <option value="femme" {{ $user->genre=="femme" ? 'selected':'' }}>Femme</option>
              </select>
              @error('genre')
                <strong class="invalid-feedback">{{ $message }}</strong>
              @enderror
            </div>
          </div>
        </div>

        <div class="d-flex justify-content-between">
          <a href="{{ route('user.index') }}" class="btn btn-sm btn-success">Retour</a>
          <button type="submit" class="btn btn-sm btn-primary">Modifier</button>
        </div>
      </form>
    </div>
  </div>
@endsection
@section('script')
<script>
  $(document).ready(function(){
    $('.toggle-password').click(function(){
    $(this).children().toggleClass('mdi-eye-outline mdi-eye-off-outline');
    let input = $(this).prev();
    input.attr('type', input.attr('type') === 'password' ? 'text' : 'password');
});

  })
</script>
@endsection
