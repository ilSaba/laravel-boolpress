@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Nuovo Post</h3>
            </div>
        </div>
        @if ($errors->any())
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
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('admin.posts.store') }}" method="post">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="title">Titolo</label>
                        <input id="title" class="form-control" type="text" name="title" value="{{ old('title') }}" >
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control" id="content" name="content" {{ old('content') }}></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Invia</button>
                </form>
            </div>
        </div>
    </div>
@endsection
