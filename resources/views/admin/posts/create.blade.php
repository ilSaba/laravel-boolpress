@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Nuovo Post</h3>
            </div>
        </div>

        {{-- Alternative Show Error --}}

        {{-- @if ($errors->any())
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif
        --}}

        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ Route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control @error('category') is-invalid @enderror" id="category" name="category_id">
                          <option value="">Select</option>
                          @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                          @endforeach
                        </select>
                        @error('category_id')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>

                    <div class="form-group">
                        <label for="title">Titolo</label>
                        <input id="title" class="form-control @error('title') is-invalid @enderror" type="text" name="title" value="{{ old('title') }}">
                        <small>@error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror</small>
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control @error('title') is-invalid @enderror" id="content" name="content" {{ old('content') }}></textarea>
                        @error('content')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="content">Cover</label>
                        <input class="form-control-file @error('cover') is-invalid @enderror" id="cover" type="file" name="cover">
                        @error('cover')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Invia</button>
                </form>
            </div>
        </div>
    </div>
@endsection
