@extends('layouts.profile_layout')

@section('main_content')

    <div class="container-fluid article_form">
        <h1>Написать статью</h1>
        <form method="post" action="{{route('saveArticle')}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Название статьи:</label>
                <input class="form-control" type="text" id="article_title" name="article_title">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Изображение для описания статьи:</label> <br>
                <input type="file" id="article_img" name="article_img">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Описание статьи:</label>
                <input class="form-control" type="text" id="article_description" name="article_description">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Категория статьи:</label><br>
                <select name="category_id" class="form-select form-control">
                    @foreach($categories as $category)
                        <option value="{{$category['id']}}">{{$category['category_name']}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Текст статьи:</label>
                <textarea id='article_textarea' class="form-control"  style="z-index: 1000" name="article_text"></textarea>
            </div>
            <input id="article_submit" class="btn btn-secondary"type="submit">
        </form>
    </div>
    <div class="container" >
        @if($description ?? false)
            {!! $description !!}
        @endif
    </div>


@endsection

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endpush

@push('scripts')
       <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(function (){
            $('#article_textarea').summernote();
        })
    </script>
 @endpush
