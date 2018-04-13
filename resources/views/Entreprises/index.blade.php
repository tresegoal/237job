@extends('layouts.app')



@section('content')
 <br><br><br><br><br><br>
 <div class="container">
    <div class="row">
        @include('Flash/flash')
        <div class="col-md-12">
            <a href="{{ route('entreprise.create') }}" class="btn btn-success" style="margin-bottom: 30px"> <i class="fa fa-plus"></i> Ajouter une entreprise</a>
			<div class="panel panel-default">
                <div class="panel-heading">

                    Liste des entreprises

                </div>

                <div class="panel-body">
                    
					<div class="form-group pull-right">
                        <input type="text" class="search form-control" placeholder="Rechercher">
                    </div>
                    <span class="counter pull-right"></span>
                    <table class="table table-hover table-bordered results">
						<thead>
						    <tr>
                                <th scope="col">Logo</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Telephone</th>
                                <th scope="col">Utilisateur</th>
                                <th scope="col">ville</th>
                                <th scope="col">secteur</th>
                                <th scope="col">Statut</th>
								<th scope="col">Créer le</th>
								<th scope="col">Action</th>
						    </tr>
						    <tr class="warning no-result">
						        <td colspan="6"><i class="fa fa-warning"></i> Pas de resultat</td>
						    </tr>
						</thead>
						<tbody>
						    
						    @foreach ($entreprises as $entreprise)
							    <tr>
                                    <th scope="row">{!! $entreprise->logo !!}</th>
                                    <td>{!! $entreprise->name !!}</td>
                                    <td>{!! $entreprise->email !!}</td>
                                    <td>{!! $entreprise->telephone !!}</td>
                                    <td>{!! $entreprise->user->name !!}</td>
                                    <td>{!! $entreprise->ville->name !!}</td>
                                    <td>{!! $entreprise->secteur->name !!}</td>
                                    <td>
                                      @if ($entreprise->active == 1)
                                        <span class="badge badge-success">Activé</span>
                                      @else
                                        <span class="badge badge-danger" style="background-color: #d9534f;">Suspendu</span>
                                      @endif
                                    </td>
							        <td>{!! $entreprise->created_at !!}</td>
							        <td>
							        	

							        	<a href="{{ URL::route('entreprise.edit', array('id' => $entreprise->id)) }}" class="btn btn-info btn-xs"  data-placement="top" title="" data-original-title="edit"><i class="fa fa-edit"></i></a>

                        @if ($entreprise->active == 1)
                          <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#desactive{!! $entreprise->id !!}" data-placement="top" title="" data-original-title="desactive"><i class="fa fa-close"></i></a>
                        @else
                          <a href="#" class="btn btn-success btn-xs" data-toggle="modal" data-target="#active{!! $entreprise->id !!}" data-placement="top" title="" data-original-title="active"><i class="fa fa-check"></i></a>
                        @endif

							        	<a href="{{ URL::route('entreprise.show', array('id' => $entreprise->id)) }}" class="btn btn-info btn-xs"  data-placement="top" title="" data-original-title="edit"><i class="fa fa-eye"></i></a>
							        	
							        	
							        	<a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#supprimer{!! $entreprise->id !!}" data-placement="top" title="" data-original-title="delete"><i class="fa fa-trash-o"></i></a>

							        	

								        

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

@foreach ($entreprises as $entreprise)
 <!-- Modal -->
<div class="modal fade" id="supprimer{!! $entreprise->id !!}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="    margin-top: 80px">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel"><i>Supprimer l'offre:</i> <b style="color:#ff0000">{!! $entreprise->name !!}</b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            Voulez vous vraiment supprimer l'offre <b style="color:#ff0000">{!! $entreprise->name !!}</b> 
      </div>
      <div class="modal-footer" style="border-top: none">
        {!! Form::open(['method' => 'DELETE', 'route' => ['entreprise.destroy', $entreprise->id]]) !!}
			{!! Form::submit('supprimer', ['class' => 'btn btn-danger']) !!}
		{!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endforeach

@foreach ($entreprises as $entreprise)
 <!-- Modal -->
<div class="modal fade" id="active{!! $entreprise->id !!}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="    margin-top: 80px">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel"><i>Activer l'offre:</i> <b style="color:#4cae4c">{!! $entreprise->name !!}</b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            Voulez vous vraiment activer l'offre <b style="color:#4cae4c">{!! $entreprise->name !!}</b> 
      </div>
      <div class="modal-footer" style="border-top: none">
        {!! Form::open(['method' => 'PATCH', 'route' => ['entreprise.active', $entreprise->id]]) !!}
			{!! Form::submit('Activer', ['class' => 'btn btn-success']) !!}
		{!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endforeach

@foreach ($entreprises as $entreprise)
 <!-- Modal -->
<div class="modal fade" id="desactive{!! $entreprise->id !!}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="    margin-top: 80px">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel"><i>Desactiver l'offre :</i> <b style="color:#ff0000">{!! $entreprise->titre !!}</b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            Voulez vous vraiment desactiver l'offre <b style="color:#ff0000">{!! $entreprise->titre !!}</b> 
      </div>
      <div class="modal-footer" style="border-top: none">
        {!! Form::open(['method' => 'PATCH', 'route' => ['entreprise.desactive', $entreprise->id]]) !!}
			{!! Form::submit('Desactiver', ['class' => 'btn btn-danger']) !!}
		{!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endforeach



@endsection