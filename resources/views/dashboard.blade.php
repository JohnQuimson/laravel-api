@extends('layouts.admin')

@section('content')
    <main class="main-dashboard">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 mt-4">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="alert alert-success">
                        {{ __('Sei loggato !') }}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
