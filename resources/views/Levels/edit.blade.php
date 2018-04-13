@extends('layouts.app')



@section('content')
  <br><br><br><br><br><br>
  <div class="container">
    <div class="row">
        
        <div class="col-md-12">
            <a href="{{ route('level.create') }}" class="btn btn-success" style="margin-bottom: 30px"> <i class="fa fa-plus"></i> Ajouter un niveau</a>
            <a href="{{ route('level.index') }}" class="btn btn-info" style="margin-bottom: 30px"> <i class="fa fa-list"></i> Liste des niveaux</a>
			      <div class="panel panel-default">
                <div class="panel-heading">
                   Modifier un niveau
                </div>

                <div class="panel-body">
                  <div class="col-sm-12">
                    {!! Form::model($level, ['route' => ['level.update', $level->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}

                    <div class="form-group {!! $errors->has('intitule') ? 'has-error' : '' !!}">
                        {!! Form::text('intitule', null, ['class' => 'form-control', 'placeholder' => 'Libelé de la categorie', 'required' => 'required', 'autofocus' => 'autofocus']) !!}
                        {!! $errors->first('intitule', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
                        {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Description de la categorie']) !!}
                        {!! $errors->first('description', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('diplome') ? 'has-error' : '' !!}">
                        <div class="checkbox1">
                          <label  >
                            {!! Form::checkbox('diplome', $level->diplome, $level->diplome ? true : false) !!} Niveau avec diplome?
                            {!! $errors->first('diplome', '<small class="help-block">:message</small>') !!}
                          </label>
                        </div>
                      </div>

                    <div class="form-group {!! $errors->has('etude_id') ? 'has-error' : '' !!}">
                        {!! Form::select('etude_id', $etudes, null, ['class' => 'form-control', 'placeholder' => 'Selectionner le cursus', 'required' => 'required', 'autofocus' => 'autofocus']) !!}
                        {!! $errors->first('etude_id', '<small class="help-block">:message</small>') !!}
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