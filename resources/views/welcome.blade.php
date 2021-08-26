@extends('layouts.app')

@section('content')   
     <div class="container">
         @if(Auth::check())
          <tareas :user="{{Auth::user()}}"></tareas>
          @else   
          <tareas :user="false"></tareas>
          @endif
     </div>
@endsection