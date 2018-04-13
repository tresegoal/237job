@extends('Layouts.app')



@section('content')
  <br><br><br><br><br><br>
  <div class="container">
    <div class="row">
        
        <div class="col-md-12 " >
            <a href="{{ route('role.index') }}" class="btn btn-success" style="margin-bottom: 30px"> <i class="fa fa-list"></i> Liste des roles</a>
			      <div class="panel panel-default">
                <div class="panel-heading">

                   Ajouter un role
                    
                </div>

                <div class="panel-body">
                  <div class="col-sm-12">
                    {!! Form::open(['route' => 'role.store', 'class' => 'form-horizontal panel']) !!} 
                      <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nom du role', 'required' => 'required', 'autofocus' => 'autofocus']) !!}
                        {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
                      </div>
                      <div class="form-group {!! $errors->has('display_name') ? 'has-error' : '' !!}">
                        {!! Form::text('display_name', null, ['class' => 'form-control', 'placeholder' => 'Nom à afficher du role', 'required' => 'required', 'autofocus' => 'autofocus']) !!}
                        {!! $errors->first('display_name', '<small class="help-block">:message</small>') !!}
                      </div>
                      <div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
                        {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Description du role']) !!}
                        {!! $errors->first('description', '<small class="help-block">:message</small>') !!}
                      </div>

                      <div class="form-group {!! $errors->has('permission') ? 'has-error' : '' !!}">
                          <strong>Permission:</strong>
                          <br/>
                          @foreach($permissions as $value)
                            <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                            {{ $value->display_name }}</label>
                            <br/>
                          @endforeach
                          {!! $errors->first('permission', '<small class="help-block">:message</small>') !!}
                      </div>
                      
                      {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary pull-right','style' => 'margin-top:10px']) !!}
                    {!! Form::close() !!}
                  </div>
          
                </div>
            </div>
        </div>
    </div>
  </div>

@endsection