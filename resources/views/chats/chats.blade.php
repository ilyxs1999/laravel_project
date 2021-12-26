@extends('layouts.profile_layout')

@section('main_content')
   <div class="container-fluid">
      @foreach($user->chats as $chat)
          {{$chat->searchChat}}
      @endforeach

   </div>
@endsection
