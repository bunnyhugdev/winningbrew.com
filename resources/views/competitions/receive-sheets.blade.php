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
        .category,
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
    <h1>{{ $competition->name }} - Receive Sheets</h1>
    <h4>Instructions</h4>
    <ul>
        <li>Lay each category sheet at a designated spot to sort the entries</li>
        <li>Record how many bottles are received in the box to the left of the entry number</li>
        <li>Use the comments section to the right to record special circumstances encountered such as broken bottles,
            odd shaped or oversized bottles, etc.</li>
        <li>Record the information back into WinningBrew.com for your competition</li>
    </ul>
    @foreach ($allEntries as $category => $category_entries)
        @foreach ($category_entries as $style => $entries)
            <div class="subcategory">
                <h2>{{ $category }}</h2>
                <h4>{{ $style }}</h4>
                <div class="heading">
                    <span class="received">Received</span><span class="label">Entry Number</span><span class="comments">Comments</span>
                </div>
                @foreach ($entries as $entry)
                    <div class="entry"><span class="checkbox"></span><span class="label">{{ $entry->printLabel() }}</span></div>
                @endforeach
            </div>
        @endforeach
    @endforeach
</body>
</html>
