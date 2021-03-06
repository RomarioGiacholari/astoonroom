@extends('layouts.app')
@section('content')
<div class = 'container'>
<div class = " col-md-12 col-md-offset-0 ">
<div class = 'row'>
@if(Session::has('flash_message'))
<div class = 'row'>
<div  id='alert-msg' class = 'alert alert-danger' style = 'margin-top:0px;'>{{Session::get('flash_message')}}
</div>
</div>
<script>
$(document).ready(function(){
  $('#alert-msg').fadeIn(2000);
  });
</script>
@endif	 



        <div class = " col-md-12 col-md-offset-0">
			
						<div class="form-group ">
						
				           <form method = 'GET' action = 'articles/search'>
							
							  <div class = " col-xs-12 col-md-10 col-md-offset-0">
								<div class="form-group" >
								  <label for="sel1">Sort by location</label>
								  <select required class="form-control" id="q" name = 'q'>
								    <option>Birmingham</option>
								  </select>
								 </div>
							  </div>

								 <div class = " col-md-0 col-md-offset-0" style = 'padding:24px'>
								 <button type="submit" class="btn btn-info">
							          <span class="glyphicon glyphicon-search"></span> 
							        </button>
								  </div>
								
								
							</form>
						</div>
        </div>
        

@foreach($articles as $article)
  <div class=" col-sm-12 col-md-3 col-xlg-6 col-md-offset-0" >
  <div class="row">
    <div  class="thumbnail " >
    @if(count($article->photo) > 0)
     <a href="articles/{{$article->id}}"  >
        <img  id="mainImage" class = 'img-responsive' src = '{{$article->photo[0]->path}}' alt ='{{$article->title}}' >
      </a>
      @endif
      <div class="caption">
        <h3>{{$article->title}}</h3>
        <p>{{$article->body}}</p>
        <p>Location:{{$article->location}}</p>
        <p><span class = 'glyphicon glyphicon-eye-open' ></span> {{$article->views}}</p>
        <p><a href="articles/{{$article->id}}" class="btn btn-primary" role="button">View</a> </p>
      </div>
    </div>
  </div>
</div>
	
@endforeach

 </div>
</div>
</div>

<div class = 'text-center'>{{$articles->links()}}</div>
@endsection
