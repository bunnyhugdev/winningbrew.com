@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3 col-md-12 col-xs-12">
            <h2>Update your entry</h2>
            <form action={{ url('entry/update') . '/' . $entry->id }} method="POST">
                {!! csrf_field() !!}

                <div class="form-group">
                    <label for="entry-name" class="control-label">What did you name your brew?</label>
                    <input type="text" name="name" id="entry-name"
                        value="{{ $entry->name }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="entry-style" class="control-label">What style is it?</label>
                    <select name="style" id="entry-style" class="form-control">
                        @foreach ($styles as $style)
                            @if($entry->style_id == $style->id)
                                <option value="{{ $style->id }}" selected data-style="{{ $style->subcategory }}">
                                    {{ $style->subcategory }} - {{ $style->subcategory_name }}</option>
                            @else
                                <option value="{{ $style->id }}" data-style="{{ $style->subcategory }}">
                                    {{ $style->subcategory }} - {{ $style->subcategory_name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group" id="entry-info-group"
                    {{ strlen(trim($entry->comments)) == 0 ? 'style=display:none;' : ""}}>
                    <label for="entry-info" class="control-label">We may need some more info.</label>
                    <p class="form-control-static" id="entry-instructions"></p>
                    <textarea class="form-control" rows="3" name="comments" id="entry-info">{{ $entry->comments }}</textarea>
                </div>
                <div class="form-group">
                    <label for="cobrewer" class="control-label">Any co-brewers?</label>
                    <input type="text" name="cobrewer" id="cobrewer" class="form-control" value="{{ $entry->cobrewer }}">
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-btn fa-floppy-o"></i> Update entry
                </button>
                <a href={{ url('/entries') }} class="btn btn-default">
                    <i class="fa fa-btn fa-arrow-left"></i> Cancel
                </a>
            </form>
        </div>
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
            $('#entry-info').val("");
        }
    });
    $(function() {
        $('#entry-style').change();
    });
</script>
@endsection
