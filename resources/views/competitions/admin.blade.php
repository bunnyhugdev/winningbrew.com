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
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <h3>Competition Stats</h3>
            <ul class="list-group">
                <li class="list-group-item">
                    Total Entries <span class="badge">{{ $totalCount }}</span>
                </li>
                <li class="list-group-item">
                    Total Fees Collected <span class="badge">${{ $totalFees }}</span>
                </li>
            </ul>
        </div>
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <h3>Entrants by Club</h3>
            <ul class="list-group">
                @foreach ($entrantsByClub as $entrants)
                    <li class="list-group-item">
                        {{ $entrants->name }} <span class="badge">{{ $entrants->userCount }}</span>
                    </li>
                @endforeach
            </ul>
            <h3>Entries by Club</h3>
            <ul class="list-group">
                @foreach ($entriesByClub as $entries)
                    <li class="list-group-item">
                        {{ $entries->name }} <span class="badge">{{ $entries->entryCount }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
