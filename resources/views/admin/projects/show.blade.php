@extends('layouts.admin')

@section('content')
    <div class="main-show">
        <h1>Card Info</h1>
        <div class="jq-cont mt-5">
            {{-- header --}}
            <div class="header-show">
                <h2>{{ $project->title }}</h2>
                <span class="card-subtitle mb-2">{{ $project->visibility }}</span>
            </div>
            {{-- Info --}}
            <div class="cont-info d-flex flex-column gap-3">
                {{-- first row --}}
                <div class="riga">
                    <div class="d-flex flex-column">
                        <span class="text-secondary">Main language:</span>
                        <span class="text-center">{{ $project->main_language }}</span>
                    </div>
                    <div class="d-flex flex-column">
                        <span class="text-secondary">Ultimo aggiornamento:</span>
                        <span class="text-center">{{ $project->last_updated }}</span>
                    </div>
                </div>
                {{-- second row --}}
                <div class="riga">
                    <div class="d-flex flex-column">
                        <span class="text-secondary">Categoria: </span>
                        <span class="text-center">{{ $project->type?->title ?: 'Nessuna categoria' }}</span>
                    </div>
                    <div class="d-flex flex-column">
                        <span class="text-secondary">Tecnologie utilizzate:</span>
                        <ul>
                            @foreach ($project->technologies as $technology)
                                <li class="text-center">
                                    {{ $technology->title }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>


            </div>

            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning">Modifica</a>
        </div>
    </div>
@endsection
