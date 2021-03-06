@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
@if(count($articles) >0)
<div class = "col-md-12 col-md-offset-0 " >
    <h1  style ='font-family:Arial, Helvetica, sans-serif;'>My ad</h1>
      <table class="table table-inverse" >
        <thead>
          <tr>
            <th>Title</th>
            <th>Views</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        @foreach($articles as $article)
        <tbody>
          <tr>
            <td>{{$article->title}}</td>
            <td>{{$article->views}}</td>
                 <td style = 'height:100%;'>
                <a href="articles/{{$article->id}}/edit">
                  <button class = 'btn btn-success btn-sm pull-left'>edit</button>
                </a>
           </td>
            <td style = 'height:100%;'>
                  <a href ='#' id ='delete' name = 'delete'><button  class = 'btn btn-danger btn-sm pull-left ' data-toggle="modal" data-target=".bd-example-modal-lg"><span class = 'glyphicon glyphicon-trash'></span></button></a>
           </td>
         </tr>
        </tbody>
         @endforeach
      </table>
      
  </div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg ">
    <div class="modal-content">
      <form action="articles/{{$article->id}}/delete" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <input type ='submit' value ='Delete' name = 'Delete' style = 'width:100%;height:100%' class = 'btn btn-danger btn-lg pull-left '>
      </form>
      <button style = 'margin-top:10px;width:100%;height:100%' class = 'btn btn-default btn-lg pull-left ' data-dismiss="modal">Cancel</button>
    </div>
  </div>
</div>
@endif
 
</div>
</div>
</div>





@endsection
