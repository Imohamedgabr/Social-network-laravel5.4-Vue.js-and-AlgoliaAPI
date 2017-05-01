@extends('layouts.app')

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		{!! Form::model($post,['route' => ['posts.update', $post->id], 'method' =>'PUT','files'=> true]) !!}

		
		{{ Form::label('content', "Edit Content:", ['class' => 'form-spacing-top']) }}
			{{ Form::textarea('content', null, ['class' => 'form-control']) }}
			<br>
			{{Form::submit('Save Changes',['class' => 'btn btn-success btn-block'])}}
						
		</div>
	</div>
@endsection