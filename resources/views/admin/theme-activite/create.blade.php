@inject('activites', 'App\Models\Activite')
@extends('layouts.master')
@section('content')
  <div @class('card')>
    <div @class(["card-body","p-2"])>
      <div @class(['d-flex','align-items-center',"mb-3"])>
        <a href="{{ route('home') }}" @class(['btn','btn-outline-primary','btn-sm','me-2'])>
          <i @class(['mdi','mdi-home','mdi-18px'])></i>
        </a>
        <h4 @class(['m-0','ps-1','border','border-top-0','border-bottom-0','border-end-0','border-solid','border-3','border-info'])>
          Ajouter d'activités du théme
        </h4>
      </div>
      <form action="{{ route('theme-activite.store') }}" method="post">
        @csrf
        <div @class(["row","justify-content-center","mb-2"])>
          <div @class(["col-lg-3"])>
            <div @class(["form-group","mb-2"])>
              <label for="" @class("form-label")>Théme</label>
              <select name="activite_id" id="" class="form-select form-select-sm @error('activite_id') is-invalid @enderror">
                <option value="">-- Choisir le thémé d'activité --</option>
                @foreach ($activites::all() as $activite)
                  <option value="{{ $activite->id }}">{{ $activite->theme }}</option>
                @endforeach
              </select>
            </div>
            <button type="button" @class(["btn","btn-outline-dark","w-100"]) id="add">
              <i @class(["mdi","mdi-plus-circle-outline","mdi-18px","me-1 ","align-middle"])></i>
              <span>Ajouter des activités</span>
            </button>
          </div>
        </div>
        <div @class(["row","row-cols-3","justify-content-center","activite"])>

        </div>
        <div @class(['d-flex','justify-content-between'])>
          <a href="{{ route('theme-activite.index') }}" @class(["btn","btn-primary"])>
            <i @class(["mdi","mdi-arrow-left-drop-circle-outline","mdi-18px","align-middle"])></i>
            <span>Retour</span>
          </a>
          <button type="submit" @class(['btn','btn-success'])>
            <i @class(["mdi","mdi-checkbox-marked-circle-outline","mdi-18px","align-middle"])></i>
            <span>Enregistrer</span>
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection
@section('script')
<script>
  $(document).ready(function(){

    $("#loader").attr("disabled","true");
    $("#add").on("click",function(){
      let act = " ";
      // act+='<div @class(["col-lg-3","m-2","border","border-secondary","border-1","border-solid","p-2"])>';
      act+='<div @class(["col"])>';
      act+='<div @class(["card","border","border-secondary","border-1","border-solid","position-relative"])>';
        act+='<button type="button" @class(["btn","btn-sm","btn-danger","position-absolute","end-0","top-0"]) id="remove"><i @class(["mdi","mdi-close-thick"])></i></button>'
        act+='<div class="card-body p-2">';
          act+='<div @class(["form-group","mb-2"])>';
            act+='<label @class("form-label")>Destination</label>';
            act+='<input type="text" name="destination[]" @class(["form-control","form-control-sm","text-uppercase","valeur"])>';
          act+='</div>';
          // act+='<div @class(["form-group","mb-2"])>';
          //   act+='<label @class("form-label")>Départ</label>';
          //   act+='<input type="date" name="depart[]" @class(["form-control","form-control-sm","dest"])>';
          // act+='</div>';
          // act+='<div @class(["form-group","mb-2"])>';
          //   act+='<label @class("form-label")>Arrivé</label>';
          //   act+='<input type="date" name="arrive[]" @class(["form-control","form-control-sm","dest"])>';
          // act+='</div>';
          act+='<div @class(["row","row-cols-2","mb-2"])>';
            act+='<div @class(["col"])>';
              act+='<div @class(["form-group"])>';
                act+='<label @class("form-label")>Départ</label>';
                act+='<input type="date" name="depart[]" @class(["form-control","form-control-sm","valeur"])>';
              act+='</div>';
            act+='</div>';
            act+='<div @class(["col"])>';
              act+='<div @class(["form-group"])>';
                act+='<label @class("form-label")>Arrivée</label>';
                act+='<input type="date" name="arrive[]" @class(["form-control","form-control-sm","valeur"])>';
              act+='</div>';
            act+='</div>';
          act+='</div>';
          act+='<div @class(["row","row-cols-2","mb-2"])>';
            act+='<div @class(["col"])>';
              act+='<div @class(["form-group"])>';
                act+='<label @class(["form-label","d-flex","justify-content-between"])><span>Enfant(s)</span><span @class(["fw-normal","text-primary"]) style="font-size:.75rem"> < 15 ans</span></label>';
                act+='<input type="number" name="enfant[]" min="0" @class(["form-control","form-control-sm","valeur"])>';
              act+='</div>';
            act+='</div>';
            act+='<div @class(["col"])>';
              act+='<div @class(["form-group"])>';
                act+='<label @class(["form-label","d-flex","justify-content-between"])><span>Adulte(s)</span><span @class(["fw-normal","text-primary"]) style="font-size:.75rem"> > 15 ans</span></label>';
                act+='<input type="number" name="adulte[]" min="1" @class(["form-control","form-control-sm","valeur"])>';
              act+='</div>';
            act+='</div>';
          act+='</div>';
        act+='</div>';
      act+='</div>';
      act+='</div>';
        $(".activite").append(act);
        var valeur = $('.valeur').val();
        if(valeur.length==''){
          $(".dest").attr("required","true");
        }
        else{
          $("#loader").attr("disabled","true");
        }


    })
    // $(document).on("keyup",".dest",function(){
    //   let value = $(this).val();
    //   if(value.length==' '){
    //     $(".msg").show(450);
    //   }
    //   else{
    //     $(".msg").hide(450);

    //   }
    // })
    $(document).on("click","#remove",function(){
      $(this).closest(".col").remove();
    })
  })
</script>
@endsection