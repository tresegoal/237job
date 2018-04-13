@extends('layouts.app')



@section('content')
  <br><br><br><br><br><br>
  <div class="container">
    <div class="row">
      
        <div class="col-md-12">
            <a href="{{ route('role.create') }}" class="btn btn-success" style="margin-bottom: 30px"> <i class="fa fa-plus"></i> Ajouter un role</a>
            <a href="{{ route('role.index') }}" class="btn btn-info" style="margin-bottom: 30px"> <i class="fa fa-list"></i> Liste des roles</a>
			      <div class="panel panel-default">
                <div class="panel-heading">

                   Ajouter un role
                    
                   
                </div>

                <div class="panel-body">
                  <div class="col-sm-12">
                    {!! Form::model($role, ['route' => ['role.update', $role->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
                    <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Libelé de la categorie', 'required' => 'required', 'autofocus' => 'autofocus']) !!}
                        {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('display_name') ? 'has-error' : '' !!}">
                        {!! Form::text('display_name', null, ['class' => 'form-control', 'placeholder' => 'Nom à afficher de la permission', 'required' => 'required', 'autofocus' => 'autofocus']) !!}
                        {!! $errors->first('display_name', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
                        {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Description de la categorie']) !!}
                        {!! $errors->first('email', '<small class="help-block">:message</small>') !!}
                    </div>

                    <div class="form-group {!! $errors->has('permission') ? 'has-error' : '' !!}">
                        <strong>Permission:</strong>
                        <br/>
                        @foreach($permission as $value)
                          <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                          {{ $value->display_name }}</label>
                          <br/>
                        @endforeach
                        {!! $errors->first('permission', '<small class="help-block">:message</small>') !!}
                    </div>
                    
                    {!! Form::submit('Modifier', ['class' => 'btn btn-primary pull-right','style' => 'margin-top:10px']) !!}
                    {!! Form::close() !!}
                  </div>
          
                </div>
            </div>
        </div>
    </div>
  </div>

@endsection