<div class="article_description border border-1 rounded m-3">
    <div class="m-3">
        <h3><a id="article_name" href="{{route('showArticle',$article['id'])}}">{{$article['article_title']}}</a></h3>
    </div>
    <div class="m-3">
        <img src="{{asset('article_img')}}/{{$article['article_img']}}" class="img-fluid img-thumbnail col-12">
    </div>
    <div class="m-3">
        {{$article['article_description']}}
    </div>
    <div class="m-3">
        <a type="button" href="{{route('showArticle',$article['id'])}}" class="btn btn-outline-primary">Читать далее</a>
    </div>
    <div class="row p-3">
        <div class="col-6">

        </div>
        <div class="col-6 d-flex justify-content-end text-muted small">
            {{$article['created_at']}}
        </div>
    </div>
</div>




