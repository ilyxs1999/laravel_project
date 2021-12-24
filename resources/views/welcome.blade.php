@extends('layouts.layout')

@section('title')
    Главная страница
@endsection

@section('main_content')
    @if(count($categories)>1)
        @foreach(\App\Models\Article::articlesDESC() as $article)
            @include('article/description',array('article'=>$article))
        @endforeach
    @else
        @foreach($categories as $category)
            @if(count($category->articles)!=0)
            @foreach($category->articles as $article)
                @include('article/description',array('article'=>$article))
            @endforeach
            @else
                <div class="alert alert-info m-3" role="alert">
                    Статей в данной категории нет!
                </div>
            @endif
        @endforeach
    @endif
@endsection
