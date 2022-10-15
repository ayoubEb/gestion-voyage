@extends('layouts.master')
@section('content')
<div @class('card')>
  <div @class(['card-body','p-2'])>
    <div @class(['row','row-cols-2','mb-3'])>
      <div @class('col')>
        <a href="{{ route('roles.index') }}" @class(['btn','btn-sm','btn-info'])>Retour</a>
      </div>
      <div @class('col')>
      <h5>Rôle : {{ $role->name }}</h5>
      </div>
    </div>
    <div @class(['form-group','mb-2'])>
      <label for="" @class(['form-label','fw-bolder'])>Name</label>
      <input type="text" value="{{ $role->name }}" @class('form-control') readonly>

    </div>
    <div @class(['form-group','mb-2'])>
      <label for="" @class('form-label')>Permission</label>
      @if(!empty($rolePermissions))
      <div @class(['row','row-cols-4'])>
        @foreach($rolePermissions as $v)
        <div @class(['col'])>
          <input type="text" value="{{ $v->name }}" @class('form-control') readonly>
        </div>
        @endforeach

      </div>
      @endif

    </div>
  </div>
</div>
@endsection