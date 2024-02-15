@extends('layouts.admin')

@section('content')
    <div class="main-create">
        <h1>Creazione Progetto</h1>
        <div class="container mt-5">

            {{-- Validation --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{-- Validation --}}

            <form action="{{ route('admin.projects.store') }}" method="POST">
                @csrf

                {{-- titolo --}}
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label" required>Titolo</label>

                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">

                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                {{-- visibility --}}
                {{-- <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">visibility</label>
                    <input type="text" class="form-control @error('visibility') is-invalid @enderror" name="visibility" value="{{ old('visibility') }}">

                    @error('visibility')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div> --}}

                {{-- visibility --}}
                <div class="mb-3">
                    <label for="visibility" class="form-label">Visibilità</label>
                    <select name="visibility" id="visibility" class="form-control @error('visibility') is-invalid @enderror">
                        <option disabled {{ old('visibility') == '' ? 'selected' : '' }}>Select a visibility option</option>
                        <option value="Public" {{ old('visibility') == 'Public' ? 'selected' : '' }}>Public</option>
                        <option value="Private" {{ old('visibility') == 'Private' ? 'selected' : '' }}>Private</option>
                    </select>

                    @error('visibility')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- visibility --}}


                {{-- last_updated --}}
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Ultimo aggiornamento</label>
                    <input type="text" class="form-control @error('last_updated') is-invalid @enderror" name="last_updated" value="{{ old('last_updated') }}">

                    @error('last_updated')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                {{-- main_language --}}
                <div class="mb-3">
                    <label class="form-label">Linguaggio principale</label>
                    <input type="text" name="main_language" class="form-control @error('main_language') is-invalid @enderror" value="{{ old('main_language') }}">

                    @error('main_language')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Select Type --}}
                <div class="mb-3">
                    <label class="form-label">Type</label>
                    <select class="form-select" aria-label="Default select example" name="type_id">
                        <option selected>Select the type</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}" @if (old('type_id') == $type->id) selected @endif>{{ $type->title }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- checkboxes --}}
                <div class="mb-3">
                    <div>
                        <label class="form-label">Technologies</label>
                    </div>
                    @foreach ($technologies as $technology)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="technology-{{ $technology->id }}" value="{{ $technology->id }}" name="technologies[]"
                                {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="technology-{{ $technology->id }}">{{ $technology->title }}</label>
                        </div>
                    @endforeach
                </div>



                <button type="submit" class="btn btn-success">Crea</button>
            </form>
            <div class="pt-5">
                <a href="{{ route('admin.projects.index') }}">
                    < torna alla lista</a>
            </div>
        </div>
    </div>
@endsection
