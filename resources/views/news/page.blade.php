@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{$news->title}}</h4>
                <div class="card-text">
                    <p>{{$news->text}}</p>
                </div>
            </div>
        </div>
    </div>
@endsection