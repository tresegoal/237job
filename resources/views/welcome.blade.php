@extends('Layouts.app', ['nbreJobs'=>$nbreJobs])

@section('content')
    <br><br>
    <div class="banner-job">
        <div class="banner-overlay"></div>
        <div class="container text-center">
            <h1 class="title">The Easiest Way to Get Your New Job</h1>
            <h3>We offer 12000 jobs vacation right now</h3>
            <div class="banner-form">
                <form action= "{{ route('search') }}" method="GET">
                    <input type="text" name="key" class="form-control" placeholder="Type your key word">
                    <div class="dropdown category-dropdown">                        
                        <a data-toggle="dropdown" href="#"><span class="change-text">Job Location</span> <i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu category-change">
                            @foreach($villes as $ville)
                                <li><a href="#">{{$ville->name}}</a></li>
                                <input type="hidden" name="ville.{{ $ville->id }}"  value="{{$ville->name}}">
                            @endforeach
                        </ul>                               
                    </div><!-- category-change -->
                    <button type="submit" class="btn btn-primary" value="Search">Search</button>
                </form>
            </div><!-- banner-form -->
            
            <ul class="banner-socail list-inline">
                <li><a href="#" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#" title="Google Plus"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#" title="Youtube"><i class="fa fa-youtube"></i></a></li>
            </ul><!-- banner-socail -->
        </div><!-- container -->
    </div><!-- banner-section -->

    <div class="page">
        <div class="container">

            <br><br>
            <div class="section cta cta-two text-center">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="single-cta">
                            <div class="cta-icon icon-jobs">
                                <img src="images/icon/31.png" alt="Icon" class="img-responsive">
                            </div><!-- cta-icon -->
                            <h3>{{ $nbreJobs }}</h3>
                            <h4>Live Jobs</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                        </div>
                    </div><!-- single-cta -->

                    <div class="col-sm-4">
                        <div class="single-cta">
                            <!-- cta-icon -->
                            <div class="cta-icon icon-company">
                                <img src="images/icon/32.png" alt="Icon" class="img-responsive">
                            </div><!-- cta-icon -->
                            <h3>{{ $totalCompagnies }}</h3>
                            <h4>Total Company</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                        </div>
                    </div><!-- single-cta -->

                    <div class="col-sm-4">
                        <div class="single-cta">
                            <div class="cta-icon icon-candidate">
                                <img src="images/icon/33.png" alt="Icon" class="img-responsive">
                            </div><!-- cta-icon -->
                            <h3>{{  $totalCandidats }}</h3>
                            <h4>Total Candidate</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                        </div>
                    </div><!-- single-cta -->
                </div><!-- row -->
            </div><!-- cta -->

            @foreach($catJobs as $catJob)
            <div class="section category-items job-category-items  text-center">
                <ul class="category-list">
                        <li class="category-item">
                            <a href="{{ route('jobsingle', ['id'=>$catJob->id]) }}">
                                <div class="category-icon"><img src="{{ asset('images/icon/1.png') }}" alt="images" class="img-responsive"></div>
                                <span class="category-title"><strong>{{ $catJob->category->name }}</strong></span>
                                <span class="badge badge-light">{{ count($catJob->category->id) }}</span>
                            </a>
                        </li><!-- category-item -->
                </ul>

            </div><!-- category ad -->
            @endforeach
            <div class="section latest-jobs-ads">
                <div class="section-title tab-manu">
                    <h4>Latest Jobs</h4>
                     <!-- Nav tabs -->      
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation"><a href="#recent-jobs" data-toggle="tab">Recent Jobs</a></li>
                        <li role="presentation" class="active"><a href="#popular-jobs" data-toggle="tab">Popular Jobs</a></li>
                    </ul>
                </div>

                <div class="tab-content">

                    <div role="tabpanel" class="tab-pane fade in" id="recent-jobs">
                        @foreach($recentJobs as $recentJob)
                            <div class="job-ad-item">
                                <div class="item-info">
                                    <div class="item-image-box">
                                        <div class="item-image">
                                            <a href="{{ route('jobsingle', ['id'=>$recentJob->id]) }}"><img src="{{url('images/avatars/'. $recentJob->user->avatar) }}" alt="Image" class="img-responsive"></a>
                                        </div><!-- item-image -->
                                    </div>

                                    <div class="ad-info">
                                        <span><a href="{{ route('jobsingle', ['id'=>$recentJob->id]) }}" class=title>{{ $recentJob->titre }}</a> @ <a href="#">{{ $recentJob->entreprise->name }}</a></span>
                                        <div class="ad-meta">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>{{ $recentJob->ville->name }} </a></li>
                                                <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i>{{ $recentJob->type->name }}</a></li>
                                                <li><a href="#"><i class="fa fa-money" aria-hidden="true"></i>{{ $recentJob->salaire->salmin }}-{{ $recentJob->salaire->salmax }}</a></li>
                                                <li><a href="#"><i class="fa fa-tags" aria-hidden="true"></i>{{ $recentJob->category->name }}</a></li>
                                            </ul>
                                        </div><!-- ad-meta -->                                  
                                    </div><!-- ad-info -->
                                    <div class="button">
                                        <a href="#" class="btn btn-primary">Apply Now</a>
                                    </div>
                                </div><!-- item-info -->
                            </div><!-- ad-item --> 
                        @endforeach
                    </div><!-- tab-pane -->

                    <div role="tabpanel" class="tab-pane fade in active" id="popular-jobs">
                        @foreach($popularJobs as $popularJob)
                        <div class="job-ad-item">
                            <div class="item-info">
                                <div class="item-image-box">
                                    <div class="item-image">
                                        <a href="{{ route('jobsingle', ['id'=>$popularJob->id]) }}"><img src="{{url('images/avatars/'. $popularJob->user->avatar) }}" alt="Image" class="img-responsive"></a>
                                    </div><!-- item-image -->
                                </div>

                                <div class="ad-info">
                                    <span><a href="{{ route('jobsingle', ['id'=>$popularJob->id]) }}" class="title">{{ $popularJob->titre }}</a> @ <a href="#">{{ $popularJob->entreprise->name }}</a></span>
                                    <div class="ad-meta">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>{{ $popularJob->ville->name }} </a></li>
                                            <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i>{{ $popularJob->type->name }}</a></li>
                                            <li><a href="#"><i class="fa fa-money" aria-hidden="true"></i>{{ $popularJob->salaire->salmin }}-{{ $recentJob->salaire->salmax }}</a></li>
                                            <li><a href="#"><i class="fa fa-tags" aria-hidden="true"></i>{{ $popularJob->category->name }}</a></li>
                                        </ul>
                                    </div><!-- ad-meta -->                                  
                                </div><!-- ad-info -->
                                <div class="button">
                                    <a href="#" class="btn btn-primary">Apply Now</a>
                                </div>
                            </div><!-- item-info -->
                        </div><!-- ad-item -->
                        @endforeach
                    </div><!-- tab-pane -->

                </div><!-- tab-content -->
            </div><!-- trending ads -->     

            <div class="ad-section text-center">
                <a href="#"><img src="images/ads/3.jpg" alt="Image" class="img-responsive"></a>
            </div><!-- ad-section -->

            <div class="section workshop-traning">
                <div class="section-title">
                    <h4>Workshop Traning</h4>
                    <a href="#" class="btn btn-primary">See all</a>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="workshop">
                            <img src="images/job/5.png" alt="Image" class="img-responsive">
                            <h3><a href="#">Business Process Management Training</a></h3>
                            <h4>Course Duration: 3 Month ( Sat, Mon, Fri)</h4>
                            <div class="workshop-price">
                                <h5>Course instructor: Kim Jon ley</h5>
                                <h5>Course Amount: $200</h5>
                            </div>
                            <div class="ad-meta">
                                <div class="meta-content">
                                    <span class="dated"><a href="#">7 Jan 10:10 pm </a></span>
                                </div>
                                <div class="user-option pull-right">
                                    <a href="#"><i class="fa fa-map-marker"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="workshop">
                            <img src="images/job/6.png" alt="Image" class="img-responsive">
                            <h3><a href="#">Employee Motivation and Engagement</a></h3>
                            <h4>Course Duration: 3 Month ( Sat, Mon, Fri)</h4>
                            <div class="workshop-price">
                                <h5>Course instructor: Kim Jon ley</h5>
                                <h5>Course Amount: $200</h5>
                            </div>
                            <div class="ad-meta">
                                <div class="meta-content">
                                    <span class="dated"><a href="#">7 Jan 10:10 pm </a></span>
                                </div>
                                <div class="user-option pull-right">
                                    <a href="#"><i class="fa fa-map-marker"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- workshop-traning -->        

        </div><!-- conainer -->
    </div><!-- page -->
    
    <!-- download -->
    <section id="download" class="clearfix parallax-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h2>Download on App Store</h2>
                </div>
            </div><!-- row -->

            <!-- row -->
            <div class="row">
                <!-- download-app -->
                <div class="col-sm-4">
                    <a href="#" class="download-app">
                        <img src="images/icon/16.png" alt="Image" class="img-responsive">
                        <span class="pull-left">
                            <span>available on</span>
                            <strong>Google Play</strong>
                        </span>
                    </a>
                </div><!-- download-app -->

                <!-- download-app -->
                <div class="col-sm-4">
                    <a href="#" class="download-app">
                        <img src="images/icon/17.png" alt="Image" class="img-responsive">
                        <span class="pull-left">
                            <span>available on</span>
                            <strong>App Store</strong>
                        </span>
                    </a>
                </div><!-- download-app -->

                <!-- download-app -->
                <div class="col-sm-4">
                    <a href="#" class="download-app">
                        <img src="images/icon/18.png" alt="Image" class="img-responsive">
                        <span class="pull-left">
                            <span>available on</span>
                            <strong>Windows Store</strong>
                        </span>
                    </a>
                </div><!-- download-app -->
            </div><!-- row -->
        </div><!-- contaioner -->
    </section><!-- download -->
    
   
    
    <!--/Preset Style Chooser--> 
    <div class="style-chooser">
        <div class="style-chooser-inner">
            <a href="#" class="toggler"><i class="fa fa-cog fa-spin"></i></a>
            <h4>Presets</h4>
            <ul class="preset-list clearfix">
                <li class="preset1 active" data-preset="1"><a href="#" data-color="preset1"></a></li>
                <li class="preset2" data-preset="2"><a href="#" data-color="preset2"></a></li>
                <li class="preset3" data-preset="3"><a href="#" data-color="preset3"></a></li>
                <li class="preset4" data-preset="4"><a href="#" data-color="preset4"></a></li>
            </ul>
        </div>
    </div>
    <!--/End:Preset Style Chooser-->
@endsection
