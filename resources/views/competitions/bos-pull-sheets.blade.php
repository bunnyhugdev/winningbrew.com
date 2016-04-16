<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>{{ $competition->name }} - Best of Show Pull Sheets</title>
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
    <h1>{{ $competition->name }}</h1>
    <div class="subcategory">
        <h3>Best in Show Pull Sheet</h3>
        @foreach ($winners as $winner)
            <div class="entry">
                <span class="checkbox"></span><span class="label">{{ $winner->first_subcat . '-' . $winner->first_label }}</span>
            </div>
        @endforeach
    </div>
</body>
</html>
