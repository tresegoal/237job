@extends('Layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 " style="margin-top: 90px">
            <div class="panel panel-default">
                <div class="panel-heading">Liste des utilisateurs</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    <div class="form-group pull-right">
                        <input type="text" class="search form-control" placeholder="Rechercher">
                    </div>
                    <span class="counter pull-right">
                        
                    </span>
                    <table class="table table-hover table-bordered results">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">email</th>
                                <th scope="col">Créer le</th>
                                <th scope="col">Action</th>
                            </tr>
                            <tr class="warning no-result">
                                <td colspan="6"><i class="fa fa-warning"></i> Pas de resultat</td>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{!! $user->id !!}</th>
                                    <td>{!! $user->name !!}</td>
                                    <td>{!! $user->email !!}</td>
                                    <td>{!! $user->created_at !!}</td>
                                    <td>  

                                        <a href="{{ URL::route('user.edit', array('id' => $user->id)) }}" class="btn btn-info btn-xs"  data-placement="top" title="" data-original-title="edit"><i class="fa fa-edit"></i></a>
                                        
                                        <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#supprimer{!! $user->id !!}" data-placement="top" title="" data-original-title="delete"><i class="fa fa-trash-o"></i></a> 

                                    </td>
                                </tr>
                            @endforeach   
                        </tbody>
                    </table>
                </div>
            </div>
            {!! $links !!}
        </div>
    </div>
</div>
@endsection
