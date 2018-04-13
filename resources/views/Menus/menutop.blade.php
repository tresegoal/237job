<ul class="nav navbar-nav">

    <li {{ Request::is('/') ? 'class = active' : null }}>
        <a href="{{ route('accueil') }}">
            Accueil
        </a>
    </li>


    <li {{ Request::segment(1) === 'jobs' ? 'class = active' : null }}>
        <a href="{{ route('joblist') }}">
            Offre d''emplois<span class="badge badge-light">{{ $nbreJobs or ''}}</span>
        </a>
    </li>


    <li {{ Request::segment(1) === 'candidat' ? 'class = active' : null }}>
        <a href="{{ route('candidat.info') }}">
            Publier son CV
        </a>
    </li>

    <li class="dropdown">
        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Parametres<span class="caret"></span></a>
        <ul class="dropdown-menu" style="margin-top: 6px" aria-labelledby="dropdownMenu2">
            <li><a href="{{ route('user.index') }}">Gestion des utilisateurs</a></li>
            <li><a href="{{ route('role.index') }}">Gestion des roles</a></li>
            <li><a href="{{ route('permission.index') }}">Gestion des permissions</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{ route('job.index') }}">Gestion des offres</a></li>
            <li><a href="{{ route('category.index') }}">Gestion des categories</a></li>
            <li><a href="{{ route('type.index') }}">Gestion des types</a></li>
            <li><a href="{{ route('salaire.index') }}">Gestion des salaires</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{ route('country.index') }}">Gestion des pays</a></li>
            <li><a href="{{ route('region.index') }}">Gestion des regions</a></li>
            <li><a href="{{ route('ville.index') }}">Gestion des villes</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{ route('secteur.index') }}">Gestion des secteurs d'activités</a></li>
            <li><a href="{{ route('entreprise.index') }}">Gestion des entreprises</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{ route('etude.index') }}">Gestion des cursus</a></li>
            <li><a href="{{ route('level.index') }}">Gestion des niveaux</a></li>
        </ul>
    </li>

</ul>