@extends('layouts.app')

@section('content')
    <main class="main-welcome">
        <div class="jumbotron p-5 mb-4 rounded-3">
            <div class="container py-5">

                <span class="salute">Hi, my name is</span>

                <h1 class="display-5 fw-bold">
                    John Henric Quimson
                </h1>

                <p class="col-md-8 my-job">*almost* Full-Stack Developer</p>

                <p class="short-description">I'm a student of Boolean, studying to become a full-stack web developer. Big fan of technology and outdoor activities.</p>

                <div class="cont-btn d-flex gap-5">
                    <a href="{{ route('admin.projects.index') }}" class="work-btn">
                        Take a look to my work list
                    </a>

                    <a href="https://github.com/JohnQuimson" class="github-btn" target="_blank">
                        my github
                    </a>
                </div>

            </div>
        </div>
    </main>
    @include('layouts.shared.footer')
@endsection
