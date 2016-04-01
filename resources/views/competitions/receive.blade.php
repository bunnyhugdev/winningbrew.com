@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h1>{{ $competition->name }} - Receive by Category</h1>
        </div>
    </div>
    <div class="row">
        @foreach($entriesByEntryCategory as $style)
            <div class="col-md-4 col-xs-12">
                <div class="receive-category card">
                    <h4>{{ $style->subcategory . ' - ' . $style->subcategory_name }}</h4>
                    <p>
                        {{ isset($style->received) ? $style->received : 0 }} of {{ $style->total * 2 }} bottles received.
                    </p>
                    <a href="{{ url('/competition/receive') . '/' . $competition->id . '/' . $style->id }}"
                        class="btn btn-default btn-sm">
                        Receive
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
