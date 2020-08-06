    <div class="form">
        <div class="form-group ">
            <label for="title">Judul</label>
            <input type="title" value="{{ old('title') ?? $story->title }}" class="form-control @error('title') is-invalid @enderror" id="title" name="title">
            @error('title')
                <small class="invalid-feedback">
                    {{ $message }}
                </small>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label for="inputAddress">Category</label>
        <select name="category" id="category" class="form-control">
            <option selected disabled>Pilih salah satu</option>
            @foreach ($categories as $category)
                <option {{ $category->id  == $story->category_id ? 'selected' : ''}} value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category')
        <small class="invalid-feedback">
            {{ $message }}
        </small>
    @enderror
    </div>
    <div class="form-group">
    <label for="tag">Tags</label>
        <select class="select2 form-control" name="tags[]" multiple>
            @foreach ($story->tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
            @foreach ($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
        @endforeach
        </select>
      @error('tags')
      <small class="invalid-feedback">
          {{ $message }}
      </small>
  @enderror
    </div>
    <div class="form">
        <div class="form-group ">
            <label for="inputCity">Ceritakan sedikit apa yang kalian pernah alami?</label>
            <textarea name="body" id="editor"> {!! Request::old('body', $story->body) !!}</textarea>
        @error('body')
            <small class="invalid-feedback">
                {{ $message }}
            </small>
        @enderror
        </div>
    </div>
        <button type="submit" class="btn btn-primary btn-block">{{ $submit ?? 'update' }}</button>
    </div>
    <div class="col-md-3">
    {{-- <div class="form-group">
    <label for="">Thumbnail</label>
    <input id="" class="form-control" type="file" name="">
    </div> --}}
    </div>