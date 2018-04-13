@extends('layouts.app')



@section('content')
  <br><br><br><br><br><br>
  <div class="container">
    <div class="row">
        
        <div class="col-md-12 ">
            <a href="{{ route('etude.index') }}" class="btn btn-success" style="margin-bottom: 30px"> <i class="fa fa-list"></i> Liste des cursus</a>
			      <div class="panel panel-default">
                <div class="panel-heading">

                   Ajouter un cursus
                    
                </div>

                <div class="panel-body">
                  <div class="col-sm-12">
                    {!! Form::open(['route' => 'etude.store', 'class' => 'form-horizontal panel']) !!} 
                      <div class="form-group {!! $errors->has('intitule') ? 'has-error' : '' !!}">
                        {!! Form::text('intitule', null, ['class' => 'form-control', 'placeholder' => 'Intitulé du cursus', 'required' => 'required', 'autofocus' => 'autofocus']) !!}
                        {!! $errors->first('intitule', '<small class="help-block">:message</small>') !!}
                      </div>
                      <div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
                        {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Description du cursus']) !!}
                        {!! $errors->first('description', '<small class="help-block">:message</small>') !!}
                      </div>
                      <div class="form-group">
                        <div class="checkbox">
                          <label>
                            {!! Form::checkbox('confirmed', 1, null) !!} Activer le cursus
                          </label>
                        </div>
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