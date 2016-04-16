<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ $competition->name }} - Best of Show Judging Sheets</title>
    <style>
        .entry {
            margin: 10px;
            page-break-inside: avoid;
        }
        .checkbox {
            border: 1px solid #000;
            width: 80px;
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
        .check-label {
            width: 351px;
            margin-left: 10px;
            display: inline-block;
        }
        .average-label {
            margin-left: 10px;
        }
        .comments {
            margin: 15px 0 0 15px;
            font-style: italic;
        }
    </style>
</head>
<body>
    <h1>{{ $competition->name }}</h1>
    <div class="subcategory">
        <h3>Best of Show Judging Sheet</h3>
        <div class="entry heading">
            <span class="label">Entry Number</span>
            <span class="check-label">Place</span>
        </div>
        @foreach ($winners as $winner)
            <div class="entry">
                <span class="label">
                    {{ $winner->ordinal }}. {{ $winner->name }}<br>
                    {{ $winner->first_subcat . '-' . $winner->first_label }}</span>
                <span class="checkbox"></span>
                <div class="comments">
                    {{ $winner->first_comments }}
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>
