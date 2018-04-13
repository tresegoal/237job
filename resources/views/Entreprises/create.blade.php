@extends('layouts.app')

@section('content')
<br><br>
<section class=" job-bg ad-details-page">
		<div class="container">
			<div class="breadcrumb-section">						
				<h2 class="title">Creer une nouvelle Entreprise </h2>
			</div><!-- banner -->

			<div class="job-postdetails">
				<div class="row">	
					<div class="col-md-12">
						<form class="form-horizontal" method="POST" action="{{ route('entreprise.store') }}">
                            {{ csrf_field() }}
							<fieldset>
								<div class="section postdetails" style="padding: 25px ">
									<h4>Détails de l entreprise<span class="pull-right">* Champs obligatoires</span></h4>
									<label class="col-sm-12 label-title"></label>Nom de l entreprise<span class="required">*</span></label>
									<div class="row form-group{{ $errors->has('name') ? ' has-error' : '' }}" >
										<div class="col-sm-12" >  
											<input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="ex, Human Resource Manager" required autofocus>
											@if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
										</div>
									</div>

									<div class="row form-group{{ $errors->has('description') ? ' has-error' : '' }} item-description">
										<label class="col-sm-9 label-title">La description de l entreprise<span class="required">*</span></label>
										<div class="col-sm-12"> 
											<textarea class="form-control" name="description" id="textarea" placeholder="Write few lines about your jobs" rows="8" >{{ old('description') }}</textarea>	
											@if ($errors->has('description'))
	                                                <span class="help-block">
	                                                    <strong>{{ $errors->first('description') }}</strong>
	                                                </span>
                                            @endif	
                                            <script>
										        // Replace the <textarea id="editor1"> with a CKEditor
										        // instance, using default configuration.
										        CKEDITOR.replace( 'textarea' );
										    </script>	
										</div>
									</div>

									<label class="col-sm-12 label-title"></label>Numero de telephone<span class="required">*</span></label>
									<div class="row form-group{{ $errors->has('telephone') ? ' has-error' : '' }}" >
										<div class="col-sm-12" >  
											<input type="number" class="form-control" name="telephone" value="{{ old('telephone') }}" placeholder="+237 00214536" required autofocus>
											@if ($errors->has('telephone'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('telephone') }}</strong>
                                                </span>
                                            @endif
										</div>
									</div>

									<label class="col-sm-12 label-title"></label>Autre numero</label>
									<div class="row form-group{{ $errors->has('telephone1') ? ' has-error' : '' }}" >
										<div class="col-sm-12" >  
											<input type="number" class="form-control" name="telephone1" value="{{ old('telephone1') }}" placeholder="+237 00214536" autofocus>
											@if ($errors->has('telephone1'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('telephone1') }}</strong>
                                                </span>
                                            @endif
										</div>
									</div>

									<label class="col-sm-12 label-title"></label>Email de l entreprise<span class="required">*</span></label>
									<div class="row form-group{{ $errors->has('email') ? ' has-error' : '' }}" >
										<div class="col-sm-12" >  
											<input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="mondomain@gmail.com" required autofocus>
											@if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
										</div>
									</div>

									<label class="col-sm-12 label-title"></label>Autre email de l entreprise</label>
									<div class="row form-group{{ $errors->has('email1') ? ' has-error' : '' }}" >
										<div class="col-sm-12" >  
											<input type="email" class="form-control" name="email1" value="{{ old('email1') }}" placeholder="myname@mydomain.com" autofocus>
											@if ($errors->has('email1'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email1') }}</strong>
                                                </span>
                                            @endif
										</div>
									</div>

									<label class="col-sm-12 label-title"></label>Site web de l entreprise</label>
									<div class="row form-group{{ $errors->has('siteweb') ? ' has-error' : '' }}" >
										<div class="col-sm-12" >
											<input type="url" class="form-control" name="siteweb" value="{{ old('siteweb') }}" placeholder="https://www.google.com" required autofocus>
											@if ($errors->has('siteweb'))
												<span class="help-block">
                                                    <strong>{{ $errors->first('siteweb') }}</strong>
                                                </span>
											@endif
										</div>
									</div>

									<div class="row form-group add-title">
										<label class="col-sm-9 label-title">L'utilisateur de l'entreprise<span class="required">*</span></label>
										<div class="col-sm-12">  
										    <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}" style="margin-left: 0; margin-right: 0">
											    <select name="user_id" id="user_id" class="form-control" required autofocus>
											       
											        <option selected="selected" value="">Selectionner un utilisateur</option>
				                                    @foreach($users as $user)
				                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
				                                    @endforeach
				                                </select>	
				                                @if ($errors->has('user_id'))
	                                                <span class="help-block">
	                                                    <strong>{{ $errors->first('user_id') }}</strong>
	                                                </span>
                                                @endif
				                            </div>							
										</div>
									</div>

									<label class="col-sm-12 label-title"></label>nombre d'employe de l entreprise</label>
									<div class="row form-group{{ $errors->has('nbreEmploye') ? ' has-error' : '' }}" >
										<div class="col-sm-12" >
											<input type="number" class="form-control" name="nbreEmploye" value="{{ old('nbreEmploye') }}" placeholder="20"  autofocus>
											@if ($errors->has('nbreEmploye'))
												<span class="help-block">
                                                    <strong>{{ $errors->first('nbreEmploye') }}</strong>
                                                </span>
											@endif
										</div>
									</div>

									<label class="col-sm-12 label-title">Le secteur de l'entreprise<span class="required">*</span></label>
									<div class="row form-group{{ $errors->has('secteur_id') ? ' has-error' : '' }}">
										<div class="col-sm-12" >
										 <select name="secteur_id" id="secteur_id" class="form-control" required autofocus>
											        <option selected="selected" value="">Selectionner un secteur</option>
				                                    @foreach($secteurs as $secteur)
				                                        <option value="{{ $secteur->id }}">{{ $secteur->name }}</option>
				                                    @endforeach
										 </select>
				                                @if ($errors->has('secteur_id'))
	                                                <span class="help-block">
	                                                    <strong>{{ $errors->first('secteur_id') }}</strong>
	                                                </span>
                                                @endif
										</div>
									</div>
									
									<div class="row form-group add-title location" style="margin-left: 0; margin-right: 0">
										<label class="col-sm-12 label-title">La localisation de l offre<span class="required">*</span></label>
										<div class="col-sm-12">
											
											<div class="form-group{{ $errors->has('region_id') ? ' has-error' : '' }} pull-left" style="width: 49%">
											    <select name="region_id" id="region_id" class="form-control">
											        <option selected="selected" value="">Selectionner une region</option>
				                                    @foreach($regions as $region)
				                                        <option value="{{ $region->id }}">{{ $region->name }}</option>
				                                    @endforeach
				                                </select>
				                                @if ($errors->has('region_id'))
	                                                <span class="help-block">
	                                                    <strong>{{ $errors->first('region_id') }}</strong>
	                                                </span>
                                                @endif	
				                            </div>
				                            <div class="form-group{{ $errors->has('ville_id') ? ' has-error' : '' }} pull-right" style="width: 49%">
											    <select name="ville_id" id="ville_id" class="form-control" required autofocus></select>
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
									<label for="send">
										<input type="checkbox" name="send" id="send">
										You agree to our <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a> and acknowledge that you are the rightful owner of this item and using Jobs to find a genuine buyer.
									</label>
									<button type="submit" class="btn btn-primary">Creer</button>
								</div><!-- section -->
								
							</fieldset>
						</form><!-- form -->	
					</div>
				

					
				</div><!-- photos-ad -->				
			</div>	
		</div><!-- container -->
	</section><!-- main -->
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