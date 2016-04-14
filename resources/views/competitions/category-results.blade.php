@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h1>{{ $competition->name }}</h1>
            <h3>Results for {{ $category->ordinal . ' - ' . $category->name }}</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6">
            @foreach ($entries as $entry)
            <p>{{ $entry->subcategory . '-' . $entry->label }}</p>
            <p>
                <form class="result-form" method="post" action="{{ url('/competition/result') . '/' . $entry->id }}">
                    {!! csrf_field() !!}
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-check"></i></span>
                        <input type="text" name="result" value="{{ $entry->score or ''}}" class="form-control result-input">
                    </div>
                </form>
            </p>
            @endforeach
        </div>
        <div class="col-xs-6">
            <form class="place-form" method="post" action="{{ url('/competition/place') . '/' . $competition->id . '/' . $category->id }}">
                {!! csrf_field() !!}
                <p>
                    <div class="form-group">
                        <label for="firstplace">Gold</label>
                        <select id="firstplace" class="form-control" name="first_place">
                            <option></option>
                            @foreach ($entries as $entry)
                                <?php $selected = ""; ?>
                                @if ($results->firstPlace->id == $entry->id)
                                    <?php $selected = "selected"; ?>
                                @endif
                                <option value="{{ $entry->id }}" {{ $selected }}>{{ $entry->subcategory . '-' . $entry->label }}</option>
                            @endforeach
                        </select>
                    </div>
                </p>
                <p>
                    <div class="form-group">
                        <label for="firstplace">Silver</label>
                        <select id="secondplace" class="form-control" name="second_place">
                            <option></option>
                            @foreach ($entries as $entry)
                                <?php $selected = ""; ?>
                                @if ($results->secondPlace->id == $entry->id)
                                    <?php $selected = "selected"; ?>
                                @endif
                                <option value="{{ $entry->id }}" {{ $selected }}>{{ $entry->subcategory . '-' . $entry->label }}</option>
                            @endforeach
                        </select>
                    </div>
                </p>
                <p>
                    <div class="form-group">
                        <label for="firstplace">Bronze</label>
                        <select id="thirdplace" class="form-control" name="third_place">
                            <option></option>
                            @foreach ($entries as $entry)
                                <?php $selected = ""; ?>
                                @if ($results->thirdPlace->id == $entry->id)
                                    <?php $selected = "selected"; ?>
                                @endif
                                <option value="{{ $entry->id }}" {{ $selected }}>{{ $entry->subcategory . '-' . $entry->label }}</option>
                            @endforeach
                        </select>
                    </div>
                </p>
                <p>
                    <input type="submit" class="btn btn-primary" value="Save Results">
                </p>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>

    $('.result-input').change(function() {
        var $frm = $(this).parents('form.result-form'),
            $icon = $('i.fa', $frm);

        $icon.removeClass('fa-check fa-times').addClass('fa-cog fa-spin');

        $.post($frm.attr('action'), $frm.serialize()).done(function(data, status) {
            if (status == "success" && data.status === "success") {
                $icon.removeClass('fa-cog fa-spin').addClass('fa-check');
            } else {
                $icon.removeClass('fa-cog fa-span').addClass('fa-times');
            }
        })
    });
</script>
@endsection
