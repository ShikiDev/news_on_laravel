@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="post" action="{{route('store')}}">
            @include('news.page_former')
        </form>
    </div>
@endsection