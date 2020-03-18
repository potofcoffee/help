@extends('layouts.app')

@section('content')
    <form method="post" action="{{ route('helpers.update', $helper) }}">
        @csrf
        @method('PATCH')
        <div class="container">
            <div class="card">
                <div class="card-header">Helfer</div>
                <div class="card-body">
                    @input(['name' => 'name', 'label' => 'Name', 'value' => $helper->name])
                    @input(['name' => 'address', 'label' => 'Straße und Hausnummer', 'value' => $helper->address])
                    @input(['name' => 'zip', 'label' => 'Postleitzahl', 'value' => $helper->zip])
                    @input(['name' => 'city', 'label' => 'Ort', 'value' => $helper->city])
                    @input(['name' => 'phone', 'label' => 'Telefon', 'value' => $helper->phone])
                    @input(['name' => 'email', 'label' => 'E-Mailadresse (falls vorhanden)', 'value' => $helper->email])
                    @input(['name' => 'threema', 'label' => '<a href="https://www.threema.ch" target="_blank">Threema</a>-ID (falls
                            vorhanden)', 'value' => $helper->threema])
                    @selectize(['name' => 'cities[]', 'label' => 'Kann an folgenden Orten helfen', 'items' => $cities, 'value' => $helper->cities])
                    @textarea(['name' => 'notes', 'label' => 'Bemerkungen', 'rows' => 10, 'value' => $helper->notes])
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
