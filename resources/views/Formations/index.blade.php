@extends('layouts.app')
<style >
/*custom font*/
@import url(https://fonts.googleapis.com/css?family=Merriweather+Sans);

.workshop{
  border: 1px solid #ccc;
    padding: 0px 25px 40px;
    position: relative;
    margin-bottom: 20px;
}
</style>

@section('content')
 <br><br><br><br><br><br>
 <div class="container">
    <div class="breadcrumb flat" style="padding: 0; width: 100%">
          <a href="#" style="width: 25%">Profil</a>
          <a href="#" class="active" style="width: 25%">Cursus scolaire</a>
          <a href="#" style="width: 25%">Expérience pro</a>
          <a href="#" style="width: 25%">A propos de vous</a>
    </div>
    <div class="row">
        @include('Flash/flash')
      <div class="list-group col-md-4" >
        
        <button type="button" class="list-group-item list-group-item-action active">Formations</button>
        <button type="button" class="list-group-item list-group-item-action">Langues</button>
        <button type="button" class="list-group-item list-group-item-action">Interêts et activités</button>
      </div>  
      <div class="col-md-8">
          <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal" >Ajouter une formation</button>
          <br><br><br>
          <div class="workshop">
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
          <div class="workshop">
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
          <div class="workshop">
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
          <div class="workshop">
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
 </div>
<!-- the fileinput plugin initialization -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>

@endsection