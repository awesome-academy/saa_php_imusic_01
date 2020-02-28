@extends('admin.master')
@section('content')
@include('admin._partial.flash')
<h1 class="h3 mb-2 text-gray-800">{{ trans('messages.song_title') }}</h1>
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{route('admin.song.create')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="control-label">{{ trans('messages.title_title') }}</label>
                <div class="">
                    <input type="text" name="Song[title]" class="form-control" value="{{old('Song.title')}}" required>
                    @if ($errors->has('Song.title'))
                    <span class="help-block text-danger"><strong>{{ $errors->first('Song.title') }}</strong></span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="select_albums">{{ trans('messages.album_title') }}</label>
                <select class="form-control select2" id="select_albums" name="albums[]" multiple>
                    <?php $old_albums = old('albums') ?? []; ?>
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
                    <?php $old_artists = old('artists') ?? []; ?>
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
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}" @if ($category->id == old('Song.category_id'))) selected @endif>{{$category->name}}</option>
                    @endforeach
                </select>
                @if ($errors->has('Song.category_id'))
                <span class="help-block text-danger"><strong>{{ $errors->first('Song.category_id') }}</strong></span>
                @endif
            </div>
            <div class="form-group">
                <div class="custom-control custom-checkbox small">
                    <input type="checkbox" class="custom-control-input" id="customCheck" name="Song[is_new]" @if(old('Song.is_new')) checked @endif>
                    <label class="custom-control-label" for="customCheck">{{ trans('messages.new_title') }}</label>
                </div>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon02">{{ trans('messages.song_title') }}</span>
                </div>
                <div class="custom-file">
                    <input class="" type="file" class="custom-file-input" aria-describedby="inputGroupFileAddon02" name="Song[link]" id="song_file" accept=".mp3,audio/*" required>
                    <label class="custom-file-label" for="song_file" id="label_song_link">{{ trans('messages.choose_file_title') }}</label>
                </div>
                @if ($errors->has('Song.link'))
                <span class="help-block text-danger"><strong>{{ $errors->first('Song.link') }}</strong></span>
                @endif
            </div>
            <div>
                <output class="mb-2 w-100" id="output_result_link" style="display: none;"  >
                    <div class="result-link">
                        <audio class="w-100" controls id="source_result_link">
                            <source src="" type="audio/mpeg">
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
                    <label class="custom-file-label" for="image_file" id="label_album_image">{{ trans('messages.choose_file_title') }}</label>
                </div>
                @if ($errors->has('Song.image'))
                <span class="help-block text-danger"><strong>{{ $errors->first('Song.image') }}</strong></span>
                @endif
            </div>
            <div>
                <output class="mt-2" id="result" style="display: none;"></output>
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
