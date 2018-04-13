@extends('Layouts.app')

@section('content')
<!-- signin-page -->
<section class="clearfix job-bg user-page">
    <div class="container">
        <div class="row text-center">
            <!-- user-login -->         
            <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3" style="margin-top: 70px">
                @if (session('confirmation-success'))
                    <div class="alert alert-success">
                        {{ session('confirmation-success') }}
                    </div>
                @endif
                <div class="user-account">
                    <h2>Créer un compte employeur</h2>
                    
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                            <select name="type" class="form-control" required autofocus>
                                <option value="">Selectionner le type de recruteur</option>
                                <option value="particulier">Je suis un particulier</option>
                                <option value="entreprise">Je represente une entreprise</option>
                            </select><!-- select -->
                            @if ($errors->has('type'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('type') }}</strong>
                                </span>
                            @endif
                        </div>

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

                        <button type="submit" href="#" class="btn btn-submit btn-lg btn-block" style="padding: 15px 30px; width: 100%">S'enregistrer</button>
                    </form>
                
                    
                </div>

                <div style="margin-top: 15px; text-align: left;">Déjà inscrit?</div>
                <a href="{{ route('login') }}" class="btn-primary" style="margin-top: 10px">Se connecter</a>
            </div><!-- user-login -->           
        </div><!-- row -->  
    </div><!-- container -->
</section><!-- signin-page -->
@endsection
