@extends('layouts.app')



@section('content')
 <br><br><br><br><br><br>
 <div class="container">
    <div class="row">
        @include('Flash/flash')
        <div class="col-md-12">
            <a href="{{ route('level.create') }}" class="btn btn-success" style="margin-bottom: 30px"> <i class="fa fa-plus"></i> Ajouter un niveau</a>
			<div class="panel panel-default">
                <div class="panel-heading">

                    Liste des niveaux
                    
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
								<th scope="col">Intitulé</th>
								<th scope="col">Description</th>
                <th scope="col">Examen</th>
                <th scope="col">Cursus</th>
								<th scope="col">Statut</th>
								<th scope="col">Créer le</th>
								<th scope="col">Action</th>
						    </tr>
						    <tr class="warning no-result">
						        <td colspan="6"><i class="fa fa-warning"></i> Pas de resultat</td>
						    </tr>
						</thead>
						<tbody>
						    
						    @foreach ($levels as $level)
							    <tr>
							        <th scope="row">{!! $level->id !!}</th>
							        <td>{!! $level->intitule !!}</td>
							        <td>{!! $level->description !!}</td>
                      <td>
                          @if ($level->diplome == 1)
                            <span class="badge badge-success">Classe d'examen</span>
                          @else
                            <span class="badge badge-danger" style="background-color: #d9534f;">Pas d'examen</span>
                          @endif
                      </td>
                      <td>{!! $level->etude->intitule !!}</td>
							        <td>
							            @if ($level->confirmed == 1)
							              <span class="badge badge-success">Activé</span>
							            @else
                            <span class="badge badge-danger" style="background-color: #d9534f;">Suspendu</span>
							            @endif
							        </td>
							        <td>{!! $level->created_at !!}</td>
							        <td>
							        	

							        	<a href="{{ URL::route('level.edit', array('id' => $level->id)) }}" class="btn btn-info btn-xs"  data-placement="top" title="" data-original-title="edit"><i class="fa fa-edit"></i></a>
							        	
                          @if ($level->confirmed == 1)
							              <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#desactive{!! $level->id !!}" data-placement="top" title="" data-original-title="desactive"><i class="fa fa-close"></i></a>
							            @else
                            <a href="#" class="btn btn-success btn-xs" data-toggle="modal" data-target="#active{!! $level->id !!}" data-placement="top" title="" data-original-title="active"><i class="fa fa-check"></i></a>
							            @endif

							        	<a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#supprimer{!! $level->id !!}" data-placement="top" title="" data-original-title="delete"><i class="fa fa-trash-o"></i></a>

							        	

								        

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

@foreach ($levels as $level)
 <!-- Modal -->
<div class="modal fade" id="supprimer{!! $level->id !!}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="    margin-top: 80px">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel"><i>Supprimer un niveau:</i> <b style="color:#ff0000">{!! $level->intitule !!}</b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            Voulez vous vraiment supprimer le niveau <b style="color:#ff0000">{!! $level->intitule !!}</b> 
      </div>
      <div class="modal-footer" style="border-top: none">
        {!! Form::open(['method' => 'DELETE', 'route' => ['level.destroy', $level->id]]) !!}
			    {!! Form::submit('supprimer', ['class' => 'btn btn-danger']) !!}
		    {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endforeach

@foreach ($levels as $level)
 <!-- Modal -->
<div class="modal fade" id="active{!! $level->id !!}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="    margin-top: 80px">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel"><i>Activer un niveau:</i> <b style="color:#4cae4c">{!! $level->intitule !!}</b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            Voulez vous vraiment activer le niveau <b style="color:#4cae4c">{!! $level->intitule !!}</b> 
      </div>
      <div class="modal-footer" style="border-top: none">
        {!! Form::open(['method' => 'PATCH', 'route' => ['level.active', $level->id]]) !!}
			{!! Form::submit('Activer', ['class' => 'btn btn-success']) !!}
		{!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endforeach

@foreach ($levels as $level)
 <!-- Modal -->
<div class="modal fade" id="desactive{!! $level->id !!}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="    margin-top: 80px">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel"><i>Desactiver le niveau:</i> <b style="color:#ff0000">{!! $level->intitule !!}</b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            Voulez vous vraiment desactiver le niveau<b style="color:#ff0000">{!! $level->intitule !!}</b> 
      </div>
      <div class="modal-footer" style="border-top: none">
        {!! Form::open(['method' => 'PATCH', 'route' => ['level.desactive', $level->id]]) !!}
			{!! Form::submit('Desactiver', ['class' => 'btn btn-danger']) !!}
		{!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endforeach



@endsection