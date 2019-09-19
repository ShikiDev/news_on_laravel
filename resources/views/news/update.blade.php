@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="post" action="{{route('update',['id' => $news->id])}}">
            @include('news.page_former')
        </form>
    </div>
@endsection