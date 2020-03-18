@extends('layouts.app')

@section('content')
    <form method="post" action="{{ route('cities.update', $city) }}">
        @csrf
        @method('PATCH')
        <div class="container">
            <div class="card">
                <div class="card-header">Ort bearbeiten</div>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" name="name" value="{{ $city->name }}" />
            </div>
            <div class="form-group">
                <label for="zip">Postleitzahl</label>
                <input class="form-control" name="zip" value="{{ $city->zip }}" />
            </div>
            <div class="form-group">
                <label for="notice">Informationen für diesen Ort</label>
                <textarea class="form-control" name="notice" rows="15">{{ $city->notice }}</textarea>
            </div>
            <div class="card-footer">
                <input class="btn btn-primary" type="submit" value="Speichern" />
            </div>
        </div>
    </form>
@endsection
