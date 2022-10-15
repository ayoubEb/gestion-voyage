@extends('layouts.master')
@section('content')
<div @class('card')>
  <div @class(['card-body','p-2'])>
    {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
    <div @class(['row','row-cols-4'])>
      @foreach($permission as $value)
      <div @class(['col','mb-2'])>
        <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
        {{ $value->name }}</label>
      </div>
      @endforeach
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</div>
{!! Form::close() !!}
@endsection