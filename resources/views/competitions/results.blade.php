@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <h1>{{ $competition->name }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <h2>Category Results</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Category</th>
                        <th>Gold</th>
                        <th>Silver</th>
                        <th>Bronze</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($winners as $category)
                    <tr>
                        <td>{{ $category->ordinal }}. {{ $category->name }}</td>
                        <td>
                            {{ $category->first_fname . ' ' . $category->first_lname }}<br>
                            {{ $category->first_club_name }}<br>
                            {{ $category->first_name}}<br>
                            {{ $category->first_subcat . '-' . $category->first_style_name }}
                        </td>
                        <td>
                            {{ $category->second_fname . ' ' . $category->second_lname }}<br>
                            {{ $category->second_club_name }}<br>
                            {{ $category->second_name}}<br>
                            {{ $category->second_subcat . '-' . $category->second_style_name }}
                        </td>
                        <td>
                            {{ $category->third_fname . ' ' . $category->third_lname }}<br>
                            {{ $category->third_club_name }}<br>
                            {{ $category->third_name}}<br>
                            {{ $category->third_subcat . '-' . $category->third_style_name }}
                        <td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <h2>Club of the Year Results</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Club</th>
                        <th>Gold</th>
                        <th>Silver</th>
                        <th>Bronze</th>
                        <th>Points</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($coty as $club => $result)
                        <tr>
                            <td>{{ $club }}</td>
                            <td>{{ $result['G'] }}</td>
                            <td>{{ $result['S'] }}</td>
                            <td>{{ $result['B'] }}</td>
                            <td>{{ $result['total'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <h2>Brewer of the Year Results</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Brewer</th>
                        <th>Gold</th>
                        <th>Silver</th>
                        <th>Bronze</th>
                        <th>Points</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($boty as $id => $result)
                        <tr>
                            <td>{{ $result['name'] }}</td>
                            <td>{{ $result['G'] }}</td>
                            <td>{{ $result['S'] }}</td>
                            <td>{{ $result['B'] }}</td>
                            <td>{{ $result['total'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
