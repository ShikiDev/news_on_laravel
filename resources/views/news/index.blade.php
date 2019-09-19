@extends('layouts.app')

@section('content')
    <div class="container">
        @if(!empty($news) and count($news) != 0)
            @foreach($news as $new)
                <div class="row justify-content-center mb-4">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{$new->title}}</h5>
                                <div class="card-text">
                                    {{$new->short_text}}
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{route('show',['title_eng' => $new->title_eng])}}"
                                   class="card-link float-right">Читать еще</a>
                                <p class="card-text">
                                    <small class="text-muted">Author: Admin / {{$new->created_time}}</small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{$news->links()}}
        @else
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Новых новостей нет</h5>
                            <div class="card-text">
                                <strong>Упс. У нас нет новостей</strong><br>
                                <p>Но мы постараемся исправить это недоразумение в ближайшее время.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection