@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h1>{{ $competition->name }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <h3>Entries by Entry Category</h3>
            <ul class="list-group">
                @foreach ($entriesByEntryCategory as $cat)
                    <li class="list-group-item">
                        <span class="badge">{{ $cat->total }}</span>
                        {{ $cat->subcategory . ' - ' . $cat->subcategory_name }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
