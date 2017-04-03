@extends('layouts.guest')

@section('content')
    @include('partials.bodyHeader')
    <div class="container">
        <div class="section">
            <div class="row">
                @include('partials.menuProjects')
            </div>
        </div>
    </div>
@endsection