<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ $competition->name }} - Receive Sheets</title>
    <style>
        .entry {
            margin: 10px;
            page-break-inside: avoid;
        }
        .checkbox {
            border: 1px solid #000;
            width: 40px;
            height: 40px;
            display: inline-block;
            margin: 0 25px 0 10px;
            position: relative;
            top: 15px;
        }
        .received {
            display: inline-block;
            width: 67px;
            padding: 10px;
        }
        .subcategory {
            page-break-before: always;
        }
        .label {
            display: inline-block;
            width: 150px;
        }
        .heading span {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>{{ $competition->name }} - Pull Sheets</h1>
    @foreach ($allEntries as $style => $entries)
        <div class="subcategory">
            <h3>{{ $style }}</h3>
            @foreach ($entries as $entry)
                <div class="entry"><span class="checkbox"></span><span class="label">{{ $entry->subcategory . '-' . $entry->label }}</span></div>
            @endforeach
        </div>
    @endforeach
</body>
</html>
