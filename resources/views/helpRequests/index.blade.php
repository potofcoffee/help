@extends('layouts.app')

@section('styles')
    <style>
        .helper-badge {
            display: block;
            float:left;
            border: solid 1px gray;
            border-radius: 3px;
            background-color: #658CF4;
            padding: 2px;
        }
        .helper-badge a {
            color: white;
            text-decoration: none;
        }
    </style>
@endsection

@section('content')
    <a class="btn btn-primary" href="{{ route('helpRequests.create') }}">Neue Anfrage hinzufügen</a>
    <hr/>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Angelegt</th>
                <th>Name und Adresse</th>
                <th>Sonstige Kontaktdaten</th>
                <th>Anliegen</th>
                <th>Eingeteilte Helfer</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($helpRequests as $helpRequest)
                <tr>
                    <td>{{ $helpRequest->created_at->format('d.m.Y H:i') }}<br />
                        {{ $helpRequest->assignedCity->name }}
                    </td>
                    <td>
                        {{ $helpRequest->name }}<br/>
                        {{ $helpRequest->address }}<br/>
                        {{ $helpRequest->zip }} {{ $helpRequest->city }}<br/>
                    </td>
                    <td>
                        {{ $helpRequest->phone }}<br/>
                        {{ $helpRequest->email }}<br/>
                        {{ $helpRequest->threema }}<br/>
                    </td>
                    <td>
                        @if(strlen($helpRequest->request) > 200){!! nl2br(substr($helpRequest->request, 0, 200).'...') !!}@else {!! nl2br($helpRequest->request) !!} @endif
                    </td>
                    <td>
                        @foreach ($helpRequest->helpers as $helper)
                            <div class="helper-badge">
                                <b>{{ $helper->name }}</b><br />
                                {{ $helper->address }}, {{ $helper->zip }} {{ $helper->city }}<br />
                                <span class="fa fa-phone"></span> {{ $helper->phone }}
                                @if ($helper->email) <br /><span class="fa fa-envelope"></span> <a href="mailto:{{ $helper->email }}">{{ $helper->email }}</a>@endif
                                @if ($helper->threema) <br /><span class="fa fa-comments-alt"></span> {{ $helper->threema }}@endif

                            </div>
                        @endforeach
                    </td>
                    <td style="text-align: right;">
                        <a class="btn btn-primary" href="{{ route('helpRequests.edit', $helpRequest) }}">Bearbeiten</a>
                        <form class="form-inline" style="display: inline;" method="post" action="{{ route('helpRequests.destroy', $helpRequest) }}">
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
