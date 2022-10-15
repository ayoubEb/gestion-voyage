@extends('layouts.master')
@section('content')
<div @class('card')>
  <div @class(['card-body','p-2'])>
    <div @class(['row','row-cols-2'])>
      <div @class('col')>
        <a href="{{ route('roles.indexd') }}" @class(['btn','btn-sm','btn-info'])>Retour</a>
      </div>
      <div @class('col')>
      <h5>Ajouter un rôle</h5>
      </div>
    </div>
    {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
    <div @class(['row','justify-content-center'])>
      <div @class(['col-lg-4','mb-3'])>
        <label for="" @class('form-label')>Name</label>
        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control form-control-sm')) !!}
      </div>
      <div @class('col-12')>
        <h5 @class(['mb-3'])>Permission:</h5>
        <div @class(['row','row-cols-5',''])>
          @foreach($permission as $value)
          <div @class(['col','mb-2'])>
            {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
             <label for="{{ $value->name }}"></label>{{ $value->name }}
          </div>
          @endforeach
        </div>
        <div @class(['d-flex','justify-content-center'])>
          <button type="submit" @class(['btn','btn-warning','btn-sm'])>Enregistrer</button>
        </div>
      </div>
    </div>
    {!! Form::close() !!}
  </div>
</div>
{{--
  @if (count($errors) > 0)
  <div class="alert alert-danger">
  <strong>Whoops!</strong> There were some problems with your input.<br><br>
  <ul>
  @foreach ($errors->all() as $error)
  <li>{{ $error }}</li>
  @endforeach
  </ul>
  </div>
  @endif --}}

@endsection