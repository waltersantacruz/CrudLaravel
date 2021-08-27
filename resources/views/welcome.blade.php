@extends('layouts.app')

@section('content')   
     <div class="container">
         @if(Auth::check())
          <app :user="{{Auth::user()}}"></app>
          @else 
            
          </h1> You are not signed in. <h1>
          @endif
     </div>
@endsection