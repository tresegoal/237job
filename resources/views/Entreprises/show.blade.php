@extends('layouts.app')



@section('content')
 <br><br><br>
 <section class="job-bg page job-details-page">
    <div class="container">
      

      <div class="job-details">
        <div class="section job-ad-item">
          <div class="item-info">
            <div class="item-image-box">
              <div class="item-image">
                <img src="images/job/4.png" alt="Image" class="img-responsive">
              </div><!-- item-image -->
            </div>

            <div class="ad-info">
              <span><span><a href="#" class="title">{!! $job->titre !!}</a></span> </span>
              <div class="ad-meta">
                <ul>
                  <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>{!! $job->ville->name !!}</a></li>
                  <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i>{!! $job->type->name !!}</a></li>
                  <li><i class="fa fa-money" aria-hidden="true"></i>{!! $job->salaire->salmin !!} FCFA - {!! $job->salaire->salmax !!} FCFA</li>
                  <li><a href="#"><i class="fa fa-tags" aria-hidden="true"></i>{!! $job->category->name !!}</a></li>
                  <li><i class="fa fa-hourglass-start" aria-hidden="true"></i>Application Deadline : Jan 10, 2017</li>
                </ul>
              </div><!-- ad-meta -->                  
            </div><!-- ad-info -->
          </div><!-- item-info -->
          <div class="social-media">
            <div class="button">
              <a href="#" class="btn btn-primary"><i class="fa fa-briefcase" aria-hidden="true"></i>Apply For This Job</a>
              <a href="#" class="btn btn-primary bookmark"><i class="fa fa-bookmark-o" aria-hidden="true"></i>Bookmark</a>
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
                     {!! $job->description !!}
                </div>             
              </div>              
            </div>
            <div class="col-sm-4">
              <div class="section job-short-info">
                <h1>Publié par</h1>
                <ul>
                  <li><b>Nom:</b> <a href="#">{!! $job->user->name !!}</a></li>
                  <li><b>Il y a :</b> 2 jours</li>
                </ul>
              </div>
              <div class="section company-info">
                <h1>Company Info</h1>
                <ul>
                  <li>Compnay Name: <a href="#">Dropbox Inc</a></li>
                  <li>Address: London, United Kingdom</li>
                  <li>Compnay SIze:  2k Employee</li>
                  <li>Industry: <a href="#">Technology</a></li>
                  <li>Phone: +1234 567 8910</li>
                  <li>Email: <a href="#">info@dropbox.com</a></li>
                  <li>Website: <a href="#">www.dropbox.com</a></li>
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

 
@endsection