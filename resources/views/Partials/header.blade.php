<header id="header" class="clearfix">
    <!-- navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container"> 
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><img class="img-responsive" src="{{ asset('images/logo5.png') }}" width="98px" height="40px" alt="Logo"></a>
            </div>
            <!-- /navbar-header -->
                
            <div class="navbar-left">
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    @include('Menus/menutop')
                </div>
            </div><!-- navbar-left -->
                
            <!-- nav-right -->
            <div class="nav-right">
               <ul class="sign-in pull-right ">
                   
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}" style="color: #fff">Connexion</a></li>
                        <li>|</li>
                        <li>
                            <div class="dropdown clearfix"> 
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> Créer un compte <span class="caret"></span> 
                                </button> 
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu4"> 
                                    <li><a href="{{ route('candidat') }}">Chercheur d'emplois</a></li> 
                                    <li><a href="{{ route('recruteur') }}">Employeur</a></li> 
                                </ul> 
                            </div>
                        </li>
                        <a href="{{ route('job.index') }}" class="btn">Publier une offre d'emploi</a>
                    @else
                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <img src="{{url('images/avatars/'. Auth::user()->avatar) }}" height="50px" width="50px" alt="avatar" class="img-circle" >
                            <span class="username" style="color:#fff">
                              {{ Auth::user()->name }}                                                                
                            </span>
                           <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu" role="menu" >
                            <li><a href="{{ route('candidat.info') }}" style="color:#333"><i class="icon-user"></i> Mon profil</a></li>
                            <li class="divider"></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();" style="color:#333">
                                        Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                </form>                         
                            </li>
                        </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                    @endif
               </ul>
               <!-- END TOP NAVIGATION MENU -->
            </div>
                
        </div><!-- container -->
    </nav>
    <!-- navbar -->
</header><!-- header -->