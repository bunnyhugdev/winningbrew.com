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
                    <div class="col-sm-4 col-xs-12">
                        <p><strong>Registration Open</strong></p><p>{{ $comp->entry_open }}</p>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <p><strong>Registration Closes</strong></p><p>{{ $comp->entry_close }}</p>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <p><strong>Results</strong></p><p>{{ $comp->result_at }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="comp-description">{!! $comp->description !!}</div>
                    </div>

                </div>
                <p><a href="{{ url('/entries/competition/') . '/' . $comp->id }}" class="btn btn-primary">
                    <i class="fa fa-btn fa-beer"></i> Register Your Brews</a></p>
            </div>
        @endforeach
        @endif
    </div>
</div>
@endsection
