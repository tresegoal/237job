<div class="list-group">
    <a href="{{ route('candidat.info') }}" class="list-group-item {{ Request::segment(1) === 'candidat' ? 'class = active' : null }}">
        Profil
    </a>
    <a href="{{ route('role.index') }}" class="list-group-item {{ Request::segment(1) === 'role' ? 'class = active' : null }}">
        Formation
    </a>
    <a href="button" class="list-group-item">
        Expérience professionnelle
    </a>
    <a href="{{ route('category.index') }}" class="list-group-item {{ Request::segment(1) === 'category' ? 'class = active' : null }}">
        Realisation
    </a>
    <a href="{{ route('type.index') }}" class="list-group-item {{ Request::segment(1) === 'type' ? 'class = active' : null }}">
        Competence
    </a>
    <a href="{{ route('salaire.index') }}" class="list-group-item {{ Request::segment(1) === 'salaire' ? 'class = active' : null }}">
        Langue
    </a>
    <a href="button" class="list-group-item">
        Centre d'interêt
    </a>
    <a href="{{ route('country.index') }}" class="list-group-item {{ Request::segment(1) === 'country' ? 'class = active' : null }}">
        A propos de moi
    </a>
    
</div>