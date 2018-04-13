@extends('layouts.app')



@section('content')
  <br><br><br><br><br><br>
  <div class="container">
    <div class="row">
        
        <div class="col-md-12 ">
            <a href="{{ route('job.create') }}" class="btn btn-success" style="margin-bottom: 30px"> <i class="fa fa-plus"></i> Créer une offre d'emploi</a>
            <a href="{{ route('job.index') }}" class="btn btn-info" style="margin-bottom: 30px"> <i class="fa fa-list"></i> Liste des offres d'emplois</a>
			      <div class="panel panel-default">
                <div class="panel-heading">
                   Modifier une offre  
                </div>

                <div class="panel-body">
                  <div class="col-sm-12">
                    {!! Form::model($job, ['route' => ['job.update', $job->id], 'method' => 'put', 'class' => 'form-horizontal']) !!}
                      <fieldset>
                        <div class="section postdetails" style="padding: 25px ">
                          <h4>Détails sur l'offre<span class="pull-right">* Mandatory Fields</span></h4><br>

                          <div class="row form-group{{ $errors->has('titre') ? ' has-error' : '' }}" >
                            <label class="col-sm-9 label-title">Titre de l'offre<span class="required">*</span></label>
                            <div class="col-sm-12" > 
                              {!! Form::text('titre', null, ['class' => 'form-control', 'placeholder' => 'Titre de loffre', 'required' => 'required', 'autofocus' => 'autofocus']) !!}
                              {!! $errors->first('titre', '<small class="help-block">:message</small>') !!} 
                              
                            </div>
                          </div>

                          <div class="row form-group add-title">
                            <label class="col-sm-9 label-title">La categorie de l'offre<span class="required">*</span></label>
                            <div class="col-sm-12">  
                                <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}" style="margin-left: 0; margin-right: 0">

                                  {!! Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder' => 'Selectionner une categorie', 'required' => 'required', 'autofocus' => 'autofocus']) !!}
                                  {!! $errors->first('category_id', '<small class="help-block">:message</small>') !!}
                                 
                                </div>              
                            </div>
                          </div>    

                          <div class="row form-group{{ $errors->has('type_id') ? ' has-error' : '' }}">
                            <label class="col-sm-9">Le type de l'offre<span class="required">*</span></label>
                            <div class="col-sm-12 user-type">
                                @foreach($types as $type)
                                  {{ Form::radio('type_id', $type->id, $job->type->id) }}
                                  <label for="{{ $type->id }}">{{ $type->name }}</label>
                                @endforeach
                                {!! $errors->first('type_id', '<small class="help-block">:message</small>') !!}

                            </div>
                          </div>

                            <div class="row form-group{{ $errors->has('delay') ? ' has-error' : '' }}" >
                                <label class="col-sm-9 label-title">delai de l'offre</label>
                                <div class="col-sm-12" >
                                    {!! Form::date('delay', null, ['class' => 'form-control', 'placeholder' => 'delai de loffre', 'autofocus' => 'autofocus']) !!}
                                    {!! $errors->first('delay', '<small class="help-block">:message</small>') !!}

                                </div>
                            </div>


                            <div class="row form-group{{ $errors->has('description') ? ' has-error' : '' }} item-description">
                            <label class="col-sm-9 label-title">La description de l'offre<span class="required">*</span></label>
                            <div class="col-sm-12">
                              {!! Form::textarea('description', null, ['class' => 'form-control','id' => 'description', 'placeholder' => 'Description de l\'offre']) !!}
                              {!! $errors->first('description', '<small class="help-block">:message</small>') !!} 
                             
                                <script>
                                    // Replace the <textarea id="editor1"> with a CKEditor
                                    // instance, using default configuration.
                                    CKEDITOR.replace( 'description' );
                                </script> 
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
                                  <option value="{{ $job->ville_id }}">{{ $job->ville->name }}</option>
                                </select>
                                @if ($errors->has('ville_id'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('ville_id') }}</strong>
                                  </span>
                                @endif
                                    
                              </div>  
                              
                            </div>
                          </div>

                          <div class="row form-group select-price">
                            <label class="col-sm-9 label-title">Salaire de l'offre<span class="required">*</span></label>
                            <div class="col-sm-6"> 
                                
                              <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}" style="margin-left: 0; margin-right: 0">
                                  <select name="salaire_id" id="salaire_id" class="form-control" required autofocus>
                                      <option selected="selected" value="{{ $job->salaire_id }}">{{ $job->salaire->salmin }} - {{ $job->salaire->salmax }}</option>
                                                    @foreach($salaires as $salaire)
                                                        <option value="{{ $salaire->id }}">{{ $salaire->salmin }} - {{ $salaire->salmax }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('salaire_id'))
                                                          <span class="help-block">
                                                              <strong>{{ $errors->first('salaire_id') }}</strong>
                                                          </span>
                                                        @endif  
                                            </div>  

                            </div>
                            <div class="col-sm-6"> 
                                <input type="radio" name="price" value="negotiable" id="negotiable">
                              <label for="negotiable">Negotiable </label> 
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