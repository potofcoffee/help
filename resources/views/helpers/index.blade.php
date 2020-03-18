@extends('layouts.app')

@section('content')
    <a class="btn btn-primary" href="{{ route('helpers.create') }}">Neue(n) Helfer*in hinzufügen</a>
    <hr/>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Name und Adresse</th>
                <th>Adresse</th>
                <th>Sonstige Kontaktdaten</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($helpers as $helper)
                <tr>
                    <td>
                        {{ $helper->name }}</td>
                    <td>
                        {{ $helper->address }}<br/>
                        {{ $helper->zip }} {{ $helper->city }}<br/>
                    </td>
                    <td>
                        {{ $helper->phone }}<br/>
                        {{ $helper->email }}<br/>
                        {{ $helper->threema }}<br/>
                    </td>
                    <td style="text-align: right;">
                        <a class="btn btn-primary" href="{{ route('helpers.edit', $helper) }}">Bearbeiten</a>
                        <form class="form-inline" style="display: inline;" method="post" action="{{ route('helpers.destroy', $helper) }}">
                            @csrf
                            @method('delete')
                            <input class="btn btn-danger" type="submit" value="Löschen" />
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
