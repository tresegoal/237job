@extends('layouts.app')



@section('content')
 <br><br><br><br><br><br>
 <div class="container">
    <div class="row">
        @include('Flash/flash')
        <div class="col-md-12">
            <a href="{{ route('salaire.create') }}" class="btn btn-success" style="margin-bottom: 30px"> <i class="fa fa-plus"></i> Ajouter une tranche de salaire</a>
			<div class="panel panel-default">
                <div class="panel-heading">

                    Liste des tranches de salaires
                   
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
								<th scope="col">Salaire minimum</th>
								<th scope="col">Salaire maximum</th>
								<th scope="col">Créer le</th>
								<th scope="col">Action</th>
						    </tr>
						    <tr class="warning no-result">
						        <td colspan="6"><i class="fa fa-warning"></i> Pas de resultat</td>
						    </tr>
						</thead>
						<tbody>
						    
						    @foreach ($salaires as $salaire)
							    <tr>
							        <th scope="row">{!! $salaire->id !!}</th>
							        <td>{!! $salaire->salmin !!} FCFA</td>
							        <td>{!! $salaire->salmax !!} FCFA</td>
							        <td>{!! $salaire->created_at !!}</td>
							        <td>
							        	

							        	<a href="{{ URL::route('salaire.edit', array('id' => $salaire->id)) }}" class="btn btn-info btn-xs"  data-placement="top" title="" data-original-title="edit"><i class="fa fa-edit"></i></a>
							        	
							        	<a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#supprimer{!! $salaire->id !!}" data-placement="top" title="" data-original-title="delete"><i class="fa fa-trash-o"></i></a>

							        	

								        

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

@foreach ($salaires as $salaire)
 <!-- Modal -->
<div class="modal fade" id="supprimer{!! $salaire->id !!}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="    margin-top: 80px">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel"><i>Supprimer la tranche de salaire:</i> <b style="color:#ff0000">{!! $salaire->salmin !!} FCFA - {!! $salaire->salmax !!} FCFA</b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            Voulez vous vraiment supprimer la tranche de salaire  <b style="color:#ff0000">{!! $salaire->salmin !!} FCFA - {!! $salaire->salmax !!} FCFA</b> 
      </div>
      <div class="modal-footer" style="border-top: none">
        {!! Form::open(['method' => 'DELETE', 'route' => ['salaire.destroy', $salaire->id]]) !!}
			{!! Form::submit('supprimer', ['class' => 'btn btn-danger']) !!}
		{!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endforeach


@endsection