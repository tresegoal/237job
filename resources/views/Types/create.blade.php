@extends('layouts.app')



@section('content')
  <br><br><br><br><br><br>
  <div class="container">
    <div class="row">
        
        <div class="col-md-12">
            <a href="{{ route('type.index') }}" class="btn btn-success" style="margin-bottom: 30px"> <i class="fa fa-list"></i> Liste des types</a>
			      <div class="panel panel-default">
                <div class="panel-heading">

                   Ajouter un type
                    
                   
                </div>

                <div class="panel-body">
                  <div class="col-sm-12">
                    {!! Form::open(['route' => 'type.store', 'class' => 'form-horizontal panel']) !!} 
                      <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Libelé du type']) !!}
                        {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
                      </div>
                      <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
                        {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Description du type']) !!}
                        {!! $errors->first('description', '<small class="help-block">:message</small>') !!}
                      </div>
                      <div class="form-group">
                        <div class="checkbox">
                          <label>
                            {!! Form::checkbox('confirmed', 1, null) !!} Activer
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