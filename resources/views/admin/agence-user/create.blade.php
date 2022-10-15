@extends('layouts.master')
@section('content')
<div @class("card")>
  <div @class(["card-header","d-flex","justify-content-between","align-items-center"])>
    <div @class(["card-title","m-0","fs-5"])>
      Ajouter d'agence utilisateur
    </div>
    <div @class(["card-title-desc","m-0"])>
      <ul @class(["list-unstyled","m-0","d-flex"])>
        <li>
          <a href="{{ route('home') }}">
            <i @class(["mdi","mdi-home"])></i>
            <span>Acceuil</span>
          </a>
        </li>
        <li @class("mx-2")>
          <i @class(["mdi","mdi-chevron-double-right"])></i>
        </li>
        <li>
          <a href="{{ route('agenceUser.index') }}">
            Liste d'agence utilisateur
          </a>
        </li>
        <li @class("mx-2")>
          <i @class(["mdi","mdi-chevron-double-right"])></i>
        </li>
        <li>
          <a href="">
            Ajouter d'agence utilisateur
          </a>
        </li>
      </ul>
    </div>
  </div>
  <div @class(["card-body","p-2"])>
    <form action="{{ route('agenceUser.store') }}" method="post">
      @csrf
      <div @class("table-responsive")>
        <button type="button" @class(["btn","btn-primary","btn-sm"]) id="add">
          <i @class(["mdi","mdi-plus-thick"])></i>
        </button>
        <span @class('fw-bolder')>Ajouter d'agence utilisateur</span>
        <table @class(["table","table-bordered","m-0","table-sm"])>
          <thead>
            <tr>
              <th>Agence</th>
              <th>Utilisateur</th>

            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <select name="agence_id" id="" @class(["form-select","form-select-sm"])>
                  <option value="">Choisir d'agence</option>
                  @foreach ($agences as $agence)
                    <option value="{{ $agence->id }}">{{ $agence->nom }}</option>
                  @endforeach
                </select>
              </td>
              <td>
                <select name="user_id" id="" @class(["form-select","form-select-sm"])>
                  <option value="">Choisir d'utilisateur</option>
                  @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                  @endforeach
                </select>
              </td>
            </tr>
          </tbody>
        </table>
        <button type="submit" @class(['btn','btn-sm','btn-success'])>
          Enregistrer
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
@section('script')
  <script>
    $(document).ready(function(){
      $('#add').on('click',function(){
        
        $.ajax({
          type:'GET',
          url:"{{ route('getAgence') }}",
          success:function(data){
            var op=' ';
            op+='<tr>';
            op+='<td>';
              op+='<select @class("agence")>';
                for (let i = 0; i < data.length; i++) {
                  op+='<option>ffd</option>';
                }
              op+='</select>';
            op+='</td>';
            // op+='<td>';
            //   op+='<select @class("")>';
            //     for (let i = 0; i < user.length; i++) {
            //       op+='<option>ff</option>';
            //     }
            //   op+='</select>'
            // op+='</td>'
            op+='</tr>';
        // $('tbody').html(" ");
        $('tbody').append(op);
          }
        })

      });

    })

  </script>
@endsection