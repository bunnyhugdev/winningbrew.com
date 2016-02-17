@extends('layouts.app')

@section('content')

    <div class="panel-body">
        @include('common.errors')

        <form action={{ url('competition') }} method="POST" class="form-horizontal">
            {!! csrf_field() !!}

            <div class="form-group">
                <label for="competition-name" class="col-sm-3 control-label">Competition Name</label>
                <div class="col-sm-6">
                    <input type="text" name="name" id="competition-name" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Competition
                    </button>
                </div>
            </div>
        </form>
    </div>

    @if (count($competitions) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Entries
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
@endsection
