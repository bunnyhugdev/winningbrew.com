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
                    <label for="entry-name" class="control-label">What did you name your brew?</label>
                    <input type="text" name="name" id="entry-name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="entry-style" class="control-label">What style is it?</label>
                    <select name="style" id="entry-style" class="form-control">
                        @foreach ($styles as $style)
                        <option value="{{ $style->id }}" data-style="{{ $style->subcategory }}">
                            {{ $style->subcategory }} - {{ $style->subcategory_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group" id="entry-info-group" style="display: none;">
                    <label for="entry-info" class="control-label">We may need some more info.</label>
                    <p class="form-control-static" id="entry-instructions"></p>
                    <textarea class="form-control" rows="3" name="comments" id="entry-info"></textarea>
                </div>
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Add entry
                </button>
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

@section('scripts')
<script>
    var style_additional_info = {
        @foreach ($styles as $style)
        "{{ $style->subcategory }}": "{{ $style->entry_instructions }}",
        @endforeach
    };
    $('#entry-style').change(function() {
        var cat = $(this).find(":selected").attr('data-style');
        var style_info = style_additional_info[cat];
        if (style_info && style_info != "") {
            $('#entry-instructions').text(style_info);
            $('#entry-info-group').show();
        } else {
            $('#entry-instructions').text("");
            $('#entry-info-group').hide();
        }
    });
</script>
@endsection
