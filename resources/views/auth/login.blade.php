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
                @if (session('confirmation-danger'))
                    <div class="alert alert-danger">
                        {!! session('confirmation-danger') !!}
                    </div>
                @endif
                <div class="user-account">
                    <h2>Connexion</h2>
                    <!-- form -->
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}" style="text-center:initial">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block" style="float: left;">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block" style="float: left;">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <!-- forgot-password -->
                        <div class="user-option">
                            
                            <div class="checkbox pull-left">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                </label>
                            </div>
                            <div class="pull-right forgot-password">
                                <a  href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div><!-- forgot-password -->
                        <div class="form-group">
                            <button type="submit" href="#" class="btn btn-submit btn-lg btn-block" style="padding: 15px 30px; width: 100%">Connexion</button>
                        </div>
                    </form><!-- form -->
                
                    
                </div>
                <div style="margin-top: 15px; text-align: left;">Pas encore inscrit?</div>
                <a href="{{ route('register') }}" class="btn-primary" style="margin-top: 10px">Créer un compte</a>
            </div><!-- user-login -->           
        </div><!-- row -->  
    </div><!-- container -->
</section><!-- signin-page -->
@endsection
