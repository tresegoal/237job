@extends('layouts.app')

@section('content')
<br><br>
<section class=" job-bg ad-details-page">
		<div class="container">
			<div class="breadcrumb-section">
				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li><a href="index.html">Home</a></li>
					<li>Job Post </li>
				</ol><!-- breadcrumb -->						
				<h2 class="title">Mettre en ligne une offre </h2>
			</div><!-- banner -->

			<div class="job-postdetails">
				<div class="row">	
					<div class="col-md-8">
						<form class="form-horizontal" method="POST" action="{{ route('job.store') }}">
                            {{ csrf_field() }}
							<fieldset>
								<div class="section postdetails" style="padding: 25px ">
									<h4>Détails sur l'offre<span class="pull-right">* Mandatory Fields</span></h4>

									<div class="row form-group{{ $errors->has('titre') ? ' has-error' : '' }}" >
										<label class="col-sm-9 label-title">Titre de l'offre<span class="required">*</span></label>
										<div class="col-sm-12" >  
											<input type="text" class="form-control" name="titre" value="{{ old('titre') }}" placeholder="ex, Human Resource Manager" required autofocus>
											@if ($errors->has('titre'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('titre') }}</strong>
                                                </span>
                                            @endif
										</div>
									</div>

									<div class="row form-group add-title">
										<label class="col-sm-9 label-title">L'entreprise qui publie l'offre<span class="required">*</span></label>
										<div class="col-sm-12">
											<div class="form-group{{ $errors->has('entreprise_id') ? ' has-error' : '' }}" style="margin-left: 0; margin-right: 0">
												<select name="entreprise_id" id="entreprise_id" class="form-control" required autofocus>

													<option selected="selected" value="">Selectionner une entreprise</option>
													@foreach($entreprises as $entreprise)
														<option value="{{ $entreprise->id }}">{{ $entreprise->name }}</option>
													@endforeach
												</select>
												@if ($errors->has('entreprise_id'))
													<span class="help-block">
	                                                    <strong>{{ $errors->first('entreprise_id') }}</strong>
	                                                </span>
												@endif
											</div>
										</div>
									</div>

									<div class="row form-group add-title">
										<label class="col-sm-9 label-title">La categorie de l'offre<span class="required">*</span></label>
										<div class="col-sm-12">  
										    <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}" style="margin-left: 0; margin-right: 0">
											    <select name="category_id" id="category_id" class="form-control" required autofocus>
											       
											        <option selected="selected" value="">Selectionner une categorie</option>
				                                    @foreach($categories as $category)
				                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
				                                    @endforeach
				                                </select>	
				                                @if ($errors->has('category_id'))
	                                                <span class="help-block">
	                                                    <strong>{{ $errors->first('category_id') }}</strong>
	                                                </span>
                                                @endif
				                            </div>							
										</div>
									</div>

									<div class="row form-group add-title">
										<label class="col-sm-9 label-title">Le niveau d'experience de l'offre<span class="required">*</span></label>
										<div class="col-sm-12">
											<div class="form-group{{ $errors->has('level_id') ? ' has-error' : '' }}" style="margin-left: 0; margin-right: 0">
												<select name="level_id" id="level_id" class="form-control" required autofocus>

													<option selected="selected" value="">Selectionner un niveau</option>
													@foreach($levels as $level)
														<option value="{{ $level->id }}">{{ $level->intitule }}</option>
													@endforeach
												</select>
												@if ($errors->has('level_id'))
													<span class="help-block">
	                                                    <strong>{{ $errors->first('level_id') }}</strong>
	                                                </span>
												@endif
											</div>
										</div>
									</div>

									<div class="row form-group{{ $errors->has('delay') ? ' has-error' : '' }}" >
										<label class="col-sm-9 label-title">delai de l'offre</label>
										<div class="col-sm-12" >
											<input type="date" class="form-control" name="delay" value="{{ old('delay') }}" placeholder="ex, Human Resource Manager" required autofocus>
											@if ($errors->has('delay'))
												<span class="help-block">
                                                    <strong>{{ $errors->first('delay') }}</strong>
                                                </span>
											@endif
										</div>
									</div>

									<div class="row form-group{{ $errors->has('type_id') ? ' has-error' : '' }}">
										<label class="col-sm-9">Le type de l'offre<span class="required">*</span></label>
										<div class="col-sm-12 user-type">
										    @foreach($types as $type)
												<input type="radio" name="type_id" value="{{ $type->id }}" id="{{ $type->id }}" > <label for="{{ $type->id }}">{{ $type->name }}</label>	
											@endforeach
											@if ($errors->has('type_id'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('type_id') }}</strong>
                                                </span>
                                            @endif
										</div>
									</div>
													
									<div class="row form-group{{ $errors->has('description') ? ' has-error' : '' }} item-description">
										<label class="col-sm-9 label-title">La description de l'offre<span class="required">*</span></label>
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

									
									<div class="row form-group add-title location" style="margin-left: 0; margin-right: 0">
										<label class="col-sm-9 label-title">La localisation de l'offre<span class="required">*</span></label>
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

									<div class="row form-group select-price">
										<label class="col-sm-9 label-title">Salaire de l'offre<span class="required">*</span></label>
										<div class="col-sm-6"> 
										    
											<div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}" style="margin-left: 0; margin-right: 0">
											    <select name="salaire_id" id="salaire_id" class="form-control" required autofocus>
											        <option selected="selected" value="">Selectionner un salaire</option>
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
									<label for="send">
										<input type="checkbox" name="send" id="send">
										You agree to our <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a> and acknowledge that you are the rightful owner of this item and using Jobs to find a genuine buyer.
									</label>
									<button type="submit" class="btn btn-primary">Post Your Job</button>
								</div><!-- section -->
								
							</fieldset>
						</form><!-- form -->	
					</div>
				

					<!-- quick-rules -->	
					<div class="col-md-4">
						<div class="section quick-rules" style="padding: 25px">
							<h4>Quick rules</h4>
							<p class="lead">Posting an ad on <a href="#">jobs.com</a> is free! However, all ads must follow our rules:</p>

							<ul>
								<li>Make sure you post in the correct category.</li>
								<li>Do not post the same ad more than once or repost an ad within 48 hours.</li>
								<li>Do not upload pictures with watermarks.</li>
								<li>Do not post ads containing multiple items unless it's a package deal.</li>
								<li>Do not put your email or phone numbers in the title or description.</li>
								<li>Make sure you post in the correct category.</li>
								<li>Do not post the same ad more than once or repost an ad within 48 hours.</li>
								<li>Do not upload pictures with watermarks.</li>
								<li>Do not post ads containing multiple items unless it's a package deal.</li>
							</ul>
						</div>
					</div><!-- quick-rules -->	
				</div><!-- photos-ad -->				
			</div>	
		</div><!-- container -->
	</section><!-- main -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script>
	$(document).ready(function () {
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
    }) 
</script>
	

@endsection