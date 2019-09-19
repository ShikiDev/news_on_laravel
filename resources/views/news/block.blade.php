<div class="form-group">
    <label for="title">Название</label>
    <input type="text" name="title" class="form-control" id="title"
           @if(isset($news->title)) value="{{$news->title}}" @endif>
</div>
<div class="form-group">
    <label for="short_text">Короткое описание</label>
    <textarea class="form-control" name="short_text" id="short_text" cols="30"
              rows="6">@if(isset($news->short_text)){{$news->short_text}}@else{{old('short_text')}}@endif</textarea>
</div>
<div class="form-group">
    <label for="text">Текст статьи</label>
    <textarea class="form-control" name="text" id="text" cols="30"
              rows="10">@if(isset($news->text)){{$news->text}}@else{{old('short_text')}}@endif</textarea>
</div>