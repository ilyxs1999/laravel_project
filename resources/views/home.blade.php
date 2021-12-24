@extends('layouts.profile_layout')

@section('main_content')
    <div class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-5 d-flex justify-content-center">
                <img class="rounded-circle" src="{{asset('storage/defaultAvatar.jpg')}}" alt="...">
            </div>
        </div>
        <div class="row d-flex justify-content-center text-center">
            <h2>{{ Auth::user()->name }}</h2>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-7">
                <div class="error_list hidden alert alert-danger" role="alert">
                    <ul>

                    </ul>
                </div>
                <table class ='change_info' width="100%">
                    <tr class="change_name">
                        <td>Ваш username:</td>
                        <td><input type="text" name="name"  value="{{Auth::user()->name}}" disabled></td>
                        <td><img src="{{asset('storage/pen.png')}}"> </td>
                    </tr>
                    <tr class="change_email">
                        <td>Ваш email:</td>
                        <td><input  type="email" name="email"  value="{{Auth::user()->email}}" disabled></td>
                        <td><img src="{{asset('storage/pen.png')}}"> </td>
                    </tr>
                    <tr>
                        <td class="text-center" colspan="3">
                            <input class="save_info mt-md-5" type="button" value="Сохранить">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection

