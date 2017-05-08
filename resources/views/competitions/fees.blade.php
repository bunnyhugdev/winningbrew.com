@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2>Fees paid</h2>
                <table class="table table-condensed table-bordered">
                    <thead>
                        <tr>
                            <th>Entrant</th>
                            <th>Entries Received</th>
                            <th>Entry Fees</th>
                            <th>Fees Collected</th>
                            <th>Fees Outstanding</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($entrants as $entrant)
                            @php
                                $count = $entrant->entries()->where([
                                    ['received', '>', 0],
                                    ['competition_id', '=', $competition->id]
                                ])->count();
                                $paid = $entrant->payments()->where([
                                    ['competition_id', '=', $competition->id],
                                    ['status', '=', 'approved']
                                ])->sum('amount');
                                $fees = ($count * $competition->cost_per_entry) + $competition->cost_per_entrant;
                            @endphp
                            @if ($count > 0)
                            <tr>
                                <td>{{ $entrant->last_name }}, {{ $entrant->first_name }}</td>
                                <td>{{ $count }}</td>
                                <td>${{ $fees }}</td>
                                <td>${{ $paid }}</td>
                                <td>${{ $fees - $paid }}</td>
                            </tr>
                            @endif
                        @endforeach
            </div>
        </div>
    </div>
@endsection
