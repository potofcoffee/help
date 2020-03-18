@extends('layouts.app')

@section('content')
    <form method="post" action="{{ route('users.update', $user) }}">
        @csrf
        @method('PATCH')
        <div class="container">
            <div class="card">
                <div class="card-header">Benutzer bearbeiten</div>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" name="name" value="{{ $user->name }}" />
            </div>
            <div class="form-group">
                <label for="email">E-Mailadresse</label>
                <input class="form-control" name="email" value="{{ $user->email }}" />
            </div>
            <div class="form-group">
                <label for="password">Passwort</label>
                <input class="form-control" type="password" name="password" value="{{ $user->password }}" />
            </div>
            <div class="form-group">
                <label for="cities">Orte</label>
                <select class="form-control" name="cities[]" multiple>
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}" @if($user->cities->contains($city)) selected @endif>{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="card-footer">
                <input class="btn btn-primary" type="submit" value="Speichern" />
            </div>
        </div>
    </form>
@endsection
