@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if (count($upcoming) > 0)
        <div class="col-sm-12 col-md-12">
            <h1>Upcoming Competitions</h1>
        </div>
        @foreach ($upcoming as $comp)
            <div class="col-sm-12 col-md-6 panel panel-default comp-container">
                <h3 class="comp-title">{{ $comp->name }}</h3>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="comp-description">{!! $comp->description !!}</div>
                    </div>
                    <div class="col-sm-6">
                        <p><strong>Registration Open:</strong> {{ $comp->entry_open }}</p>
                        <p><strong>Registration Closes:</strong> {{ $comp->entry_close }}</p>
                        <p><strong>Results:</strong> {{ $comp->result_at }}</p>
                    </div>
                </div>
                <p><a href="{{ url('/entries/competition/') . '/' . $comp->id }}" class="btn btn-primary">Register Your Brews</a></p>
            </div>
        @endforeach
        @endif
    </div>
</div>
@endsection