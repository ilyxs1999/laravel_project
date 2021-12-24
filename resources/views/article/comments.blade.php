<div class=" article_comments border border-1 rounded m-3">
    <div class="m-3">
        <h2>Комментарии</h2>
    </div>
    @if(Auth::check())
    <div class="add_comment row m-3">
        <div class="col-3 col-md-2 my-2 d-flex align-content-start">
            <div class="row d-flex align-content-start text-center">
                <div class="col-12">
                    <img src="{{asset('storage/defaultAvatar.jpg')}}" class="w-25 h-40 rounded-circle">
                </div>
            </div>
        </div>
        <div class="col-9 col-md-10">
            <div class="col-12 my-2">
                <textarea class="form-control" id="comment_text">
                </textarea>
            </div>
            <div class="col-12 d-flex justify-content-end my-2">
                <button type="button" id="send" class="btn btn-outline-primary btn-sm">Отправить</button>
            </div>
        </div>
    </div>
    @endif
    <div class="comments">
        @foreach($article->comments as $comment)
            @include('article.comment',array('comment'=>$comment))
        @endforeach
    </div>
</div>
