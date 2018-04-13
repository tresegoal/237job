@extends('layouts.app')



@section('content')
  <br><br><br><br><br><br>
  <div class="container">
    <div class="row">
        
        <div class="col-md-12 ">
            <a href="{{ route('country.index') }}" class="btn btn-success" style="margin-bottom: 30px"> <i class="fa fa-list"></i> Liste des pays</a>
			      <div class="panel panel-default">
                <div class="panel-heading">

                   Ajouter un pays
                    
                </div>

                <div class="panel-body">
                  <div class="col-sm-12">
                    {!! Form::open(['route' => 'country.store', 'class' => 'form-horizontal panel']) !!} 
                      <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nom du pays', 'required' => 'required', 'autofocus' => 'autofocus']) !!}
                        {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
                      </div>
                      <div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
                        {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Description du pays']) !!}
                        {!! $errors->first('description', '<small class="help-block">:message</small>') !!}
                      </div>
                      <div class="form-group">
                        <div class="checkbox">
                          <label>
                            {!! Form::checkbox('confirmed', 1, null) !!} Activer le pays
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