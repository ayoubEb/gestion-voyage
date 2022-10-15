@extends('layouts.master')
@section('content')
@include('sweetalert::alert')
<article @class("card")>
  <div @class(["card-header","px-2"])>
    <div @class(['d-flex','align-items-center',"float-start"])>
      <a href="{{ route('home') }}" @class(['btn','btn-outline-primary','btn-sm','me-2'])>
        <i @class(['mdi','mdi-home'])></i>
      </a>
      <h5 @class(['m-0','ps-1','border','border-top-0','border-bottom-0','border-end-0','border-solid','border-3','border-info'])>
        Liste des attributes
      </h5>
    </div>
    <button type="button"  @class(['btn','btn-info','btn-sm','waves-effect','waves-light',"px-3","float-end"]) data-bs-toggle="modal" data-bs-target=".add">
      Ajouter
    </button>
  </div>
  <div @class(["card-body","p-2"])>
    @include('layouts.session')
    <div @class("table-responsive")>
      <table @class(["table","table-bordered","table-sm","mb-0"])>
        <thead>
          <tr>
            <th @class('text-capitalize')>nom</th>
            <th @class('text-capitalize')>valeurs</th>
            <th @class('text-capitalize')>Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($attributs as $attribut)
            <tr>
              <td @class('align-middle')>{{ $attribut->nom }}</td>
              <td @class('align-middle')>{{ count($attribut->values) }}</td>
              <td @class('align-middle')>
                <button type="button" @class(["btn","btn-sm","waves-effect","waves-light","btn-outline-info",]) data-bs-toggle="modal" data-bs-target=".show{{'-'.$attribut->id }}">
                  <i @class(['mdi','mdi-information-outline'])></i>
                </button>
                <button type="button" @class(["btn","btn-sm","waves-effect","waves-light","btn-outline-info"]) data-bs-toggle="modal" data-bs-target=".del{{'-'.$attribut->id }}">
                  <i @class(["mdi","mdi-trash-can"])></i>
                </button>
              </td>
            </tr>

            {{-- model show --}}
            <div class="modal fade show{{'-'.$attribut->id }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header py-2 bg-info">
                    <h5 class="modal-title text-white" id="myExtraLargeModalLabel">
                      Information d'attribut {{ $attribut->nom }}
                    </h5>
                  </div>
                  <div class="modal-body p-2">
                    <form action="{{ route('attribut.update',$attribut) }}" method="post">
                      @csrf
                      @method("PUT")
                      <div @class(["row","justify-content-center","mb-2"])>
                        <div @class(["col-lg-4"])>
                          <div @class(["form-group"])>
                            <label for="" @class(["form-label"])>Nom l'attribut</label>
                            <div @class(["d-flex"])>
                              <input type="text" name="attribut" value="{{ $attribut->nom }}" @class(["form-control","form-control-sm","me-1"])>
                              <button type="submit" @class(["btn","btn-sm","btn-primary"])>
                                <i @class(["mdi","mdi-pencil"])></i>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                    <ul @class(['list-group','mb-3'])>
                      <div @class(['row','row-cols-2'])>
                        @foreach ($attribut->values as $att_val)
                        <div @class(['col'])>
                          <li @class(['list-group-item','px-2','py-1'])>
                            <form action="{{ route('attribut-value.destroy',$att_val) }}" method="post" @class(["d-inline"])>
                              @csrf
                              @method("DELETE")
                                <button type="submit" @class(["btn","btn-sm","btn-info","float-start","me-2"]) id="">
                                  <i @class(["mdi","mdi-trash-can"])></i>
                                </button>
                            </form>
                            <form action="{{ route('attribut-value.update',$att_val) }}" method="post" @class("d-inline")>
                              @csrf
                              @method("PUT")
                              <input type="hidden" name="attribut_id" value="{{ $attribut->id }}">
                              <div @class(["d-flex"])>
                                <input type="text" name="value" @class(["form-control","form-control-sm","me-2"]) value="{{ $att_val->valeur }}">
                                <button type="submit" @class(["btn","btn-sm","btn-primary"])>
                                  <i @class(["mdi","mdi-pencil"])></i>
                                </button>
                              </div>
                            </form>
                          </li>
                          </div>
                        @endforeach
                        </div>
                    </ul>

                    <button type="button" data-bs-dismiss="modal" aria-label="Close" @class(["btn","btn-outline-secondary","btn-sm","me-2","fw-bolder"])>
                      {{-- <i @class(["mdi","mdi-arrow-left-drop-circle-outline","mdi-18px","align-middle"])></i> --}}
                      <i @class(["mdi","mdi-arrow-left-drop-circle-outline","mdi-18px","align-middle"])></i>
                      <span>Fermer</span>
                    </button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->



            {{-- model delete --}}
            <div class="modal fade del{{'-'.$attribut->id }}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-md modal-dialog-centered">
                  <div class="modal-content border border-3 border-danger border-solid">
                      <div class="modal-header bg-danger py-2">
                          <h6 class="modal-title fw-bolder m-0 text-white" id="myExtraLargeModalLabel">
                              Confirmer La Suppression
                          </h6>
                      </div>
                      <div class="modal-body">
                        <form action="{{ route('attribut.destroy',$attribut) }}" method="post">
                          @csrf
                          @method("DELETE")
                          <div @class(["text-center","mb-2"])>
                            <i @class(["mdi","mdi-alert-circle-outline","me-1","mdi-48px","text-danger"])></i>
                            <h5 @class(["m-0","mb-1"])>Êtes-vous sûr de vouloir supprimer ?</h5>
                            <h6 @class(["m-0","fw-bolder","border","border-solid","border-1","border-danger","rounded-pill","py-2"])>{{ $attribut->nom }}</h6>
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
              <td colspan="3">
                <h6 @class(["m-0","text-danger","text-center"])>
                  <i @class(["mdi","mdi-alert-rhombus-outline","align-middle"])></i>
                  <span>Aucun donnée trouvé</span>
                </h6>
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
          <h5 class="modal-title text-white" id="myExtraLargeModalLabel">Ajouter des attributs</h5>
      </div>
      <div class="modal-body">
        <form action="{{ route('attribut.store') }}" method="post">
          @csrf
          <div @class(["form-group","mb-2"])>
            <input type="text" name="attribut" id="" class="form-control form-control-sm @error('attribut') is-invalid @enderror" placeholder="Nom du l'attribut">
            @error('attribut')
              <strong @class("invalid-feedback")>{{ $message }}</strong>
            @enderror
          </div>
          <button type="button" id="add" @class(["btn","btn-sm","btn-outline-info","w-100","mb-2"])>
            <i @class(["mdi","mdi-plus-circle-outline","mdi-18px","align-middle"])></i>
            <span>Ajouter des valeurs</span>
          </button>
          <div @class(["row","row-cols-2"]) id="values">

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
    $("#add").on("click",function(){
      var value = " ";
      value+='<div @class(["col","mb-2","d-flex"])>';
        value+='<input type="text" @class(["form-control","form-control-sm","me-1"]) placeholder="value" name="value[]">';
        value+='<button type="button" @class(["btn","btn-sm","btn-danger"]) id="remove"><i @class(["mdi","mdi-trash-can"])></i></button>';
      value+='</div>';
      $("#values").append(value);
      $(".form-control").prop("required",true);
    });
    $(document).on("click","#remove",function(){
          (this).closest(".col").remove();
      })
  })
</script>
@endsection