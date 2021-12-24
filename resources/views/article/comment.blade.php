<div class="row m-3 border border-1">
    <div class="col-3 col-md-2 my-2 d-flex align-content-start">
        <div class="row d-flex align-content-start text-center">
            <div class="col-12">
                <img src="{{asset('storage/defaultAvatar.jpg')}}" class="w-25 h-40 rounded-circle">
            </div>
        </div>
    </div>
    <div class="col-9 col-md-10 m-auto">
        <div class="col-12">
        <a href="{{route('userProfile',$comment->user->id)}}" > {{$comment->user->name}}</a>
            <label class="text-muted small"> {{$comment['created_at']}}</label>
        </div>
       <p>{{$comment['text']}}</p>
    </div>
</div>
