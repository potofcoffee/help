@extends('layouts.home')

@section('content')
    <div class="col-md-6 " style="overflow: hidden;padding: 0;position: relative;">
        <img style="overflow: hidden;max-height: 100vh;min-width: 100%;" src="{{ asset('img/woman-3188744_1920.jpg') }}"
             style="overflow: hidden"/>
        <div
            style="position: absolute;bottom: 50px;color: white;right: 20px;font-size: 5em;text-align: right;font-weight: bold;line-height: 1em;">
            Du bist nicht allein<br /><span class="font-weight-normal">in {{ $city->name }}</span>
        </div>
    </div>
    <div class="col-md-3 help-request-form">
        <h1>Ich brauche Hilfe.</h1>
        <p>Du brauchst Hilfe? Vielleicht gehörst du zu einer Risikogruppe und solltest zu Hause bleiben. Wir finden Menschen, die für dich einkaufen, Besorgungen erledigen, dich einfach mal anrufen, usw. Sag uns einfach, was du brauchst.</p>
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
        <form method="post" action="{{ route('helpRequests.store') }}">
            @csrf
            @input(['name' => 'name', 'label' => 'Name'])
            @input(['name' => 'address', 'label' => 'Straße und Hausnummer'])
            <input type="hidden" name="city" value="{{ $city->name }}" />
            <input type="hidden" name="zip" value="{{ $city->zip }}" />
            <input type="hidden" name="city_id" value="{{ $city->id }}" />
            @input(['name' => 'phone', 'label' => 'Telefon'])
            @input(['name' => 'email', 'label' => 'E-Mailadresse (falls vorhanden)'])
            @input(['name' => 'threema', 'label' => '<a href="https://www.threema.ch" target="_blank">Threema</a>-ID (falls
                    vorhanden)'])
            @textarea(['name' => 'request', 'label' => 'Dabei brauche ich Hilfe', 'rows' => 10, 'placeholder' => 'z.B. beim Einkaufen, bei Besorgungen, ... Oder: Ich brauche jemand, der mich anruft, um zu reden.'])
            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="Anfrage absenden" />
            </div>
        </form>



    </div>
    <div class="col-md-3 helper-form">
        <h1>Ich kann helfen.</h1>
        <p>Du bist bereit zu helfen? Super! Über das folgende Formular kannst du dich anmelden. Unser Büro koordiniert die eingehenden Anfragen und meldet sich bei dir, wenn
        deine Hilfe benötigt wird.</p>
        <form method="post" action="{{ route('helpers.store') }}">
            @csrf
            @input(['name' => 'name', 'label' => 'Name'])
            @input(['name' => 'address', 'label' => 'Straße und Hausnummer'])
            <input type="hidden" name="city" value="{{ $city->name }}" />
            <input type="hidden" name="zip" value="{{ $city->zip }}" />
            <input type="hidden" name="city_id" value="{{ $city->id }}" />
            @input(['name' => 'phone', 'label' => 'Telefon'])
            @input(['name' => 'email', 'label' => 'E-Mailadresse (falls vorhanden)'])
            @input(['name' => 'threema', 'label' => '<a href="https://www.threema.ch" target="_blank">Threema</a>-ID (falls
                    vorhanden)'])
            @textarea(['name' => 'notes', 'label' => 'Bemerkungen', 'rows' => 10])
            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="Anfrage absenden" />
            </div>
        </form>
    </div>
@endsection
