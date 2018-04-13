@extends('layouts.app')

@section('content')

<br><br>
<section class="job-bg page job-list-page">
		<div class="container">
			
            <div class="banner-form banner-form-full job-list-form" style="margin-top: 30px">
                <form action="#">
                    <input type="text" class="form-control" placeholder="Type your key word" style="width: 70%">
                    <div class="dropdown category-dropdown">
                        <a data-toggle="dropdown" href="#"><span class="change-text">Job Location</span> <i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu category-change">
                            <li><a href="#">Location 1</a></li>
                            <li><a href="#">Location 2</a></li>
                            <li><a href="#">Location 3</a></li>
                        </ul>
                    </div><!-- category-change -->
                    <button type="submit" class="btn btn-primary" value="Search">Rechercher</button>
                </form>
            </div><!-- banner-form -->

            <div class="breadcrumb-section">							
				<h2 class="title">{{ $joblists->count() }} offre(s) trouvée(s)</h2>
			</div>
			
	
			<div class="category-info">	
				<div class="row">
					<div class="col-md-4 col-sm-4">
						<div class="accordion">
							<!-- panel-group -->
							<div class="panel-group" id="accordion">
							 	
								<!-- panel -->
								<div class="panel panel-default panel-faq">
									<!-- panel-heading -->
									<div class="panel-heading">
										<div  class="panel-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#accordion-one">
												<h4>Categories<span class="pull-right"><i class="fa fa-plus"></i></span></h4>
											</a>
										</div>
									</div><!-- panel-heading -->

									<div id="accordion-one" class="panel-collapse collapse in">
										<!-- panel-body -->
										<div class="panel-body">
											<h5><a href="categories-main.html"><i class="fa fa-caret-down"></i> All Categories</a></h5>
											<a href="#"><i class="icofont icofont-man-in-glasses"></i>Engineer/Architects</a>
											<ul>
												@foreach($catLists as $catList)
													@if($loop->index < 3)
														<li><a href="#">{{ $catList->name }} <span>(129)</span></a></li>
													@endif
												@endforeach
											</ul>
											<div class="see-more">
												<button type="button" class="show-more one"><i class="fa fa-plus-square-o" aria-hidden="true"></i>See More</button>
												<ul class="more-category one">
													@foreach($catLists as $catList)
														@if($loop->index >= 3)
															<li><a href="#">{{ $catList->name }}<span>(289)</span></a></li>
														@endif
													@endforeach
												</ul>
											</div>

										</div><!-- panel-body -->
									</div>
								</div><!-- panel -->

								<!-- panel -->
								<div class="panel panel-default panel-faq">
									<!-- panel-heading -->
									<div class="panel-heading">
										<div  class="panel-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#accordion-two">
												<h4>Date Posted <span class="pull-right"><i class="fa fa-plus"></i></span></h4>
											</a>
										</div>
									</div><!-- panel-heading -->

									<div id="accordion-two" class="panel-collapse collapse">
										<!-- panel-body -->
										<div class="panel-body">
											<label for="today"><input type="checkbox" name="today" id="today"> Today</label>
											<label for="7-days"><input type="checkbox" name="7-days" id="7-days"> 7 days</label>
											<label for="30-days"><input type="checkbox" name="30-days" id="30-days"> 30 days</label>
										</div><!-- panel-body -->
									</div>
								</div><!-- panel -->

								<!-- panel -->
								<div class="panel panel-default panel-faq">
									<!-- panel-heading -->
									<div class="panel-heading">
										<div class="panel-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#accordion-three">
												<h4>
												Salary Range
												<span class="pull-right"><i class="fa fa-plus"></i></span>
												</h4>
											</a>
										</div>
									</div><!-- panel-heading -->

									<div id="accordion-three" class="panel-collapse collapse">
										<!-- panel-body -->
										<div class="panel-body">
											<div class="price-range"><!--price-range-->
												<div class="price">
													<span>30 000 fcfa - <strong>2 000 000 fcfa</strong></span>
													<div class="dropdown category-dropdown pull-right">	
														<a data-toggle="dropdown" href="#"><span class="change-text">FCFA</span><i class="fa fa-caret-square-o-down"></i></a>
														<ul class="dropdown-menu category-change">
															<li><a href="#">FCFA</a></li>
															<li><a href="#">USD</a></li>
															<li><a href="#">EUR</a></li>
															<li><a href="#">GBP</a></li>
															<li><a href="#">JPY</a></li>
														</ul>								
													</div><!-- category-change -->													
													 <input type="text" value="" data-slider-min="30000" data-slider-max="2000000" data-slider-step="1000" data-slider-value="[250000,450000]" id="price" ><br />
												</div>
											</div><!--/price-range-->
										</div><!-- panel-body -->
									</div>
								</div><!-- panel -->

								<!-- panel -->
								<div class="panel panel-default panel-faq">
									<!-- panel-heading -->
									<div class="panel-heading">
										<div class="panel-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#accordion-four">
												<h4>Employment Type<span class="pull-right"><i class="fa fa-plus"></i></span></h4>
											</a>
										</div>
									</div><!-- panel-heading -->

									<div id="accordion-four" class="panel-collapse collapse">
										<!-- panel-body -->
										<div class="panel-body">
											@foreach($typelists as $typelist)
											<!--	<form action="{{ route('jobfiltre', ['id'=>$typelist->id]) }}", method="get"> -->
													<label for="{{ $typelist->name }}"><input type="checkbox" name="{{ $typelist->name }}" id="{{ $typelist->name }}" value="{{ $typelist->id }}"> {{ $typelist->name }} </label>
											<!--	</form> -->
											@endforeach
										</div><!-- panel-body -->
									</div>
								</div><!-- panel -->

								<!-- panel -->
								<div class="panel panel-default panel-faq">
									<!-- panel-heading -->
									<div class="panel-heading">
										<div class="panel-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#accordion-five">
												<h4>Experience Level<span class="pull-right"><i class="fa fa-plus"></i></span></h4>
											</a>
										</div>
									</div><!-- panel-heading -->

									<div id="accordion-five" class="panel-collapse collapse">
										<!-- panel-body -->
										<div class="panel-body">
											@foreach($levelLists as $levelList)
												<label for="{{ $levelList->intitule }}"><input type="checkbox" name="{{ $levelList->intitule }}" id="{{ $levelList->intitule }}"> {{ $levelList->intitule }}</label>
											@endforeach
										</div><!-- panel-body -->
									</div>
								</div> <!-- panel -->

								<!-- panel -->
								<div class="panel panel-default panel-faq">
									<!-- panel-heading -->
									<div class="panel-heading">
										<div class="panel-title"></div>
										<a data-toggle="collapse" data-parent="#accordion" href="#accordion-six">
											<h4>Company<span class="pull-right"><i class="fa fa-plus"></i></span></h4>
										</a>
									</div><!-- panel-heading -->

									<div id="accordion-six" class="panel-collapse collapse">
										<!-- panel-body -->
										<div class="panel-body">
											<input type="text" placeholder="Search Company" class="form-control">
											@foreach($entrepriseLists as $entrepriseList)
												@if($loop->index < 1)
													<label for="{{$entrepriseList->name}}"><input type="checkbox" name="{{$entrepriseList->name}}" id="{{$entrepriseList->name}}"> {{$entrepriseList->name}}</label>
												@endif
											@endforeach
											<div class="see-more">
												<button type="button" class="show-more two"><i class="fa fa-plus-square-o" aria-hidden="true"></i>See More</button>
												<div class="more-category two">
													@foreach($entrepriseLists as $entrepriseList)
														@if($loop->index >= 1)
															<label for="{{$entrepriseList->name}}"><input type="checkbox" name="{{$entrepriseList->name}}" id="{{$entrepriseList->name}}">{{$entrepriseList->name}}</label>
														@endif
													@endforeach
												</div>
											</div>											
										</div><!-- panel-body -->
									</div>
								</div> <!-- panel -->

								<!-- panel -->
								<div class="panel panel-default panel-faq">
									<!-- panel-heading -->
									<div class="panel-heading">
										<div class="panel-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#accordion-seven">
												<h4>Location<span class="pull-right"><i class="fa fa-plus"></i></span></h4>
											</a>
										</div>
									</div><!-- panel-heading -->

									<div id="accordion-seven" class="panel-collapse collapse">
										<!-- panel-body -->
										<div class="panel-body">
											<input type="text" placeholder="Search Location" class="form-control">
											@foreach($villeLists as $villeList)
												@if($loop->index < 3)
												<label for="{{ $villeList->name }}"><input type="checkbox" name="{{ $villeList->name }}" id="{{ $villeList->name }}"> {{ $villeList->name }} </label>
												@endif
											@endforeach
											<div class="see-more">
												<button type="button" class="show-more three"><i class="fa fa-plus-square-o" aria-hidden="true"></i>See More</button>
												<div class="more-category three">
													@foreach($villeLists as $villeList)
													@if($loop->index >= 3)
														<label for="{{ $villeList->name }}"><input type="checkbox" name="{{ $villeList->name }}" id="{{ $villeList->name }}">{{ $villeList->name }}</label>
													@endif
													@endforeach
												</div>
											</div>
										</div><!-- panel-body -->
									</div>
								</div> <!-- panel -->

							 </div><!-- panel-group -->
						</div>
					</div><!-- accordion-->

					<!-- recommended-ads -->
					<div class="col-sm-8 col-md-8">
						<div class="ajax"></div>
						<div class="section job-list-item">
							@foreach($joblists as $joblist)
								<div class="job-ad-item">
								<div class="item-info">
									<div class="item-image-box">
										<div class="item-image">
											<a href="{{ route('jobsingle', ['id'=>$joblist->id]) }}"><img src="{{url('images/avatars/'. $joblist->user->avatar) }}" alt="Image" class="img-responsive"></a>
										</div><!-- item-image -->
									</div>

									<div class="ad-info">
										<span><a href="#" class="title">{{ $joblist->titre }}</a> @ <a href="#">{{ $joblist->entreprise->name }}</a></span>
										<div class="ad-meta">
											<ul>
												<li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>{{ $joblist->ville->name }}</a></li>
												<li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i>{{ $joblist->type->name }}</a></li>
												<li><a href="#"><i class="fa fa-money" aria-hidden="true"></i>{{ $joblist->salaire->salmin }}-{{ $joblist->salaire->salmax }}</a></li>
											</ul>
										</div><!-- ad-meta -->									
									</div><!-- ad-info -->

								</div><!-- item-info <hr style="width: 100%">-->
							</div><!-- job-ad-item -->
							@if($loop->index == 7)
								<div class="ad-section text-center">
									<a href="#"><img src="{{ asset('images/ads/3.jpg') }}" alt="Image" class="img-responsive"></a>
								</div><!-- ad-section -->
							@endif
							@endforeach

						</div>
						<!-- pagination  -->
							<div class="text-center" style="margin-top:20px">
								<ul class="pagination ">
									<li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
									<li><a href="#">1</a></li>
									<li class="active"><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">4</a></li>
									<li><a href="#">5</a></li>
									<li><a>...</a></li>
									<li><a href="#">10</a></li>
									<li><a href="#">20</a></li>
									<li><a href="#">30</a></li>
									<li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
								</ul>
							</div><!-- pagination  -->	
					</div><!-- recommended-ads -->
				</div>	
			</div>
		</div><!-- container -->
</section><!-- main -->

<script type="text/javascript">
	$(function () {
        $('#{{ $typelist->name }}').on('click', function(e) {
           // e.preventDefault();
            $(this).is(':checked');
           // console.log(e);
            var id;
            id = e.target.value;
            console.log(id);
           var  choix = $(this).is(':checked');
            console.log(choix);
			if(choix == true) {
                $.ajax({
                    url: '{{ url('jobs') }}/' + id,
                    type: 'get',
                    data: {'id': id},
                    //beforeSend: function(data){console.log(data);},
                    success: function (data) {
                        console.log(data);
                        alert(data);

                        //  $('.ajax').empty();
                        //  $('.ajax').append(data);

                    },
                    error: function (e) {
                        console.log(e.responseText);
                    }

                });
            }
        })
    })


</script>

@endsection