@extends('layouts.master')
@section('content')
@include('sweetalert::alert')
<div class="d-flex justify-content-between align-items-center mb-2">
  <h5 class="text-uppercase m-0 px-1 title py-1 rounded">
    Liste des salaires d'employés
   </h5>
  <button type="button" class="btn btn-info btn-sm waves-effect waves-light px-3 py-0" data-bs-toggle="modal" data-bs-target=".add">
    <i class="mdi mdi-plus-circle-outline mdi-18px align-middle"></i>
    <span>Ajouter</span>
  </button>
</div>
  <article class="card">
    <div class="card-body p-1">
      @include('layouts.session')
      <div @class("table-responsive")>
        <table class="table table-sm table-bordered m-0">
          <thead>
            <tr>
              <th class="text-capitalize">Name</th>
              <th class="text-capitalize">Jour</th>
              <th class="text-capitalize">Mois</th>
              <th class="text-capitalize">Année</th>
              <th class="text-capitalize">Salaire</th>
              <th class="text-capitalize">état</th>
              <th class="text-capitalize">reçu</th>
              <th class="text-capitalize">Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($employeSalaires as $employeSalaire)
              <tr>
                <td class="align-middle">
                  <button type="button" class="btn btn-sm ps-0 waves-effect waves-light btn-link fw-bolder" data-bs-toggle="modal" data-bs-target=".show-{{ $employeSalaire->employe->id }}">
                    <h6 @class("m-0")>{{ $employeSalaire->employe->name }}</h6>
                  </button>
                </td>
                <td class="align-middle">
                  {{ $employeSalaire->jour }}
                </td>
                <td class="align-middle">
                  @if ($employeSalaire->mois == 1)
                    {{ $employeSalaire->mois.' Janvier' }}
                  @elseif($employeSalaire->mois == 2)
                    {{ $employeSalaire->mois.' Février' }}
                  @elseif($employeSalaire->mois == 3)
                    {{ $employeSalaire->mois.' Mars' }}
                  @elseif($employeSalaire->mois == 4)
                    {{ $employeSalaire->mois.' Avril' }}
                  @elseif($employeSalaire->mois == 5)
                    {{ $employeSalaire->mois.' Mai' }}
                  @elseif($employeSalaire->mois == 6)
                    {{ $employeSalaire->mois.' juin' }}
                  @elseif($employeSalaire->mois == 7)
                    {{ $employeSalaire->mois.' Juillet' }}
                  @elseif($employeSalaire->mois == 8)
                    {{ $employeSalaire->mois.' Aôut' }}
                  @elseif($employeSalaire->mois == 9)
                    {{ $employeSalaire->mois.' Septembre' }}
                  @elseif($employeSalaire->mois == 10)
                    {{ $employeSalaire->mois.' October' }}
                  @elseif($employeSalaire->mois == 11)
                    {{ $employeSalaire->mois.' Novembre' }}
                  @elseif($employeSalaire->mois == 12)
                    {{ $employeSalaire->mois.' December' }}
                  @endif
                </td>
                <td class="align-middle">
                  {{ $employeSalaire->annee }}
                </td>
                <td class="align-middle">
                  {{ $employeSalaire->salaire.' DHS' }}
                </td>
                <td class="align-middle">
                  <i @class([
                    "mdi",
                    "mdi-18px",
                    "mdi-check-bold"=>$employeSalaire->etat=='valider',
                    "text-success"=>$employeSalaire->etat=='valider',
                    "mdi-close-thick"=>$employeSalaire->etat=='en attente',
                    "text-danger"=>$employeSalaire->etat=='en attente'
                    ])>
                    </i>
                </td>
                <td class="align-middle">
                  @if ($employeSalaire->etat=="valider")
                    <a href="{{ route('employe-recu',$employeSalaire) }}">
                      <i class="mdi mdi-file-outline mdi-18px"></i>
                    </a>
                  @endif
                </td>
                <td class="align-middle">
                  <button type="button" class="btn waves-effect waves-light btn-info p-1 py-0" data-bs-toggle="modal" data-bs-target=".edit{{'-'.$employeSalaire->id }}">
                    <i class="mdi mdi-pencil" ></i>
                  </button>
                  <button type="button" class="btn waves-effect waves-light btn-info p-1 py-0" data-bs-toggle="modal" data-bs-target=".del{{'-'.$employeSalaire->id }}">
                    <i class="mdi mdi-trash-can"></i>
                  </button>
                </td>
              </tr>

            {{-- model show employe --}}
            <div class="modal fade show-{{$employeSalaire->employe->id }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header bg-info py-2">
                      <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Information d'utilisateur : {{ $employeSalaire->employe->name }}</h5>
                      {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                  </div>
                  <div class="modal-body p-2">
                    <ul class="list-group mb-2">
                      <div class="row row-cols-2">
                        <div class="col-lg-2 pe-0 mb-1">
                          <li class="list-group-item py-1 ps-2 text-capitalize bg-light">
                            <span class="fw-bolder">CNIE</span>
                          </li>
                        </div>
                        <div class="col-lg-10 ps-0 mb-1">
                          <li class="list-group-item py-1 ps-2">
                            {{ $employeSalaire->employe->cnie }}
                          </li>
                        </div>
                        <div class="col-lg-2 pe-0 mb-1">
                          <li class="list-group-item py-1 ps-2 text-capitalize bg-light">
                            <span class="fw-bolder">name</span>
                          </li>
                        </div>
                        <div class="col-lg-10 ps-0 mb-1">
                          <li class="list-group-item py-1 ps-2">
                            {{ $employeSalaire->employe->name }}
                          </li>
                        </div>
                        <div class="col-lg-2 pe-0 mb-1">
                          <li class="list-group-item py-1 ps-2 text-capitalize bg-light">
                            <span class="fw-bolder">adresse</span>
                          </li>
                        </div>
                        <div class="col-lg-10 ps-0 mb-1">
                          <li class="list-group-item py-1 ps-2">
                            {{ $employeSalaire->employe->adresse }}
                          </li>
                        </div>
                        <div class="col-lg-2 pe-0 mb-1">
                          <li class="list-group-item py-1 ps-2 text-capitalize bg-light">
                            <span class="fw-bolder">ville</span>
                          </li>
                        </div>
                        <div class="col-lg-10 ps-0 mb-1">
                          <li class="list-group-item py-1 ps-2">
                            {{ $employeSalaire->employe->ville }}
                          </li>
                        </div>
                        <div class="col-lg-2 pe-0 mb-1">
                          <li class="list-group-item py-1 ps-2 text-capitalize bg-light">
                            <span class="fw-bolder">pays</span>
                          </li>
                        </div>
                        <div class="col-lg-10 ps-0 mb-1">
                          <li class="list-group-item py-1 ps-2">
                            {{ $employeSalaire->employe->pays }}
                          </li>
                        </div>
                        <div class="col-lg-2 pe-0 mb-1">
                          <li class="list-group-item py-1 ps-2 text-capitalize bg-light">
                            <span class="fw-bolder">nationalité</span>
                          </li>
                        </div>
                        <div class="col-lg-10 ps-0 mb-1">
                          <li class="list-group-item py-1 ps-2">
                            {{ $employeSalaire->employe->nationalite }}
                          </li>
                        </div>
                        <div class="col-lg-2 pe-0 mb-1">
                          <li class="list-group-item py-1 ps-2 text-capitalize bg-light">
                            <span class="fw-bolder">e-mail</span>
                          </li>
                        </div>
                        <div class="col-lg-10 ps-0 mb-1">
                          <li class="list-group-item py-1 ps-2">
                            {{ $employeSalaire->employe->email }}
                          </li>
                        </div>
                        <div class="col-lg-2 pe-0 mb-1">
                          <li class="list-group-item py-1 ps-2 text-capitalize bg-light">
                            <span class="fw-bolder">téléphone</span>
                          </li>
                        </div>
                        <div class="col-lg-10 ps-0 mb-1">
                          <li class="list-group-item py-1 ps-2">
                            {{ $employeSalaire->employe->telephone }}
                          </li>
                        </div>
                        <div class="col-lg-2 pe-0 mb-1">
                          <li class="list-group-item py-1 ps-2 text-capitalize bg-light">
                            <span class="fw-bolder">genre</span>
                          </li>
                        </div>
                        <div class="col-lg-10 ps-0 mb-1">
                          <li class="list-group-item py-1 ps-2">
                            {{ $employeSalaire->employe->genre }}
                          </li>
                        </div>
                        <div class="col-lg-2 pe-0 mb-1">
                          <li class="list-group-item py-1 ps-2 text-capitalize bg-light">
                            <span class="fw-bolder">poste</span>
                          </li>
                        </div>
                        <div class="col-lg-10 ps-0 mb-1">
                          <li class="list-group-item py-1 ps-2">
                            {{ $employeSalaire->employe->poste }}
                          </li>
                        </div>
                        <div class="col-lg-2 pe-0 mb-1">
                          <li class="list-group-item py-1 ps-2 text-capitalize bg-light">
                            <span class="fw-bolder">travail</span>
                          </li>
                        </div>
                        <div class="col-lg-10 ps-0 mb-1">
                          <li class="list-group-item py-1 ps-2">
                            {{ $employeSalaire->employe->travail }}
                          </li>
                        </div>

                      </div>
                    </ul>
                      <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn btn-dark btn-sm me-2 fw-bolder">
                        <i class="mdi mdi-close-thick mdi-18px align-middle"></i>
                        <span>Fermer</span>
                      </button>

                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->


            {{-- modal edit --}}
            <div class="modal fade edit{{'-'.$employeSalaire->id }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-md">
                <div class="modal-content">
                  <div class="modal-header bg-info py-2">
                      <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Modifier l'utilisateur : {{ $employeSalaire->employe->name}}</h5>
                      {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                  </div>
                  <div class="modal-body">
                    <form action="{{ route('employe-salaire.update',$employeSalaire) }}" method="post">
                      @csrf
                      @method('PUT')
                      <div class="row row-cols-1">
                        <div class="col mb-2">
                          <div class="form-group">
                            <label for="">Utilisateur</label>
                            <select name="employe_id_u" id="" class="form-select form-select-sm">
                              <option value="">Choisir l'utilisateur</option>
                              @foreach ($employes as $employe)
                                <option value="{{ $employe->id }}" {{ $employe->id == $employeSalaire->employe_id ? 'selected':'' }}>{{ $employe->name }}</option>
                              @endforeach
                            </select>
                            @error('employe_id')
                              <strong @class('invalid-feedback')>{{ $message }}</strong>
                            @enderror
                          </div>
                        </div>
                        <div class="col mb-2">
                          <div class="form-group">
                            <label for="" @class('form-label')>Jour</label>
                            <input type="number" name="jour_u" min="1" max="31" class="form-control form-control-sm mb-1 @error('jour_u') is-invalid @enderror"  value="{{ $employeSalaire->jour }}">
                            @error('jour_u')
                            <strong class="invalid-feedback">{{ $message }}</strong>
                            @enderror
                          </div>
                        </div>
                        <div class="col mb-2">
                          <div class="form-group">
                            <label for="" @class('form-label')>Mois</label>
                            <input type="number" name="mois_u" min="1" max="12" class="form-control form-control-sm mb-1 @error('mois_u') is-invalid @enderror"  value="{{ $employeSalaire->mois }}">
                            @error('mois_u')
                            <strong class="invalid-feedback">{{ $message }}</strong>
                            @enderror
                          </div>
                        </div>
                        <div class="col mb-2">
                          <div class="form-group">
                            <label for="" @class('form-label')>Année</label>
                            <input type="number" name="annee_u" min="{{ date('Y') }}" class="form-control form-control-sm mb-1 @error('annee_u') is-invalid @enderror"  value="{{ $employeSalaire->annee }}">
                            @error('annee_u')
                            <strong class="invalid-feedback">{{ $message }}</strong>
                            @enderror
                          </div>
                        </div>
                        <div class="col mb-2">
                          <div class="form-group">
                            <label for="" @class('form-label')>Salaire</label>
                            <input type="text" name="salaire_u" class="form-control form-control-sm mb-1 @error('salaire_u') is-invalid @enderror"  value="{{ $employeSalaire->salaire }}">
                            @error('salaire_u')
                            <strong class="invalid-feedback">{{ $message }}</strong>
                            @enderror
                          </div>
                        </div>
                        <div class="col mb-2">
                          <div class="form-group">
                            <label for="" class="form-label text-capitalize">état</label>
                            <select name="etat_u" id="" class="form-select form-select-sm @error('etat_u') is-invalid @enderror">
                              <option value="">Choisir l'état</option>
                              <option value="valider" {{ $employeSalaire->etat=='valider' ? 'selected':'' }}>valider</option>
                              <option value="en attente" {{ $employeSalaire->etat=='en attente' ? 'selected':'' }}>en attente</option>
                            </select>
                            @error('etat_u')
                            <strong class="invalid-feedback">{{ $message }}</strong>
                            @enderror
                          </div>
                        </div>
                      </div>
                      <div class="d-flex justify-content-between">
                        <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn btn-dark px-2 py-1 fw-bolder">
                          <i class="mdi mdi-close-thick mdi-18px align-middle"></i>
                          <span>Annuler</span>
                        </button>

                          <button type="submit" class="btn btn-Z px-2 py-1 fw-bolder">
                            <i class="mdi mdi-checkbox-marked-circle-outline mdi-18px align-middle"></i>
                            <span>Modifier</span>
                          </button>


                      </div>
                    </form>

                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->



            {{-- model delete --}}
            <div class="modal fade del{{'-'.$employeSalaire->id }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-md modal-dialog-centered">
                  <div class="modal-content border border-3 border-danger border-solid">
                      <div class="modal-header bg-danger py-2">
                          <h6 class="modal-title fw-bolder m-0 text-white" id="myExtraLargeModalLabel">
                              Confirmer La Suppression
                          </h6>
                      </div>
                      <div class="modal-body">
                        <form action="{{ route('employe-salaire.destroy',$employeSalaire) }}" method="post">
                          @csrf
                          @method("DELETE")
                          <div class="text-center mb-2">
                            <i class="mdi mdi-alert-circle-outline me-1 mdi-48px text-danger"></i>
                            <h5 class="m-0 mb-1">Êtes-vous sûr de vouloir supprimer ?</h5>
                            <h6 class="mb-2 fw-bolder border border-solid border-1 border-danger rounded-pill py-2">
                              <span>Mois : </span>
                              {{ $employeSalaire->mois }}
                            </h6>
                            <h6 class="mb-2 fw-bolder border border-solid border-1 border-danger rounded-pill py-2">
                              <span>Année : </span>
                              {{ $employeSalaire->annee }}
                            </h6>
                            <h6 class="mb-2 fw-bolder border border-solid border-1 border-danger rounded-pill py-2">
                              <span>Salaire : </span>
                              {{ $employeSalaire->salaire.' DHS' }}
                            </h6>
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
            <tr>
              <td colspan="8" class="text-center text-danger">
                <h6 class="m-0">Aucun information du salaires</h6>
              </td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </article>


  {{-- modal ajouter --}}
<div class="modal fade add" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-md">
    <div class="modal-content">
      <div class="modal-header bg-info py-2">
          <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Ajouter un salaire d'utilisateur</h5>
      </div>
      <div class="modal-body">
        <form action="{{ route('employe-salaire.store') }}" method="post">
          @csrf
          <div class="row row-cols-1">
            <div class="col mb-2">
              <div class="form-group">
                <label for="">Employé</label>
                <select name="employe_id" id="" class="form-select form-select-sm @error('employe_id') is-invalid @enderror">
                  <option value="">Choisir l'utilisateur</option>
                  @foreach ($employes as $employe)
                    <option value="{{ $employe->id }}">{{ $employe->name }}</option>
                  @endforeach
                </select>
                @error('employe_id')
                  <strong @class('invalid-feedback')>{{ $message }}</strong>
                @enderror
              </div>
            </div>
            <div class="col mb-2">
              <div class="form-group">
                <label for="" @class('form-label')>Jour</label>
                <input type="number" name="jour" min="1" max="31" class="form-control form-control-sm mb-1 @error('jour') is-invalid @enderror"  value="{{ date('d') }}">
                @error('jour')
                <strong class="invalid-feedback">{{ $message }}</strong>
                @enderror
              </div>
            </div>
            <div class="col mb-2">
              <div class="form-group">
                <label for="" @class('form-label')>Mois</label>
                <input type="number" name="mois" min="1" max="12" class="form-control form-control-sm mb-1 @error('mois') is-invalid @enderror"  value="{{ date('m') }}">
                @error('mois')
                <strong class="invalid-feedback">{{ $message }}</strong>
                @enderror
              </div>
            </div>
            <div class="col mb-2">
              <div class="form-group">
                <label for="" @class('form-label')>Année</label>
                <input type="number" name="annee" min="{{ date('Y') }}" class="form-control form-control-sm mb-1 @error('annee') is-invalid @enderror"  value="{{ date('Y') }}">
                @error('annee')
                <strong class="invalid-feedback">{{ $message }}</strong>
                @enderror
              </div>
            </div>
            <div class="col mb-2">
              <div class="form-group">
                <label for="" @class('form-label')>Salaire</label>
                <input type="text" name="salaire" class="form-control form-control-sm mb-1 @error('salaire') is-invalid @enderror"  value="{{ old('salaire') }}">
                @error('salaire')
                <strong class="invalid-feedback">{{ $message }}</strong>
                @enderror
              </div>
            </div>
            <div class="col mb-2">
              <div class="form-group">
                <label for="" class="form-label text-capitalize">état</label>
                <select name="etat" id="" class="form-select form-select-sm @error('etat') is-invalid @enderror">
                  <option value="">Choisir l'état</option>
                  <option value="valider" @if(old('etat')== 'valider') {{ 'selected' }} @endif>valider</option>
                  <option value="en attente" @if(old('etat')== 'en attente') {{ 'selected' }} @endif>en attente</option>
                </select>
                @error('etat')
                <strong class="invalid-feedback">{{ $message }}</strong>
                @enderror
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