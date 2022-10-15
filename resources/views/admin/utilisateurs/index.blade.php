
@extends('layouts.master')
@section('content')
@include('sweetalert::alert')
<div class="d-flex justify-content-between align-items-center mb-2">
  <h5 class="text-uppercase m-0 px-1 title py-1 rounded">
    liste d'utilisateurs
   </h5>
  </h5>
  <a href="{{ route('user.create') }}" class="btn btn-info btn-sm waves-effect waves-light px-3 py-0 ">
    <i class="mdi mdi-account-plus mdi-18px align-middle"></i>
    <span>Ajouter</span>
  </a>
</div>
<div class="card">
  <div class="card-body p-2">

    <div class="table-responsive">
      <table id="datatable" class="table table-bordered table-sm mb-0">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Date of creation</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($users as $user)
          @if (Auth::user()->id != $user->id)
            <tr>
              <td @class('align-middle')>{{ $user->name ?? '' }}</td>
              <td @class('align-middle')>{{ $user->email ?? '' }}</td>
              <td @class('align-middle')>{{ $user->phone ?? '' }}</td>
              <td @class('align-middle')>{{ date('d-m-Y',strtotime($user->created_at)) }}</td>
              <td @class('align-middle')>
                <a href="{{ route('user.edit',$user) }}" class="btn waves-effect waves-light btn-info p-1 py-0"><i class="mdi mdi-account-edit"></i></a>
                <button type="button" class="btn waves-effect waves-light btn-danger p-1 py-0" data-bs-toggle="modal" data-bs-target=".del{{'-'.$user->id }}">
                  <i class="mdi mdi-account-remove"></i>
                </button>
                <button type="button" class="btn waves-effect waves-light btn-info p-1 py-0" data-bs-toggle="modal" data-bs-target=".show{{'-'.$user->id }}">
                  <i class="mdi mdi-account-details" ></i>
                </button>
                <a href="{{ route('carte-user',$user) }}" class="btn waves-effect waves-light btn-info p-1 py-0">
                  <i class="mdi mdi-badge-account-horizontal"></i>
                </a>
              </td>
            </tr>
          @endif
            {{-- model show --}}
            <div class="modal fade show{{'-'.$user->id }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog  modal-lg">
                <div class="modal-content">
                  <div class="modal-header bg-info py-2">
                      <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Employé : {{ $user->name}}</h5>
                      {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                  </div>
                  <div class="modal-body p-2">
                    <div class="row row-cols-2">
                      <div class="col mb-2">
                        <ul class="list-group">
                          <li class="list-group-item p-0">
                            <div class="row m-0">
                              <div class="col-lg-4 py-1 bg-light fw-bolder">
                                Name
                              </div>
                              <div class="col py-1">
                                {{ $user->name }}
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                      <div class="col mb-2">
                        <ul class="list-group">
                          <li class="list-group-item p-0">
                            <div class="row m-0">
                              <div class="col-lg-4 py-1 bg-light fw-bolder">
                                E-mail
                              </div>
                              <div class="col py-1">
                                {{ $user->email }}
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                      <div class="col mb-2">
                        <ul class="list-group">
                          <li class="list-group-item p-0">
                            <div class="row m-0">
                              <div class="col-lg-4 py-1 bg-light fw-bolder">
                                Rôle
                              </div>
                              <div class="col py-1">
                                {{ $user->role }}
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                      <div class="col mb-2">
                        <ul class="list-group">
                          <li class="list-group-item p-0">
                            <div class="row m-0">
                              <div class="col-lg-4 py-1 bg-light fw-bolder">
                                Statut
                              </div>
                              <div class="col py-1">
                                {{ $user->statut }}
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                      <div class="col mb-2">
                        <ul class="list-group">
                          <li class="list-group-item p-0">
                            <div class="row m-0">
                              <div class="col-lg-4 py-1 bg-light fw-bolder">
                                CNIE
                              </div>
                              <div class="col py-1">
                                {{ $user->cnie }}
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                      <div class="col mb-2">
                        <ul class="list-group">
                          <li class="list-group-item p-0">
                            <div class="row m-0">
                              <div class="col-lg-4 py-1 bg-light fw-bolder">
                                Téléphone
                              </div>
                              <div class="col py-1">
                                {{ $user->telephone }}
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                      <div class="col mb-2 w-100">
                        <ul class="list-group">
                          <li class="list-group-item p-0">
                            <div class="row m-0">
                              <div class="col-lg-2 py-1 bg-light fw-bolder">
                                Adresse
                              </div>
                              <div class="col py-1">
                                {{ $user->adresse }}
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                      <div class="col mb-2">
                        <ul class="list-group">
                          <li class="list-group-item p-0">
                            <div class="row m-0">
                              <div class="col-lg-4 py-1 bg-light fw-bolder">
                                Ville
                              </div>
                              <div class="col py-1">
                                {{ $user->ville }}
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                      <div class="col mb-2">
                        <ul class="list-group">
                          <li class="list-group-item p-0">
                            <div class="row m-0">
                              <div class="col-lg-4 py-1 bg-light fw-bolder">
                                Pays
                              </div>
                              <div class="col py-1">
                                {{ $user->pays }}
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                      <div class="col mb-2">
                        <ul class="list-group">
                          <li class="list-group-item p-0">
                            <div class="row m-0">
                              <div class="col-lg-4 py-1 bg-light fw-bolder">
                                Nationalité
                              </div>
                              <div class="col py-1">
                                {{ $user->nationalite }}
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                      <div class="col mb-2">
                        <ul class="list-group">
                          <li class="list-group-item p-0">
                            <div class="row m-0">
                              <div class="col-lg-4 py-1 bg-light fw-bolder">
                                Genre
                              </div>
                              <div class="col py-1">
                                {{ $user->genre }}
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                      <div class="col mb-2">
                        <ul class="list-group">
                          <li class="list-group-item p-0">
                            <div class="row m-0">
                              <div class="col-lg-4 py-1 bg-light fw-bolder">
                                Travail
                              </div>
                              <div class="col py-1">
                                {{ $user->travail }}
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                      <div class="col mb-2">
                        <ul class="list-group">
                          <li class="list-group-item p-0">
                            <div class="row m-0">
                              <div class="col-lg-4 py-1 bg-light fw-bolder">
                                Poste
                              </div>
                              <div class="col py-1">
                                {{ $user->poste }}
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                    {{-- <div class="row row-cols-3 mb-2">
                      <div class="col">
                        <a href="" class="btn btn-sm btn-info">
                          <i class="mdi mdi-badge-account-horizontal-outline align-middle me-1"></i>
                          <span>Carte du travail</span>
                        </a>
                      </div>
                      <div class="col">
                        <a href="" class="btn btn-sm btn-info">
                          <i class="mdi mdi-tools align-middle me-1"></i>
                          <span>Management du salaire</span>
                        </a>
                      </div>
                      <div class="col">
                        <a href="" class="btn btn-sm btn-info">
                          <i class="mdi mdi-file-outline align-middle me-1"></i>
                          <span>Fiche technique du salaire par année</span>
                        </a>
                      </div>
                    </div> --}}
                    <div class="d-flex justify-content-center">
                      <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary btn-sm me-2 fw-bolder">
                        <i class="mdi mdi-close-thick mdi-18px align-middle"></i>
                        <span>Fermer</span>
                      </button>
                    </div>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->


            {{-- model delete --}}
            <div class="modal fade del{{'-'.$user->id }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-md modal-dialog-centered">
                  <div class="modal-content border border-3 border-danger border-solid">
                      <div class="modal-header bg-danger py-2">
                          <h6 class="modal-title fw-bolder m-0 text-white" id="myExtraLargeModalLabel">
                              Confirmer La Suppression
                          </h6>
                      </div>
                      <div class="modal-body">
                        <form action="{{ route('user.destroy',$user) }}" method="post">
                          @csrf
                          @method("DELETE")
                          <div class="text-center mb-2">
                            <i class="mdi mdi-alert-circle-outline me-1 mdi-48px text-danger"></i>
                            <h5 class="m-0 mb-1">Êtes-vous sûr de vouloir supprimer ?</h5>
                            <h6 class="m-0 fw-bolder border border-solid border-1 border-danger rounded-pill py-2">{{ $user->name}}</h6>
                          </div>
                          <div class="d-flex justify-content-center">
                            <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn btn-danger me-2 fw-bolder px-4" >
                              <i class="mdi mdi-close-thick mdi-18px"></i>
                            </button>
                            <button type="submit" class="btn btn-sm btn-success me-2 fw-bolder px-4" id="">
                              <i class="mdi mdi-check-bold mdi-18px"></i>
                            </button>
                          </div>
                        </form>
                      </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            @empty

          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>

{{-- modal ajouter --}}
<div class="modal fade add" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info py-2">
          <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Ajouter un utilisateur</h5>
      </div>
      <div class="modal-body">
        <form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="row row-cols-2">
            <div class="col mb-2">
              <div class="form-group">
                <input type="text" name="name" class="form-control form-control-sm mb-1 @error('name') is-invalid @enderror" placeholder="Name" value="{{ old('name') }}">

                {{-- <h6 style="font-size: .65rem" id="success-name">(*) Remplir le champs obligatoire</h6> --}}
                @error('name')
                  <strong @class('invalid-feedback')>{{ $message }}</strong>
                @enderror
              </div>
            </div>
            <div class="col mb-2">
              <div class="form-group">
                <input type="email" name="email" class="form-control form-control-sm mb-1 @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" id="email">
                @error('email')
                <strong class="invalid-feedback">{{ $message }}</strong>
                @enderror
              </div>
            </div>
            <div class="col mb-2">
              <div class="form-group">
                <select name="role" id="" class="form-select form-select-sm @error('role') is-invalid @enderror">
                  <option value="">Choisir le rôle</option>
                  <option value="admin" @if(old('role')== 'admin') {{ 'selected' }} @endif>Admin</option>
                  <option value="user" @if(old('role')== 'user') {{ 'selected' }} @endif>User</option>
                </select>
                @error('role')
                <strong class="invalid-feedback">{{ $message }}</strong>
                @enderror
              </div>
            </div>
            <div class="col mb-2">
              <div class="form-group">
                <select name="statut" id="" class="form-select form-select-sm @error('statut') is-invalid @enderror">
                  <option value="">Choisir le statut</option>
                  <option value="activer" @if(old('statut')== 'activer') {{ 'selected' }} @endif>Aciver</option>
                  <option value="desactiver" @if(old('statut')== 'des') {{ 'selected' }} @endif>Desactiver</option>
                </select>
                @error('statut')
                <strong class="invalid-feedback">{{ $message }}</strong>
                @enderror
              </div>
            </div>

            <div class="col mb-2">
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
              <div class="input-group input-group-sm">
                <input id="password-confirm" type="password" class="form-control form-control-sm mb-1" name="password_confirmation" placeholder="Confirmer le mot de passe">
                <div class="input-group-append toggle-password">
                     <span class="input-group-text mdi mdi-eye-outline mdi-18px py-0 px-2"></span>
                </div>
             </div>
            </div>
          </div>

          <h5 class="text-center my-3 autre">Autre Information Remplir</h5>
            <div class="row row-cols-2">
              <div class="col mb-2">
                <div class="form-group">
                  <input type="text" name="cnie" id="" class="form-control form-control-sm mb-1 @error('cnie') is-invalid @enderror" placeholder="CNIE" value="{{ old('cnie') }}">
                  @error('cnie')
                    <strong @class('invalid-feedback')>{{ $message }}</strong>
                  @enderror
                </div>
              </div>
              <div class="col mb-2">
                <div @class('form-group')>
                  <input type="text" name="telephone" id="" class="form-control form-control-sm @error('telephone') is-invalid @enderror" placeholder="téléphone" value="{{ old('telephone') }}">
                  @error('telephone')
                  <strong class="invalid-feedback">{{ $message }}</strong>
                  @enderror
                </div>
              </div>
              <div class="col mb-2">
                <div @class('form-group')>
                  <input type="text" name="ville" id="" class="form-control form-control-sm @error('ville') is-invalid @enderror" placeholder="ville" value="{{ old('ville') }}">
                  @error('ville')
                    <strong class="invalid-feedback">{{ $message }}</strong>
                  @enderror
                </div>
              </div>
              <div class="col mb-2">
                <div @class('form-group')>
                  <input type="text" name="adresse" id="" class="form-control form-control-sm @error('adresse') is-invalid @enderror" placeholder="adresse" value="{{ old('adresse') }}">
                  @error('adresse')
                    <strong class="invalid-feedback">{{ $message }}</strong>
                  @enderror
                </div>
              </div>
              <div class="col mb-2">
                <div @class('form-group')>
                  <input type="text" name="nationalite" id="" class="form-control form-control-sm @error('nationalite') is-invalid @enderror" placeholder="nationalité" value="{{ old('nationalite') }}">
                  @error('nationalite')
                    <strong class="invalid-feedback">{{ $message }}</strong>
                  @enderror
                </div>
              </div>
              <div class="col mb-2">
                <div @class('form-group')>
                  <input type="text" name="pays" id="" class="form-control form-control-sm @error('pays') is-invalid @enderror" placeholder="pays" value="{{ old('pays') }}">
                  @error('pays')
                    <strong class="invalid-feedback">{{ $message }}</strong>
                  @enderror
                </div>
              </div>
              <div class="col mb-2">
                <div @class('form-group')>
                  <select name="travail" id="" class="form-select form-select-sm @error('travail') is-invalid @enderror">
                    <option value="" disabled>Choisir le travail d'employés</option>
                    <option value="intérieur" selected>A l'intérieur de l'agence</option>
                  </select>
                  @error('travail')
                    <strong class="invalid-feedback">{{ $message }}</strong>
                  @enderror
                </div>
              </div>
              <div class="col mb-2">
                <div @class('form-group')>
                  <select name="poste" id="poste" class="form-select form-select-sm @error('poste') is-invalid @enderror">
                    <option value="" >Choisir le poste a l'extérieur de l'agence</option>
                    <option value="Employée de réservation voyages">Employée de réservation voyages</option>
                    <option value="Chef du voyage">Chef du voyage</option>
                    <option value="Sécritaire">Sécritaire</option>
                  </select>
                  @error('poste')
                    <strong class="invalid-feedback">{{ $message }}</strong>
                  @enderror
                </div>
              </div>
              <div class="col mb-2">
                <div @class('form-group')>
                  <select name="genre" id="" class="form-select form-select-sm @error('genre') is-invalid @enderror">
                    <option value="">Choisir le genre</option>
                    <option value="homme" @if (old('genre') == "homme") {{ 'selected' }} @endif>Homme</option>
                    {{-- <option value="pilote"  @if (old('genre') == "pilote") {{ 'selected' }} @endif>Pilote</option> --}}
                    <option value="femme"  @if (old('genre') == "femme") {{ 'selected' }} @endif>Femme</option>
                  </select>
                  @error('genre')
                    <strong class="invalid-feedback">{{ $message }}</strong>
                  @enderror
                </div>
              </div>
              <div class="col mb-2">
                <div @class('form-group')>
                  {{-- <label for="" @class('form-label')>Fichier CV </label> --}}
                  <input type="file" name="image" id="" class="form-control form-control-sm">
                  {{-- @error('cv')
                    <strong class="invalid-feedback">{{ $message }}</strong>
                  @enderror --}}
                </div>
              </div>
            </div>


          <div class="d-flex justify-content-between">
            <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn btn-outline-secondary btn-sm me-2 fw-bolder">
              <i class="mdi mdi-arrow-left-drop-circle-outline mdi-18px align-middle"></i>
              <span>Annuler</span>
            </button>

              <button type="submit" class="btn btn-sm btn-info me-2">
                <i class="mdi mdi-checkbox-marked-circle-outline mdi-18px align-middle"></i>
                <span>Enregistrer</span>
              </button>
          </div>
        </form>

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
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
