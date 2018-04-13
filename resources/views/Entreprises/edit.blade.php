@extends('layouts.app')



@section('content')
  <br><br><br><br><br><br>
  <div class="container">
    <div class="row">
        
        <div class="col-md-12 ">
            <a href="{{ route('entreprise.create') }}" class="btn btn-success" style="margin-bottom: 30px"> <i class="fa fa-plus"></i> creer une entreprise</a>
            <a href="{{ route('entreprise.index') }}" class="btn btn-info" style="margin-bottom: 30px"> <i class="fa fa-list"></i> Liste des entreprise</a>
			      <div class="panel panel-default">
                <div class="panel-heading">
                   Modifier une entreprise  
                </div>

                <div class="panel-body">
                  <div class="col-sm-12">
                    {!! Form::model($entreprise, ['route' => ['entreprise.update', $entreprise->id], 'method' => 'put', 'class' => 'form-horizontal']) !!}
                      <fieldset>
                        <div class="section postdetails" style="padding: 25px ">
                          <h4>Détails sur l'entreprise<span class="pull-right">* champs obligatoires</span></h4><br>

                          <div class="row form-group{{ $errors->has('name') ? ' has-error' : '' }}" >
                            <label class="col-sm-12 label-title">Nom de l entreprise<span class="required">*</span></label>
                            <div class="col-sm-12" > 
                              {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nom de l entreprise', 'required' => 'required', 'autofocus' => 'autofocus']) !!}
                              {!! $errors->first('name', '<small class="help-block">:message</small>') !!} 
                            </div>
                          </div>

                          <div class="row form-group{{ $errors->has('description') ? ' has-error' : '' }} item-description">
                            <label class="col-sm-9 label-title">La description de l'entreprise<span class="required">*</span></label>
                            <div class="col-sm-12">
                              {!! Form::textarea('description', null, ['class' => 'form-control','id' => 'description', 'placeholder' => 'Description de l\'entreprise']) !!}
                              {!! $errors->first('description', '<small class="help-block">:message</small>') !!} 
                             
                                <script>
                                    // Replace the <textarea id="editor1"> with a CKEditor
                                    // instance, using default configuration.
                                    CKEDITOR.replace( 'description' );
                                </script> 
                            </div>
                          </div>

                          <div class="row form-group{{ $errors->has('email') ? ' has-error' : '' }}" >
                            <label class="col-sm-12 label-title">Email de l entreprise<span class="required">*</span></label>
                            <div class="col-sm-12" > 
                              {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Autre telephone de l entreprise', 'required' => 'required', 'autofocus' => 'autofocus']) !!}
                              {!! $errors->first('email', '<small class="help-block">:message</small>') !!} 
                            </div>
                          </div>

                          <div class="row form-group{{ $errors->has('email1') ? ' has-error' : '' }}" >
                            <label class="col-sm-12 label-title">Autre email de l'entreprise<span class="required">*</span></label>
                            <div class="col-sm-12" > 
                              {!! Form::email('email1', null, ['class' => 'form-control', 'placeholder' => 'Autre email de l entreprise', 'autofocus' => 'autofocus']) !!}
                              {!! $errors->first('email1', '<small class="help-block">:message</small>') !!} 
                            </div>
                          </div>

                        <div class="row form-group{{ $errors->has('siteweb') ? ' has-error' : '' }}" >
                            <label class="col-sm-12 label-title">Autre email de l'entreprise</label>
                            <div class="col-sm-12" >
                                {!! Form::url('siteweb', null, ['class' => 'form-control', 'placeholder' => 'site web', 'autofocus' => 'autofocus']) !!}
                                {!! $errors->first('siteweb', '<small class="help-block">:message</small>') !!}
                            </div>
                        </div>

                          <div class="row form-group{{ $errors->has('telephone') ? ' has-error' : '' }}" >
                            <label class="col-sm-12 label-title">Telephone de l'entreprise<span class="required">*</span></label>
                            <div class="col-sm-12" > 
                              {!! Form::number('telephone', null, ['class' => 'form-control', 'placeholder' => 'Telephone de l entreprise', 'required' => 'required', 'autofocus' => 'autofocus']) !!}
                              {!! $errors->first('telephone', '<small class="help-block">:message</small>') !!} 
                            </div>
                          </div>

                          <div class="row form-group{{ $errors->has('telephone1') ? ' has-error' : '' }}" >
                            <label class="col-sm-12 label-title">Autre telephone de l'entreprise</label>
                            <div class="col-sm-12" > 
                              {!! Form::number('telephone1', null, ['class' => 'form-control', 'placeholder' => 'Autre telephone de l\'entreprise', 'autofocus' => 'autofocus']) !!}
                              {!! $errors->first('telephone1', '<small class="help-block">:message</small>') !!} 
                            </div>
                          </div>

                        <div class="row form-group{{ $errors->has('nbreEmploye') ? ' has-error' : '' }}" >
                            <label class="col-sm-12 label-title">Nombre d'employe de l'entreprise</label>
                            <div class="col-sm-12" >
                                {!! Form::number('nbreEmploye', null, ['class' => 'form-control', 'placeholder' => 'nombre d\'employe de l entreprise', 'autofocus' => 'autofocus']) !!}
                                {!! $errors->first('nbreEmploye', '<small class="help-block">:message</small>') !!}
                            </div>
                        </div>

                          <div class="row form-group add-title">
                            <label class="col-sm-9 label-title">L'utilisateur de l'entreprise<span class="required">*</span></label>
                            <div class="col-sm-12">  
                                <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}" style="margin-left: 0; margin-right: 0">

                                  {!! Form::select('user_id', $users, null, ['class' => 'form-control', 'placeholder' => 'Selectionner un utilisateur', 'required' => 'required', 'autofocus' => 'autofocus']) !!}
                                  {!! $errors->first('user_id', '<small class="help-block">:message</small>') !!}
                                 
                                </div>              
                            </div>
                          </div>    

                          <div class="row form-group{{ $errors->has('secteur_id') ? ' has-error' : '' }}">
                            <label class="col-sm-9">Le secteur de l'entreprise<span class="required">*</span></label>
                            <div class="col-sm-12 user-type">
                                @foreach($secteurs as $secteur)
                                  {{ Form::radio('secteur_id', $secteur->id, $entreprise->secteur->id) }}
                                  <label for="{{ $secteur->id }}">{{ $secteur->name }}</label>
                                @endforeach
                                {!! $errors->first('secteur_id', '<small class="help-block">:message</small>') !!}

                            </div>
                          </div>
                                  
                          <div class="row form-group add-title location" style="margin-left: 0; margin-right: 0">
                            <label class="col-sm-9 label-title">La localisation de l'offre<span class="required">*</span></label>
                            <div class="col-sm-12">
                              
                              <div class="form-group{{ $errors->has('region_id') ? ' has-error' : '' }} pull-left" style="width: 49%">

                                {!! Form::select('region_id', $regions, null, ['class' => 'form-control', 'id' => 'region_id', 'placeholder' => 'Selectionner une region']) !!}

                                {!! $errors->first('region_id', '<small class="help-block">:message</small>') !!}
                                  
                              </div>
                              <div class="form-group{{ $errors->has('ville_id') ? ' has-error' : '' }} pull-right" style="width: 49%">
                               
                                <select name="ville_id" id="ville_id" class="form-control" required autofocus>
                                  <option value="{{ $entreprise->ville_id }}">{{ $entreprise->ville->name }}</option>
                                </select>
                                @if ($errors->has('ville_id'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('ville_id') }}</strong>
                                  </span>
                                @endif
                                    
                              </div>  
                              
                            </div>
                          </div>

                        </div><!-- postdetails -->
                        
                        <div class="checkbox section agreement" style="padding: 25px ">
                          
                          <button type="submit" class="btn btn-primary">Modifier l'offre</button>
                        </div><!-- section -->
                        
                      </fieldset>
                  {!! Form::close() !!}<!-- form -->
                  </div>
                  
          
                </div>
            </div>
        </div>
    </div>
  </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script>
    $('#region_id').on('change', function(e){
        console.log(e);
        var region_id = e.target.value;

        $.get('{{ url('villes') }}/' + region_id, function(data) {
            console.log(data);
            $('#ville_id').empty();
            $.each(data, function(index,villes){
                $('#ville_id').append($('<option>', { 
                    value: villes.id,
                    text : villes.name 
                }));
            });
        });
    });
</script>

@endsection