<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ $competition->name }} - Entry Labels</title>
    <style>
        .entry {
            font-size: 18px;
            padding-bottom: .25in;
        }
        .label {
            display: inline-block;
            border: solid 1px #000000;
            padding: .1in .25in;

        }
    </style>
</head>
<body>
    <h1>{{ $competition->name }} - Entry Labels</h1>
    <h3>Entrant: {{ $user->first_name }} {{ $user->last_name }}</h3>
    @foreach ($entries as $entry)
        <div class="entry">
            <p>Name: {{ $entry->name }} /
                Style: {{ $entry->style->subcategory . ' - ' . $entry->style->subcategory_name }}</p>
            <div class="entry-labels">
                <span class="label">{{ $entry->printLabel() }}</span>
                <span class="label">{{ $entry->printLabel() }}</span>
            </div>
        </div>
    @endforeach
    <h3>Please Ship Entries to:</h3>
    <!-- TODO: Use shipping address from DB -->
     <p>{{ $competition->ship_location_name }}<br>
        {{ $competition->ship_address1 }}<br>
        @if($competition->ship_address2) {{ $competition->ship_address2 }}<br> @endif
        {{ $competition->ship_city }}, {{ $competition->ship_province }}, {{ $competition->ship_postal_code }}
</body>
</html>
