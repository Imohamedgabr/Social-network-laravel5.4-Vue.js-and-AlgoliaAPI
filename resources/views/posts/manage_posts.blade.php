@extends('layouts.app')

@section('styles')
	<link href="{{ asset('css/managecontent.css') }}" rel="stylesheet">

@endsection

@section('content')
	
<div class="container">
	<div class="row">
	<table class="col-lg-8 col-lg-offset-2">
	  <thead>
	    <tr>
	      <th colspan="3">Manage Your Posts</th>
	    </tr>    
	  </thead>
	  <tbody>
		@foreach($posts as $post)
	    <tr>     
	      <td>{{substr(strip_tags($post->content), 0 ,90)}} {{strlen(strip_tags($post->content)) > 90?"..." :"" }} </td>
	      <td>
	      	<a href="{{ route('edit.post',['id'=>$post->id]) }}"><span class="glyphicon glyphicon-edit"></span></a> &nbsp;

	      	{{-- <a href="{{ route('post.delete',['id'=>$post->id]) }}"><span class="glyphicon glyphicon-remove"></span></a>   --}} 

	      	{{ Form::open(['method' => 'DELETE', 'route' => ['post.delete', $post->id]]) }}
			    {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
			{{ Form::close() }} 
			<br>
	      </td>
	    </tr>
	    @endforeach
	  </tbody>
	</table>
	</div>
	<div class="row">
	<div class="col col-md-4 col-md-offset-4">
	{{ $posts->links() }}
	</div>
	</div>
</div>
@endsection
