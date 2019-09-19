<div class="row">
    <div class="col">
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                @foreach($errors->all() as $error)
                    <span>{{$error}}</span><br>
                @endforeach
            </div>
        @endif
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">
                    @if(isset($news->id))
                        Редактирование
                    @else
                        Создание
                    @endif
                    статьи
                </h5>

                @include('news.block')
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <span>Создан: </span><span>
                        @if(isset($news->created_time))
                            {{$news->created_time}}
                        @else
                            -
                        @endif
                    </span><br>
                    <span>Обновлен: </span><span>
                                @if(isset($news->posted_time))
                            {{$news->posted_time}}
                        @else
                            -
                        @endif
                    </span>
                </div>
                <div class="form-group">
                    <label for="news_status">Статус</label>
                    <select name="status" id="news_status" class="form-control">
                        <option value="1" @if(isset($news->posted) and $news->posted == 0) selected @endif>
                            Опубликован
                        </option>
                        <option value="0"
                                @if((isset($news->posted) and $news->posted != 0) or !isset($news->posted)) selected @endif>
                            Снят с
                            публикации
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-block">
                        @if(!isset($news->id))
                            Сохранить
                        @else
                            Редактировать
                        @endif
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
{{csrf_field()}}