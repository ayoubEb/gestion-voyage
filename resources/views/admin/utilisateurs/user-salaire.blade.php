@extends('layouts.master')
@section('content')
@include('sweetalert::alert')
  <div @class(["card"])>
    <div @class(["card-body","p-1"])>
      <div @class(['d-flex','justify-content-between','mb-4','align-items-center'])>
        <div @class(['d-flex','align-items-center'])>
          <a href="{{ route('home') }}" @class(['btn','btn-outline-primary','btn-sm','me-2'])>
            <i @class(['mdi','mdi-home','mdi-18px'])></i>
          </a>
          <h4 @class(['m-0','ps-1','border','border-top-0','border-bottom-0','border-end-0','border-solid','border-3','border-info'])>
            Liste du salaires
          </h4>
        </div>
        <button type="button" @class(['btn','btn-info','btn-sm','d-flex','align-items-center','fw-bolder']) data-bs-toggle="modal" data-bs-target=".add">
          <i @class(['mdi','mdi-plus-circle-outline','mdi-18px','me-1'])></i>
          <span>Ajouter un salaire</span>
        </button>
      </div>
      <div @class("table-responsive")>
        <table @class(["table","table-sm","table-bordered","m-0"])>
          <thead>
            <tr>
              <th @class(["text-capitalize"])>Name</th>
              <th @class(["text-capitalize"])>Jour</th>
              <th @class(["text-capitalize"])>Mois</th>
              <th @class(["text-capitalize"])>Année</th>
              <th @class(["text-capitalize"])>Salaire</th>
              <th @class(["text-capitalize"])>état</th>
              <th @class(["text-capitalize"])>reçu</th>
              <th @class(["text-capitalize"])>Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($userSalaires as $userSalaire)
              <tr>
                <td @class(["align-middle"])>
                  <button type="button" @class(["btn","btn-sm","ps-0","waves-effect","waves-light","btn-link","fw-bolder"]) data-bs-toggle="modal" data-bs-target=".show-{{ $userSalaire->user->id }}">
                    <h6 @class("m-0")>{{ $userSalaire->user->name }}</h6>
                  </button>
                </td>
                <td @class(["align-middle"])>
                  {{ $userSalaire->jour }}
                </td>
                <td @class(["align-middle"])>
                  @if ($userSalaire->mois == 1)
                    {{ $userSalaire->mois.' Janvier' }}
                  @elseif($userSalaire->mois == 2)
                    {{ $userSalaire->mois.' Février' }}
                  @elseif($userSalaire->mois == 3)
                    {{ $userSalaire->mois.' Mars' }}
                  @elseif($userSalaire->mois == 4)
                    {{ $userSalaire->mois.' Avril' }}
                  @elseif($userSalaire->mois == 5)
                    {{ $userSalaire->mois.' Mai' }}
                  @elseif($userSalaire->mois == 6)
                    {{ $userSalaire->mois.' juin' }}
                  @elseif($userSalaire->mois == 7)
                    {{ $userSalaire->mois.' Juillet' }}
                  @elseif($userSalaire->mois == 8)
                    {{ $userSalaire->mois.' Aôut' }}
                  @elseif($userSalaire->mois == 9)
                    {{ $userSalaire->mois.' Septembre' }}
                  @elseif($userSalaire->mois == 10)
                    {{ $userSalaire->mois.' October' }}
                  @elseif($userSalaire->mois == 11)
                    {{ $userSalaire->mois.' Novembre' }}
                  @elseif($userSalaire->mois == 12)
                    {{ $userSalaire->mois.' December' }}
                  @endif
                </td>
                <td @class(["align-middle"])>
                  {{ $userSalaire->annee }}
                </td>
                <td @class(["align-middle"])>
                  {{ $userSalaire->salaire.' DHS' }}
                </td>
                <td @class(["align-middle"])>
                  <i class="{{ $userSalaire->etat=='valider' ? 'mdi mdi-check-bold mdi-18px text-success':'mdi mdi-close-thick tet-danger mdi-18px text-danger' }}"></i>
                </td>
                <td @class(["align-middle"])>
                  @if ($userSalaire->etat=="valider")
                    <a href="{{ route('user-recu',$userSalaire) }}">
                      <i @class(["mdi","mdi-file-outline","mdi-18px"])></i>
                    </a>
                  @else

                  @endif
                </td>
                <td @class(["align-middle"])>
                  <button type="button" @class(["btn","btn-sm","waves-effect","waves-light","btn-outline-info"]) data-bs-toggle="modal" data-bs-target=".edit{{'-'.$userSalaire->id }}">
                    <i @class(["mdi","mdi-pencil" ])></i>
                  </button>
                  <button type="button" @class(["btn","btn-sm","waves-effect","waves-light","btn-outline-info"]) data-bs-toggle="modal" data-bs-target=".del{{'-'.$userSalaire->id }}">
                    <i @class(["mdi","mdi-trash-can"])></i>
                  </button>
                </td>
              </tr>

            {{-- model show user --}}
            <div class="modal fade show-{{$userSalaire->user->id }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header bg-info py-2">
                      <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Information d'utilisateur : {{ $userSalaire->user->name }}</h5>
                      {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                  </div>
                  <div class="modal-body p-2">
                    <ul @class(["list-group","mb-2"])>
                      <div @class(['row','row-cols-2'])>
                        <div @class(["col-lg-2","pe-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>
                            <span @class(["fw-bolder"])>CNIE</span>
                          </li>
                        </div>
                        <div @class(["col-lg-10","ps-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2"])>
                            {{ $userSalaire->user->cnie }}
                          </li>
                        </div>
                        <div @class(["col-lg-2","pe-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>
                            <span @class(["fw-bolder"])>name</span>
                          </li>
                        </div>
                        <div @class(["col-lg-10","ps-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2"])>
                            {{ $userSalaire->user->name }}
                          </li>
                        </div>
                        <div @class(["col-lg-2","pe-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>
                            <span @class(["fw-bolder"])>adresse</span>
                          </li>
                        </div>
                        <div @class(["col-lg-10","ps-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2"])>
                            {{ $userSalaire->user->adresse }}
                          </li>
                        </div>
                        <div @class(["col-lg-2","pe-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>
                            <span @class(["fw-bolder"])>ville</span>
                          </li>
                        </div>
                        <div @class(["col-lg-10","ps-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2"])>
                            {{ $userSalaire->user->ville }}
                          </li>
                        </div>
                        <div @class(["col-lg-2","pe-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>
                            <span @class(["fw-bolder"])>pays</span>
                          </li>
                        </div>
                        <div @class(["col-lg-10","ps-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2"])>
                            {{ $userSalaire->user->pays }}
                          </li>
                        </div>
                        <div @class(["col-lg-2","pe-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>
                            <span @class(["fw-bolder"])>nationalité</span>
                          </li>
                        </div>
                        <div @class(["col-lg-10","ps-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2"])>
                            {{ $userSalaire->user->nationalite }}
                          </li>
                        </div>
                        <div @class(["col-lg-2","pe-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>
                            <span @class(["fw-bolder"])>e-mail</span>
                          </li>
                        </div>
                        <div @class(["col-lg-10","ps-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2"])>
                            {{ $userSalaire->user->email }}
                          </li>
                        </div>
                        <div @class(["col-lg-2","pe-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>
                            <span @class(["fw-bolder"])>téléphone</span>
                          </li>
                        </div>
                        <div @class(["col-lg-10","ps-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2"])>
                            {{ $userSalaire->user->telephone }}
                          </li>
                        </div>
                        <div @class(["col-lg-2","pe-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>
                            <span @class(["fw-bolder"])>genre</span>
                          </li>
                        </div>
                        <div @class(["col-lg-10","ps-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2"])>
                            {{ $userSalaire->user->genre }}
                          </li>
                        </div>
                        <div @class(["col-lg-2","pe-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>
                            <span @class(["fw-bolder"])>poste</span>
                          </li>
                        </div>
                        <div @class(["col-lg-10","ps-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2"])>
                            {{ $userSalaire->user->poste }}
                          </li>
                        </div>
                        <div @class(["col-lg-2","pe-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2","text-capitalize","bg-light"])>
                            <span @class(["fw-bolder"])>travail</span>
                          </li>
                        </div>
                        <div @class(["col-lg-10","ps-0","mb-1"])>
                          <li @class(["list-group-item","py-1","ps-2"])>
                            {{ $userSalaire->user->travail }}
                          </li>
                        </div>

                      </div>
                    </ul>
                      <button type="button" data-bs-dismiss="modal" aria-label="Close" @class(["btn","btn-dark","btn-sm","me-2","fw-bolder"])>
                        <i @class(["mdi","mdi-close-thick","mdi-18px","align-middle"])></i>
                        <span>Fermer</span>
                      </button>

                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->


            {{-- modal edit --}}
            <div class="modal fade edit{{'-'.$userSalaire->id }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-md">
                <div class="modal-content">
                  <div class="modal-header bg-info py-2">
                      <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Modifier l'utilisateur : {{ $userSalaire->user->name}}</h5>
                      {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                  </div>
                  <div class="modal-body">
                    <form action="{{ route('user-salaire.update',$userSalaire) }}" method="post">
                      @csrf
                      @method('PUT')
                      <div @class(["row","row-cols-1"])>
                        <div @class(["col","mb-2"])>
                          <div @class(['form-group'])>
                            <label for="">Utilisateur</label>
                            <select name="user_id" id="" class="form-select form-select-sm">
                              <option value="">Choisir l'utilisateur</option>
                              @foreach ($users as $user)
                                @if ($user->id != Auth::user()->id)
                                <option value="{{ $user->id }}" {{ $user->id == $userSalaire->user_id ? 'selected':'' }}>{{ $user->name }}</option>
                                @endif
                              @endforeach
                            </select>
                            @error('user_id')
                              <strong @class('invalid-feedback')>{{ $message }}</strong>
                            @enderror
                          </div>
                        </div>
                        <div @class(["col","mb-2"])>
                          <div @class(['form-group'])>
                            <label for="" @class('form-label')>Jour</label>
                            <input type="number" name="jour" min="1" max="31" class="form-control form-control-sm mb-1 @error('jour') is-invalid @enderror"  value="{{ $userSalaire->jour }}">
                            @error('jour')
                            <strong class="invalid-feedback">{{ $message }}</strong>
                            @enderror
                          </div>
                        </div>
                        <div @class(["col","mb-2"])>
                          <div @class(['form-group'])>
                            <label for="" @class('form-label')>Mois</label>
                            <input type="number" name="mois" min="1" max="12" class="form-control form-control-sm mb-1 @error('mois') is-invalid @enderror"  value="{{ $userSalaire->mois }}">
                            @error('mois')
                            <strong class="invalid-feedback">{{ $message }}</strong>
                            @enderror
                          </div>
                        </div>
                        <div @class(["col","mb-2"])>
                          <div @class(['form-group'])>
                            <label for="" @class('form-label')>Année</label>
                            <input type="number" name="annee" min="{{ date('Y') }}" class="form-control form-control-sm mb-1 @error('annee') is-invalid @enderror"  value="{{ $userSalaire->annee }}">
                            @error('annee')
                            <strong class="invalid-feedback">{{ $message }}</strong>
                            @enderror
                          </div>
                        </div>
                        <div @class(["col","mb-2"])>
                          <div @class(['form-group'])>
                            <label for="" @class('form-label')>Salaire</label>
                            <input type="text" name="salaire" class="form-control form-control-sm mb-1 @error('salaire') is-invalid @enderror"  value="{{ $userSalaire->salaire }}">
                            @error('salaire')
                            <strong class="invalid-feedback">{{ $message }}</strong>
                            @enderror
                          </div>
                        </div>
                        <div @class(["col","mb-2"])>
                          <div @class(['form-group'])>
                            <label for="" @class(['form-label',"text-capitalize"])>état</label>
                            <select name="etat" id="" class="form-select form-select-sm @error('etat') is-invalid @enderror">
                              <option value="">Choisir l'état</option>
                              <option value="valider" {{ $userSalaire->etat=='valider' ? 'selected':'' }}>valider</option>
                              <option value="en attente" {{ $userSalaire->etat=='en attente' ? 'selected':'' }}>en attente</option>
                            </select>
                            @error('etat')
                            <strong class="invalid-feedback">{{ $message }}</strong>
                            @enderror
                          </div>
                        </div>
                      </div>

                      <div @class(['d-flex','justify-content-between'])>

                        <button type="button" data-bs-dismiss="modal" aria-label="Close" @class(["btn","btn-dark","btn-sm","me-2","fw-bolder"])>
                          <i @class(["mdi","mdi-close-thick","mdi-18px","align-middle"])></i>
                          <span>Annuler</span>
                        </button>

                          <button type="submit" @class(['btn','btn-sm','btn-info','me-2'])>
                            <i @class(['mdi','mdi-check-outline'])></i>
                            <span>Modifier</span>
                          </button>

                      </div>
                    </form>

                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->



            {{-- model delete --}}
            <div class="modal fade del{{'-'.$userSalaire->id }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-md modal-dialog-centered">
                  <div class="modal-content border border-3 border-danger border-solid">
                      <div class="modal-header bg-danger py-2">
                          <h6 class="modal-title fw-bolder m-0 text-white" id="myExtraLargeModalLabel">
                              Confirmer La Suppression
                          </h6>
                      </div>
                      <div class="modal-body">
                        <form action="{{ route('user-salaire.destroy',$userSalaire) }}" method="post">
                          @csrf
                          @method("DELETE")
                          <div @class(["text-center","mb-2"])>
                            <i @class(["mdi","mdi-alert-circle-outline","me-1","mdi-48px","text-danger"])></i>
                            <h5 @class(["m-0","mb-1"])>Êtes-vous sûr de vouloir supprimer ?</h5>
                            <h6 @class(["mb-2","fw-bolder","border","border-solid","border-1","border-danger","rounded-pill","py-2"])>
                              <span>Mois : </span>
                              {{ $userSalaire->mois }}
                            </h6>
                            <h6 @class(["mb-2","fw-bolder","border","border-solid","border-1","border-danger","rounded-pill","py-2"])>
                              <span>Année : </span>
                              {{ $userSalaire->annee }}
                            </h6>
                            <h6 @class(["mb-2","fw-bolder","border","border-solid","border-1","border-danger","rounded-pill","py-2"])>
                              <span>Salaire : </span>
                              {{ $userSalaire->salaire.' DHS' }}
                            </h6>
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
            @empty
            <tr>
              <td colspan="8" @class(["text-center","text-danger"])>
                <h6 @class(["m-0"])>Aucun information du salaires</h6>
              </td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>


  {{-- modal ajouter --}}
<div class="modal fade add" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-md">
    <div class="modal-content">
      <div class="modal-header bg-info py-2">
          <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Ajouter un utilisateur</h5>
      </div>
      <div class="modal-body">
        <form action="{{ route('user-salaire.store') }}" method="post">
          @csrf
          <div @class(["row","row-cols-1"])>
            <div @class(["col","mb-2"])>
              <div @class(['form-group'])>
                <label for="">Utilisateur</label>
                <select name="user_id" id="" class="form-select form-select-sm">
                  <option value="">Choisir l'utilisateur</option>
                  @foreach ($users as $user)
                    @if ($user->id != Auth::user()->id)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endif
                  @endforeach
                </select>
                @error('user_id')
                  <strong @class('invalid-feedback')>{{ $message }}</strong>
                @enderror
              </div>
            </div>
            <div @class(["col","mb-2"])>
              <div @class(['form-group'])>
                <label for="" @class('form-label')>Jour</label>
                <input type="number" name="jour" min="1" max="31" class="form-control form-control-sm mb-1 @error('jour') is-invalid @enderror"  value="{{ date('d') }}">
                @error('jour')
                <strong class="invalid-feedback">{{ $message }}</strong>
                @enderror
              </div>
            </div>
            <div @class(["col","mb-2"])>
              <div @class(['form-group'])>
                <label for="" @class('form-label')>Mois</label>
                <input type="number" name="mois" min="1" max="12" class="form-control form-control-sm mb-1 @error('mois') is-invalid @enderror"  value="{{ date('m') }}">
                @error('mois')
                <strong class="invalid-feedback">{{ $message }}</strong>
                @enderror
              </div>
            </div>
            <div @class(["col","mb-2"])>
              <div @class(['form-group'])>
                <label for="" @class('form-label')>Année</label>
                <input type="number" name="annee" min="{{ date('Y') }}" class="form-control form-control-sm mb-1 @error('annee') is-invalid @enderror"  value="{{ date('Y') }}">
                @error('annee')
                <strong class="invalid-feedback">{{ $message }}</strong>
                @enderror
              </div>
            </div>
            <div @class(["col","mb-2"])>
              <div @class(['form-group'])>
                <label for="" @class('form-label')>Salaire</label>
                <input type="text" name="salaire" class="form-control form-control-sm mb-1 @error('salaire') is-invalid @enderror"  value="{{ old('salaire') }}">
                @error('salaire')
                <strong class="invalid-feedback">{{ $message }}</strong>
                @enderror
              </div>
            </div>
            <div @class(["col","mb-2"])>
              <div @class(['form-group'])>
                <label for="" @class(['form-label',"text-capitalize"])>état</label>
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

          <div @class(['d-flex','justify-content-between'])>
            <button type="button" data-bs-dismiss="modal" aria-label="Close" @class(["btn","btn-outline-secondary","btn-sm","me-2","fw-bolder"])>
              <i @class(["mdi","mdi-arrow-left-drop-circle-outline","mdi-18px","align-middle"])></i>
              <span>Annuler</span>
            </button>

              <button type="submit" @class(['btn','btn-sm','btn-info','me-2'])>
                <i @class(['mdi','mdi-checkbox-marked-circle-outline','mdi-18px','align-middle'])></i>
                <span>Enregistrer</span>
              </button>
          </div>
        </form>

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection