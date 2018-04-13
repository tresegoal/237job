@extends('Layouts.app')

@section('content')
<!-- signin-page -->
<section class="clearfix job-bg user-page">
    <div class="container">
        <div class="row text-center">
            <!-- user-login -->         
            <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3" style="margin-top: 70px">

                <a href="{{ route('admincandidat') }}" class="btn btn-danger" style="margin-bottom: 30px"> <i class="fa fa-plus"></i> Ajouter un candidat</a>
                <a href="{{ route('user.index') }}" class="btn btn-success" style="margin-bottom: 30px"> <i class="fa fa-plus"></i> Liste des utilisateurs</a>
                <div class="user-account">
                    <h2>Créer un compte employeur</h2>
                    
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

                         

                        <button type="submit" href="#" class="btn btn-submit btn-lg btn-block" style="padding: 15px 30px; width: 100%">Enregistrer l'employeur</button>
                    </form>
                
                    
                </div>

            </div><!-- user-login -->           
        </div><!-- row -->  
    </div><!-- container -->
</section><!-- signin-page -->
@endsection