@extends('admin.master')
@section('content')
<h1 class="h3 mb-2 text-gray-800">{{ trans('messages.song_title') }}</h1>
@include('admin._partial.flash')
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{route('admin.song.update', ['song_id' => $song->id])}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="control-label">{{ trans('messages.title_title') }}</label>
                <div class="">
                    <input type="text" name="Song[title]" class="form-control" value="@if(old('Song.title') != null){{old('Song.title')}}@else{{$song->title}}@endif" required>
                    @if ($errors->has('Song.title'))
                    <span class="help-block text-danger"><strong>{{ $errors->first('Song.title') }}</strong></span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="select_albums">{{ trans('messages.album_title') }}</label>
                <select class="form-control select2" id="select_albums" name="albums[]" multiple>
                    <?php $old_albums = old('albums') ?? $song_albums; ?>
                    @foreach ($albums as $album)
                    <option value="{{$album->id}}" @if (in_array($album->id, $old_albums)) selected @endif>{{$album->name}}</option>
                    @endforeach
                </select>
                @if ($errors->has('Song.albums'))
                <span class="help-block text-danger"><strong>{{ $errors->first('Song.albums') }}</strong></span>
                @endif
            </div>
            <div class="form-group">
                <label for="select_artists">{{ trans('messages.artist_title') }}</label>
                <select class="form-control select2" id="select_artists" name="artists[]" multiple>
                    <?php $old_artists = old('artists') ?? $song_artists; ?>
                    @foreach ($artists as $artist)
                    <option value="{{$artist->id}}" @if (in_array($artist->id, $old_artists)) selected @endif>{{$artist->name}}</option>
                    @endforeach
                </select>
                @if ($errors->has('Song.artists'))
                <span class="help-block text-danger"><strong>{{ $errors->first('Song.artists') }}</strong></span>
                @endif
            </div>
            <div class="form-group">
                <label for="select_categories">{{ trans('messages.category_title') }}</label>
                <select class="form-control select2" id="select_categories" name="Song[category_id]">
                    <?php $old_category = old('Song.category_id') ?? $song->category_id ?>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}" @if ($category->id == $old_category)) selected @endif>{{$category->name}}</option>
                    @endforeach
                </select>
                @if ($errors->has('Song.category_id'))
                <span class="help-block text-danger"><strong>{{ $errors->first('Song.category_id') }}</strong></span>
                @endif
            </div>
            <div class="form-group">
                <div class="custom-control custom-checkbox small">
                    <?php $is_new = old('Song.is_new') ?? $song->is_new; ?>
                    <input type="checkbox" class="custom-control-input" id="customCheck" name="Song[is_new]" @if($is_new) checked @endif>
                    <label class="custom-control-label" for="customCheck">{{ trans('messages.new_title') }}</label>
                </div>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon02">{{ trans('messages.song_title') }}</span>
                </div>
                <div class="custom-file">
                    <input class="" type="file" class="custom-file-input" aria-describedby="inputGroupFileAddon02" name="Song[link]" id="song_file" accept=".mp3,audio/*">
                    <label class="custom-file-label" for="song_file" id="label_song_link">{{$song->getOriginal('link')}}</label>
                </div>
                @if ($errors->has('Song.link'))
                <span class="help-block text-danger"><strong>{{ $errors->first('Song.link') }}</strong></span>
                @endif
            </div>
            <div>
                <output class="mb-2 w-100" id="output_result_link">
                    <div class="result-link">
                        <audio class="w-100" controls id="source_result_link">
                            <source src="{{$song->link}}" type="audio/mpeg">
                            {{$song->getOriginal('link')}}
                        </audio>
                    </div>
                </output>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">{{ trans('messages.image_title') }}</span>
                </div>
                <div class="custom-file">
                    <input class="image_file" type="file" class="custom-file-input" aria-describedby="inputGroupFileAddon01" name="Song[image]" id="image_file">
                    <label class="custom-file-label" for="image_file" id="label_album_image">{{$song->getOriginal('image')}}</label>
                </div>
                @if ($errors->has('Song.image'))
                <span class="help-block text-danger"><strong>{{ $errors->first('Song.image') }}</strong></span>
                @endif
            </div>
            <div>
                <output class="mt-2" id="result">
                    <div class="a">
                        <img src="{{$song->image}}" alt="">
                    </div>
                </output>
            </div>
            <input type="submit" class="btn btn-primary mt-2" value="{{ trans('messages.submit_title') }}">
        </form>
    </div>
</div>
@endsection
@section('after-scripts')
<script>
    $(".select2").select2();
    $('#song_file').on("change", function(event) {
        var files = event.target.files; 
        var file = files[0];
        $("#label_song_link").text(file.name);
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#source_result_link").attr('src', e.target.result);
            var playResult = $("#source_result_link").get(0).play();
            if (playResult !== undefined) {
                playResult.then(_ => {
                    $("#output_result_link").show();
                }).catch(error => {
                    $("#output_result_link").hide();
                    alert("File Is Not Valid Media File");
                });
            }
        };
        reader.readAsDataURL(file);
    }); 
</script>
@endsection
