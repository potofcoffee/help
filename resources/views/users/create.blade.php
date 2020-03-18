@extends('layouts.app')

@section('content')
    @if (count($errors) > 0)
        <!-- Form Error List -->
        <div class="alert alert-danger">
            <strong>Whoops! Something went wrong!</strong>

            <br><br>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{ route('users.store') }}">
        @csrf
        <div class="container">
            <div class="card">
                <div class="card-header">Benutzer anlegen</div>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" name="name" value="" />
            </div>
            <div class="form-group">
                <label for="email">E-Mailadresse</label>
                <input class="form-control" name="email" value="" />
            </div>
            <div class="form-group">
                <label for="password">Passwort</label>
                <input class="form-control" type="password" name="password" value="" />
            </div>
            <div class="form-group">
                <label for="cities">Orte</label>
                <select class="form-control" name="cities[]" multiple>
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="card-footer">
                <input class="btn btn-primary" type="submit" value="Speichern" />
            </div>
        </div>
    </form>
@endsection
