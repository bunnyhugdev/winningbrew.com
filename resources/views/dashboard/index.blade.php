@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @if (count($upcoming) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">Upcoming Competitions</div>


                <div class="panel-body">
                    <ul class="list-group">
                        @foreach ($upcoming as $comp)
                        <li class="list-group-item">
                            <h3 class="list-group-item-heading">{{ $comp->name }}</h3>
                            <p>{!! $comp->description !!}</p>
                            <p class="list-group-item-text">
                                <strong>Registration Opens:</strong> {{ $comp->entry_open }}
                            </p>
                            <p class="list-group-item-text">
                                <strong>Registration Closes:</strong> {{ $comp->entry_close }}
                            </p>
                            <p class="list-group-item-text">
                                <strong>Results:</strong> {{ $comp->result_at }}
                            </p>
                            <p>
                                <a href="{{ url('/entries/competition/') . '/' . $comp->id }}" class="btn btn-primary">Register Your Brews</a>
                            </p>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
