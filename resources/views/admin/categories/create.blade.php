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
                <form action="{{ Route('admin.categories.store') }}" method="post">
                    @csrf
                    @method('POST')



                    <div class="form-group">
                        <label for="name">Titolo</label>
                        <input id="name" class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}">
                        <small>@error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror</small>
                    </div>

                    <button type="submit" class="btn btn-primary">Invia</button>
                </form>
            </div>
        </div>
    </div>
@endsection
