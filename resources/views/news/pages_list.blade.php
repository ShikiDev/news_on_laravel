@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-2">
            <div class="col">
                <button class="btn btn-info float-right" onclick="window.location='{{route('add')}}'">
                    Добавить новость
                </button>
            </div>
        </div>
        @if(!empty($news) and count($news) != 0)
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Статья</h5>
                            <div class="card-text">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Заголовок</th>
                                        <th>Создан</th>
                                        <th>Статус</th>
                                        <th colspan="2"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($news as $new)
                                        <tr>
                                            <td>{{$new->id}}</td>
                                            <td>{{$new->title}}</td>
                                            <td>{{$new->created_time}}</td>
                                            <td>
                                                @if($new->posted == 1)
                                                    <span class="badge badge-success">Опубликовано</span>
                                                @else
                                                    <span class="badge badge-danger">Не опубликовано</span>
                                                @endif
                                            </td>
                                            <td>
                                                <i class="ion ion-md-create icon-size"
                                                   onclick="window.location='{{route('edit',['id'=>$new->id])}}'"></i>
                                            </td>
                                            <td><i class="ion ion-md-close icon-size"
                                                   onclick="window.location='{{route('delete',['id'=>$new->id])}}'"></i>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="card-footer">
                            {{$news->links()}}
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <div class="card-text">
                                <strong>Пока нет новых новостей</strong><br>
                                <p>Добавить новую новость можно через кнопку "Добавить новость".</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection