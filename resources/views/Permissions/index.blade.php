@extends('Layouts.app')

@section('content')
<div class="container">
    <div class="row">
        
        <div class="col-md-12 " style="margin-top: 90px">
            @include('Flash/flash')
            <a href="{{ route('permission.create') }}" class="btn btn-success" style="margin-bottom: 30px"> <i class="fa fa-plus"></i> Ajouter une permission</a>
            <div class="panel panel-default">
                <div class="panel-heading">Liste des permissions</div>

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
                                <th scope="col">Nom à afficher</th>
                                <th scope="col">Description</th>
                                <th scope="col">Modifié le</th>
                                <th scope="col">Crée le</th>
                                <th scope="col">Action</th>
                            </tr>
                            <tr class="warning no-result">
                                <td colspan="6"><i class="fa fa-warning"></i> Pas de resultat</td>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($permissions as $permission)
                                <tr>
                                    <th scope="row">{!! $permission->id !!}</th>
                                    <td>{!! $permission->name !!}</td>
                                    <td>{!! $permission->display_name !!}</td>
                                    <td>{!! $permission->description !!}</td>
                                    <td>{!! $permission->updated_at !!}</td>
                                    <td>{!! $permission->created_at !!}</td>
                                    <td>
                                        

                                        <a href="{{ URL::route('permission.edit', array('id' => $permission->id)) }}" class="btn btn-info btn-xs"  data-placement="top" title="" data-original-title="edit"><i class="fa fa-edit"></i></a>
                                        
                                        
                                        <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#supprimer{!! $permission->id !!}" data-placement="top" title="" data-original-title="delete"><i class="fa fa-trash-o"></i></a>
                                        

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

@foreach ($permissions as $permission)
 <!-- Modal -->
<div class="modal fade" id="supprimer{!! $permission->id !!}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="    margin-top: 80px">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel"><i>Supprimer la permission:</i> <b style="color:#ff0000">{!! $permission->display_name !!}</b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            Voulez vous vraiment supprimer la permission <b style="color:#ff0000">{!! $permission->display_name !!}</b> 
      </div>
      <div class="modal-footer" style="border-top: none">
        {!! Form::open(['method' => 'DELETE', 'route' => ['permission.destroy', $permission->id]]) !!}
                {!! Form::submit('supprimer', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endforeach

@endsection
