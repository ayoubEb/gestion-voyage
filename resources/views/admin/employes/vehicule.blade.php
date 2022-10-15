@extends('layouts.master')
@section('content')
@include('sweetalert::alert')
  <div @class('card')>
    <div @class(['card-body','p-2'])>
      <div @class(['d-flex','justify-content-between','mb-3','align-items-center'])>
        <div @class(['d-flex','align-items-center'])>
          <a href="{{ route('home') }}" @class(['btn','btn-outline-primary','btn-sm','me-2'])>
            <i @class(['mdi','mdi-home','mdi-18px'])></i>
          </a>
          <h4 @class(['m-0','ps-1','border','border-top-0','border-bottom-0','border-end-0','border-solid','border-3','border-info'])>
            Liste d'employés à véhicule
          </h4>
        </div>
        <a href="{{ route('employe.create') }}" @class(['btn','btn-info','btn-sm','d-flex','align-items-center','fw-bolder'])>
          <i @class(['mdi','mdi-plus-circle-outline','mdi-18px','me-1'])></i>
          <span>Ajouter un employé</span>
        </a>
      </div>

      <div @class(['table-responsive'])>
        <table @class(['table','table-bordered','table-sm','m-0'])>
          <thead>
            <tr>
              <th @class("text-capitalize")>Name</th>
              <th @class("text-capitalize")>e-mail</th>
              <th @class("text-capitalize")>téléphone</th>
              <th @class("text-capitalize")>ville</th>
              <th @class("text-capitalize")>travail</th>
              <th @class("text-capitalize")>poste</th>
              <th @class("text-capitalize")>actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($vehicules as $vehicule)
              <tr>
                <td @class("align-middle")>{{ $vehicule->name }}</td>
                <td @class("align-middle")>{{ $vehicule->email }}</td>
                <td @class("align-middle")>{{ $vehicule->telephone }}</td>
                <td @class("align-middle")>{{ $vehicule->ville }}</td>
                <td @class("align-middle")>{{ $vehicule->travail }}</td>
                <td @class("align-middle")>{{ $vehicule->poste }}</td>
                <td @class("align-middle")>
                  <button type="button" @class(["btn","btn-sm","waves-effect","waves-light","btn-outline-info"]) data-bs-toggle="modal" data-bs-target=".edit{{'-'.$vehicule->id }}">
                    <i @class(["mdi","mdi-pencil" ])></i>
                  </button>
                  <button type="button" @class(["btn","btn-sm","waves-effect","waves-light","btn-outline-info"]) data-bs-toggle="modal" data-bs-target=".del{{'-'.$vehicule->id }}">
                    <i @class(["mdi","mdi-trash-can"])></i>
                  </button>
                  <button type="button" @class(["btn","btn-sm","waves-effect","waves-light","btn-outline-info"]) data-bs-toggle="modal" data-bs-target=".show{{'-'.$vehicule->id }}">
                    <i @class(['mdi','mdi-information-outline'])></i>
                  </button>
                  <button type="button" @class(["btn","btn-sm","waves-effect","waves-light","btn-outline-info"]) data-bs-toggle="modal" data-bs-target=".salaire{{'-'.$vehicule->id }}">
                    <i @class(['mdi','mdi-currency-usd'])></i>
                  </button>
                  <a href="{{ route('carte-employe',$vehicule) }}" @class(["btn","btn-sm","btn-outline-info"])>
                  <i @class(["mdi","mdi-badge-account-horizontal-outline"])></i>
                  </a>
                </td>
              </tr>

              {{-- modal edit --}}
              <div class="modal fade edit{{'-'.$vehicule->id }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header bg-info py-2">
                        <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Modifier d'employé : {{ $vehicule->name}}</h5>
                        {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                    </div>
                    <div class="modal-body">
                      <form action="{{ route('employe.update',$vehicule) }}" method="post">
                        @csrf
                        @method('PUT')
                        <ul @class(["list-group"])>
                          <div @class(["row","row-cols-2"])>
                            <div @class(["col","mb-1"])>
                              <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>CNIE</li>
                            </div>
                            <div @class(["col","mb-1"])>
                              <li @class(["list-group-item","p-0"])>
                                <input type="text" name="cnie" id="" class="form-control  py-1" value="{{ $vehicule->cnie }}">
                              </li>
                            </div>
                            <div @class(["col","mb-1"])>
                              <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>name</li>
                            </div>
                            <div @class(["col","mb-1"])>
                              <li @class(["list-group-item","p-0"])>
                                <input type="text" name="name" id="" class="form-control py-1" value="{{ $vehicule->name }}">
                              </li>
                            </div>
                            <div @class(["col","mb-1"])>
                              <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>adresse</li>
                            </div>
                            <div @class(["col","mb-1"])>
                              <li @class(["list-group-item","p-0"])>
                                <input type="text" name="adresse" id="" class="form-control py-1" value="{{ $vehicule->adresse }}">
                              </li>
                            </div>
                            <div @class(["col","mb-1"])>
                              <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>ville</li>
                            </div>
                            <div @class(["col","mb-1"])>
                              <li @class(["list-group-item","p-0"])>
                                <input type="text" name="ville" id="" class="form-control py-1" value="{{ $vehicule->ville }}">
                              </li>
                            </div>
                            <div @class(["col","mb-1"])>
                              <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>pays</li>
                            </div>
                            <div @class(["col","mb-1"])>
                              <li @class(["list-group-item","p-0"])>
                                <input type="text" name="pays" id="" class="form-control py-1" value="{{ $vehicule->pays }}">
                              </li>
                            </div>
                            <div @class(["col","mb-1"])>
                              <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>nationalité</li>
                            </div>
                            <div @class(["col","mb-1"])>
                              <li @class(["list-group-item","p-0"])>
                                <input type="text" name="nationalite" id="" class="form-control py-1" value="{{ $vehicule->nationalite }}">
                              </li>
                            </div>
                            <div @class(["col","mb-1"])>
                              <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>e-mail</li>
                            </div>
                            <div @class(["col","mb-1"])>
                              <li @class(["list-group-item","p-0"])>
                                <input type="email" name="email" id="" class="form-control py-1" value="{{ $vehicule->email }}">
                              </li>
                            </div>
                            <div @class(["col","mb-1"])>
                              <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>téléphone</li>
                            </div>
                            <div @class(["col","mb-1"])>
                              <li @class(["list-group-item","p-0"])>
                                <input type="text" name="telephone" id="" class="form-control py-1" value="{{ $vehicule->telephone }}">
                              </li>
                            </div>
                            <div @class(["col","mb-1"])>
                              <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>genre</li>
                            </div>
                            <div @class(["col","mb-1"])>
                              <li @class(["list-group-item","p-0"])>
                               <select name="genre" id="" class="form-select form-select-sm">
                                <option value="">Choisir le genre</option>
                                <option value="homme" {{ $vehicule->genre== "homme" ? 'selected':'' }}>Homme</option>
                                <option value="femme" {{ $vehicule->genre== "femme" ? 'selected':'' }}>Femme</option>
                               </select>
                              </li>
                            </div>
                            <div @class(["col","mb-1"])>
                              <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>travail</li>
                            </div>
                            <div @class(["col","mb-1"])>
                              <li @class(["list-group-item","p-0"])>
                                <select name="travail" class="form-select form-select-sm @error('travail') is-invalid @enderror">
                                  <option value="">Choisir le travail d'employés</option>
                                  <option value="intérieur" {{ $vehicule->travail== "intérieur" ? 'selected':'' }} >A l'intérieur de l'agence</option>
                                  <option value="extérieur"  {{ $vehicule->travail== "extérieur" ? 'selected':'' }}>A l'extérieur de l'agence</option>
                                  <option value="véhicule"  {{ $vehicule->travail== "véhicule" ? 'selected':'' }}>A véhicule de l'agence</option>
                                </select>
                              </li>
                            </div>
                            <div @class(["col","mb-1"])>
                              <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>poste</li>
                            </div>
                            <div @class(["col","mb-1"])>
                              <li @class(["list-group-item","p-0"])>
                                <select name="poste" class=" form-select form-select-sm @error('poste') is-invalid @enderror">
                                  <option value="">Choisir le poste</option>
                                <optgroup label="Intérieur" @class(['inter'])>
                                  <optgroup label="Agent">
                                    <option value="Agent de réservation" {{ $vehicule->poste == "Agent de réservation" ? "selected":"" }}>Agent de réservation</option>
                                    <option value="Agent de vente voyages" {{ $vehicule->poste == "Agent de vente voyages" ? "selected":"" }}>Agent de vente voyages</option>
                                    <option value="Agent de voyage" {{ $vehicule->poste == "Agent de voyage" ? "selected":"" }}>Agent de voyage</option>
                                    <option value="Agente de réservation voyages" {{ $vehicule->poste == "Agente de réservation voyages" ? "selected":"" }}>Agente de réservation voyages</option>
                                  </optgroup>
                                  <optgroup label="Conseiller">
                                    <option value="Conseiller télévendeur" {{ $vehicule->poste == "Conseiller télévendeur" ? "selected":"" }}>Conseiller télévendeur</option>
                                    <option value="Conseiller vendeur" {{ $vehicule->poste == "Conseiller vendeur" ? "selected":"" }}>Conseiller vendeur</option>
                                    <option value="Conseillère voyages en ligne" {{ $vehicule->poste == "Conseillère voyages en ligne" ? "selected":"" }}>Conseillère voyages en ligne</option>
                                    <option value="Conseillère voyages d'affaires" {{ $vehicule->poste == "Conseillère voyages d'affaires" ? "selected":"" }}>Conseillère voyages d'affaires</option>
                                  </optgroup>
                                  <optgroup label="Autre">
                                    <option value="Technicienne de réservation voyages" {{ $vehicule->poste == "Technicienne de réservation voyages" ? "selected":"" }}>Technicienne de réservation voyages</option>
                                    <option value="Chef de comptoir en vente de voyages" {{ $vehicule->poste == "Chef de comptoir en vente de voyages" ? "selected":"" }}>Chef de comptoir en vente de voyages</option>
                                  </optgroup>
                                </optgroup>
                                <optgroup label="Extérieur" @class(["inter"])>
                                  <option value="Employée de réservation voyages" {{ $vehicule->poste == "Employée de réservation voyages" ? "selected":"" }} @class(['text-dark',"text-capitalize"])>Employée de réservation voyages</option>
                                  <option value="Chef du voyage" {{ $vehicule->poste == "Chef du voyage" ? "selected":"" }} @class(['text-dark',"text-capitalize"])>Chef du voyage</option>
                                  <option value="Sécritaire" {{ $vehicule->poste == "Sécritaire" ? "selected":"" }} @class(['text-dark',"text-capitalize"])>Sécritaire</option>
                                </optgroup>
                                <optgroup label="Véhicule" @class(["inter"])>
                                  <option value="Chauffeur" {{ $vehicule->poste == "Chauffeur" ? "selected":"" }} @class(['text-dark',"text-capitalize"])>Chauffeur</option>
                                  <option value="Capitiaine" {{ $vehicule->poste == "Capitaine" ? "selected":"" }} @class(['text-dark',"text-capitalize"])>Capitaine</option>
                                </optgroup>
                                </select>
                              </li>
                            </div>
                          </div>
                        </ul>

                        <div @class(['d-flex','justify-content-between'])>
                          {{-- @if ($vehicule->type==="chauffeur")
                          @elseif($vehicule->type==="pilote")
                          @endif --}}
                          <button type="button" data-bs-dismiss="modal" aria-label="Close" @class(["btn","btn-dark","btn-sm","me-2","fw-bolder"])>
                            <i @class(["mdi","mdi-close-thick","mdi-18px","align-middle"])></i>
                            <span>Annuler</span>
                          </button>
                          <div @class(['d-flex','justify-content-between'])>
                            <button type="submit" @class(['btn','btn-sm','btn-info','me-2'])>
                              <i @class(['mdi','mdi-check-outline'])></i>
                              <span>Modifier</span>
                            </button>
                            <button type="button" @class(["btn","btn-sm","waves-effect","waves-light","btn-info"]) data-bs-toggle="modal" data-bs-target=".del{{'-'.$vehicule->id }}">
                              <i @class(["mdi","mdi-trash-can"])></i>
                              <span>Supprimer</span>
                            </button>
                          </div>
                        </div>
                      </form>

                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->

              {{-- model delete --}}
              <div class="modal fade del{{'-'.$vehicule->id }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-dialog-centered">
                    <div class="modal-content border border-3 border-danger border-solid">
                        <div class="modal-header bg-danger py-2">
                            <h6 class="modal-title fw-bolder m-0 text-white" id="myExtraLargeModalLabel">
                                Confirmer La Suppression
                            </h6>
                        </div>
                        <div class="modal-body">
                          <form action="{{ route('employe.destroy',$vehicule) }}" method="post">
                            @csrf
                            @method("DELETE")
                            <div @class(["text-center","mb-2"])>
                              <i @class(["mdi","mdi-alert-circle-outline","me-1","mdi-48px","text-danger"])></i>
                              <h5 @class(["m-0","mb-1"])>Êtes-vous sûr de vouloir supprimer ?</h5>
                              <h6 @class(["m-0","fw-bolder","border","border-solid","border-1","border-danger","rounded-pill","py-2"])>{{ $vehicule->name }}</h6>
                            </div>
                            <div @class(["d-flex","justify-content-center"])>
                              <button type="button" data-bs-dismiss="modal" aria-label="Close" @class(["btn","btn-danger","me-2","fw-bolder","px-4"]) >
                                <i @class(["mdi","mdi-close-thick","mdi-18px"])></i>
                              </button>
                              <button type="submit" @class(["btn","btn-sm","btn-success","me-2","fw-bolder","px-4"]) id="">
                                <i @class(["mdi","mdi-check-bold","mdi-18px"])></i>
                              </button>
                            </div>
                          </form>
                        </div>
                      </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->

              {{-- model show --}}
              <div class="modal fade show{{'-'.$vehicule->id }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header bg-info py-2">
                        <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Information d'employé : {{ $vehicule->name }}</h5>
                        {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                    </div>
                    <div class="modal-body p-2">
                      <ul @class(["list-group","mb-2"])>
                        <div @class(['row','row-cols-2'])>
                          <div @class(["col","pe-0","mb-1"])>
                            <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>
                              <span @class(["fw-bolder"])>CNIE</span>
                            </li>
                          </div>
                          <div @class(["col","ps-0","mb-1"])>
                            <li @class(["list-group-item","py-1","ps-2"])>
                              {{ $vehicule->cnie }}
                            </li>
                          </div>
                          <div @class(["col","pe-0","mb-1"])>
                            <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>
                              <span @class(["fw-bolder"])>name</span>
                            </li>
                          </div>
                          <div @class(["col","ps-0","mb-1"])>
                            <li @class(["list-group-item","py-1","ps-2"])>
                              {{ $vehicule->name }}
                            </li>
                          </div>
                          <div @class(["col","pe-0","mb-1"])>
                            <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>
                              <span @class(["fw-bolder"])>adresse</span>
                            </li>
                          </div>
                          <div @class(["col","ps-0","mb-1"])>
                            <li @class(["list-group-item","py-1","ps-2"])>
                              {{ $vehicule->adresse }}
                            </li>
                          </div>
                          <div @class(["col","pe-0","mb-1"])>
                            <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>
                              <span @class(["fw-bolder"])>ville</span>
                            </li>
                          </div>
                          <div @class(["col","ps-0","mb-1"])>
                            <li @class(["list-group-item","py-1","ps-2"])>
                              {{ $vehicule->ville }}
                            </li>
                          </div>
                          <div @class(["col","pe-0","mb-1"])>
                            <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>
                              <span @class(["fw-bolder"])>pays</span>
                            </li>
                          </div>
                          <div @class(["col","ps-0","mb-1"])>
                            <li @class(["list-group-item","py-1","ps-2"])>
                              {{ $vehicule->pays }}
                            </li>
                          </div>
                          <div @class(["col","pe-0","mb-1"])>
                            <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>
                              <span @class(["fw-bolder"])>nationalité</span>
                            </li>
                          </div>
                          <div @class(["col","ps-0","mb-1"])>
                            <li @class(["list-group-item","py-1","ps-2"])>
                              {{ $vehicule->nationalite }}
                            </li>
                          </div>
                          <div @class(["col","pe-0","mb-1"])>
                            <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>
                              <span @class(["fw-bolder"])>e-mail</span>
                            </li>
                          </div>
                          <div @class(["col","ps-0","mb-1"])>
                            <li @class(["list-group-item","py-1","ps-2"])>
                              {{ $vehicule->email }}
                            </li>
                          </div>
                          <div @class(["col","pe-0","mb-1"])>
                            <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>
                              <span @class(["fw-bolder"])>téléphone</span>
                            </li>
                          </div>
                          <div @class(["col","ps-0","mb-1"])>
                            <li @class(["list-group-item","py-1","ps-2"])>
                              {{ $vehicule->telephone }}
                            </li>
                          </div>
                          <div @class(["col","pe-0","mb-1"])>
                            <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>
                              <span @class(["fw-bolder"])>genre</span>
                            </li>
                          </div>
                          <div @class(["col","ps-0","mb-1"])>
                            <li @class(["list-group-item","py-1","ps-2"])>
                              {{ $vehicule->genre }}
                            </li>
                          </div>
                          <div @class(["col","pe-0","mb-1"])>
                            <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>
                              <span @class(["fw-bolder"])>poste</span>
                            </li>
                          </div>
                          <div @class(["col","ps-0","mb-1"])>
                            <li @class(["list-group-item","py-1","ps-2"])>
                              {{ $vehicule->poste }}
                            </li>
                          </div>
                          <div @class(["col","pe-0","mb-1"])>
                            <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>
                              <span @class(["fw-bolder"])>travail</span>
                            </li>
                          </div>
                          <div @class(["col","ps-0","mb-1"])>
                            <li @class(["list-group-item","py-1","ps-2"])>
                              {{ $vehicule->travail }}
                            </li>
                          </div>
                          <div @class(["col","pe-0","mb-1"])>
                            <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>
                              <span @class(["fw-bolder"])>Date du création</span>
                            </li>
                          </div>
                          <div @class(["col","ps-0","mb-1"])>
                            <li @class(["list-group-item","py-1","ps-2"])>
                              {{ date('d-m-Y',strtotime($vehicule->created_at)) }}
                            </li>
                          </div>
                        </div>
                      </ul>
                      <div @class(['d-flex','justify-content-between'])>
                        <button type="button" data-bs-dismiss="modal" aria-label="Close" @class(["btn","btn-dark","btn-sm","me-2","fw-bolder"])>
                          <i @class(["mdi","mdi-close-thick","mdi-18px","align-middle"])></i>
                          <span>Fermer</span>
                        </button>
                        <div @class(['d-flex','justify-content-between'])>
                          <button type="button" @class(["btn","btn-sm","waves-effect","waves-light","btn-info","me-2"]) data-bs-toggle="modal" data-bs-target=".edit{{'-'.$vehicule->id }}">
                            <i @class(["mdi","mdi-pencil" ])></i>
                            <span>Modifier</span>
                          </button>
                          <button type="button" @class(["btn","btn-sm","waves-effect","waves-light","btn-info"]) data-bs-toggle="modal" data-bs-target=".del{{'-'.$vehicule->id }}">
                            <i @class(["mdi","mdi-trash-can"])></i>
                            <span>Supprimer</span>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->

              {{-- model liste salaire show --}}
              <div class="modal fade salaire{{'-'.$vehicule->id }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header bg-info py-2">
                        <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Management salaire d'employe : {{ $vehicule->name }}</h5>
                    </div>
                    <div class="modal-body p-2">
                      <div id="accordion" class="custom-accordion mb-2">
                        <div class="card mb-1 shadow-none">
                            <a href="#collapseOne" class="text-dark collapsed" data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapseOne">
                                <div class="card-header" id="headingOne">
                                    <h6 class="m-0">
                                        <i @class(["mdi","mdi-plus-circle-outline","align-middle","mdi-18px"])></i>
                                        <span>Ajouter un salaire d'employé</span>
                                        <i class="mdi mdi-minus float-end accor-plus-icon"></i>
                                    </h6>
                                </div>
                            </a>

                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordion" style="">
                                <div class="card-body p-2 border border-solid border-2 border-info rounded">
                                  <form action="{{ route('employe-salaire.store') }}" method="post">
                                    @csrf
                                    <div @class(["row","row-cols-5","mb-2"])>
                                      <div @class(["col"])>
                                       <input type="hidden" name="employe_id" value=" {{ $vehicule->id }}">
                                        <div @class("form-group")>
                                        </div>
                                        <label for="" @class("form-label")>Mois</label>
                                        <select name="mois" id="mois" @class(["form-select","form-select-sm"])>
                                          <option @class('text-capitalize') value="1">1 janvier</option>
                                          <option @class('text-capitalize') value="2">2 février</option>
                                          <option @class('text-capitalize') value="3">3 mars</option>
                                          <option @class('text-capitalize') value="4">4 avril</option>
                                          <option @class('text-capitalize') value="5">5 mai</option>
                                          <option @class('text-capitalize') value="6">6 juin</option>
                                          <option @class('text-capitalize') value="7">7 juillet</option>
                                          <option @class('text-capitalize') value="8">8 août</option>
                                          <option @class('text-capitalize') value="9">9 september</option>
                                          <option @class('text-capitalize') value="10">10 octobre</option>
                                          <option @class('text-capitalize') value="11">11 novembre</option>
                                          <option @class('text-capitalize') value="12">12 decembrer</option>
                                        </select>
                                      </div>
                                      <div @class(["col"])>
                                        <div @class("form-group")>
                                          <label for="" @class("form-label")>Jours</label>
                                          <select name="jour" id="jour" @class(["form-select","form-select-sm"])>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                          </select>
                                        </div>
                                      </div>
                                      <div @class(["col"])>
                                        <div @class("form-group")>
                                          <label for="" @class("form-label")>Année</label>
                                          <input type="text" name="annee" id="" @class(["form-control","form-control-sm"])>
                                        </div>
                                      </div>
                                      <div @class(["col"])>
                                        <div @class("form-group")>
                                          <label for="" @class("form-label")>Salaire</label>
                                          <input type="text" name="salaire" id="" @class(["form-control","form-control-sm"])>
                                        </div>
                                      </div>
                                      <div @class(["col"])>
                                        <div @class("form-group")>
                                          <label for="" @class("form-label")>Etat</label>
                                          <select name="etat" id="" @class(["form-select","form-select-sm"])>
                                            <option value="">Choisir l'état</option>
                                            <option value="en attente">En attente</option>
                                            <option value="valider">Valider</option>
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                    <div @class(["d-flex","justify-content-center"])>
                                      <button type="submit" @class(["btn","btn-info","btn-sm","text-capitalize"])>enregistrer</button>
                                    </div>
                                  </form>
                                </div>
                            </div>
                        </div>

                      </div>

                      <div @class("mb-2")>
                      </div>
                      <h5 @class(["mt-3","mb-2"])>
                        <button type="button" @class(["btn","btn-sm","waves-effect","waves-light","btn-primary"]) data-bs-toggle="modal" data-bs-target=".edit-salaire{{'-'.$vehicule->id }}">
                          <i @class(["mdi","mdi-tools","mdi-18px","align-middle"])></i>
                          <span>Management du salaires</span>
                        </button>
                      </h5>
                      <ul @class(["list-group"])>
                        <li @class(["list-group-item","active","py-1","ps-2"])>
                          <div @class(["row","row-cols-6",'align-items-center'])>
                            <div @class(["col"])>
                              <span @class(["fw-bolder","text-white","text-capitalize"])>jours</span>
                            </div>
                            <div @class(["col"])>
                              <span @class(["fw-bolder","text-white","text-capitalize"])>mois</span>
                            </div>
                            <div @class(["col"])>
                              <span @class(["fw-bolder","text-white","text-capitalize"])>année</span>
                            </div>
                            <div @class(["col"])>
                              <span @class(["fw-bolder","text-white","text-capitalize"])>salaire</span>
                            </div>
                            <div @class(["col"])>
                              <span @class(["fw-bolder","text-white","text-capitalize"])>état</span>
                            </div>
                            <div @class(["col"])>
                              <span @class(["fw-bolder","text-white","text-capitalize"])>reçu</span>
                            </div>

                          </div>
                        </li>
                      </ul>

                      @foreach ($vehicule->salaires as $es)
                        @if (date("Y") == $es->annee)
                          <ul @class(["list-group"])>
                            <li @class(["list-group-item","py-1","ps-2"])>
                              <div @class(["row","row-cols-6"])>
                                <div @class(["col"])>
                                  <span>{{ $es->jour }}</span>
                                </div>
                                <div @class(["col"])>
                                  @if ($es->mois==1)
                                    <span @class("text-capitalize")>{{ $es->mois.' janvier' }}</span>
                                  @elseif ($es->mois==2)
                                    <span @class("text-capitalize")>{{ $es->mois.' février' }}</span>
                                  @elseif ($es->mois==3)
                                    <span @class("text-capitalize")>{{ $es->mois.' mars' }}</span>
                                  @elseif ($es->mois==4)
                                    <span @class("text-capitalize")>{{ $es->mois.' avril' }}</span>
                                  @elseif ($es->mois==5)
                                    <span @class("text-capitalize")>{{ $es->mois.' mai' }}</span>
                                  @elseif ($es->mois==6)
                                    <span @class("text-capitalize")>{{ $es->mois.' juin' }}</span>
                                  @elseif ($es->mois==7)
                                    <span @class("text-capitalize")>{{ $es->mois.' juillet' }}</span>
                                  @elseif ($es->mois==8)
                                    <span @class("text-capitalize")>{{ $es->mois.' août' }}</span>
                                  @elseif ($es->mois==9)
                                    <span @class("text-capitalize")>{{ $es->mois.' september' }}</span>
                                  @elseif ($es->mois==10)
                                    <span @class("text-capitalize")>{{ $es->mois.' october' }}</span>
                                  @elseif ($es->mois==11)
                                    <span @class("text-capitalize")>{{ $es->mois.' novembre' }}</span>
                                  @elseif ($es->mois==12)
                                    <span @class("text-capitalize")>{{ $es->mois.' december' }}</span>
                                  @endif
                                </div>
                                <div @class(["col"])>
                                  <span>{{ $es->annee }}</span>
                                </div>
                                <div @class(["col"])>
                                  <span>{{ $es->salaire.' DHS' }}</span>
                                </div>
                                <div @class(["col"])>
                                  <span class="{{ $es->etat == "valider" ? 'btn btn-sm btn-success p-0 px-2 text-dark':'text-danger' }}">{{ $es->etat }}</span>
                                </div>
                                <div  @class(["col"])>
                                  @if ($es->etat=="valider")
                                    <a href="{{ route('exp-recu',$es) }}">
                                      <i @class(["mdi","mdi-file-check-outline","mdi-18px"])></i>
                                    </a>
                                  @else
                                  <i @class(["mdi","mdi-file-cancel-outline","mdi-18px"])></i>
                                  @endif
                                </div>


                              </div>
                            </li>
                          </ul>

                        @endif
                      @endforeach

                        <button type="button" @class(["btn","btn-sm","waves-effect","waves-light","btn-secondary","mt-2"]) data-bs-toggle="modal" data-bs-target=".salaire-annee{{ $vehicule->id }}">
                          <i @class(["mdi","mdi-calendar-month-outline","mdi-18px","align-middle"])></i>
                          <span>Afficher par année</span>
                        </button>

                      <div @class(["d-flex","justify-content-center","mt-2"])>
                        <button type="button" data-bs-dismiss="modal" aria-label="Close" @class(["btn","btn-dark","btn-sm","me-2","fw-bolder"])>
                          <i @class(["mdi","mdi-close-thick","mdi-18px","align-middle"])></i>
                          <span>Annuler</span>
                        </button>
                      </div>
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->



              <div class="modal fade edit-salaire{{'-'.$vehicule->id }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header bg-info py-2">
                        <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Management du salaire d'employé : {{ $vehicule->name }}</h5>
                    </div>
                    <div class="modal-body p-2">

                      <ul @class(["list-group"])>
                        <li @class(["list-group-item","active","p-0","ps-2"])>
                          <div @class(["row","row-cols-6","justify-content-end"])>
                            <div @class(["col"])>
                              <span @class(["fw-bolder","text-white","text-capitalize"])>jours</span>
                            </div>
                            <div @class(["col"])>
                              <span @class(["fw-bolder","text-white","text-capitalize"])>mois</span>
                            </div>
                            <div @class(["col"])>
                              <span @class(["fw-bolder","text-white","text-capitalize"])>année</span>
                            </div>
                            <div @class(["col"])>
                              <span @class(["fw-bolder","text-white","text-capitalize"])>salaire</span>
                            </div>
                            <div @class(["col"])>
                              <span @class(["fw-bolder","text-white","text-capitalize"])>état</span>
                            </div>
                            <div @class(["col"])>
                              <span @class(["fw-bolder","text-white","text-capitalize"])>Actions</span>
                            </div>
                          </div>
                        </li>
                      </ul>

                      @foreach ($vehicule->salaires as $es)

                          <form action="{{ route('employe-salaire.update',$es) }}" method="post">
                            @csrf
                            @method("PUT")
                            <input type="hidden" name="employe_id" value="{{ $vehicule->id }}">
                            <ul @class(["list-group"])>
                              <li @class(["list-group-item","py-1","p-0"])>
                                <div @class(["row","row-cols-6"])>
                                  <div @class(["col"])>
                                    <input type="number" min="1" max="31" name="jour" id="" value="{{ $es->jour }}" @class(["form-control","form-control-sm"])>
                                  </div>
                                  <div @class(["col"])>
                                    <select name="mois" id="" @class(["form-select","form-select-sm"])>
                                      <option @class("text-capitalize") value="1" {{ $es->mois == 1 ? "selected":"" }}>1 janvier</option>
                                      <option @class("text-capitalize") value="2" {{ $es->mois == 2 ? "selected":"" }}>2  févriver</option>
                                      <option @class("text-capitalize") value="3" {{ $es->mois == 3 ? "selected":"" }}>3  mars</option>
                                      <option @class("text-capitalize") value="4" {{ $es->mois == 4 ? "selected":"" }}>4  avril</option>
                                      <option @class("text-capitalize") value="5" {{ $es->mois == 5 ? "selected":"" }}>5  mai</option>
                                      <option @class("text-capitalize") value="6" {{ $es->mois == 6 ? "selected":"" }}>6  juin</option>
                                      <option @class("text-capitalize") value="7" {{ $es->mois == 7 ? "selected":"" }}>7  juillet</option>
                                      <option @class("text-capitalize") value="8" {{ $es->mois == 8 ? "selected":"" }}>8  août</option>
                                      <option @class("text-capitalize") value="9" {{ $es->mois == 9 ? "selected":"" }}>9  september</option>
                                      <option @class("text-capitalize") value="10" {{ $es->mois == 10 ? "selected":"" }}>10  october</option>
                                      <option @class("text-capitalize") value="11" {{ $es->mois == 11 ? "selected":"" }}>11 november</option>
                                      <option @class("text-capitalize") value="12" {{ $es->mois == 12 ? "selected":"" }}>12  december</option>
                                    </select>
                                  </div>
                                  <div @class(["col"])>
                                    <input type="text" name="annee" id="" @class(["form-control","form-control-sm"]) value="{{ $es->annee }}">
                                  </div>
                                  <div @class(["col"])>
                                    <input type="text" name="salaire" id="" @class(["form-control","form-control-sm"]) value="{{ $es->salaire }}">
                                  </div>
                                  <div @class("col")>
                                    <select name="etat" id="" @class(["form-select","form-select-sm"])>
                                      <option value="">Choisir l'état</option>
                                      <option @class("text-capitalize") value="valider" {{ $es->etat == "valider" ? "selected":"" }}>valider</option>
                                      <option @class("text-capitalize") value="en attente" {{ $es->etat == "en attente" ? "selected":"" }}>En attente</option>
                                    </select>
                                  </div>
                                  <div @class(["col","d-flex"])>
                                    <button type="submit" @class(["btn","btn-sm","btn-info","me-2"])>
                                      <i @class(["mdi","mdi-pencil"])></i>
                                    </button>
                                    </form>
                                    <form action="{{ route('employe-salaire.destroy',$es) }}" method="post" @class("d-inline")>
                                      @csrf
                                      @method("DELETE")
                                      <div @class(["d-flex","justify-content-center"])>
                                        <button type="submit" @class(["btn","btn-sm","btn-info"]) id="">
                                          <i @class(["mdi","mdi-trash-can"])></i>
                                        </button>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </li>
                            </ul>

                      @endforeach
                      <div @class(["d-flex","justify-content-between","mt-2"])>
                        <button type="button" @class(["btn","btn-sm","waves-effect","waves-light","btn-primary"]) data-bs-toggle="modal" data-bs-target=".salaire{{'-'.$vehicule->id }}">
                          <i @class(["mdi","mdi-arrow-left","mdi-18px","align-middle"])></i>
                          <span>Retour</span>
                        </button>
                        <button type="button" data-bs-dismiss="modal" aria-label="Close" @class(["btn","btn-dark","btn-sm","me-2","fw-bolder"])>
                          <i @class(["mdi","mdi-close-thick","mdi-18px","align-middle"])></i>
                          <span>Annuler</span>
                        </button>
                      </div>



                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->

              {{-- liste salaire annee --}}
              <div class="modal fade salaire-annee{{ $vehicule->id }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                  <div class="modal-content">
                    <div class="modal-header bg-info py-2">
                        <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Salaire d'année</h5>
                        {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                    </div>
                    <div class="modal-body">
                      @foreach ($getAnnee  as $item)
                      @if ($item->employe_id == $vehicule->id)
                        <div id="accordion" class="custom-accordion">
                          <div class="card mb-1 shadow-none">
                              <a href="#collapse{{ $item->annee }}" class="text-dark collapsed" data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapseOne">
                                  <div class="card-header" id="headingOne">
                                      <h6 class="m-0">
                                        {{ $item->annee }}
                                          <i class="mdi mdi-minus float-end accor-plus-icon"></i>
                                      </h6>
                                  </div>
                              </a>
                              <div id="collapse{{ $item->annee }}" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordion" style="">
                                  <div class="card-body px-0 p-2">
                                    <a href="{{ route('employe-salaire.ft',['id'=>$vehicule->id, 'annee'=>$item->annee]) }}" @class(["btn","btn-sm","btn-dark","mb-2","text-white"])>Exporter</a>
                                      <ul @class(["list-group"])>
                                        <li @class(["list-group-item","py-1","text-capitalize","active"])>
                                          <div @class(["row","row-cols-5"])>
                                            <div @class(["col"])>
                                              <span @class(["fw-bolder","text-white"])>jours</span>
                                            </div>
                                            <div @class(["col"])>
                                              <span @class(["fw-bolder","text-white"])>mois</span>
                                            </div>
                                            <div @class(["col"])>
                                              <span @class(["fw-bolder","text-white"])>année</span>
                                            </div>
                                            <div @class(["col"])>
                                              <span @class(["fw-bolder","text-white"])>salaires</span>
                                            </div>
                                            <div @class(["col"])>
                                              <span @class(["fw-bolder","text-white"])>état</span>
                                            </div>
                                          </div>
                                        </li>
                                      </ul>
                                      <ul @class(["list-group"])>
                                        @foreach ($item->items as $row)
                                        <li @class(["list-group-item","py-1"])>
                                          <div @class(["row","row-cols-5"])>
                                            <div @class(["col"])>
                                              <span>{{ $row->jour }}</span>
                                            </div>
                                            <div @class(["col"])>
                                              @if ($row->mois==1)
                                                <span @class("text-capitalize")>{{ $row->mois.' janvier' }}</span>
                                              @elseif ($row->mois==2)
                                                <span @class("text-capitalize")>{{ $row->mois.' février' }}</span>
                                              @elseif ($row->mois==3)
                                                <span @class("text-capitalize")>{{ $row->mois.' mars' }}</span>
                                              @elseif ($row->mois==4)
                                                <span @class("text-capitalize")>{{ $row->mois.' avril' }}</span>
                                              @elseif ($row->mois==5)
                                                <span @class("text-capitalize")>{{ $row->mois.' mai' }}</span>
                                              @elseif ($row->mois==6)
                                                <span @class("text-capitalize")>{{ $row->mois.' juin' }}</span>
                                              @elseif ($row->mois==7)
                                                <span @class("text-capitalize")>{{ $row->mois.' juillet' }}</span>
                                              @elseif ($row->mois== 8)
                                                <span @class("text-capitalize")>{{ $row->mois.' août' }}</span>
                                              @elseif ($row->mois==9)
                                                <span @class("text-capitalize")>{{ $row->mois.' september' }}</span>
                                              @elseif ($row->mois==10)
                                                <span @class("text-capitalize")>{{ $row->mois.' october' }}</span>
                                              @elseif ($row->mois==11)
                                                <span @class("text-capitalize")>{{ $row->mois.' novembre' }}</span>
                                              @elseif ($row->mois==12)
                                                <span @class("text-capitalize")>{{ $row->mois.' december' }}</span>
                                              @endif
                                            </div>
                                            <div @class(["col"])>
                                              <span>{{ $row->annee }}</span>
                                            </div>
                                            <div @class(["col"])>
                                              <span>{{ $row->salaire.' DHS' }}</span>
                                            </div>
                                            <div @class(["col"])>
                                              <span class="{{ $row->etat=='valider' ? 'text-success':'text-danger' }}">{{ $row->etat }}</span>
                                            </div>
                                          </div>
                                          </li>
                                        @endforeach

                                      </ul>

                                  </div>
                              </div>
                          </div>

                        </div>
                      @endif
                      @endforeach
                      <div @class(["d-flex","justify-content-center"])>
                        <button type="button" data-bs-dismiss="modal" aria-label="Close" @class(["btn","btn-dark","btn-sm","me-2","fw-bolder"])>
                          <i @class(["mdi","mdi-close-thick","mdi-18px","align-middle"])></i>
                          <span>Annuler</span>
                        </button>
                      </div>
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->

            @empty
              <tr>
                <th colspan="9" @class(['text-danger','text-center'])>
                  <i @class(['mdi','mdi-alert-rhombus-outline','mdi-18px','align-middle'])></i>
                  <span>Aucun information d'employé</span>
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
      // console.log("ss");
    })
  })
</script>
@endsection