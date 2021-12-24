@extends('layouts.profile_layout')

@section('main_content')
<h1>Test</h1>
    @foreach($categories as $category)
        <strong>{{$category['category_name']}}</strong><br><hr>
        @foreach($category->articles as $article)
            {{$article['article_title']}}<br>
            <img src="{{asset('article_img')}}/{{$article['article_img']}}" class="img-fluid">
            {{$article['article_description']}}<br>
            {!! $article['article_text'] !!}<br>
            <hr>
        @endforeach
    @endforeach
@endsection
