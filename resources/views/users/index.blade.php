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
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td style="text-align: right;">
                            <a class="btn btn-primary" href="{{ route('users.edit', $user) }}">Bearbeiten</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <hr/>
        <a class="btn btn-primary" href="{{ route('users.create') }}">Benutzer hinzufügen</a>
    </div>
@endsection
