@extends('layouts.app')



@section('content')
 <br><br><br><br><br><br>
 <div class="container">
    <div class="row">
        @include('Flash/flash')
        <div class="col-md-12">
            <a href="{{ route('category.create') }}" class="btn btn-success" style="margin-bottom: 30px"> <i class="fa fa-plus"></i> Ajouter une categorie</a>
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
						    
						    @foreach ($categories as $category)
							    <tr>
							        <th scope="row">{!! $category->id !!}</th>
							        <td>{!! $category->name !!}</td>
							        <td>{!! $category->description !!}</td>
							        <td>
							            @if ($category->confirmed == 1)
							               <span class="badge badge-success">Activé</span>
							            @else
                                           <span class="badge badge-danger" style="background-color: #d9534f;">Suspendu</span>
							            @endif
							        </td>
							        <td>{!! $category->created_at !!}</td>
							        <td>
							        	

							        	<a href="{{ URL::route('category.edit', array('id' => $category->id)) }}" class="btn btn-info btn-xs"  data-placement="top" title="" data-original-title="edit"><i class="fa fa-edit"></i></a>

							        	@if ($category->confirmed == 1)
							               <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#desactive{!! $category->id !!}" data-placement="top" title="" data-original-title="desactive"><i class="fa fa-close"></i></a>
							            @else
                                           <a href="#" class="btn btn-success btn-xs" data-toggle="modal" data-target="#active{!! $category->id !!}" data-placement="top" title="" data-original-title="active"><i class="fa fa-check"></i></a>
							            @endif
							        	
							        	
							        	
							        	<a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#supprimer{!! $category->id !!}" data-placement="top" title="" data-original-title="delete"><i class="fa fa-trash-o"></i></a>

							        	

								        

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

@foreach ($categories as $category)
 <!-- Modal -->
<div class="modal fade" id="supprimer{!! $category->id !!}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="    margin-top: 80px">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel"><i>Supprimer la categorie:</i> <b style="color:#ff0000">{!! $category->name !!}</b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            Voulez vous vraiment supprimer la categorie <b style="color:#ff0000">{!! $category->name !!}</b> 
      </div>
      <div class="modal-footer" style="border-top: none">
        {!! Form::open(['method' => 'DELETE', 'route' => ['category.destroy', $category->id]]) !!}
			{!! Form::submit('supprimer', ['class' => 'btn btn-danger']) !!}
		{!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endforeach

@foreach ($categories as $category)
 <!-- Modal -->
<div class="modal fade" id="active{!! $category->id !!}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="    margin-top: 80px">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel"><i>Activer la categorie:</i> <b style="color:#4cae4c">{!! $category->name !!}</b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            Voulez vous vraiment activer la categorie <b style="color:#4cae4c">{!! $category->name !!}</b> 
      </div>
      <div class="modal-footer" style="border-top: none">
        {!! Form::open(['method' => 'PATCH', 'route' => ['category.active', $category->id]]) !!}
			{!! Form::submit('Activer', ['class' => 'btn btn-success']) !!}
		{!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endforeach

@foreach ($categories as $category)
 <!-- Modal -->
<div class="modal fade" id="desactive{!! $category->id !!}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="    margin-top: 80px">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel"><i>Desactiver la categorie:</i> <b style="color:#ff0000">{!! $category->name !!}</b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            Voulez vous vraiment desactiver la categorie <b style="color:#ff0000">{!! $category->name !!}</b> 
      </div>
      <div class="modal-footer" style="border-top: none">
        {!! Form::open(['method' => 'PATCH', 'route' => ['category.desactive', $category->id]]) !!}
			{!! Form::submit('Desactiver', ['class' => 'btn btn-danger']) !!}
		{!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endforeach



@endsection