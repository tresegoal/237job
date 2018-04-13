@extends('Layouts.app')

@section('content')
<div class="container">
    <div class="row text-center">
        <!-- user-login -->         
        <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3" style="margin-top: 110px; margin-bottom: 50px;">
            <div class="user-account job-user-account">
                <h2>Créer un compte</h2>
                    <ul class="nav nav-tabs text-center" role="tablist">
                                <li role="presentation" class="active"><a href="#find-job" aria-controls="find-job" role="tab" data-toggle="tab">Chercheur d'emplois</a></li>
                                <li role="presentation"><a href="#post-job" aria-controls="post-job" role="tab" data-toggle="tab">Employeur</a></li>
                    </ul>

                    <div class="tab-content">

                                <div role="tabpanel" class="tab-pane active" id="find-job">
                                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                                        {{ csrf_field() }}

                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <input id="name" type="text" class="form-control" name="name" placeholder="Nom du candidat" value="{{ old('name') }}" required autofocus>

                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('prenom') ? ' has-error' : '' }}">
                                            <input id="prenom" type="text" class="form-control" name="prenom" placeholder="Prenom du candidat" value="{{ old('prenom') }}"  autofocus>

                                            @if ($errors->has('prenom'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('prenom') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <input id="email" type="email" class="form-control" name="email" placeholder="Adresse email du candidat" value="{{ old('email') }}" required>

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
                                            <input id="telephone" type="telephone" class="form-control" name="telephone" placeholder="Numero de téléphone du candidat" value="{{ old('telephone') }}" required>

                                            @if ($errors->has('telephone'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('telephone') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="row form-group add-title location" style="margin-left: 0; margin-right: 0">
                                            <label class="col-sm-9 label-title">La localisation de l'offre<span class="required">*</span></label>
                                            <div class="col-sm-12">
                                                
                                                <div class="form-group pull-left" style="width: 49%">
                                                    <select name="region_id" id="region_id" class="form-control">
                                                        <option selected="selected" value="">Selectionner une region</option>
                                                        @foreach($regions as $region)
                                                            <option value="{{ $region->id }}">{{ $region->name }}</option>
                                                        @endforeach
                                                    </select>   
                                                </div>
                                                <div class="form-group pull-right" style="width: 49%">
                                                    <select name="ville_id" id="ville_id" class="form-control"></select>    
                                                </div>  
                                                
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <input id="password" type="password" class="form-control" name="password" placeholder="Mot de passe du candidat" value="{{ old('password') }}" required>

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('password-confirm') ? ' has-error' : '' }}">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmer le mot de passe" value="{{ old('password_confirmation') }}" required>
                                        </div>

                                         <input id="type" type="hidden" class="form-control" name="type"  value="candidat" required>

                                        <div class="checkbox{{ $errors->has('checked') ? ' has-error' : '' }}">
                                            <label class="pull-left checked" for="signing"><input type="checkbox" name="signing" id="signing"> By signing up for an account you agree to our Terms and Conditions </label>
                                        </div><!-- checkbox --> 

                                        <button type="submit" class="btn">S'enregistrer</button> 
                                    </form>
                                </div>

                                <div role="tabpanel" class="tab-pane" id="post-job">
                                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                                        {{ csrf_field() }}

                                        <select name="type" class="form-control{{ $errors->has('name') ? ' has-error' : '' }}" required autofocus>
                                            <option value="">Selectionner le type de recruteur</option>
                                            <option value="particulier">Je suis un particulier</option>
                                            <option value="entreprise">Je represente une entreprise</option>
                                        </select><!-- select -->

                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <input id="name" type="text" class="form-control" name="name" placeholder="Nom du recruteur" value="{{ old('name') }}" required autofocus>

                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('prenom') ? ' has-error' : '' }}">
                                            <input id="prenom" type="text" class="form-control" name="prenom" placeholder="Prenom du recruteur" value="{{ old('prenom') }}"  autofocus>

                                            @if ($errors->has('prenom'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('prenom') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <input id="email" type="email" class="form-control" name="email" placeholder="Adresse email du recruteur" value="{{ old('email') }}" required>

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('telephone') ? ' has-error' : '' }}">
                                            <input id="telephone" type="telephone" class="form-control" name="telephone" placeholder="Numero de téléphone du recruteur" value="{{ old('telephone') }}" required>

                                            @if ($errors->has('telephone'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('telephone') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <input id="password" type="password" class="form-control" name="password" placeholder="Mot de passe du recruteur" value="{{ old('password') }}" required>

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('password-confirm') ? ' has-error' : '' }}">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmer le mot de passe" value="{{ old('password_confirmation') }}" required>
                                        </div>

                                         

                                        <div class="checkbox{{ $errors->has('checked') ? ' has-error' : '' }}">
                                            <label class="pull-left checked" for="signing"><input type="checkbox" name="signing" id="signing"> By signing up for an account you agree to our Terms and Conditions </label>
                                        </div><!-- checkbox --> 

                                        <button type="submit" class="btn">S'enregistrer</button> 
                                    </form>
                                </div>
                    </div>              
            </div>
        </div><!-- user-login -->           
    </div><!-- row -->  
</div><!-- container -->
@endsection
