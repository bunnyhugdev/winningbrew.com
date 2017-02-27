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
    <p>Bushwakker Brewing Co.<br>
        Attn: ALES Open<br>
        2206 Dewdney Ave.<br>
        Regina, SK, S4R 1H3</p>
</body>
</html>
