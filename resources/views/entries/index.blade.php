@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            @include('common.errors')
            @include('common.success')
            @if ($invalidAddress)
                <div class="alert alert-warning">
                    <p><strong>Warning!</strong></p>
                    <p>Make sure <a href="{{ url('/profile') . '/' . Auth::user()->id }}">your address</a>
                        has been entered and is valid. How else will we know
                        where to send prizes?</p>
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12">
            <h2>Register a Brew</h2>

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
                    <i class="fa fa-btn fa-plus"></i> Add entry
                </button>
            </form>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12">
            <h2>Entries <a href="{{ url('/entries/labels') }}" target="_blank"
                class="btn btn-default pull-right">Print Labels</a></h2>
            <ul class="list-group comp-entries">
            @foreach ($entries as $entry)
                <li class="list-group-item">
                    <h4>{{ $entry->name }}</h4>
                    <form action="{{ url('/entry/'.$entry->id) }}" method="POST" class="comp-entry-delete">
                        {!! csrf_field() !!}
                        {!! method_field('DELETE') !!}
                        <button class="btn btn-danger btn-xs">
                            <i class="fa fa-btn fa-times"></i> Delete
                        </button>
                    </form>
                    <p>{{ $entry->style->subcategory . ' - ' . $entry->style->subcategory_name }}
                        / Label: {{ $entry->label }}</p>
                    <p>{{ $entry->comments }}</p>
                </li>
            @endforeach
            </ul>
        </div>
        @if (count($entries) > 0)
        <div class="col-lg-4 col-md-6 col-sm-12">
            <h2>Entry Fees</h2>
            <div class="row">
                <div class="col-xs-6">
                    <h4>Paid: <span class="label label-success">${{ $paid }}</span></h4>
                </div>
                <div class="col-xs-6">
                    <h4>Owing: <span class="label label-danger">${{ $owing }}</span></h4>
                </div>
            </div>
            @if ($owing > 0)
            <h3>Pay via PayPal</h3>
            <a href="{{ url('/paypal') }}" class="btn btn-primary"><i class="fa fa-btn fa-paypal"></i> Pay now with PayPal</a>
            <span style="display: none;">
            <h3>Pay via Credit Card</h3>
            <form action={{ url('payment') }} method="POST">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="cc_number" class="control-label">Card Number</label>
                    <input type="text" name="cc_number" id="cc_number" class="form-control">
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        <div class="form-group">
                            <label for="cc_exp_month" class="control-label">Expiry Month</label>
                            <select name="cc_exp_month" id="cc_exp_month" class="form-control">
                                <option>Month</option>
                                <option value="01">January</option>
                                <option value="02">February</option>
                                <option value="03">March</option>
                                <option value="04">April</option>
                                <option value="05">May</option>
                                <option value="06">June</option>
                                <option value="07">July</option>
                                <option value="08">August</option>
                                <option value="09">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="form-group">
                            <label for="cc_exp_year" class="control-label">Expiry Year</label>
                            <select name="cc_exp_year" id="cc_exp_year" class="form-control">
                                <?php $y = date("Y"); ?>
                                @for ($i = 0; $i < 15; $i++)
                                <option value="<?php echo ($y + $i); ?>"><?php echo ($y + $i); ?></option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="form-group">
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
                <button type="submit" class="btn btn-primary"><i class="fa fa-btn fa-credit-card"></i> Make Payment</button>

            </form>
            </span>
            @endif
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
