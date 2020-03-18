@extends('layouts.app')

@section('content')
    <form method="post" action="{{ route('cities.store') }}">
        @csrf
        <div class="container">
            <div class="card">
                <div class="card-header">Neuen Ort anlegen</div>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" name="name" value="" />
            </div>
            <div class="form-group">
                <label for="name">Postleitzahl</label>
                <input class="form-control" name="zip" value="" />
            </div>
            <div class="form-group">
                <label for="notice">Informationen für diesen Ort</label>
                <textarea class="form-control" name="notice" rows="15"></textarea>
            </div>
            <div class="card-footer">
                <input class="btn btn-primary" type="submit" value="Speichern" />
            </div>
        </div>
    </form>
@endsection
