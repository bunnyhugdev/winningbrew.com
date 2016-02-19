@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12">
            <h2>Register a Brew</h2>
            @include('common.errors')

            <form action={{ url('entry') }} method="POST">
                {!! csrf_field() !!}

                <div class="form-group">
                    <label for="entry-name" class="control-label">Entry Name</label>
                    <div class="input-group">
                        <input type="text" name="name" id="entry-name" class="form-control">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-plus"></i> Add entry
                            </button>
                        </span>
                    </div>
                </div>
            </form>
        </div>
        @if (count($entries) > 0)
        <div class="col-lg-6 col-md-12 col-sm-12">
            <h2>Potentially Winning Brews</h2>
            <ul class="list-group comp-entries">
            @foreach ($entries as $entry)
                <li class="list-group-item">
                    <h4>{{ $entry->name }}</h4>
                    <form action="{{ url('/entry/'.$entry->id) }}" method="POST" class="comp-entry-delete">
                        {!! csrf_field() !!}
                        {!! method_field('DELETE') !!}
                        <button class="btn btn-danger btn-xs">
                            <span class="glyphicon glyphicon-remove"></span> Delete
                        </button>
                    </form>
                </li>
            @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>
@endsection
