@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h1>{{ $competition->name }}</h1>
            <h3>Recieve {{ $style->subcategory . ' - ' . $style->subcategory_name }}</h3>
        </div>
        @foreach ($entries as $entry)
        <div class="col-md-3 col-xs-6 card">
            <p>{{ $style->subcategory . '-' . $entry->label }}
                <form class="receive-form" method="post" action="{{ url('/competition/receive/entry') . '/' . $entry->id }}">
                    {!! csrf_field() !!}
                    <?php $received = isset($entry->received) ? $entry->received : 0; ?>
                    <input type="hidden" name="received" value="{{ $received }}">
                    <span class="btn-group" role="group">
                        @for ($i = 0; $i <= 2; $i++)
                        <button type="button" data-received="{{ $i }}"
                            class="btn {{ $received === $i ? "btn-primary" : "btn-default" }} btn-sm receive-btn">
                            {{ $i }}</button>
                        @endfor
                    </span>
                </form>
            </p>
        </div>
        @endforeach
    </div>
</div>
@endsection

@section('scripts')
<script>
    $('.receive-btn').click(function() {
        var $frm = $(this).parents("form.receive-form"),
            $this = $(this);
        $frm.children('input[name=received]').val($(this).attr('data-received'));
        $.post($frm.attr('action'), $frm.serialize()).done(function(data, status) {
            if (data.status === "success") {
                $this.parent().children('.btn-primary').removeClass('btn-primary').addClass('btn-default');
                $this.addClass('btn-primary');
            }
        });
    });
</script>
@endsection
