@extends('layouts.app')



@section('content')
  <br><br><br><br><br><br>
  <div class="container">
    <div class="row">
        
        <div class="col-md-12">
            <a href="{{ route('type.create') }}" class="btn btn-success" style="margin-bottom: 30px"> <i class="fa fa-plus"></i> Ajouter un type</a>
            <a href="{{ route('type.index') }}" class="btn btn-info" style="margin-bottom: 30px"> <i class="fa fa-list"></i> Liste des types</a>
			      <div class="panel panel-default">
                <div class="panel-heading">

                   Modifier un type
                    
                   
                </div>

                <div class="panel-body">
                  <div class="col-sm-12">
                    {!! Form::model($type, ['route' => ['type.update', $type->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
                    <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Libelé de la categorie']) !!}
                        {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
                        {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Description de la categorie']) !!}
                        {!! $errors->first('email', '<small class="help-block">:message</small>') !!}
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