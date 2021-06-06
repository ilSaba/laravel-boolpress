@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Nuovo category</h3>
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
                <form action="{{ route('admin.categories.update', ['category' => $category->id]) }}" method="post">
                    @csrf
                    @method('PATCH')


                    <div class="form-group">
                        <label for="name">Name</label>
                        <input id="name" class="form-control" type="text" name="name" value="{{ $category->name }}" >
                    </div>

                    <button type="submit" class="btn btn-primary">Invia</button>
                </form>
            </div>
        </div>
    </div>
@endsection
