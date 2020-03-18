@extends('layouts.app')

@section('content')
    <form method="post" action="{{ route('storePassword') }}">
        @csrf
        <div class="container">
            <div class="card">
                <div class="card-header">Passwort ändern</div>
                <div class="card-body">
                    @input(['type' => 'password', 'name' => 'old', 'label' => 'Bisheriges Passwort'])
                    @input(['type' => 'password', 'name' => 'new', 'label' => 'Neues Passwort'])
                    @input(['type' => 'password', 'name' => 'new_confirmation', 'label' => 'Neues Passwort (Wiederholung)'])
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="Speichern"/>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
