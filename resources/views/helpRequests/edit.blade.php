@extends('layouts.app')

@section('styles')
    <style>
        .helper-marker {
            width: 20px;
            height: 20px;
            border: 1px solid #088;
            border-radius: 10px;
            background-color: #0FF;
            opacity: 0.5;
        }
        .helper-label {
            text-decoration: none;
            color: white;
            font-size: 11pt;
            font-weight: bold;
            text-shadow: black 0.1em 0.1em 0.2em;
        }
        .selectize-item {
            border: solid 1px gray;
            border-radius: 3px;
            background-color: #658CF4;
            padding: 2px;
        }
        .selectize-item a {
            color: white;
            text-decoration: none;
        }
    </style>
@endsection

@section('content')
    <form method="post" action="{{ route('helpRequests.update', $helpRequest) }}">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Hilfsanfrage</div>
                    <div class="card-body">
                        @input(['name' => 'name', 'label' => 'Name', 'value' => $helpRequest->name])
                        @input(['name' => 'address', 'label' => 'Straße und Hausnummer', 'value' => $helpRequest->address])
                        @input(['name' => 'zip', 'label' => 'Postleitzahl', 'value' => $helpRequest->zip])
                        @input(['name' => 'city', 'label' => 'Ort', 'value' => $helpRequest->city])
                        @input(['name' => 'phone', 'label' => 'Telefon', 'value' => $helpRequest->phone])
                        @input(['name' => 'email', 'label' => 'E-Mailadresse (falls vorhanden)', 'value' => $helpRequest->email])
                        @input(['name' => 'threema', 'label' => '<a href="https://www.threema.ch" target="_blank">Threema</a>-ID (falls
                                vorhanden)', 'value' => $helpRequest->threema])
                        @textarea(['name' => 'request', 'label' => 'Dabei brauche ich Hilfe', 'rows' => 10, 'placeholder' => 'z.B. beim Einkaufen, bei Besorgungen, ... Oder: Ich brauche jemand, der mich anruft, um zu reden.', 'value' => $helpRequest->request])
                        @textarea(['name' => 'notes', 'label' => 'Bemerkungen', 'rows' => 10, 'value' => $helpRequest->notes])
                        @select(['name' => 'city_id', 'label' => 'Gehört zu folgendem Ort:', 'items' => $cities, 'value' => $helpRequest->city_id])
                    </div>
                    <div class="card-footer">
                        <input class="btn btn-primary" type="submit" value="Speichern"/>
                        <a class="btn btn-secondary" href="{{ route('helpRequests.index') }}">Schließen</a>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Eingeteilte Helfer</div>
                    <div class="card-body">
                        <div class="form-group">
                            <select id="selHelpers" name="helpers[]" multiple>
                            </select>
                        </div>
                    </div>
                </div>
                <br />
                @if(($helpRequest->lat != '') && ($helpRequest->lon != ''))
                <div class="card">
                    <div class="card-header">Kartenansicht</div>
                    <div class="card-body">
                        <div id="map" style="height: 600px; width: 100%;"></div>
                        <small>{{ $helpRequest->lat }} / {{ $helpRequest->lon }}</small>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </form>
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

    <div style="display: none;">
        @foreach ($helpers as $helper)
            <!-- Clickable label for Vienna -->
            <a class="overlay helper-marker" id="helper{{ $helper->id }}_label" target="_blank" href="javascript:addHelper({{ $helper->id }})">{{ $helper->name }}</a>
            <div class="helper-label" id="helper{{ $helper->id }}_label" title="Marker"></div>
            <!-- Popup -->
            <div id="helper{{ $helper->id }}_popup" title="{{ $helper->name }}"></div>
        @endforeach
    </div>

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.2.1/build/ol.js"></script>
    <script>

        var $helperSelect;
        var helperSelectize;

        function addHelper(id) {
            var x = helperSelectize.getValue();
            x.push(id);
            helperSelectize.setValue(x);
            return false;
        }

        function initMap() {
        }

        $(document).ready(function(){
            $helperSelect = $('#selHelpers').selectize({
                valueField: 'id',
                labelField: 'name',
                searchField: ['name'],
                maxItems: 1,
                //only using options-value in jsfiddle - real world it's using the load-function
                options: [
                    @foreach ($helpers as $helper)
                    {"id":{{ $helper->id }},"name":"{{ $helper->name }}","address":"{{ $helper->address }}", "zip":"{{ $helper->zip }}", "city":"{{$helper->city}}", "phone":"{{ $helper->phone }}","email":"{{ $helper->email }}","threema":"{{ $helper->threema }}"},
                    @endforeach
                ],
                create: false,
                render: {
                    option: function(item, escape) {
                        return '<div>'
                            + '<span>'+item.name+'</span><br />'
                            + '<span>'+item.address+', '+item.zip+' '+item.city+'</span><br />'
                            + '<span><span class="fa fa-phone"> </span>'+item.phone+'</span><br />'
                            + '<span><span class="fa fa-envelope"> </span>'+item.email+'</span><br />'
                            + '<span><span class="fa fa-comments-alt"> </span>'+item.threema+'</span><br />'
                            + '</div>';
                    },
                    item: function(item, escape) {
                        return '<div class="selectize-item">'
                            + '<span>'+escape(item.name)+'</span><br />'
                            + '<span>'+escape(item.address)+'<br /> '+escape(item.zip)+' '+escape(item.city)+'</span><br />'
                            + '<span><span class="fa fa-phone"></span> '+escape(item.phone)+'</span><br />'
                            + '<span><span class="fa fa-envelope"></span> <a href="mailto:'+escape(item.email)+'">'+escape(item.email)+'</a></span><br />'
                            + '<span><span class="fa fa-comments-alt"></span> '+escape(item.threema)+'</span><br />'
                            + '</div>';
                    }
                },
            });
            helperSelectize = $helperSelect[0].selectize;
            helperSelectize.setValue([{{ $helpRequest->helpers->pluck('id')->join(',') }}]);
            initMap();
        });

        jQuery(function($) {
            // Asynchronously Load the map API
            var script = document.createElement('script');
            script.src = "//maps.googleapis.com/maps/api/js?sensor=false&callback=initialize&key=AIzaSyCrd8QjAPaIurjFZVbFuJlrDuSkFHFqJZ4";
            document.body.appendChild(script);
        });

        function initialize() {
            var map;
            var bounds = new google.maps.LatLngBounds();
            var mapOptions = {
                mapTypeId: 'roadmap'
            };

            // Display a map on the page
            map = new google.maps.Map(document.getElementById("map"), mapOptions);
            map.setTilt(45);

            // Multiple Markers
            var markers = [
                @foreach($helpers as $helper)@if(($helper->lat !='') && ($helper->lon!='')) ['{{ $helper->name }}', {{ $helper->lat }}, {{ $helper->lon }}],
                @endif @endforeach
            ];

            // Info Window Content
            var infoWindowContent = [
                @foreach($helpers as $helper)@if(($helper->lat !='') && ($helper->lon!='')) ['<div class="info_content">' +
                    '<h3><a href="#" onclick="addHelper({{ $helper->id }});">{{ $helper->name }}</a></h3>' +
                    '{{ $helper->address }}, {{ $helper->zip }} {{ $helper->city }}<br />' +
                    'Telefon: {{ $helper->phone }}<br />'
                    @if($helper->email) +'Email: <a href="mailto:{{$helper->email}}">{{ $helper->email }}</a><br />' @endif
                    @if($helper->threema) +'Threema: {{ $helper->threema }}<br />' @endif
                    +'<a class="btn btn-primary" href="#" onclick="addHelper({{ $helper->id }});">Für diese Anfrage einteilen</a></div>'
                ],
                @endif @endforeach
            ];

            // Display multiple markers on a map
            var infoWindow = new google.maps.InfoWindow(), marker, i;

            // Loop through our array of markers & place each one on the map
            for( i = 0; i < markers.length; i++ ) {
                var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
                bounds.extend(position);
                marker = new google.maps.Marker({
                    position: position,
                    map: map,
                    icon: {
                        url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"
                    },
                    title: markers[i][0]
                });

                // Allow each marker to have an info window
                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infoWindow.setContent(infoWindowContent[i][0]);
                        infoWindow.open(map, marker);
                    }
                })(marker, i));

                // Automatically center the map fitting all markers on the screen
                map.fitBounds(bounds);
            }

            var center = new google.maps.LatLng({{ $helpRequest->lat }}, {{ $helpRequest->lon }});
            marker = new google.maps.Marker({
                position: center,
                map: map,
                title: '{{ $helpRequest->name }}'
            });


            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infoWindow.setContent('<div class="info_content">' +
                    '<h3><a href="#" onclick="addHelper({{ $helpRequest->id }});">{{ $helpRequest->name }}</a></h3>' +
                    '{{ $helpRequest->address }}, {{ $helpRequest->zip }} {{ $helpRequest->city }}<br />' +
                    'Telefon: {{ $helpRequest->phone }}<br />'
                    @if($helpRequest->email) +'Email: <a href="mailto:{{$helpRequest->email}}">{{ $helpRequest->email }}</a><br />' @endif
                    @if($helpRequest->threema) +'Threema: {{ $helpRequest->threema }}<br />' @endif
                     );
                    infoWindow.open(map, marker);
                }
            })(marker, i));


            infoWindow.setContent('<div class="info_content">' +
                '<h3><a href="#" onclick="addHelper({{ $helpRequest->id }});">{{ $helpRequest->name }}</a></h3>' +
                '{{ $helpRequest->address }}, {{ $helpRequest->zip }} {{ $helpRequest->city }}<br />' +
                'Telefon: {{ $helpRequest->phone }}<br />'
                @if($helpRequest->email) +'Email: <a href="mailto:{{$helpRequest->email}}">{{ $helpRequest->email }}</a><br />' @endif
                @if($helpRequest->threema) +'Threema: {{ $helpRequest->threema }}<br />' @endif
                     );
            infoWindow.open(map, marker);


            map.fitBounds(bounds);
            map.panTo(center);




            // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
            var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
                this.setZoom(14);
                google.maps.event.removeListener(boundsListener);
            });

        }

    </script>
@endsection
