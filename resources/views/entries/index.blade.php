@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12">
            <h2>Register a Brew</h2>
            @include('common.errors')
            @include('common.success')

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
            <h2>Entry Fees</h2>
            <p>You're current cost owing is $XXXX</p>
            <form action={{ url('payment') }} method="POST">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="cc_number" class="control-label">Card Number</label>
                    <input type="text" name="cc_number" id="cc_number" class="form-control">
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class="col-xs-4">
                            <label for="cc_exp_month" class="control-label">Expiry Month</label>
                            <input type="text" name="cc_exp_month" id="cc_exp_month" class="form-control">
                        </div>
                        <div class="col-xs-4">
                            <label for="cc_exp_month" class="control-label">Expiry Year</label>
                            <input type="text" name="cc_exp_year" id="cc_exp_year" class="form-control">
                        </div>
                        <div class="col-xs-4">
                            <label for="cc_cvv" class="control-label">CVV</label>
                            <input type="text" name="cc_cvv" id="cc_cvv" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="cc_first_name" class="control-label">First Name</label>
                            <input type="text" name="cc_first_name" id="cc_first_name" class="form-control">
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="cc_last_name" class="control-label">Last Name</label>
                            <input type="text" name="cc_last_name" id="cc_last_name" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cc_type" class="control-label">Type</label>
                    <input type="text" name="cc_type" id="cc_type" class="form-control">
                </div>
                <input type="submit" class="btn btn-primary" value="Make Payment">
            </form>
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
                    <p>{{ $entry->style->subcategory . ' - ' . $entry->style->subcategory_name }}</p>
                    <p>{{ $entry->comments }}</p>
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
            $('#entry-info').val("");
        }
    });
</script>
@endsection
