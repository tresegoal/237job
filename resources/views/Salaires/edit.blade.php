@extends('layouts.app')



@section('content')
  <br><br><br><br><br><br>
  <div class="container">
    <div class="row">
        
        <div class="col-md-12">
            <a href="{{ route('salaire.create') }}" class="btn btn-success" style="margin-bottom: 30px"> <i class="fa fa-plus"></i> Ajouter une tranches de salaire</a>
            <a href="{{ route('salaire.index') }}" class="btn btn-info" style="margin-bottom: 30px"> <i class="fa fa-list"></i> Liste des tranches de salaires</a>
			      <div class="panel panel-default">
                <div class="panel-heading">

                   Modifier une tranche de salaire
                             
                </div>

                <div class="panel-body">
                  <div class="col-sm-12">
                    {!! Form::model($salaire, ['route' => ['salaire.update', $salaire->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
                       
                      <div class="form-group {!! $errors->has('salmin') ? 'has-error' : '' !!}">
                        {!! Form::number('salmin', null, ['class' => 'form-control', 'placeholder' => 'Salaire minimum']) !!}
                        {!! $errors->first('salmin', '<small class="help-block">:message</small>') !!}
                      </div>
                      <div class="form-group {!! $errors->has('salmax') ? 'has-error' : '' !!}">
                        {!! Form::number('salmax', null, ['class' => 'form-control', 'placeholder' => 'Salaire maximum']) !!}
                        {!! $errors->first('salmax', '<small class="help-block">:message</small>') !!}
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