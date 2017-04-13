@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                @include('common.errors')
                @include('common.success')
            </div>
        </div>
        <div class="row">
            <div class="col-md-offset-2 col-md-8 col-sm-12">
                <h2>Create a new Competition</h2>
                <form action="{{ url('competitions')}}" method="POST">
                    {!! csrf_field() !!}
                    <h3>Competition Details</h3>
                    <div class="form-group">
                        <label for="name" class="control-label">Competition Name</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="description" class="control-label">Description</label>
                        <textarea name="description" id="description" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="entry_open" class="control-label">Date Registration Starts</label>
                                <input type="date" class="form-control" name="entry_open" id="entry_open">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="entry_close" class="control-label">Date Registration Closes</label>
                                <input type="date" class="form-control" name="entry_close" id="entry_close">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="judge_start" class="control-label">Date Judging Starts</label>
                                <input type="date" class="form-control" name="judge_start" id="judge_start">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="judge_end" class="control-label">Date Judging Ends</label>
                                <input type="date" class="form-control" name="judge_end" id="judge_end">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="result_at" class="control-label">Results Available</label>
                                <input type="date" class="form-control" name="result_at" id="result_at">
                            </div>
                        </div>
                    </div>
                    <h3>Shipping Information</h3>
                    <div class="form-group">
                        <label for="ship_address1" class="control-label">Address</label>
                        <input type="text" class="form-control" name="ship_address1" id="ship_address1">
                    </div>
                    <div class="form-group">
                        <label for="ship_address2" class="control-label">Additional Address Information</label>
                        <input type="text" class="form-control" name="ship_address2" id="ship_address2">
                    </div>
                    <div class="form-group">
                        <label for="ship_city" class="control-label">City</label>
                        <input type="text" class="form-control" name="ship_city" id="ship_city">
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="ship_province" class="control-label">Province</label>
                                <?php
                                    $provinces = [
                                        'AB' => 'Alberta',
                                        'BC' => 'British Columbia',
                                        'MB' => 'Manitoba',
                                        'NB' => 'New Brunswick',
                                        'NL' => 'Newfoundland & Labrador',
                                        'NT' => 'Northwest Territories',
                                        'NS' => 'Nova Scotia',
                                        'NU' => 'Nunavut',
                                        'ON' => 'Ontario',
                                        'PE' => 'Prince Edward Island',
                                        'QC' => 'Quebec',
                                        'SK' => 'Saskatchewan',
                                        'YK' => 'Yukon'
                                    ];
                                ?>
                                <select name="ship_province" id="ship_province" class="form-control">
                                    @foreach ($provinces as $abbr => $prov)
                                        <option value="{{ $abbr }}">{{ $prov }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="ship_postal_code" class="control-label">Postal Code</label>
                                <input type="text" class="form-control" name="ship_postal_code" id="ship_postal_code">
                            </div>
                        </div>
                    </div>
                    <h3>Judging Information</h3>
                    <div class="form-group">
                        <label for="guide" class="control-label">Entry Style Guide</label>
                        <select name="guide" id="guide" class="form-control">
                            @foreach ($guides as $guide)
                                <option value="{{ $guide->id }}">{{ $guide->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <h3>Payment Information</h3>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="cost" class="control-label">Cost per Entry</label>
                                <input type="text" class="form-control" id="cost" name="cost">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="paypal_client_id" class="control-label">PayPal Client ID</label>
                        <input type="text" class="form-control" id="paypal_client_id" name="paypal_client_id">
                    </div>
                    <div class="form-group">
                        <label for="paypal_secret" class="control-label">PayPal Secret</label>
                        <input type="text" class="form-control" id="paypal_secret" name="paypal_secret">
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-plus"></i> Create Competition
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
