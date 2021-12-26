@extends('layouts.layout')

@section('main_content')
    <div class="user_profile border border-1 rounded m-3">
        <div class="row">
            <div class="col-12 d-flex justify-content-center ">
                <img class="img-fluid rounded-circle py-3" src="{{asset('storage/defaultAvatar.jpg')}}" alt="avatar">
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center">
                <p class="fs-1 pb-3 m-0">{{$user->name}}</p>
                @if (Auth::check() && $user->id!=Auth::id())
                    <div class="h-100 d-flex align-items-center pb-3 mx-3">
                        <img style="width: 20px; height: 20px" id="send_message"  src="{{asset('storage/message.png')}}" alt="Написать сообщение.">
                    </div>
                @endif
            </div>
            <div class="col-12 d-flex justify-content-center ">
                <table>
                    <tr>
                        <td>Email:</td>
                        <td>{{$user->email}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    @include('user_profile.message_model',['user'=>$user])
@endsection
@push('scripts')
    <script src="{{asset('js/user_profile.js')}}"></script>
@endpush
