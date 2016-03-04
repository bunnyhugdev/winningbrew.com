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
        <div class="col-lg-offset-3 col-lg-9 col-md-12 col-xs-12">
            <h2>Your Information</h2>
        </div>
    </div>
    <form action={{ url('profile') . '/' . $user->id }} method="POST">
        {!! csrf_field() !!}
        <div class="row">
            <div class="col-lg-offset-3 col-lg-3 col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="user-name" class="control-label">Your Name</label>
                    <input type="text" name="name" id="user-name" value="{{ $user->name }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="user-address1" class="control-label">Address</label>
                    <input type="text" name="address1" id="user-address1" value="{{ $user->address1 }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="user-address2" class="control-label">Additional Address Information</label>
                    <input type="text" name="address2" id="user-address2" value="{{ $user->address2 }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="user-city" class="control-label">City</label>
                    <input type="text" name="city" id="user-city" value="{{ $user->city }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="user-province" class="control-label">Province</label>
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
                    <select name="province" id="user-province" class="form-control">
                        @foreach ($provinces as $abbr => $prov)
                            @if ($abbr == $user->province)
                                <option value="{{ $abbr }}" selected>{{ $prov }}</option>
                            @else
                                <option value="{{ $abbr }}">{{ $prov }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="user-pc" class="control-label">Postal Code</label>
                    <input type="text" name="postal_code" id="user-pc" value="{{ $user->postal_code }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="user-club" class="control-label">Club</label>
                    <select name="club" id="user-club" class="form-control">
                        <option value="">None</option>
                        @foreach ($clubs as $club)
                            @if ($club->id == $user->club_id)
                                <option value="{{ $club->id }}" selected>{{ $club->name }}</option>
                            @else
                                <option value="{{ $club->id }}">{{ $club->name }}</option>
                            @endif
                        @endforeach
                    </select>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="accept_communication" value="1" {{ $user->accept_communication ? "checked" : "" }}>
                        Would you like to accept periodic communication from
                        competitions and WinningBrew.com?
                    </label>
                </div>
                <input type="submit" class="btn btn-primary" value="Update">
            </div>
            <div class="col-lg-3 col-md-6 col-xs-12">

            </div>
        </div>
    </form>
</div>

@endsection
