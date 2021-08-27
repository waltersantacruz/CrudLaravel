@extends('layouts.app')

@section('content')   
     <div class="container">
         @if(Auth::check())
          <tareas :user="{{Auth::user()}}"></tareas>
          @else   
          </h1 class="text-center"> You are not signed in. <h1>
          @endif
     </div>
@endsection