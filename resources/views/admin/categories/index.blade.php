@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ Route('index') }}">Home</a>
                <a href="{{ Route('admin.categories.create') }}">New category</a>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($categories as $category)
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">{{ $category->name }}</div>

                        <div class="card-body">
                            <div>
                                <a class="btn btn-info"
                                    href="{{ route('admin.categories.show', ['category' => $category->id]) }}">Show</a>
                                <a class="btn btn-primary"
                                    href="{{ route('admin.categories.edit', ['category' => $category->id]) }}">Edit</a>
                                <form action="{{ route('admin.categories.destroy', ['category' => $category->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input class="btn btn-danger" type="submit" value="Delete">
                                </form>

                                {{-- METODO DELETE RAFFA --}}
{{--
                                <a class="btn btn-danger" onclick="event.preventDefault();
                                    this.nextElementSibling.submit();">Delete</a>

                                <form action="{{ route('admin.categories.destroy', ['category' => $category->id]) }}" method="category">
                                    @csrf
                                    @method('DELETE')
                                </form> --}}

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
