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
	      <td>{{substr(strip_tags($post->content), 0 ,95)}} {{strlen(strip_tags($post->content)) > 95?"..." :"" }} </td>
	      <td>
	      	<a href=""><span class="glyphicon glyphicon-edit"></span></a> &nbsp;
	      	<a href=""><span class="glyphicon glyphicon-remove"></span></a>    
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
