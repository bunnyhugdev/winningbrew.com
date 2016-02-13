@extends('layouts.app')

@section('content')

    <div class="panel-body">
        @include('common.errors')

        <form action={{ url('entry') }} method="POST" class="form-horizontal">
            {!! csrf_field() !!}

            <div class="form-group">
                <label for="entry-name" class="col-sm-3 control-label">Entry Name</label>
                <div class="col-sm-6">
                    <input type="text" name="name" id="entry-name" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add entry
                    </button>
                </div>
            </div>
        </form>
    </div>

    @if (count($entries) > 0)
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
                        @foreach ($entries as $entry)
                            <tr>
                                <td class="table-text">
                                    <div>{{ $entry->name }}</div>
                                </td>
                                <td>
                                    <form action="{{ url('/entry/'.$entry->id) }}" method="POST">
                                        {!! csrf_field() !!}
                                        {!! method_field('DELETE') !!}
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
