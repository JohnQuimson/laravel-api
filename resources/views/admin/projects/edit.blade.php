@extends('layouts.admin')

@section('content')
    <div class="main-edit">
        <h1>Modifica Progetto</h1>
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

            <form action="{{ route('admin.projects.update', $project) }}" method="POST">
                @csrf

                {{-- method --}}
                @method('PUT')

                {{-- titolo --}}
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Titolo</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $project->title) }}">
                </div>


                {{-- visibility --}}
                <div class="mb-3">
                    <label for="visibility" class="form-label">Visibilità</label>
                    <select name="visibility" id="visibility" class="form-select @error('visibility') is-invalid @enderror">
                        <option disabled {{ old('visibility') == '' ? 'selected' : '' }}>Select a visibility option</option>
                        <option value="Public" {{ old('visibility') == 'Public' ? 'selected' : '' }}>Public</option>
                        <option value="Private" {{ old('visibility') == 'Private' ? 'selected' : '' }}>Private</option>
                    </select>
                </div>

                {{-- last_updated --}}
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">last_updated</label>
                    <input type="text" class="form-control" name="last_updated" value="{{ old('last_updated', $project->last_updated) }}">


                </div>


                {{-- main_language --}}
                <div class="mb-3">
                    <label class="form-label">main_language</label>
                    <input type="text" name="main_language" class="form-control" value="{{ old('main_language', $project->main_language) }}">
                </div>

                {{-- Select Type --}}
                <div class="mb-3">
                    <label class="form-label">Type</label>
                    <select class="form-select" aria-label="Default select example" name="type_id">
                        <option selected>Select the type</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}" @if (old('type_id', $project->type_id) == $type->id) selected @endif>{{ $type->title }}</option>
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

                            @if ($errors->any())
                                <input class="form-check-input" id="technology-{{ $technology->id }}" type="checkbox" value="{{ $technology->id }}" name="technologies[]"
                                    {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="technology-{{ $technology->id }}">{{ $technology->title }}</label>
                            @else
                                <input class="form-check-input" id="technology-{{ $technology->id }}" type="checkbox" value="{{ $technology->id }}" name="technologies[]"
                                    {{ $project->technologies->contains($technology->id) ? 'checked' : '' }}>
                                <label class="form-check-label" for="technology-{{ $technology->id }}">{{ $technology->title }}</label>
                            @endif

                        </div>
                    @endforeach
                </div>



                <button type="submit" class="btn btn-success">Conferma modifica</button>
            </form>
            <div class="pt-5">
                <a href="{{ route('admin.projects.index') }}">
                    < torna alla lista</a>
            </div>
        </div>
    </div>
@endsection
