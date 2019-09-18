@extends('layouts.app')

@section('content')
    <div class="container">
        @if(!empty($news) and !empty($news->items))
            @foreach($news as $new)
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{$new->title}}</h5>
                                <div class="card-text">
                                    {{$news->short_text}}
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="#" class="card-link float-right">Читать еще</a>
                                <p class="card-text">
                                    <small class="text-muted">Author: Admin / 24.03.2019</small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
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