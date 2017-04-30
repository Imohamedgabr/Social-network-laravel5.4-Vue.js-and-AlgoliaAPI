@extends('layouts.app')

@section('content')
    
<div class="col-md-8 col-md-offset-2">
	<div class="panel panel-default">
            <table class="table">
            @foreach($friends as $friend )
              <tr>
                <td class="middle">
                  <div class="media">
                    <div class="media-left">
                      <a href="{{ route('profile', ['slug' => $friend->slug]) }} ">
                      
                      <img class="media-object" src="/uploads/{{$friend->avatar}} " height="50" width="50" alt="...">
                       
                      </a>

                    </div>
                    <div class="media-body">
                      <a href="{{ route('profile', ['slug' => $friend->slug]) }}"> <h4 class="media-heading">{{$friend->name}} </h4> </a>
                      <address>
                        {{$friend->email}}
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
