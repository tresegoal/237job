@extends('layouts.app')



@section('content')
  <br><br><br><br><br><br>
  <div class="container">
    <div class="row">
        
        <div class="col-md-12">
            <a href="{{ route('level.index') }}" class="btn btn-success" style="margin-bottom: 30px"> <i class="fa fa-list"></i> Liste des niveaux</a>
			      <div class="panel panel-default">
                <div class="panel-heading">

                   Ajouter un niveau
                    
                </div>

                <div class="panel-body">
                  <div class="col-sm-12">
                    {!! Form::open(['route' => 'level.store', 'class' => 'form-horizontal panel']) !!} 
                      <div class="form-group {!! $errors->has('intitule') ? 'has-error' : '' !!}">
                        {!! Form::text('intitule', null, ['class' => 'form-control', 'placeholder' => 'Intitulé du niveau', 'required' => 'required', 'autofocus' => 'autofocus']) !!}
                        {!! $errors->first('intitule', '<small class="help-block">:message</small>') !!}
                      </div>
                      
                      <div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
                        {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Description du niveau']) !!}
                        {!! $errors->first('description', '<small class="help-block">:message</small>') !!}
                      </div>

                      <div class="form-group">
                        <div class="checkbox">
                          <label>
                            {!! Form::checkbox('diplome', 1, null) !!} Niveau avec diplome?
                          </label>
                        </div>
                      </div>

                      <div class="form-group {!! $errors->has('etude_id') ? 'has-error' : '' !!}">
                        {!! Form::select('etude_id', $etudes, null, ['class' => 'form-control', 'placeholder' => 'Selectionner un cursus', 'required' => 'required', 'autofocus' => 'autofocus']) !!}
                        {!! $errors->first('etude_id', '<small class="help-block">:message</small>') !!}
                      </div>

                      <div class="form-group">
                        <div class="checkbox">
                          <label>
                            {!! Form::checkbox('confirmed', 1, null) !!} Activer le niveau
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