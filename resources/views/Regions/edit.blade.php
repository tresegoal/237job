@extends('layouts.app')



@section('content')
  <br><br><br><br><br><br>
  <div class="container">
    <div class="row">
        
        <div class="col-md-12">
            <a href="{{ route('region.create') }}" class="btn btn-success" style="margin-bottom: 30px"> <i class="fa fa-plus"></i> Ajouter une region</a>
            <a href="{{ route('region.index') }}" class="btn btn-info" style="margin-bottom: 30px"> <i class="fa fa-list"></i> Liste des region</a>
			      <div class="panel panel-default">
                <div class="panel-heading">
                   Modifier une region 
                </div>

                <div class="panel-body">
                  <div class="col-sm-12">
                    {!! Form::model($region, ['route' => ['region.update', $region->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
                    <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Libelé de la categorie', 'required' => 'required', 'autofocus' => 'autofocus']) !!}
                        {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
                        {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Description de la categorie']) !!}
                        {!! $errors->first('description', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('country_id') ? 'has-error' : '' !!}">
                        {!! Form::select('country_id', $countries, null, ['class' => 'form-control', 'placeholder' => 'Selectionner le pays', 'required' => 'required', 'autofocus' => 'autofocus']) !!}
                        {!! $errors->first('country_id', '<small class="help-block">:message</small>') !!}
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