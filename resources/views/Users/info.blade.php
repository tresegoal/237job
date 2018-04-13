@extends('layouts.app')
<style >
/*custom font*/
@import url(https://fonts.googleapis.com/css?family=Merriweather+Sans);


.breadcrumb {
  /*centering*/
  padding: 0;
  display: inline-block;
  box-shadow: 0 0 4px 1px rgba(0, 0, 0, 0.35);
  overflow: hidden;
  border-radius: 5px;
  /*Lets add the numbers for each link using CSS counters. flag is the name of the counter. to be defined using counter-reset in the parent element of the links*/
  counter-reset: flag; 
}

.breadcrumb a {
  text-decoration: none;
  outline: none;
  display: block;
  float: left;
  font-size: 14px;
  line-height: 36px;
  color: white;
  /*need more margin on the left of links to accomodate the numbers*/
  padding: 0 10px 0 60px;
  background: #666;
  background: linear-gradient(#666, #333);
  position: relative;
}
@media only screen and (max-width: 720px) {
.breadcrumb a {
  text-decoration: none;
  outline: none;
  display: block;
  float: left;
  font-size: 12px;
  line-height: 34px;
  color: white;
  /*need more margin on the left of links to accomodate the numbers*/
  padding: 0 10px 0 50px;
  background: #666;
  background: linear-gradient(#666, #333);
  position: relative;
}
}
/*since the first link does not have a triangle before it we can reduce the left padding to make it look consistent with other links*/
.breadcrumb a:first-child {
  padding-left: 46px;
  border-radius: 5px 0 0 5px; /*to match with the parent's radius*/
}
.breadcrumb a:first-child:before {
  left: 14px;
}
.breadcrumb a:last-child {
  border-radius: 0 5px 5px 0; /*this was to prevent glitches on hover*/
  padding-right: 20px;
}

/*hover/active styles*/
.breadcrumb a.active, .breadcrumb a:hover{
  background: #333;
  background: linear-gradient(#333, #000);
}
.breadcrumb a.active:after, .breadcrumb a:hover:after {
  background: #333;
  background: linear-gradient(135deg, #333, #000);
}

/*adding the arrows for the breadcrumbs using rotated pseudo elements*/
.breadcrumb a:after {
  content: '';
  position: absolute;
  top: 0; 
  right: -18px; /*half of square's length*/
  /*same dimension as the line-height of .breadcrumb a */
  width: 36px; 
  height: 36px;
  /*as you see the rotated square takes a larger height. which makes it tough to position it properly. So we are going to scale it down so that the diagonals become equal to the line-height of the link. We scale it to 70.7% because if square's: 
  length = 1; diagonal = (1^2 + 1^2)^0.5 = 1.414 (pythagoras theorem)
  if diagonal required = 1; length = 1/1.414 = 0.707*/
  transform: scale(0.707) rotate(45deg);
  /*we need to prevent the arrows from getting buried under the next link*/
  z-index: 1;
  /*background same as links but the gradient will be rotated to compensate with the transform applied*/
  background: #666;
  background: linear-gradient(135deg, #666, #333);
  /*stylish arrow design using box shadow*/
  box-shadow: 
    2px -2px 0 2px rgba(0, 0, 0, 0.4), 
    3px -3px 0 2px rgba(255, 255, 255, 0.1);
  /*
    5px - for rounded arrows and 
    50px - to prevent hover glitches on the border created using shadows*/
  border-radius: 0 5px 0 50px;
}
/*we dont need an arrow after the last link*/
.breadcrumb a:last-child:after {
  content: none;
}
/*we will use the :before element to show numbers*/
.breadcrumb a:before {
  /*content: counter(flag);
  counter-increment: flag;*/
  /*some styles now*/
  border-radius: 100%;
  width: 20px;
  height: 20px;
  line-height: 20px;
  margin: 8px 0;
  position: absolute;
  top: 0;
  left: 30px;
  background: #444;
  background: linear-gradient(#444, #222);
  font-weight: bold;
}


.flat a, .flat a:after {
  background: white;
  color: black;
  transition: all 0.5s;
}
.flat a:before {
  background: white;
  box-shadow: 0 0 0 1px #ccc;
}
.flat a:hover, .flat a.active, 
.flat a:hover:after, .flat a.active:after{
  background: #9EEB62;
}
</style>

@section('content')
 <br><br><br><br><br><br>
 <div class="container">
    <div class="breadcrumb flat" style="padding: 0; width: 100%">
          <a href="#" class="active" style="width: 25%">Profil</a>
          <a href="#" style="width: 25%">Cursus scolaire</a>
          <a href="#" style="width: 25%">Expérience pro</a>
          <a href="#" style="width: 25%">A propos de vous</a>
    </div>
    <div class="row">
        @include('Flash/flash')
        
        
        <div class="col-md-8 ">
            
            {!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'put','files'=>true, 'class' => 'form-horizontal panel']) !!}

              <div class="fileinput fileinput-new {!! $errors->has('avatar') ? 'has-error' : '' !!}" data-provides="fileinput">
                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                  <img data-src="{{ asset('images/avatars/'.$user->avatar) }}" src="{{ asset('images/avatars/'.$user->avatar) }}" alt="etc.">
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                <div>
                  <span class="btn btn-default btn-file"><span class="fileinput-new">Selectioner une photo</span><span class="fileinput-exists">Changer</span>
                  {!! Form::file('avatar') !!}
                  </span>
                  <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Retirer</a>
                </div>
                {!! $errors->first('avatar', '<small class="help-block">:message</small>') !!}
              </div>

              <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
                  {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Libelé de la categorie']) !!}
                  {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
              </div>
              <div class="form-group {!! $errors->has('prenom') ? 'has-error' : '' !!}">
                  {!! Form::text('prenom', null, ['class' => 'form-control', 'placeholder' => 'Description de la categorie']) !!}
                  {!! $errors->first('prenom', '<small class="help-block">:message</small>') !!}
              </div>

              <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
                  {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Description de la categorie']) !!}
                  {!! $errors->first('email', '<small class="help-block">:message</small>') !!}
              </div>

              <div class="form-group {!! $errors->has('telephone') ? 'has-error' : '' !!}">
                  {!! Form::number('telephone', null, ['class' => 'form-control', 'placeholder' => 'Description de la categorie']) !!}
                  {!! $errors->first('telephone', '<small class="help-block">:message</small>') !!}
              </div>

              <div class="form-group add-title location" style="margin-left: 0; margin-right: 0">
                    
                    <div class="form-group{{ $errors->has('region_id') ? ' has-error' : '' }} pull-left" style="width: 49%">
                      {!! Form::select('region_id', $regions, null, ['class' => 'form-control', 'id' => 'region_id', 'placeholder' => 'Selectionner une region']) !!}
                      {!! $errors->first('region_id', '<small class="help-block">:message</small>') !!}
                        
                    </div>
                    <div class="form-group{{ $errors->has('ville_id') ? ' has-error' : '' }} pull-right" style="width: 49%">
                     
                      <select name="ville_id" id="ville_id" class="form-control" required autofocus>
                        <option value="{{ $user->ville_id }}">
                          @if (empty($user->ville->name))
                                           
                          @else
                            {!! $user->ville->name !!}
                          @endif
                        </option>
                      </select>
                      @if ($errors->has('ville_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('ville_id') }}</strong>
                        </span>
                      @endif
                          
                    </div>  
                    
              </div>
                    
              {!! Form::submit('Aller sur cursus scolaire', ['class' => 'btn btn-primary pull-right','style' => 'margin-top:10px']) !!}
            {!! Form::close() !!}
        </div>
        <div class="col-md-4 ">
             
        </div>

    </div>
 </div>
<!-- the fileinput plugin initialization -->
<script src="http://thecodeplayer.com/uploads/js/prefixfree-1.0.7.js" type="text/javascript" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script>
    $('#region_id').on('change', function(e){
        console.log(e);
        var region_id = e.target.value;

        $.get('{{ url('villes') }}/' + region_id, function(data) {
            console.log(data);
            $('#ville_id').empty();
            $.each(data, function(index,villes){
                $('#ville_id').append($('<option>', { 
                    value: villes.id,
                    text : villes.name 
                }));
            });
        });
    });
</script>


@endsection