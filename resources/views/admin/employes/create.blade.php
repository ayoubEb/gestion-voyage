@extends('layouts.master')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-2">
  <h5 class="text-uppercase m-0 px-1 title py-1 rounded">
   ajouter un employé
  </h5>

</div>
  <article class="card">
    {{-- <div class="card-header px-2">
      <div class="d-flex align-items-center float-start">
        <a href="{{ route('home') }}" class="btn btn-outline-primary btn-sm me-2">
          <i class="mdi mdi-home"></i>
        </a>
        <h5 class="m-0 ps-1 border border-top-0 border-bottom-0 border-end-0 border-solid border-3 border-info">
          Ajouter un employé
        </h5>
      </div>

    </div> --}}
    <div class="card-body p-2">
      <form action="{{ route('employe.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row row-cols-2 mb-2">
          <div class="col">
            <div class="form-group">
              <input type="text" name="cnie" id="" class="form-control form-control-sm @error('cnie') is-invalid @enderror" placeholder="CNIE" value="{{ old('cnie') }}">
              @error('cnie')
                <strong class="invalid-feedback">{{ $message }}</strong>
              @enderror
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <input type="text" name="name" id="" class="form-control form-control-sm @error('name') is-invalid @enderror" placeholder="name" value="{{ old('name') }}">
              @error('name')
                <strong class="invalid-feedback">{{ $message }}</strong>
              @enderror
            </div>
          </div>
        </div>

        <div class="row row-cols-2 mb-2">
          <div class="col">
            <div class="form-group">
              <input type="text" name="telephone" id="" class="form-control form-control-sm @error('telephone') is-invalid @enderror" placeholder="téléphone" value="{{ old('telephone') }}">
              @error('telephone')
                <strong class="invalid-feedback">{{ $message }}</strong>
              @enderror
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <input type="email" name="email" id="" class="form-control form-control-sm @error('email') is-invalid @enderror" placeholder="e-mail" value="{{ old('email') }}">
              @error('email')
                <strong class="invalid-feedback">{{ $message }}</strong>
              @enderror
            </div>
          </div>
        </div>

        <div class="row row-cols-2 mb-2">
          <div class="col">
            <div class="form-group">
              <input type="text" name="ville" id="" class="form-control form-control-sm @error('ville') is-invalid @enderror" placeholder="ville" value="{{ old('ville') }}">
              @error('ville')
                <strong class="invalid-feedback">{{ $message }}</strong>
              @enderror
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <input type="text" name="adresse" id="" class="form-control form-control-sm @error('adresse') is-invalid @enderror" placeholder="adresse" value="{{ old('adresse') }}">
              @error('adresse')
                <strong class="invalid-feedback">{{ $message }}</strong>
              @enderror
            </div>
          </div>
        </div>

        <div class="row row-cols-2 mb-2">
          <div class="col">
            <div class="form-group">
              <input type="text" name="nationalite" id="" class="form-control form-control-sm @error('nationalite') is-invalid @enderror" placeholder="nationalité" value="{{ old('nationalite') }}">
              @error('nationalite')
                <strong class="invalid-feedback">{{ $message }}</strong>
              @enderror
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <input type="text" name="pays" id="" class="form-control form-control-sm @error('pays') is-invalid @enderror" placeholder="pays" value="{{ old('pays') }}">
              @error('pays')
                <strong class="invalid-feedback">{{ $message }}</strong>
              @enderror
            </div>
          </div>
        </div>

        <div class="row row-cols-2 mb-2">
          <div class="col">
            <div class="form-group">
              <select name="travail" id="travail" class="form-select form-select-sm @error('travail') is-invalid @enderror">
                <option value="">Choisir le travail d'employés</option>
                <option value="intérieur" @if (old('travail') == "intérieur") {{ 'selected' }} @endif>A l'intérieur de l'agence</option>
                <option value="véhicule"  @if (old('travail') == "véhicule") {{ 'selected' }} @endif>A véhicule de l'agence</option>
              </select>
              @error('travail')
                <strong class="invalid-feedback">{{ $message }}</strong>
              @enderror
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <select name="poste" id="poste" class="form-select form-select-sm @error('poste') is-invalid @enderror">
                <option value="">Choisir le poste d'employés</option>
              </select>
              @error('poste')
                <strong class="invalid-feedback">{{ $message }}</strong>
              @enderror
            </div>
          </div>
        </div>

        <div class="row row-cols-2 mb-2">
          <div class="col">
            <div class="form-group">
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
          <div class="col">
            <div class="form-group">
              {{-- <label for="" class="form-label')>Fichier CV </label> --}}
              <input type="file" name="cv" id="" class="form-control form-control-sm">
              {{-- @error('cv')
                <strong class="invalid-feedback">{{ $message }}</strong>
              @enderror --}}
            </div>
          </div>
        </div>
        {{-- <div class=""row row-cols-3">
          <div class=""col">
            <input type="password" name="password" id="" placeholder="mot de passe" class=""form-control form-control-sm">
            @error('password')
            {{$message }}
            @enderror
          </div>
          <div class=""col">
            <input type="password" name="password_confirmation" id="" placeholder="cofirmer le mot de passe" class=""form-control form-control-sm">
          </div>
        </div> --}}
        <div class="d-flex justify-content-between">
          <a href="{{ route('employe.index') }}" class="btn btn-sm btn-info">
            <i class="mdi mdi-arrow-left align-middle"></i>
            <span>Retour</span>
          </a>
          <button type="submit" class="btn btn-sm btn-outline-info">
            <i class="mdi mdi-checkbox-marked-circle-outline align-middle"></i>
            <span>Enregistrer</span>
          </button>
        </div>
      </form>
    </div>
  </article>
@endsection
@section('script')
<script>
  $(document).ready(function(){
    $("#travail").on("change",function(){
      var interieur = "";
      var vehicule = "";
      var travel = $(this).val();
      // console.log(travel);
      if(travel == "intérieur"){

        interieur+='<option>Choisir le poste a l\'intérieur de l\'agence</option>';
        interieur+='<optgroup label="Agent">';
          interieur+='<option value="Agent de réservation">Agent de réservation</option>';
          interieur+='<option value="Agent de vente voyages">Agent de vente voyages</option>';
          interieur+='<option value="Agent de voyage">Agent de voyage</option>';
          interieur+='<option value="Agente de réservation voyages">Agente de réservation voyages</option>';
        interieur+='</optgroup>';
        interieur+='<optgroup label="Conseiller">';
          interieur+='<option value="Conseiller télévendeur">Conseiller télévendeur</option>';
          interieur+='<option value="Conseiller vendeur">Conseiller vendeur</option>';
          interieur+='<option value="Conseillère voyages en ligne">Conseillère voyages en ligne</option>';
          interieur+='<option value="Conseillère voyages d\'affaires">Conseillère voyages d\'affaires</option>';
        interieur+='</optgroup>';
        interieur+='<optgroup label="Autre">';
          interieur+='<option value="Technicienne de réservation voyages">Technicienne de réservation voyages</option>';
          interieur+='<option value="Chef de comptoir en vente de voyages">Chef de comptoir en vente de voyages</option>';
        interieur+='</optgroup>';
        $("#poste").html(interieur);
      }

      else{
        vehicule+='<option>Choisir le poste a la véhicule de l\'agence</option>';
        vehicule+='<option value="Chauffeur">Chauffeur</option>';
        $("#poste").html(vehicule);

      }
    })
  })
</script>
@endsection