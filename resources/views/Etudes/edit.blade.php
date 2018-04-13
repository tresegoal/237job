@extends('layouts.app')



@section('content')
  <br><br><br><br><br><br>
  <div class="container">
    <div class="row">
        
        <div class="col-md-12 ">
            <a href="{{ route('etude.create') }}" class="btn btn-success" style="margin-bottom: 30px"> <i class="fa fa-plus"></i> Ajouter un cursus</a>
            <a href="{{ route('etude.index') }}" class="btn btn-info" style="margin-bottom: 30px"> <i class="fa fa-list"></i> Liste des cursus</a>
			      <div class="panel panel-default">
                <div class="panel-heading">
                   Modifier un cursus  
                </div>

                <div class="panel-body">
                  <div class="col-sm-12">
                    {!! Form::model($etude, ['route' => ['etude.update', $etude->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
                    <div class="form-group {!! $errors->has('intitule') ? 'has-error' : '' !!}">
                        {!! Form::text('intitule', null, ['class' => 'form-control', 'placeholder' => 'Nom du pays', 'required' => 'required', 'autofocus' => 'autofocus']) !!}
                        {!! $errors->first('intitule', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
                        {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Description du pays']) !!}
                        {!! $errors->first('description', '<small class="help-block">:message</small>') !!}
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