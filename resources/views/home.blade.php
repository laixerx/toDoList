@extends('layout.main')

@section('content')
@auth
  <div class="container">
    <h1>WELCOME BACK! {{$user->name}}</h1>
  </div>
@else
<div class="container">
  <h1>WELCOME GUEST! </h1>
</div>
@endif

@endsection
