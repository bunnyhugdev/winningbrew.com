@extends('layouts.app')

@section('content')
<div class="container">
    @if (count($upcoming) > 0)
        @foreach ($upcoming as $comp)
        <div class="row">
            <div class="col">
                <div class="card">
                    @if ($comp->competition_logo != "")
                        <div class="card-img-top"><img alt="{{ $comp->name }}" src="{{ url($comp->competition_logo) }}"></div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $comp->name }}</h5>
                        <p class="card-text">{!! $comp->description !!}</p>
                        <a href="{{ url('/entries/competition/') . '/' . $comp->id }}" class="btn btn-primary">
                            <i class="fa fa-btn fa-beer"></i> Enter</a>
                        <p class="card-text"><small class="text-muted">Registration closes on {{ $comp->entry_close }}</small></p>

                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @endif
</div>
<nav class="navbar fixed-bottom navbar-dark bg-dark">
    <span class="navbar-text"><a href="#">Sign up</a> and host your own competition.</span>
</nav>
@endsection
