@extends('layouts.app')



@section('content')
 <br><br><br><br><br><br>
 <div class="container">
    <div class="row">
        @include('Flash/flash')
        <div class="col-md-12">
            <a href="{{ route('country.create') }}" class="btn btn-success" style="margin-bottom: 30px"> <i class="fa fa-plus"></i> Ajouter un pays</a>
			<div class="panel panel-default">
                <div class="panel-heading">

                    Liste des pays
                    
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
								<th scope="col">Nom</th>
								<th scope="col">Description</th>
								<th scope="col">Statut</th>
								<th scope="col">Créer le</th>
								<th scope="col">Action</th>
						    </tr>
						    <tr class="warning no-result">
						        <td colspan="6"><i class="fa fa-warning"></i> Pas de resultat</td>
						    </tr>
						</thead>
						<tbody>
						    
						    @foreach ($countries as $country)
							    <tr>
							        <th scope="row">{!! $country->id !!}</th>
							        <td>{!! $country->name !!}</td>
							        <td>{!! $country->description !!}</td>
							        <td>
							            @if ($country->confirmed == 1)
							              <span class="badge badge-success">Activé</span>
							            @else
                            <span class="badge badge-danger" style="background-color: #d9534f;">Suspendu</span>
							            @endif
							        </td>
							        <td>{!! $country->created_at !!}</td>
							        <td>
							        	

							        	<a href="{{ URL::route('country.edit', array('id' => $country->id)) }}" class="btn btn-info btn-xs"  data-placement="top" title="" data-original-title="edit"><i class="fa fa-edit"></i></a>
							        	
                                        @if ($country->confirmed == 1)
							               <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#desactive{!! $country->id !!}" data-placement="top" title="" data-original-title="desactive"><i class="fa fa-close"></i></a>
							            @else
                                           <a href="#" class="btn btn-success btn-xs" data-toggle="modal" data-target="#active{!! $country->id !!}" data-placement="top" title="" data-original-title="active"><i class="fa fa-check"></i></a>
							            @endif

							        	<a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#supprimer{!! $country->id !!}" data-placement="top" title="" data-original-title="delete"><i class="fa fa-trash-o"></i></a>

							        	

								        

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

@foreach ($countries as $country)
 <!-- Modal -->
<div class="modal fade" id="supprimer{!! $country->id !!}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="    margin-top: 80px">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel"><i>Supprimer le pays:</i> <b style="color:#ff0000">{!! $country->name !!}</b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            Voulez vous vraiment supprimer le pays <b style="color:#ff0000">{!! $country->name !!}</b> 
      </div>
      <div class="modal-footer" style="border-top: none">
        {!! Form::open(['method' => 'DELETE', 'route' => ['country.destroy', $country->id]]) !!}
			    {!! Form::submit('supprimer', ['class' => 'btn btn-danger']) !!}
		    {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endforeach

@foreach ($countries as $country)
 <!-- Modal -->
<div class="modal fade" id="active{!! $country->id !!}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="    margin-top: 80px">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel"><i>Activer le pays:</i> <b style="color:#4cae4c">{!! $country->name !!}</b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            Voulez vous vraiment activer le pays <b style="color:#4cae4c">{!! $country->name !!}</b> 
      </div>
      <div class="modal-footer" style="border-top: none">
        {!! Form::open(['method' => 'PATCH', 'route' => ['country.active', $country->id]]) !!}
			{!! Form::submit('Activer', ['class' => 'btn btn-success']) !!}
		{!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endforeach

@foreach ($countries as $country)
 <!-- Modal -->
<div class="modal fade" id="desactive{!! $country->id !!}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="    margin-top: 80px">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel"><i>Desactiver le pays:</i> <b style="color:#ff0000">{!! $country->name !!}</b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            Voulez vous vraiment desactiver le pays <b style="color:#ff0000">{!! $country->name !!}</b> 
      </div>
      <div class="modal-footer" style="border-top: none">
        {!! Form::open(['method' => 'PATCH', 'route' => ['country.desactive', $country->id]]) !!}
			{!! Form::submit('Desactiver', ['class' => 'btn btn-danger']) !!}
		{!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endforeach



@endsection