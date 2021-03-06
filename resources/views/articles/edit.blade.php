@extends('layouts.app')
@section('content')
<div class = 'container'>
<div class = 'row'>
<div class="col-md-12 col-md-offset-0 ">
@if(Session::has('flash_message'))
<div  id='alert-msg' class = 'alert alert-success'>
<p style ='font-family:Arial, Helvetica, sans-serif;'>{{Session::get('flash_message')}}

<button id ='alert-msg-confirm' class ='btn btn-success btn-sm pull-right'>Ok</button>
</p>

</div>



<script>
$(document).ready(function(){
  $('#alert-msg').fadeIn(2000);
  $('#alert-msg-confirm').click(function(){
     $('#alert-msg').slideToggle();
  });
});
</script>
@endif
</div>
</div>
</div>



  <div class = "col-md-8 col-md-offset-0">

    <form action="update" method="POST">
    <h1 style ='font-family:Arial, Helvetica, sans-serif;'>Update your ad</h1>
         {{ method_field('PATCH') }}
    		{{csrf_field()}}

          <div class="form-group">
            <label for="Title">Ad title</label>
            <input required type="text" value = '{{$articles->title}}' class="form-control" id="title" name = 'title'  placeholder="Enter a title">
            <small  class="form-text text-muted">make it as unique as possible.</small>
          </div>
          <div class="form-group">
            <label for="Title">Contact info</label>
            <input type="text" class="form-control" id="contact" value= '{{$articles->contact}}' name = 'contact'  placeholder="Optional">
            <small  class="form-text text-muted">If you want to make it easier for others to reach you, provide your contact info. Notice that the contact info will be public to all members!</small>
          </div>
           <div class="form-group">
            <label for="Location">Property location</label>
            <select class="form-control" id="location"  name = 'location'>
                <option>{{$articles->location}}</option>
                 <option>Birmingham</option>
              </select>
            <small  class="form-text text-muted">Provide the location of the accommodation</small>
          </div>
          <div class="form-group">
            <label for="Postcode">Postcode</label>
            <input  type="text" class="form-control" id="postcode" name = 'postcode'  placeholder="postcode" value = '{{$articles->postcode}}'>
            <small  class="form-text text-muted">In order to display your property into the maps</small>
          </div>
          <div class="form-group">
            <label for="Gender">Gender</label>
            <select class="form-control" id="gender" name = 'gender'>
                <option>{{$articles->gender}}</option>
                <option>Male</option>
                <option>Female</option>
              </select>
          </div>
            <div class="form-group">
            <label for="Year">Year of study</label>
            <select class="form-control" id="year" name = 'year'>
                <option>{{$articles->year}}</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
              </select>
          </div>
          <div class="form-group">
            <label for="exampleTextarea">Description</label>
            <textarea maxlength="255" required class="form-control" id="body" name ='body' rows="5">{{$articles->body}}</textarea>
            <small  class="form-text text-muted">Clear and thorough description of your room, availability etc.</small>
         </div>

         
         <button type="submit" class="btn btn-primary" style = 'margin-top:20px;margin-bottom:20px; width:100%'>update</button>
       
    </form>
  </div>
  

  <div class = "col-md-4 col-md-offset-0 ">
   @foreach($articles->photo as $image)
           <img class ='img-thumbnail' src = '{{$image->path}}' style = 'margin-top:80px'>
           @if(Auth::user())
           <form action = '/photos/{{$image->id}}' method = 'POST'>
             {{ method_field('DELETE') }}
             {{csrf_field()}}
           <button class = 'btn btn-danger' style = 'margin-top:5px;margin-bottom:20px; width:100%'>delete</button>
           </form>
           @endif
        @endforeach
</div>
@if(Auth::user())
@if(Auth::user()->id == $articles->user_id)
@if(count($articles->photo) == 0)

  <div class = "col-md-4 col-md-offset-0  jumbotron" style = 'margin-top:80px'>
    <h2 style ='font-family:Arial, Helvetica, sans-serif;'>Upload image and click ok</h2>
  <form id = 'addPhotosForm' class ='dropzone' action = '/articles/{{$articles->id}}/photos' method = 'POST' style = 'margin-top:20px'>

  {{csrf_field()}}

  </form>

  <a href = '/articles'><button class = 'btn btn-primary' style = 'margin-top:20px;margin-bottom:20px; width:100%'>Ok</button></a>
  </div>

  @endif
@endif
@endif
  <script src = "https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
  <script>
Dropzone.options.addPhotosForm = {
  maxFiles:1,
  init: function() {
      this.on("maxfilesexceeded", function(file) {
            this.removeAllFiles();
            this.addFile(file);
      });
},
  maxFiles: 1,
  paramName: 'file',
  maxFilesize: '3',
  acceptedFiles: '.jpg,.jpeg,.png,.bmp'
};

 

  </script>
        




@endsection