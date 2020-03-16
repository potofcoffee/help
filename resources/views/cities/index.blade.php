@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($cities as $city)
                    <tr>
                        <td>{{ $city->name }}</td>
                        <td style="text-align: right;">
                            <a class="btn btn-primary" href="{{ route('cities.edit', $city) }}">Bearbeiten</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <hr/>
        <a class="btn btn-primary" href="{{ route('cities.create') }}">Ort hinzufügen</a>
    </div>
@endsection
