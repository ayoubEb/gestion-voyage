@extends('layouts.master')
@section('content')
  <div @class('card')>
    <div @class(['card-body','p-2'])>
      <div @class(['d-flex','align-items-center','mb-4'])>
        <a href="{{ route('home') }}" @class(['btn','btn-outline-primary','btn-sm','me-2'])>
          <i @class(['mdi','mdi-home','mdi-18px'])></i>
        </a>
        <h4 @class(['m-0','ps-1','border','border-top-0','border-bottom-0','border-end-0','border-solid','border-3','border-info'])>
          Ajouter un voyage organisés
        </h4>
      </div>
      <form action="{{ route('voyage-organise.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div @class(['row'])>
          <div @class(['col-lg-8'])>
            <div @class(['row','row-cols-2','mb-2'])>
              <div @class(['col'])>
                <div @class('form-group')>
                  <label for="" @class('form-label')>Nom</label>
                  <input type="text" name="nom" id="" class="form-control form-control-sm @error('nom') is-invalid @enderror" value="{{ old('nom') }}">
                  @error('nom')
                    <strong @class('invalid-feedback')>{{ $message }}</strong>
                  @enderror
                </div>
              </div>
              <div @class(['col'])>
                <div @class('form-group')>
                  <label for="" @class('form-label')>Images</label>
                  <input type="file" name="img" id="" class="form-control form-control-sm @error('img') is-invalid @enderror" value="{{ old('img') }}">
                  @error('img')
                    <strong @class('invalid-feedback')>{{ $message }}</strong>
                  @enderror
                </div>
              </div>
            </div>
            <div @class(['row','row-cols-2','mb-2'])>
              <div @class(['col'])>
                <div @class('form-group')>
                  <label for="" @class('form-label')>Ville destination</label>
                  <input type="text" name="ville_destination" id="" class="form-control form-control-sm @error('ville_destination') is-invalid @enderror" value="{{ old('ville_destination') }}">
                  @error('ville_destination')
                    <strong @class('invalid-feedback')>{{ $message }}</strong>
                  @enderror
                </div>
              </div>
              <div @class(['col'])>
                <div @class('form-group')>
                  <label for="" @class('form-label')>Pays destinations</label>
                  <input type="text" name="pays_destination" min="1" id="" class="form-control form-control-sm @error('pays_destination') is-invalid @enderror" value="{{ old('pays_destination') }}">
                  @error('pays_destination')
                    <strong @class('invalid-feedback')>{{ $message }}</strong>
                  @enderror
                </div>
              </div>
            </div>
            <div @class(['row','row-cols-2','mb-2'])>
              <div @class(['col'])>
                <div @class('form-group')>
                  <label for="" @class('form-label')>Date départ</label>
                  <input type="date" name="date_depart" id="" class="form-control form-control-sm @error('date_depart') is-invalid @enderror" value="{{ old('date_depart') }}">
                  @error('date_depart')
                    <strong @class('invalid-feedback')>{{ $message }}</strong>
                  @enderror
                </div>
              </div>
              <div @class(['col'])>
                <div @class('form-group')>
                  <label for="" @class('form-label')>Date retour</label>
                  <input type="date" name="date_retour" id="" class="form-control form-control-sm @error('date_retour') is-invalid @enderror" value="{{ old('date_retour') }}">
                  @error('date_retour')
                    <strong @class('invalid-feedback')>{{ $message }}</strong>
                  @enderror
                </div>
              </div>
            </div>
            <div @class(['row','row-cols-2','mb-2'])>
              <div @class(['col'])>
                <div @class('form-group')>
                  <label for="" @class('form-label')>Prix</label>
                  <input type="text" name="prix" id="" class="form-control form-control-sm @error('prix') is-invalid @enderror" value="{{ old('prix') }}">
                  @error('prix')
                    <strong @class('invalid-feedback')>{{ $message }}</strong>
                  @enderror
                </div>
              </div>
              <div @class(['col'])>
                <div @class('form-group')>
                  <label for="" @class('form-label')>Nombre du jour</label>
                  <input type="number" name="nombre_jour" min="1" id="" class="form-control form-control-sm @error('nombre_jour') is-invalid @enderror" value="{{ old('nombre_jour') }}">
                  @error('nombre_jour')
                    <strong @class('invalid-feedback')>{{ $message }}</strong>
                  @enderror
                </div>
              </div>

            </div>
            <div @class(['row','row-cols-1','mb-2'])>

            </div>
          </div>
          <div @class(['col-lg-4'])>
            <div @class(['card','border','border-solid','border-1','border-secondary'])>
              <div @class(['card-header'])>
                <h5 @class('m-0')>Les caractéristiques</h5>
              </div>
              <div @class(['card-body','p-2'])>

              </div>
            </div>
          </div>
          <div @class(['col-lg-12'])>
            <button type="button" @class(['btn','btn-outline-primary','mb-2','d-flex','align-items-center']) id="add">
              <i @class(['mdi','mdi-plus-circle-outline','mdi-18px','me-2'])></i>
              <span>Ajouter un programme</span>
              </button>
              <div @class(["row","mb-2"]) id="programme">

              </div>
          </div>
        </div>
        <div @class(['d-flex','justify-content-between'])>
          <a href="{{ route('voyage-organise.index') }}" @class(['btn','btn-sm','btn-primary'])>Retour</a>
          <button type="submit" @class(['btn','btn-sm','btn-info'])>Enregistrer</button>
        </div>
      </form>
    </div>
  </div>
@endsection
@section('script')
  <script>
    $(document).ready(function(){
      $("#add").on("click",function(){
        var op="";

        op+='<div @class(["col-md-6"])>';
        op+='<div @class(["card"])>';
        op+='<div @class(["card-body"])>';
        op+='<div @class(["form-group","mb-2"])>';
        op+='<label @class(["form-label"])>Jour</label>';
        op+='<select name="jours[]" @class(["form-select","form-select-sm"])>';
        op+='<option>Choisir le jour</option>'
        op+='<option>1</option>'
        op+='<option>2</option>'
        op+='<option>3</option>'
        op+='<option>4</option>'
        op+='<option>5</option>'
        op+='<option>6</option>'
        op+='<option>7</option>'
        op+='<option>8</option>'
        op+='<option>9</option>'
        op+='<option>10</option>'
        op+='<option>11</option>'
        op+='<option>12</option>'
        op+='<option>13</option>'
        op+='<option>14</option>'
        op+='<option>15</option>'
        op+='<option>16</option>'
        op+='<option>17</option>'
        op+='<option>18</option>'
        op+='<option>19</option>'
        op+='<option>20</option>'
        op+='<option>21</option>'
        op+='<option>22</option>'
        op+='<option>23</option>'
        op+='<option>24</option>'
        op+='<option>25</option>'
        op+='<option>26</option>'
        op+='<option>27</option>'
        op+='<option>28</option>'
        op+='<option>29</option>'
        op+='<option>30</option>'
        op+='<option>31</option>'
        op+='</select>';
        op+='</div>';
        op+='<div @class(["form-group","mb-2"])>';
        op+='<label @class(["form-label"])>Titre</label>';
        op+='<input type="text" name="titre[]" @class(["form-control","form-control-sm"])>'
        op+='</div>'
        op+='<div @class(["form-group","mb-2"])>';
        op+='<label @class(["form-label"])>Programme du jour</label>';
        op+='<textarea name="programme[]" cols="30" rows="5" @class(["form-control"])></textarea>';
        op+='</div>';
        op+='<button type="button" id="remove" @class(["btn","btn-sm","btn-danger","w-100"])><i @class(["mdi","mdi-trash-can"])></i></button>';
        op+='</div>';
        op+='</div>';
        op+='</div>';
       $("#programme").append(op);
      })
      $(document).on("click","#remove",function(){
          (this).closest(".col-md-6").remove();
      })
    })
  </script>
@endsection