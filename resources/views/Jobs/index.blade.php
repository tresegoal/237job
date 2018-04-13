@extends('layouts.app')



@section('content')
 <br><br><br><br><br><br>
 <div class="container">
    <div class="row">
       
        <div class="col-md-12">
            <a href="{{ route('job.create') }}" class="btn btn-success" style="margin-bottom: 30px"> <i class="fa fa-plus"></i> Publier une offre</a>
			<div class="panel panel-default">
                <div class="panel-heading">

                    Liste des categories
                    
                   
                </div>

                <div class="panel-body">
                    
					<div class="form-group pull-right">
                        <input type="text" class="search form-control" placeholder="Rechercher">
                    </div>
                    <span class="counter pull-right"></span>
                    <table class="table table-hover table-bordered results">
						<thead>
						    <tr>
						        <th scope="col">#</th>
								<th scope="col">Titre</th>
								<th scope="col">categorie</th>
								<th scope="col">type</th>
								<th scope="col">ville</th>
								<th scope="col">salaire</th>
                <th scope="col">Statut</th>
								<th scope="col">Créer le</th>
								<th scope="col">Action</th>
						    </tr>
						    <tr class="warning no-result">
						        <td colspan="6"><i class="fa fa-warning"></i> Pas de resultat</td>
						    </tr>
						</thead>
						<tbody>
						    
						    @foreach ($jobs as $job)
							    <tr>
							        <th scope="row">{!! $job->id !!}</th>
							        <td>{!! $job->titre !!}</td>
							        <td>{!! $job->category->name !!}</td>
							        <td>{!! $job->type->name !!}</td>
							        <td>{!! $job->ville->name !!}</td>
							        <td>{!! $job->salaire->salmin !!} - {!! $job->salaire->salmax !!}</td>
                      <td>
                          @if ($job->confirmed == 1)
                            <span class="badge badge-success">Activé</span>
                          @else
                            <span class="badge badge-danger" style="background-color: #d9534f;">Suspendu</span>
                          @endif
                      </td>
							        <td>{!! $job->created_at !!}</td>
							        <td>
							        	

							        	<a href="{{ URL::route('job.edit', array('id' => $job->id)) }}" class="btn btn-info btn-xs"  data-placement="top" title="" data-original-title="edit"><i class="fa fa-edit"></i></a>

                        @if ($job->confirmed == 1)
                          <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#desactive{!! $job->id !!}" data-placement="top" title="" data-original-title="desactive"><i class="fa fa-close"></i></a>
                        @else
                          <a href="#" class="btn btn-success btn-xs" data-toggle="modal" data-target="#active{!! $job->id !!}" data-placement="top" title="" data-original-title="active"><i class="fa fa-check"></i></a>
                        @endif

							        	<a href="{{ URL::route('job.show', array('id' => $job->id)) }}" class="btn btn-info btn-xs"  data-placement="top" title="" data-original-title="edit"><i class="fa fa-eye"></i></a>
							        	
							        	
							        	<a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#supprimer{!! $job->id !!}" data-placement="top" title="" data-original-title="delete"><i class="fa fa-trash-o"></i></a>

							        	

								        

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

@foreach ($jobs as $job)
 <!-- Modal -->
<div class="modal fade" id="supprimer{!! $job->id !!}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="    margin-top: 80px">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel"><i>Supprimer l'offre:</i> <b style="color:#ff0000">{!! $job->titre !!}</b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            Voulez vous vraiment supprimer l'offre <b style="color:#ff0000">{!! $job->titre !!}</b> 
      </div>
      <div class="modal-footer" style="border-top: none">
        {!! Form::open(['method' => 'DELETE', 'route' => ['job.destroy', $job->id]]) !!}
			{!! Form::submit('supprimer', ['class' => 'btn btn-danger']) !!}
		{!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endforeach

@foreach ($jobs as $job)
 <!-- Modal -->
<div class="modal fade" id="active{!! $job->id !!}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="    margin-top: 80px">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel"><i>Activer l'offre:</i> <b style="color:#4cae4c">{!! $job->titre !!}</b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            Voulez vous vraiment activer l'offre <b style="color:#4cae4c">{!! $job->titre !!}</b> 
      </div>
      <div class="modal-footer" style="border-top: none">
        {!! Form::open(['method' => 'PATCH', 'route' => ['job.active', $job->id]]) !!}
			{!! Form::submit('Activer', ['class' => 'btn btn-success']) !!}
		{!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endforeach

@foreach ($jobs as $job)
 <!-- Modal -->
<div class="modal fade" id="desactive{!! $job->id !!}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="    margin-top: 80px">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel"><i>Desactiver l'offre :</i> <b style="color:#ff0000">{!! $job->titre !!}</b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            Voulez vous vraiment desactiver l'offre <b style="color:#ff0000">{!! $job->titre !!}</b> 
      </div>
      <div class="modal-footer" style="border-top: none">
        {!! Form::open(['method' => 'PATCH', 'route' => ['job.desactive', $job->id]]) !!}
			{!! Form::submit('Desactiver', ['class' => 'btn btn-danger']) !!}
		{!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endforeach



@endsection