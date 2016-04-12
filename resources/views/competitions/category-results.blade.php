@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h1>{{ $competition->name }}</h1>
            <h3>Results for {{ $category->ordinal . ' - ' . $category->name }}</h3>
        </div>
    </div>
    @foreach ($entries as $entry)
    <div class="row">
        <div class="col-xs-6">
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
        </div>
    </div>
    @endforeach
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
