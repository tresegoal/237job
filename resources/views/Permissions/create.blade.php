@extends('Layouts.app')



@section('content')
  <br><br><br><br><br><br>
  <div class="container">
    <div class="row">
        
        <div class="col-md-12 " >
            <a href="{{ route('permission.index') }}" class="btn btn-success" style="margin-bottom: 30px"> <i class="fa fa-list"></i> Liste des permissions</a>
			      <div class="panel panel-default">
                <div class="panel-heading">

                   Ajouter un permission
                    
                </div>

                <div class="panel-body">
                  <div class="col-sm-12">
                    {!! Form::open(['route' => 'permission.store', 'class' => 'form-horizontal panel']) !!} 
                      <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nom de la permission', 'required' => 'required', 'autofocus' => 'autofocus']) !!}
                        {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
                      </div>
                      <div class="form-group {!! $errors->has('display_name') ? 'has-error' : '' !!}">
                        {!! Form::text('display_name', null, ['class' => 'form-control', 'placeholder' => 'Nom à afficher de la permission', 'required' => 'required', 'autofocus' => 'autofocus']) !!}
                        {!! $errors->first('display_name', '<small class="help-block">:message</small>') !!}
                      </div>
                      <div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
                        {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Description de la permission']) !!}
                        {!! $errors->first('description', '<small class="help-block">:message</small>') !!}
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