@extends('layouts.layout')

@section('main_content')
    <div class=" article_detail border border-1 rounded m-3">
        <div class="m-3">
            <h3>{{$article['article_title']}}</h3>
        </div>
        <div class="m-3 text-muted small">
            {{$article['created_at']}}
        </div>
        <div class="m-3">
            <img src="{{asset('article_img')}}/{{$article['article_img']}}" class="img-fluid img-thumbnail col-12">
        </div>
        <div class="m-3">
            {{$article['article_description']}}
        </div>
        <div class="m-3">
            {!! $article['article_text'] !!}
        </div>
    </div>
    @include('article.comments',array('article'=>$article))
@endsection
@push('scripts')
    <script src="{{asset('js/article.js')}}"></script>
@endpush
