@extends('layouts.app')

@section('content')
<section class="job-bg page job-details-page">
		<div class="container">
			<div class="breadcrumb-section" style="height: 50px">										
				
			</div><!-- breadcrumb -->

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

			<div class="job-details">
				<div class="section job-ad-item">
					<div class="item-info">
						<div class="item-image-box">
							<div class="item-image">
								<img src="{{url('images/avatars/'. $jobdetail->user->avatar) }}" alt="Image" class="img-responsive">
							</div><!-- item-image -->
						</div>

						<div class="ad-info">
							<span><span><a href="#" class="title">{{ $jobdetail->titre }}</a></span> @ <a href="#">{{ $jobdetail->entreprise->name }}</a></span>
							<div class="ad-meta">
								<ul>
									<li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>{{ $jobdetail->ville->name }}</a></li>
									<li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i>{{ $jobdetail->type->name }}</a></li>
									<li><i class="fa fa-money" aria-hidden="true"></i>{{ $jobdetail->salaire->salmin }}-{{ $jobdetail->salaire->salmax }}</li>
									<li><a href="#"><i class="fa fa-tags" aria-hidden="true"></i>{{ $jobdetail->category->name }}</a></li>
									<li><i class="fa fa-hourglass-start" aria-hidden="true"></i>Application Deadline : {{ $jobdetail->delay }}</li>
								</ul>
							</div><!-- ad-meta -->									
						</div><!-- ad-info -->
					</div><!-- item-info -->
					<div class="social-media">
						<div class="button">
							<a href="#" class="btn btn-primary"><i class="fa fa-briefcase" aria-hidden="true"></i>Apply For This Job</a>
							<a href="#" class="btn btn-primary bookmark"><i class="fa fa-bookmark-o" aria-hidden="true"></i>Bookmark</a>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                               Launch demo modal
                            </button>
						</div>
						<ul class="share-social">
							<li>Share this ad</li>
							<li><a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-pinterest-square" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-tumblr-square" aria-hidden="true"></i></a></li>
						</ul>
					</div>					
				</div><!-- job-ad-item -->
				
				<div class="job-details-info">
					<div class="row">
						<div class="col-sm-8">
							<div class="section job-description">
								<div class="description-info">
									<h1>Description</h1>
									<p>{{ $jobdetail->description }}</p>
								</div>
							</div>							
						</div>
						<div class="col-sm-4">
							<div class="section job-short-info">
								<h1>Short Info</h1>
								<ul>
									<li><span class="icon"><i class="fa fa-bolt" aria-hidden="true"></i></span>Posted: {{ $jobdetail->created_at }}</li>
									<li><span class="icon"><i class="fa fa-user-plus" aria-hidden="true"></i></span> Job poster: <a href="#">{{ $jobdetail->user->name }}</a></li>
									<li><span class="icon"><i class="fa fa-industry" aria-hidden="true"></i></span>Industry: <a href="#">{{ $jobdetail->category->name }}</a></li>
									<li><span class="icon"><i class="fa fa-line-chart" aria-hidden="true"></i></span>Experience: <a href="#">{{ $jobdetail->type->name }}</a></li>
									<li><span class="icon"><i class="fa fa-key" aria-hidden="true"></i></span>Job function: {{ $jobdetail->titre }}</li>
								</ul>
							</div>
							<div class="section company-info">
								<h1>Company Info</h1>
								<ul>
									<li>Compnay Name: <a href="#">{{ $jobdetail->entreprise->name }}</a></li>
									<li>Address: {{ $jobdetail->ville->name }}</li>
									<li>Compnay SIze:  {{ $jobdetail->entreprise->nbreEmploye }}</li>
									<li>Industry: <a href="#">{{ $jobdetail->category->name }}</a></li>
									<li>Phone: {{ $jobdetail->entreprise->telephone }}</li>
									<li>Email: <a href="#">{{ $jobdetail->entreprise->email }}</a></li>
									<li>Website: <a href="#">{{ $jobdetail->entreprise->siteweb }}</a></li>
								</ul>
								<ul class="share-social">
									<li><a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
								</ul>								
							</div>
						</div>
					</div><!-- row -->					
				</div><!-- job-details-info -->				
			</div><!-- job-details -->
		</div><!-- container -->
</section><!-- job-details-page -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection