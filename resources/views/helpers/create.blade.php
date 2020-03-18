@extends('layouts.app')

@section('content')
    <form method="post" action="{{ route('helpers.store') }}">
        @csrf
        <div class="container">
            <div class="container">
                <div class="card">
                    <div class="card-header">Helfer</div>
                    <div class="card-body">
                        @input(['name' => 'name', 'label' => 'Name'])
                        @input(['name' => 'address', 'label' => 'Straße und Hausnummer'])
                        @input(['name' => 'zip', 'label' => 'Postleitzahl'])
                        @input(['name' => 'city', 'label' => 'Ort'])
                        @input(['name' => 'phone', 'label' => 'Telefon'])
                        @input(['name' => 'email', 'label' => 'E-Mailadresse (falls vorhanden)'])
                        @input(['name' => 'threema', 'label' => '<a href="https://www.threema.ch" target="_blank">Threema</a>-ID (falls
                                vorhanden)'])
                        @selectize(['name' => 'cities[]', 'label' => 'Kann an folgenden Orten helfen', 'items' => $cities])
                        @textarea(['name' => 'notes', 'label' => 'Bemerkungen', 'rows' => 10])
                    </div>
                    <div class="card-footer">
                        <input class="btn btn-primary" type="submit" value="Speichern"/>
                    </div>

                </div>
            </div>
    </form>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $('.fancy-selectize ').selectize();
        });
    </script>
@endsection
