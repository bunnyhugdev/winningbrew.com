@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h1>{{ $competition->name }} - Category Results</h1>
        </div>
        <div class="col-xs-12">
            <a href="{{ url('/competition/bos-sheet/') . '/' . $competition->id }}" target="_blank"
                class="btn btn-default"><i class="fa fa-btn fa-check-trophy"></i> Best of Show Pull Sheet</a>
        </div>
    </div>

    <div class="row">
        @foreach($competition->judgingGuide->categories as $style)
            <div class="col-md-4 col-xs-12">
                <div class="receive-category card">
                    <h4>{{ $style->ordinal . ' - ' . $style->name }}</h4>
                    <a href="{{ url('/competition/results') . '/' . $competition->id . '/' . $style->id }}"
                        class="btn btn-default btn-sm">
                        Results
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
