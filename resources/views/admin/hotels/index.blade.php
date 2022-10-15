@extends('layouts.master')
@section('content')
@include('sweetalert::alert')
<article @class('card')>
  <div @class(["card-header","px-2"])>
    <div @class(['d-flex','align-items-center',"float-start"])>
      <a href="{{ route('home') }}" @class(['btn','btn-outline-primary','btn-sm','me-2'])>
        <i @class(['mdi','mdi-home'])></i>
      </a>
      <h5 @class(['m-0','ps-1','border','border-top-0','border-bottom-0','border-end-0','border-solid','border-3','border-info'])>
        Liste des hôtels
      </h5>
    </div>
    <button type="button"  @class(['btn','btn-info','btn-sm','waves-effect','waves-light',"px-3","float-end"]) data-bs-toggle="modal" data-bs-target=".add-hotel">
      Ajouter
    </button>
  </div>
  <div @class(['card-body','p-2'])>
    @include('layouts.session')
    <div @class('table-responsive')>
      <table @class(['table','table-bordered','table-sm','mb-0'])>
        <thead @class(["table-info"])>
          <tr>
            {{-- <th @class('text-capitalize')></th> --}}
            <th @class('text-capitalize')>nom</th>
            <th @class('text-capitalize')>CP</th>
            <th @class('text-capitalize')>e-mail</th>
            <th @class('text-capitalize')>téléphone</th>
            <th @class('text-capitalize')>adresse</th>
            <th @class('text-capitalize')>ville</th>
            <th @class('text-capitalize')>attribut</th>
            <th @class('text-capitalize')>actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($hotels as $hotel)
          {{-- @class(["edit"=> Session::get('update-hotel') === $hotel->id]) id="hea" --}}
            <tr >
              {{-- <td @class("align-middle")>
                @if (Session::get('update-hotel') === $hotel->id)
                <button id="cl">
                  <i @class(["mdi","mdi-check-bold"])></i>
                </button>
                @else
                  dsd
                @endif
              </td> --}}

              <td @class(["align-middle"])>
                {{ $hotel->nom_h }}
              </td>
              <td @class("align-middle")>{{ $hotel->cp_h }}</td>
              <td @class("align-middle")>{{ $hotel->email_h }}</td>
              <td @class("align-middle")>{{ $hotel->telephone_h }}</td>
              <td @class("align-middle")>{{ $hotel->adresse_h }}</td>
              <td @class("align-middle")>{{ $hotel->ville_h }}</td>
              <td @class("align-middle")>
                <button type="button" @class(["btn","btn-sm","waves-effect","waves-light","btn-beige","text-white"]) data-bs-toggle="modal" data-bs-target=".attribut{{$hotel->id }}">
                  <span >{{ count($hotel->attribut_values) }}</span>
                  <i @class(['mdi','mdi-eye-outline'])></i>
                </button>
              </td>
              <td @class("align-middle")>
                <button type="button" @class(["btn","btn-sm","waves-effect","waves-light","btn-outline-info",]) data-bs-toggle="modal" data-bs-target=".edit-{{$hotel->id }}">
                  <i @class(['mdi','mdi-pencil-outline'])></i>
                </button>
                <button type="button" @class(["btn","btn-sm","waves-effect","waves-light","btn-outline-info"]) data-bs-toggle="modal" data-bs-target=".del{{$hotel->id }}">
                  <i @class(["mdi","mdi-trash-can"])></i>
                </button>
              </td>
            </tr>
            {{-- model edit --}}
            <div class="modal fade edit-{{$hotel->id }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-md">
                <div class="modal-content">
                  <div class="modal-header py-2 bg-info">
                    <h5 class="modal-title text-white" id="myExtraLargeModalLabel">
                      Modifier d'hôtel : {{ $hotel->nom_h }}
                    </h5>
                  </div>
                  <div class="modal-body p-2">
                    <form action="{{ route('hotel.update',$hotel) }}" method="post">
                      @csrf
                      @method("PUT")
                      <div @class(["form-group","mb-2"])>
                        <label for="" @class(["form-label","text-capitalize"])>nom</label>
                        <input type="text" name="nom" id="" class="form-control form-control-sm" value="{{ $hotel->nom_h }}">
                      </div>
                      <div @class(["form-group","mb-2"])>
                        <label for="" @class(["form-label","text-capitalize"])>CP</label>
                        <input type="text" name="cp" id="" class="form-control form-control-sm" value="{{ $hotel->cp_h }}">

                      </div>
                      <div @class(["form-group","mb-2"])>
                        <label for="" @class(["form-label","text-capitalize"])>email</label>
                        <input type="email" name="email" id="" class="form-control form-control-sm" value="{{ $hotel->email_h }}">

                      </div>
                      <div @class(["form-group","mb-2"])>
                        <label for="" @class(["form-label","text-capitalize"])>adresse</label>
                        <input type="text" name="adresse" id="" class="form-control form-control-sm" value="{{ $hotel->adresse_h }}">
                      </div>
                      <div @class(["form-group","mb-2"])>
                        <label for="" @class(["form-label","text-capitalize"])>ville</label>
                        <input type="text" name="ville" id="" class="form-control form-control-sm" value="{{ $hotel->ville_h }}">
                      </div>
                      <div @class(["form-group","mb-2"])>
                        <label for="" @class(["form-label","text-capitalize"])>téléphone</label>
                        <input type="text" name="telephone" id="" class="form-control form-control-sm" value="{{ $hotel->telephone_h }}">
                      </div>

                      <button type="button" data-bs-dismiss="modal" aria-label="Close" @class(["btn","btn-dark","btn-sm","fw-bolder","float-start"])>
                        <i @class(["mdi","mdi-close-thick","mdi-18px","align-middle"])></i>
                        <span>Fermer</span>
                      </button>
                      <button type="submit" @class(["btn","btn-info","btn-sm","fw-bolder","float-end"])>
                        <i @class(["mdi","mdi-checkbox-marked-circle-outline","mdi-18px","align-middle"])></i>
                        <span>Modifier</span>
                      </button>
                    </form>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->


            {{-- model edit --}}
            <div class="modal fade attribut{{$hotel->id }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header py-2 bg-info">
                    <h5 class="modal-title text-white" id="myExtraLargeModalLabel">

                    </h5>
                  </div>
                  <div class="modal-body p-2">
                    <ul @class(["list-group","mb-1"])>
                      <div @class(["row","row-cols-3"])>
                        <div @class(["col"])>
                          <li @class(["list-group-item","p-1","px-2","active"])>Nom</li>
                        </div>
                        <div @class(["col"])>
                          <li @class(["list-group-item","p-1","px-2","active"])>Valeur</li>
                        </div>
                        <div @class(["col"])>
                          <li @class(["list-group-item","p-1","px-2","active"])>Prix</li>
                        </div>
                      </div>
                    </ul>
                    @forelse ($hotel->attribut_values as $a_v)
                      <ul @class(["list-group","mb-1"])>
                        <div @class(["row","row-cols-3"])>
                          <div @class(["col"])>
                            <li @class(["list-group-item","p-1","px-2"])>{{ $a_v->att_val->attribut->nom }}</li>
                          </div>
                          <div @class(["col"])>
                            <li @class(["list-group-item","p-1","px-2"])>{{ $a_v->att_val->valeur }}</li>
                          </div>
                          <div @class(["col"])>
                            <li @class(["list-group-item","p-1","px-2"])>{{ $a_v->prix.' DHS' }}</li>
                          </div>
                        </div>
                      </ul>
                    @empty

                    @endforelse
                    <button type="button" @class(["btn","btn-beige","w-100","text-white","mb-2"])>Ajouter une attribut</button>
                    <form action="{{ route('hotel-attribut.store') }}" method="post">
                      @csrf
                      <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">
                      <div id="add-att" @class(["row","row-cols-3","mb-2"])>
                        <div @class(["col","mb-2"])>
                          <div @class(["form-group"])>
                            <select name="" id="attribut" class="form-select form-select-sm">
                              <option value="">Choisir le nom d'attribut</option>
                              @foreach ($attributs as $item)
                                <option value="{{ $item->id }}">{{ $item->nom }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div @class(["col","mb-2"])>
                          <div @class(["form-group"])>
                            <select name="value" id="valeur" class="form-select form-select-sm">
                              <option value="">Choisir le value d'attribut</option>

                            </select>
                          </div>
                        </div>
                        <div @class(["col","mb-2"])>
                          <div @class(["form-group"])>
                            <input type="text" name="prix" id="" class="form-control form-control-sm" value="{{ old('prix') }}" placeholder="prix">
                          </div>
                        </div>
                      </div>
                      <button type="button" data-bs-dismiss="modal" aria-label="Close" @class(["btn","btn-dark","btn-sm","fw-bolder","float-start"])>
                        <i @class(["mdi","mdi-close-thick","mdi-18px","align-middle"])></i>
                        <span>Fermer</span>
                      </button>
                      <button type="submit" @class(["btn","btn-info","btn-sm","fw-bolder","float-end"])>
                        <i @class(["mdi","mdi-checkbox-marked-circle-outline","mdi-18px","align-middle"])></i>
                        <span>Enregistrer</span>
                      </button>
                    </form>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            {{-- model delete --}}
            <div class="modal fade del{{$hotel->id }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-md modal-dialog-centered">
                  <div class="modal-content border border-3 border-danger border-solid">
                      <div class="modal-header bg-danger py-2">
                          <h6 class="modal-title fw-bolder m-0 text-white" id="myExtraLargeModalLabel">
                              Confirmer La Suppression
                          </h6>
                      </div>
                      <div class="modal-body">
                        <form action="{{ route('hotel.destroy',$hotel) }}" method="post">
                          @csrf
                          @method("DELETE")
                          <div @class(["text-center","mb-2"])>
                            <i @class(["mdi","mdi-alert-circle-outline","me-1","mdi-48px","text-danger"])></i>
                            <h5 @class(["m-0","mb-1"])>Êtes-vous sûr de vouloir supprimer ?</h5>
                            <h6 @class(["m-0","mb-2","fw-bolder","border","border-solid","border-1","border-danger","rounded-pill","py-2"])>{{ $hotel->nom_h }}</h6>
                            <h6 @class(["m-0","mb-2","fw-bolder","border","border-solid","border-1","border-danger","rounded-pill","py-2"])>{{ $hotel->cp_h }}</h6>
                            <h6 @class(["m-0","fw-bolder","border","border-solid","border-1","border-danger","rounded-pill","py-2"])>{{ $hotel->email_h }}</h6>
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
              <td colspan="7">
                <h6 @class(["m-0","text-danger","text-center"])>
                  Aucun donnée trouvé
                </h6>
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

</div>



{{-- modal ajouter --}}
<div class="modal fade add-hotel" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-md">
    <div class="modal-content">
      <div class="modal-header bg-info py-2">
          <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Ajouter un hôtel</h5>
      </div>
      <div class="modal-body">
        <form action="{{ route('hotel.store') }}" method="post">
          @csrf
          <div @class(["form-group","mb-2"])>
            <input type="text" name="nom" id="" class="form-control form-control-sm @error('nom') is-invalid @enderror" placeholder="nom" value="{{ old('nom') }}">
            @error('nom')
              <strong @class("invalid-feedback")>{{ $message }}</strong>
            @enderror
          </div>
          <div @class(["form-group","mb-2"])>
            <input type="text" name="adresse" id="" class="form-control form-control-sm @error('adresse') is-invalid @enderror" placeholder="adresse" value="{{ old('adresse') }}">
            @error('adresse')
              <strong @class("invalid-feedback")>{{ $message }}</strong>
            @enderror
          </div>
          <div @class(["form-group","mb-2"])>
            <input type="text" name="cp" id="" class="form-control form-control-sm @error('cp') is-invalid @enderror" placeholder="CP" value="{{ old('cp') }}">
            @error('cp')
              <strong @class("invalid-feedback")>{{ $message }}</strong>
            @enderror
          </div>
          <div @class(["form-group","mb-2"])>
            <input type="text" name="ville" id="" class="form-control form-control-sm @error('ville') is-invalid @enderror" placeholder="ville" value="{{ old('ville') }}">
            @error('ville')
              <strong @class("invalid-feedback")>{{ $message }}</strong>
            @enderror
          </div>
          <div @class(["form-group","mb-2"])>
            <input type="email" name="email" id="" class="form-control form-control-sm @error('email') is-invalid @enderror" placeholder="email" value="{{ old('email') }}">
            @error('email')
              <strong @class("invalid-feedback")>{{ $message }}</strong>
            @enderror
          </div>
          <div @class(["form-group","mb-2"])>
            <input type="text" name="telephone" id="" class="form-control form-control-sm @error('telephone') is-invalid @enderror" placeholder="téléphone" value="{{ old('telephone') }}">
            @error('telephone')
            <strong @class("invalid-feedback")>{{ $message }}</strong>
            @enderror
          </div>
          <button type="button" @class(["btn","btn-beige","w-100","text-white","mb-2"])>Ajouter une attribut</button>
          <div id="add-at">
            <div @class(["form-group","mb-2"])>
              <select name="" id="attr" class="form-select form-select-sm">
                <option value="">Choisir le nom d'attribut</option>
                @foreach ($attributs as $item)
                  <option value="{{ $item->id }}">{{ $item->nom }}</option>
                @endforeach
              </select>
            </div>
            <div @class(["form-group","mb-2"])>
              <select name="value" id="valu" class="form-select form-select-sm">
                <option value="">Choisir le value d'attribut</option>

              </select>
            </div>
          </div>
          <div @class(["form-group","mb-2"])>
            <input type="text" name="prix" id="" class="form-control form-control-sm @error('prix') is-invalid @enderror" value="{{ old('prix') }}">
            @error('prix')
              <strong @class('invalid-feedback')>{{ $message }}</strong>
            @enderror
          </div>
          <div @class(['d-flex','justify-content-between'])>
            <button type="button" data-bs-dismiss="modal" aria-label="Close" @class(["btn","btn-outline-secondary","btn-sm","fw-bolder"])>
              <i @class(["mdi","mdi-arrow-left-drop-circle-outline","mdi-18px","align-middle"])></i>
              <span>Annuler</span>
            </button>

            <button type="submit" @class(['btn','btn-sm','btn-info'])>
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
@section('script')
  <script>
    $(document).ready(function(){
      $("#attr").on("change",function(){
        var at = $(this).val();
        var out = "";
        $.ajax({
          method:"GET",
          url:"{{ route('getAttribut') }}",
          data:{"id":at},
          success:function(data){
            for (var i=0;i<data.length;i++){
              out += '<option value="'+data[i].id+'">'+data[i].valeur+'</option>';
            }
            $("#valu").append(out);
          }

        })
      })
    })
  </script>
    <script>
      $(document).ready(function(){
        $("#attribut").on("change",function(){
          var at = $(this).val();
          var out = "";
          $.ajax({
            method:"GET",
            url:"{{ route('getAttribut') }}",
            data:{"id":at},
            success:function(data){
              for (var i=0;i<data.length;i++){
                out += '<option value="'+data[i].id+'">'+data[i].valeur+'</option>';
              }
              $("#valeur").append(out);
            }

          })
        })
      })
    </script>
  <script>
  var edit = document.getElementsByClassName("edit");
  setTimeout(function(){edit[0].style.backgroundColor="#FFCB42"}, 0000);
  setInterval(function(){edit[0].style.backgroundColor="white"}, 2000);:




</script>
<script>
  $(document).ready(function(){
    $("#cl").on("click",function(){
      $("#hea").removeClass("edit");
    });
  });
</script>

@endsection