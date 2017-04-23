@extends('layouts.app')

@section('content')
    
      <div class="col-md-8 col-md-offset-2">
	<div class="panel panel-default">
            <table class="table">
            @foreach($users as $user )
              <tr>
                <td class="middle">
                  <div class="media">
                    <div class="media-left">
                      <a href="{{ route('profile', ['slug' => $user->slug]) }} ">
                      
                      <img class="media-object" src="/uploads/{{$user->avatar}} " height="50" width="50" alt="...">
                       
                      </a>

                    </div>
                    <div class="media-body">
                      <a href="{{ route('profile', ['slug' => $user->slug]) }}"> <h4 class="media-heading">{{$user->name}} </h4> </a>
                      <address>
                        {{$user->email}}
                      </address>
                    </div>
                  </div>
              
              
              </tr>
            @endforeach  
            </table>            
          </div>

    </div>
  </div>
</div>
    
@endsection
