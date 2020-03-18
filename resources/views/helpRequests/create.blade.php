@extends('layouts.app')

@section('content')
    <form method="post" action="{{ route('helpRequests.store') }}">
        @csrf
        <div class="container">
            <div class="card">
                @auth
                    <div class="card-header">Hilfsanfrage</div> @else
                    <div class="card-header">Ich brauche Hilfe!</div> @endauth
                @auth
                    <div class="form-check">
                        <label>
                            <input type="checkbox" name="user_id"
                                   value="{{ \Illuminate\Support\Facades\Auth::user()->id }}"/>
                            Diese Anfrage mir zuweisen.
                        </label>
                    </div>
                @endauth
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" name="name" value=""/>
                    </div>
                    <div class="form-group">
                        <label for="street">Straße und Hausnummer</label>
                        <input class="form-control" street="street" value=""
                               placeholder="Straße HNr."/>
                    </div>
                    <div class="form-group">
                        <label for="zip">Postleitzahl</label>
                        <input class="form-control" zip="zip" value=""/>
                    </div>
                    <div class="form-group">
                        <label for="city">Ort</label>
                        <input class="form-control" city="city" value=""/>
                    </div>
                    <div class="form-group">
                        <label for="phone">Telefon</label>
                        <input class="form-control" phone="phone" value=""/>
                    </div>
                    <div class="form-group">
                        <label for="email">E-Mailadresse</label>
                        <input class="form-control" email="email" value=""/>
                    </div>
                    <div class="form-group">
                        <label for="threema"><a href="https://www.threema.ch" target="_blank">Threema</a>-ID (falls
                            vorhanden)</label>
                        <input class="form-control" threema="threema" value=""/>
                    </div>
                    <div class="form-group">
                        <label for="request">Dabei brauche ich Hilfe</label>
                        <textarea class="form-control" name="request" rows="15"
                                  placeholder="z.B. beim Einkaufen, bei Besorgungen, ... Oder: Ich brauche jemand, der mich anruft, um zu reden."></textarea>
                    </div>

                    @auth
                        <div class="form-group">
                            <label for="city_id">Gehört zu folgendem Ort</label>
                            <select class="form-control" name="city_id">
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="notes">Bemerkungen</label>
                            <textarea class="form-control" name="notes" rows="15"></textarea>
                        </div>

                    @endauth

                </div>
                <div class="card-footer">
                    <input class="btn btn-primary" type="submit" value="Speichern"/>
                </div>
            </div>
        </div>
    </form>
@endsection
