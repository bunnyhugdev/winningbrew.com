@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h1>{{ $competition->name }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="btn-group">
                <button
                    type="button"
                    class="btn btn-lg btn-default dropdown-toggle"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false">
                    Reports <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="{{url('competition/pull_sheets/') . '/' . $competition->id}}" target="_blank">
                        Pull Sheets</a></li>
                    <li><a href="{{url('competition/judge_sheets/') . '/' . $competition->id}}" target="_blank">
                         Judge Sheets</a></li>
                    <li><a href="{{url('competition/category_xref/') . '/' . $competition->id}}" target="_blank">
                        Category User List</a></li>
                    <li><a href="{{url('competition/user_entries/') . '/' . $competition->id}}" target="_blank">
                        User Entries</a></li>
                    <li><a href="{{ url('/competition/receive-sheets/') . '/' . $competition->id }}" target="_blank">
                        Receive Sheets</a></li>
                    <li><a href="{{ url('/competition/fees/') . '/' . $competition->id }}" target="_blank">
                        Fees Paid</a></li>
                </ul>
            </div>
            <a href="{{url('competition/receive/') . '/' . $competition->id}}"
                class="btn btn-lg btn-default"><i class="fa fa-btn fa-check-square-o"></i> Receive Entries</a>
            <a href="{{url('competition/results/') . '/' . $competition->id}}"
                class="btn btn-lg btn-default"><i class="fa fa-btn fa-star-o"></i> Enter Results</a>
            <a href="{{url('competition/finalize/') . '/' . $competition->id}}"
                class="btn btn-lg btn-default"><i class="fa fa-btn fa-users"></i> Publish Results</a>
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
            <h3>Entries By Judging Category</h3>
            <ul class="list-group">
                @foreach ($entriesByJudgingCategory as $cat)
                    <li class="list-group-item">
                        <span class="badge">{{ $cat->total }}</span>
                        {{ $cat->ordinal }}. {{ $cat->name }}
                    </li>
                @endforeach
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
