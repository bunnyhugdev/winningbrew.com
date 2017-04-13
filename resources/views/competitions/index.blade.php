@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <p class="pull-right">
                    <a href="{{ route('competitions.create') }}" class="btn btn-primary">Create a New Competition</a>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                @if (count($competitions) > 0)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Competitions
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped entry-table">
                                <thead>
                                    <th>Name</th>
                                    <th>&nbsp;</th>
                                </thead>
                                <tbody>
                                    @foreach ($competitions as $comp)
                                        <tr>
                                            <td class="table-text">
                                                <div>{{ $comp->name }}</div>
                                            </td>
                                            <td>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
