@extends('layouts.master')
@section('content')
@include('sweetalert::alert')
<div class="d-flex justify-content-between align-items-center mb-2">
  <h5 class="text-uppercase m-0 px-1 title py-1 rounded">
    liste d'employés
   </h5>
  </h5>
  <a href="{{ route('employe.create') }}" class="btn btn-info btn-sm waves-effect waves-light px-3 py-0 ">
    <i class="mdi mdi-account-plus mdi-18px align-middle"></i>
    <span>Ajouter</span>
  </a>
</div>
  <article class="card">
    {{-- <div class="card-header px-2">
      <div class="d-flex align-items-center float-start">
        <a href="{{ route('home') }}" class="btn btn-outline-primary btn-sm me-2">
          <i class="mdi mdi-home"></i>
        </a>
        <h5 class="m-0 ps-1 border border-top-0 border-bottom-0 border-end-0 border-solid border-3 border-info">
          Liste d'employés
        </h5>
      </div>

    </div> --}}
    <div class="card-body p-2">
      @include('layouts.session')
      <div class="table-responsive">

        <table class="table table-bordered table-sm m-0">
          <thead>
            <tr>
              <th class="text-capitalize">Name</th>
              <th class="text-capitalize">e-mail</th>
              <th class="text-capitalize">téléphone</th>
              <th class="text-capitalize">travail</th>
              <th class="text-capitalize">poste</th>
              <th class="text-capitalize">actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($employes as $employe)
              <tr>
                <td class="align-middle">{{ $employe->name }}</td>
                <td class="align-middle">{{ $employe->email }}</td>
                <td class="align-middle">{{ $employe->telephone }}</td>
                <td class="align-middle">{{ $employe->ville }}</td>
                <td class="align-middle">{{ $employe->poste }}</td>
                <td class="align-middle">
                  <button type="button" class="btn waves-effect waves-light btn-info p-1 py-0" data-bs-toggle="modal" data-bs-target=".edit{{'-'.$employe->id }}">
                    <i class="mdi mdi-account-edit mdi-18px" ></i>
                  </button>
                  <button type="button" class="btn waves-effect waves-light btn-danger p-1 py-0 " data-bs-toggle="modal" data-bs-target=".del{{'-'.$employe->id }}">
                    <i class="mdi mdi-account-remove mdi-18px"></i>
                  </button>
                  <button type="button" class="btn waves-effect waves-light btn-info p-1 py-0" data-bs-toggle="modal" data-bs-target=".show{{'-'.$employe->id }}">
                    <i class="mdi mdi-account-details mdi-18px"></i>
                  </button>
                  <a href="{{ route('carte-employe',$employe) }}" class="btn waves-effect waves-light btn-info p-1 py-0 ">
                  <i class="mdi mdi-badge-account-horizontal mdi-18px"></i>
                  </a>
                </td>
              </tr>

              {{-- modal edit --}}
              <div class="modal fade edit{{'-'.$employe->id }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header bg-info py-2">
                        <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Modifier d'employé : {{ $employe->name}}</h5>
                        {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                    </div>
                    <div class="modal-body">
                      <form action="{{ route('employe.update',$employe) }}" method="post">
                        @csrf
                        @method('PUT')
                        <ul class="list-group">
                          <div class="row row-cols-2">
                            <div class="col mb-1">
                              <li class="list-group-item py-1 ps-2 text-capitalize bg-light">CNIE</li>
                            </div>
                            <div class="col mb-1">
                              <li class="list-group-item p-0">
                                <input type="text" name="cnie" id="" class="form-control  py-1" value="{{ $employe->cnie }}">
                              </li>
                            </div>
                            <div class="col mb-1">
                              <li class="list-group-item py-1 ps-2 text-capitalize bg-light">name</li>
                            </div>
                            <div class="col mb-1">
                              <li class="list-group-item p-0">
                                <input type="text" name="name" id="" class="form-control py-1" value="{{ $employe->name }}">
                              </li>
                            </div>
                            <div class="col mb-1">
                              <li class="list-group-item py-1 ps-2 text-capitalize bg-light">adresse</li>
                            </div>
                            <div class="col mb-1">
                              <li class="list-group-item p-0">
                                <input type="text" name="adresse" id="" class="form-control py-1" value="{{ $employe->adresse }}">
                              </li>
                            </div>
                            <div class="col mb-1">
                              <li class="list-group-item py-1 ps-2 text-capitalize bg-light">ville</li>
                            </div>
                            <div class="col mb-1">
                              <li class="list-group-item p-0">
                                <input type="text" name="ville" id="" class="form-control py-1" value="{{ $employe->ville }}">
                              </li>
                            </div>
                            <div class="col mb-1">
                              <li class="list-group-item py-1 ps-2 text-capitalize bg-light">pays</li>
                            </div>
                            <div class="col mb-1">
                              <li class="list-group-item p-0">
                                <input type="text" name="pays=" id="" class="form-control py-1" value="{{ $employe->pays }}">
                              </li>
                            </div>
                            <div class="col mb-1">
                              <li class="list-group-item py-1 ps-2 text-capitalize bg-light">nationalité</li>
                            </div>
                            <div class="col mb-1">
                              <li class="list-group-item p-0">
                                <input type="text" name="nationalite" id="" class="form-control py-1" value="{{ $employe->nationalite }}">
                              </li>
                            </div>
                            <div class="col mb-1">
                              <li class="list-group-item py-1 ps-2 text-capitalize bg-light">e-mail</li>
                            </div>
                            <div class="col mb-1">
                              <li class="list-group-item p-0">
                                <input type="email" name="email" id="" class="form-control py-1" value="{{ $employe->email }}">
                              </li>
                            </div>
                            <div class="col mb-1">
                              <li class="list-group-item py-1 ps-2 text-capitalize bg-light">téléphone</li>
                            </div>
                            <div class="col mb-1">
                              <li class="list-group-item p-0">
                                <input type="text" name="telephone" id="" class="form-control py-1" value="{{ $employe->telephone }}">
                              </li>
                            </div>
                            <div class="col mb-1">
                              <li class="list-group-item py-1 ps-2 text-capitalize bg-light">genre</li>
                            </div>
                            <div class="col mb-1">
                              <li class="list-group-item p-0">
                               <select name="genre" id="" class="form-select form-select-sm">
                                <option value="">Choisir le genre</option>
                                <option value="homme" {{ $employe->genre== "homme" ? 'selected':'' }}>Homme</option>
                                <option value="femme" {{ $employe->genre== "femme" ? 'selected':'' }}>Femme</option>
                               </select>
                              </li>
                            </div>
                            <div class="col mb-1">
                              <li class="list-group-item py-1 ps-2 text-capitalize bg-light">travail</li>
                            </div>
                            <div class="col mb-1">
                              <li class="list-group-item p-0">
                                <select name="travail" class="form-select form-select-sm @error('travail') is-invalid @enderror">
                                  <option value="">Choisir le travail d'employés</option>
                                  <option value="intérieur" {{ $employe->travail== "intérieur" ? 'selected':'' }} >A l'intérieur de l'agence</option>
                                  <option value="extérieur"  {{ $employe->travail== "extérieur" ? 'selected':'' }}>A l'extérieur de l'agence</option>
                                  <option value="véhicule"  {{ $employe->travail== "véhicule" ? 'selected':'' }}>A véhicule de l'agence</option>
                                </select>
                              </li>
                            </div>
                            <div class="col mb-1">
                              <li class="list-group-item py-1 ps-2 text-capitalize bg-light">poste</li>
                            </div>
                            <div class="col mb-1">
                              <li class="list-group-item p-0">
                                <select name="poste" class=" form-select form-select-sm @error('poste') is-invalid @enderror">
                                  <option value="">Choisir le poste</option>
                                <optgroup label="Intérieur" class="inter">
                                  <optgroup label="Agent">
                                    <option value="Agent de réservation" {{ $employe->poste == "Agent de réservation" ? "selected":"" }}>Agent de réservation</option>
                                    <option value="Agent de vente voyages=" {{ $employe->poste == "Agent de vente voyages=" ? "selected":"" }}>Agent de vente voyages</option>
                                    <option value="Agent de voyage" {{ $employe->poste == "Agent de voyage" ? "selected":"" }}>Agent de voyage</option>
                                    <option value="Agente de réservation voyages=" {{ $employe->poste == "Agente de réservation voyages=" ? "selected":"" }}>Agente de réservation voyages</option>
                                  </optgroup>
                                  <optgroup label="Conseiller">
                                    <option value="Conseiller télévendeur" {{ $employe->poste == "Conseiller télévendeur" ? "selected":"" }}>Conseiller télévendeur</option>
                                    <option value="Conseiller vendeur" {{ $employe->poste == "Conseiller vendeur" ? "selected":"" }}>Conseiller vendeur</option>
                                    <option value="Conseillère voyages en ligne" {{ $employe->poste == "Conseillère voyages en ligne" ? "selected":"" }}>Conseillère voyages en ligne</option>
                                    <option value="Conseillère voyages d'affaires=" {{ $employe->poste == "Conseillère voyages d'affaires=" ? "selected":"" }}>Conseillère voyages d'affaires</option>
                                  </optgroup>
                                  <optgroup label="Autre">
                                    <option value="Technicienne de réservation voyages=" {{ $employe->poste == "Technicienne de réservation voyages=" ? "selected":"" }}>Technicienne de réservation voyages</option>
                                    <option value="Chef de comptoir en vente de voyages=" {{ $employe->poste == "Chef de comptoir en vente de voyages=" ? "selected":"" }}>Chef de comptoir en vente de voyages</option>
                                  </optgroup>
                                </optgroup>
                                <optgroup label="Extérieur" class="inter">
                                  <option value="Employée de réservation voyages=" {{ $employe->poste == "Employée de réservation voyages=" ? "selected":"" }} class="text-dark text-capitalize">Employée de réservation voyages</option>
                                  <option value="Chef du voyage" {{ $employe->poste == "Chef du voyage" ? "selected":"" }} class="text-dark text-capitalize">Chef du voyage</option>
                                  <option value="Sécritaire" {{ $employe->poste == "Sécritaire" ? "selected":"" }} class="text-dark text-capitalize">Sécritaire</option>
                                </optgroup>
                                <optgroup label="Véhicule" class="inter">
                                  <option value="Chauffeur" {{ $employe->poste == "Chauffeur" ? "selected":"" }} class="text-dark text-capitalize">Chauffeur</option>
                                  <option value="Capitiaine" {{ $employe->poste == "Capitaine" ? "selected":"" }} class="text-dark text-capitalize">Capitaine</option>
                                </optgroup>
                                </select>
                              </li>
                            </div>
                          </div>
                        </ul>

                        <div class="d-flex justify-content-between">
                          <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn btn-dark px-2 py-1 fw-bolder">
                            <i class="mdi mdi-close-thick mdi-18px align-middle"></i>
                            <span>Annuler</span>
                          </button>
                          <button type="submit" class="btn px-2 py-1 fw-bolder btn-info">
                            <i class="mdi mdi-check-outline"></i>
                            <span>Modifier</span>
                          </button>

                        </div>
                      </form>

                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->

              {{-- model delete --}}
              <div class="modal fade del{{'-'.$employe->id }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-dialog-centered">
                    <div class="modal-content border border-3 border-danger border-solid">
                        <div class="modal-header bg-danger py-2">
                            <h6 class="modal-title fw-bolder m-0 text-white" id="myExtraLargeModalLabel">
                                Confirmer La Suppression
                            </h6>
                        </div>
                        <div class="modal-body">
                          <form action="{{ route('employe.destroy',$employe) }}" method="post">
                            @csrf
                            @method("DELETE")
                            <div class="text-center mb-2">
                              <i class="mdi mdi-alert-circle-outline me-1 mdi-48px text-danger"></i>
                              <h5 class="m-0 mb-1">Êtes-vous sûr de vouloir supprimer ?</h5>
                              <h6 class="m-0 fw-bolder border border-solid border-1 border-danger rounded-pill py-2">{{ $employe->name }}</h6>
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

              {{-- model show --}}
              <div class="modal fade show{{'-'.$employe->id }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header bg-info py-2">
                        <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Information d'employé : {{ $employe->name }}</h5>
                        {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                    </div>
                    <div class="modal-body p-2">
                      <ul class="list-group mb-2">
                        <div class="row row-cols-2">
                          <div class="col pe-0 mb-1">
                            <li class="list-group-item py-1 ps-2 text-capitalize bg-light">
                              <span class="fw-bolder">CNIE</span>
                            </li>
                          </div>
                          <div class="col ps-0 mb-1">
                            <li class="list-group-item py-1 ps-2">
                              {{ $employe->cnie }}
                            </li>
                          </div>
                          <div class="col pe-0 mb-1">
                            <li class="list-group-item py-1 ps-2 text-capitalize bg-light">
                              <span class="fw-bolder">name</span>
                            </li>
                          </div>
                          <div class="col ps-0 mb-1">
                            <li class="list-group-item py-1 ps-2">
                              {{ $employe->name }}
                            </li>
                          </div>
                          <div class="col pe-0 mb-1">
                            <li class="list-group-item py-1 ps-2 text-capitalize bg-light">
                              <span class="fw-bolder">adresse</span>
                            </li>
                          </div>
                          <div class="col ps-0 mb-1">
                            <li class="list-group-item py-1 ps-2">
                              {{ $employe->adresse }}
                            </li>
                          </div>
                          <div class="col pe-0 mb-1">
                            <li class="list-group-item py-1 ps-2 text-capitalize bg-light">
                              <span class="fw-bolder">ville</span>
                            </li>
                          </div>
                          <div class="col ps-0 mb-1">
                            <li class="list-group-item py-1 ps-2">
                              {{ $employe->ville }}
                            </li>
                          </div>
                          <div class="col pe-0 mb-1">
                            <li class="list-group-item py-1 ps-2 text-capitalize bg-light">
                              <span class="fw-bolder">pays</span>
                            </li>
                          </div>
                          <div class="col ps-0 mb-1">
                            <li class="list-group-item py-1 ps-2">
                              {{ $employe->pays }}
                            </li>
                          </div>
                          <div class="col pe-0 mb-1">
                            <li class="list-group-item py-1 ps-2 text-capitalize bg-light">
                              <span class="fw-bolder">nationalité</span>
                            </li>
                          </div>
                          <div class="col ps-0 mb-1">
                            <li class="list-group-item py-1 ps-2">
                              {{ $employe->nationalite }}
                            </li>
                          </div>
                          <div class="col pe-0 mb-1">
                            <li class="list-group-item py-1 ps-2 text-capitalize bg-light">
                              <span class="fw-bolder">e-mail</span>
                            </li>
                          </div>
                          <div class="col ps-0 mb-1">
                            <li class="list-group-item py-1 ps-2">
                              {{ $employe->email }}
                            </li>
                          </div>
                          <div class="col pe-0 mb-1">
                            <li class="list-group-item py-1 ps-2 text-capitalize bg-light">
                              <span class="fw-bolder">téléphone</span>
                            </li>
                          </div>
                          <div class="col ps-0 mb-1">
                            <li class="list-group-item py-1 ps-2">
                              {{ $employe->telephone }}
                            </li>
                          </div>
                          <div class="col pe-0 mb-1">
                            <li class="list-group-item py-1 ps-2 text-capitalize bg-light">
                              <span class="fw-bolder">genre</span>
                            </li>
                          </div>
                          <div class="col ps-0 mb-1">
                            <li class="list-group-item py-1 ps-2">
                              {{ $employe->genre }}
                            </li>
                          </div>
                          <div class="col pe-0 mb-1">
                            <li class="list-group-item py-1 ps-2 text-capitalize bg-light">
                              <span class="fw-bolder">poste</span>
                            </li>
                          </div>
                          <div class="col ps-0 mb-1">
                            <li class="list-group-item py-1 ps-2">
                              {{ $employe->poste }}
                            </li>
                          </div>
                          <div class="col pe-0 mb-1">
                            <li class="list-group-item py-1 ps-2 text-capitalize bg-light">
                              <span class="fw-bolder">travail</span>
                            </li>
                          </div>
                          <div class="col ps-0 mb-1">
                            <li class="list-group-item py-1 ps-2">
                              {{ $employe->travail }}
                            </li>
                          </div>

                        </div>
                      </ul>

                      <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn btn-dark btn-sm fw-bolder ">
                        <i class="mdi mdi-close-thick mdi-18px align-middle"></i>
                        <span>Fermer</span>
                      </button>


                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->





              <div class="modal fade edit-salaire{{'-'.$employe->id }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header bg-info py-2">
                        <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Management du salaire d'employé : {{ $employe->name }}</h5>
                    </div>
                    <div class="modal-body p-2">

                      <ul class="list-group">
                        <li class="list-group-item active p-0 ps-2">
                          <div class="row row-cols-6 justify-content-end">
                            <div class="col">
                              <span class="fw-bolder text-white text-capitalize">jours</span>
                            </div>
                            <div class="col">
                              <span class="fw-bolder text-white text-capitalize">mois</span>
                            </div>
                            <div class="col">
                              <span class="fw-bolder text-white text-capitalize">année</span>
                            </div>
                            <div class="col">
                              <span class="fw-bolder text-white text-capitalize">salaire</span>
                            </div>
                            <div class="col">
                              <span class="fw-bolder text-white text-capitalize">état</span>
                            </div>
                            <div class="col">
                              <span class="fw-bolder text-white text-capitalize">Actions</span>
                            </div>
                          </div>
                        </li>
                      </ul>

                      @foreach ($employe->salaires as $es)

                          <form action="{{ route('employe-salaire.update',$es) }}" method="post">
                            @csrf
                            @method("PUT")
                            <input type="hidden" name="employe_id" value="{{ $employe->id }}">
                            <ul class="list-group">
                              <li class="list-group-item py-1 p-0">
                                <div class="row row-cols-6">
                                  <div class="col">
                                    <input type="number" min="1" max="31" name="jour" id="" value="{{ $es->jour }}" class="form-control form-control-sm">
                                  </div>
                                  <div class="col">
                                    <select name="mois" id="" class="form-select form-select-sm">
                                      <option class="text-capitalize" value="1" {{ $es->mois == 1 ? "selected":"" }}>1 janvier</option>
                                      <option class="text-capitalize" value="2" {{ $es->mois == 2 ? "selected":"" }}>2  févriver</option>
                                      <option class="text-capitalize" value="3" {{ $es->mois == 3 ? "selected":"" }}>3  mars</option>
                                      <option class="text-capitalize" value="4" {{ $es->mois == 4 ? "selected":"" }}>4  avril</option>
                                      <option class="text-capitalize" value="5" {{ $es->mois == 5 ? "selected":"" }}>5  mai</option>
                                      <option class="text-capitalize" value="6" {{ $es->mois == 6 ? "selected":"" }}>6  juin</option>
                                      <option class="text-capitalize" value="7" {{ $es->mois == 7 ? "selected":"" }}>7  juillet</option>
                                      <option class="text-capitalize" value="8" {{ $es->mois == 8 ? "selected":"" }}>8  août</option>
                                      <option class="text-capitalize" value="9" {{ $es->mois == 9 ? "selected":"" }}>9  september</option>
                                      <option class="text-capitalize" value="10" {{ $es->mois == 10 ? "selected":"" }}>10  october</option>
                                      <option class="text-capitalize" value="11" {{ $es->mois == 11 ? "selected":"" }}>11 november</option>
                                      <option class="text-capitalize" value="12" {{ $es->mois == 12 ? "selected":"" }}>12  december</option>
                                    </select>
                                  </div>
                                  <div class="col">
                                    <input type="text" name="annee" id="" class="form-control form-control-sm" value="{{ $es->annee }}">
                                  </div>
                                  <div class="col">
                                    <input type="text" name="salaire" id="" class="form-control form-control-sm" value="{{ $es->salaire }}">
                                  </div>
                                  <div class="col">
                                    <select name="etat" id="" class="form-select form-select-sm">
                                      <option value="">Choisir l'état</option>
                                      <option class="text-capitalize" value="valider" {{ $es->etat == "valider" ? "selected":"" }}>valider</option>
                                      <option class="text-capitalize" value="en attente" {{ $es->etat == "en attente" ? "selected":"" }}>En attente</option>
                                    </select>
                                  </div>
                                  <div class="col d-flex">
                                    <button type="submit" class="btn btn-sm btn-info me-2">
                                      <i class="mdi mdi-pencil"></i>
                                    </button>
                                    </form>
                                    <form action="{{ route('employe-salaire.destroy',$es) }}" method="post" class="d-inline")>
                                      @csrf
                                      @method("DELETE")
                                      <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-sm btn-info" id="">
                                          <i class="mdi mdi-trash-can"></i>
                                        </button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </li>
                            </ul>

                      @endforeach
                      <div class="d-flex justify-content-between mt-2">
                        <button type="button" class="btn btn-sm waves-effect waves-light btn-primary" data-bs-toggle="modal" data-bs-target=".salaire{{'-'.$employe->id }}">
                          <i class="mdi mdi-arrow-left mdi-18px align-middle"></i>
                          <span>Retour</span>
                        </button>
                        <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn btn-dark btn-sm me-2 fw-bolder">
                          <i class="mdi mdi-close-thick mdi-18px align-middle"></i>
                          <span>Annuler</span>
                        </button>
                      </div>



                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->



            @empty
              <tr>
                <th colspan="9" class="text-danger text-center">
                  Aucun information d'employé
                </th>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>

    </div>
  </div>
@endsection
@section('script')
<script>
  $(document).ready(function(){
    $("#add-salaire").on("click",function(){
      $("#salaire").toggle(450);
      // console.log("ss=");
    })
  })
</script>
@endsection