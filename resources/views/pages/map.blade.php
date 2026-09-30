@extends('layouts.app')

@section('content')
    {{-- Left sidebar--}}
    <nav id="left-sidebar">
        <div class="sidebar-header">
            <div class="uputstvo">
                <div id="toggle-icon" class="close-icon cursor-pointer text-right mr-2">
                    <img src="{{asset('assets/triangle-left.svg')}}">
                </div>

            </div>

            <div id="toggle-icon" class="open-icon">
                <img src="{{asset('assets/triangle-right.svg')}}" class="cursor-pointer">
                <p class="left-sidebar-closed-text">UPUTSTVO</p>
            </div>

            <div class="left-sidebar-opened-text ml-3">
                <p class="uputstvo-title">UPUTSTVO</p>

                <p class="mt-n2 uputstvo-text">ZA KORISCENJE</p>

                <p class="left-sidebar-description">Životna sredina predstavlja skup prirodnih i stvorenih vrednosti
                    čiji kompleksni međusobni odnosi čine okruženje,
                    odnosno prostor i uslove za život. Kvalitet životne sredine jeste stanje životne sredine koje se
                    iskazuje fizičkim,
                    hemijskim, biološkim, estetskim i drugim indikatorima. Prirodne vrednosti su prirodna bogatstva koja
                    čine: vazduh, voda,
                    zemljište, šume, geološki resursi, biljni i životinjski svet.
                    Sistem zaštite životne sredine objedinjuje mere, uslovi i instrumenti za: 1) održivo upravljanje,
                    očuvanje prirodne ravnoteže,
                    celovitosti, raznovrsnosti i kvaliteta prirodnih vrednosti i uslova za opstanak svih živih bića i 2)
                    sprečavanje, kontrolu,
                    smanjivanje i sanaciju svih oblika zagađivanja životne sredine. Održivo upravljanje prirodnim
                    vrednostima i zaštita životne sredine u
                    Republici Srbiji ostvaruju se u skladu sa Zakonom o zaštiti životne sredine i drugim posebnim
                    zakonima.
                </p>

                <p class="left-sidebar-propositions">
                    LISTA PREDLOGA <img id="toggle-propositions" src="{{asset('assets/triangle-down.svg')}}"
                                        class="cursor-pointer ml-1">
                </p>

                <div class="left-sidebar-propositions-open mb-5">
                    <span>Zelenilo<br>
                       Odaberite vrstu aktivnosti koju predlažete:
                    </span>

                    <ul>
                        <li><a class="left-sidebar-link" href="{{route('table.get')}}?section=g-1">sadnja drveća</a></li>
                        <li><a class="left-sidebar-link" href="{{route('table.get')}}?section=g-2">sadnja šiblja, cveća i drugog zelenila</a></li>
                        <li><a class="left-sidebar-link" href="{{route('table.get')}}?section=g-3">rekonstrukcija/podizanje travnjaka</a></li>
                        <li><a class="left-sidebar-link" href="{{route('table.get')}}?section=g-4">nega postojećih biljaka</a></li>
                        <li><a class="left-sidebar-link" href="{{route('table.get')}}?section=g-5">uklanjanje bolesnih i starih stabala i samoniklih biljaka</a></li>
                    </ul>

                    <span>Otpad <br>
                        Odaberite vrstu aktivnosti koju predlažete:
                    </span>

                    <ul>
                        <li><a class="left-sidebar-link" href="{{route('table.get')}}?section=w-1">uklanjanje divlje deponije</a></li>
                        <li><a class="left-sidebar-link" href="{{route('table.get')}}?section=w-2">sanacija degradirane javne površine</a></li>
                        <li><a class="left-sidebar-link" href="{{route('table.get')}}?section=w-3">sakupljanje i uklanjanje rasutog otpada</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </nav>

    {{-- Success modal shows up after submitting problem--}}
    <div id="successModal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Predlog mapa novog sada</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p style="color: black;">
                        Hvala što ste se aktivno uključili u davanje predloga za godišnji Program korišćenja sredstava Budžetskog fonda za zaštitu životne sredine Grada Novog Sada.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
                </div>
            </div>
        </div>
    </div>

{{--     Right sidebar--}}
    <nav id="right-sidebar">
{{--         Add new pin --}}
        <div id="new-pin" class="right-sidebar-container new-pin d-none">
            <div class="right-sidebar-content">
                <form method="post" action="{{route('map.problem.add')}}" enctype="multipart/form-data">
                    @csrf
                    <p class="question question-width">
                        Da li želite da Vaše ime bude javno objavljeno?
                    </p>

                    <div class="answers-radio ml-2">
                        <label class="container question">Da
                            <input type="radio" id="dipslay_name" name="display_name" value="1">
                            <span class="checkmark"></span>
                        </label>

                        <label class="container question">Ne
                            <input type="radio" id="display_name" name="display_name" value="0">
                            <span class="checkmark"></span>
                        </label>
                    </div>

                    @if($errors->has('display_name'))
                        <div>
                            <p class="error mt-1">{{$errors->first('display_name')}}</p>
                        </div>
                    @endif

                    <p class="question mt-5 mb-0">
                        Vaše ime i prezime <br>
                        <span class="question question-description">(Ukoliko ste označili da ne želite da bude objavljeno, ime i prezime biće dostupno samo administratorima)</span>
                    </p>

                    <input type="text" id="name" name="name" class="custom-input">

                    @if($errors->has('name'))
                        <div>
                            <p class="error mt-1">{{$errors->first('name')}}</p>
                        </div>
                    @endif

                    <p class="question question-width mt-3 mb-0">
                        Odaberite oblast za koju zelite da date predlog:
                    </p>

                    <select name="type" id="type" class="map-select inputState form-control dropdown question mt-3 dropdown-toggle text-uppercase">
                        <option selected>Odaberite</option>
                        <option value="g-1">sadnja drveća</option>
                        <option value="g-2">sadnja šiblja, cveća i drugog zelenilaOtpad</option>
                        <option value="g-3">rekonstrukcija/podizanje travnjaka</option>
                        <option value="g-4">nega postojećih biljaka</option>
                        <option value="g-5">uklanjanje bolesnih i starih stabala i samoniklih biljaka</option>
                        <option value="w-1">uklanjanje divlje deponije</option>
                        <option value="w-2">sanacija degradirane javne površine</option>
                        <option value="w-3">sakupljanje i uklanjanje rasutog otpada</option>
                    </select>

                    @if($errors->has('type'))
                        <div>
                            <p class="error mt-1">{{$errors->first('type')}}</p>
                        </div>
                    @endif

                    <p class="question question-width mt-5 mb-0">
                        Navedite što preciznije lokaciju prostora za čije uređenje/sanaciju šaljete predlog:
                    </p>

                    <label>
                        <input type="text" id="address" name="address" class="custom-input">
                    </label>

                    @if($errors->has('address'))
                        <div>
                            <p class="error mt-1">{{$errors->first('address')}}</p>
                        </div>
                    @endif

                    <p class="question question-width mt-5 mb-0">
                        Kratko opišite šta je vaš predlog:
                    </p>

                    <label>
                        <input type="text" id="description" name="description" class="custom-input">
                    </label>

                    @if($errors->has('description'))
                        <div>
                            <p class="error mt-1">{{$errors->first('description')}}</p>
                        </div>
                    @endif

                    <div class="row mt-5">
                        <div class="col-7">
                            <p class="question">Ukoliko imate fotografiju, možete je priložiti.</p>
                        </div>
                        <div class="col-5 text-right">
                            <button type="button" id="uploadFile" class="upload-button question btn btn-secondary">
                                UPLOAD
                            </button>

                            <div class="h-0 w-0 overflow-hidden">
                                <input id="inputFile" name="image" type="file" accept="image/png, image/jpeg, image/jpg" onchange="readURL(this);"/>
                            </div>

                            <div class="mt-2">
                                <img id="uploadedImage" class="d-none" src="#"/>
                            </div>
                        </div>
                    </div>

                    @if($errors->has('image'))
                        <div>
                            <p class="error mt-n1">{{$errors->first('image')}}</p>
                        </div>
                    @endif

                    <p class="question question-width mt-3 mb-0">
                        Upišite vašu mejl adresu:
                    </p>

                    <label>
                        <input type="text" id="email" name="email" class="custom-input">
                    </label>

                    @if($errors->has('email'))
                        <div>
                            <p class="error mt-1">{{$errors->first('email')}}</p>
                        </div>
                    @endif

                    <input type="hidden" id="latInput" name="lat">
                    <input type="hidden" id="lngInput" name="lng">

                    <button type="submit" class="btn btn-secondary submit-button question mt-5">POSALJI</button>

                    <p class="question question-description mt-3">
                        Nakon što pritisnete dugme "pošalji", na mejl koji ste naveli dobićete verifikacioni kod. Njega
                        upišite u polje ispod.
                        Tek nakon verifikacije, administratori će imati mogućnost da pogledaju vaš predlog.
                        Kada bude odobren, dobićete informaciju putem mejla, a na mapi će predlog koji ste poslali biti
                        označen zastavicom na lokaciji koju ste naveli.
                    </p>
                </form>
            </div>
        </div>

        {{-- Show pin --}}
        <div id="show-pin" class="right-sidebar-container show-pin d-none font-gotham">
            <div class="right-sidebar-content mt-0">
                <div id="show-pin-card" class="card border-green bg-transparent mb-3 border-radius-0">
                    <div class="card-header bg-transparent border-green">Opis predloga</div>
                    <div id="card-text-name-show" class="card-body text-green d-none">
                        <h6 class="card-title">Ime i Prezime</h6>
                        <p id="card-text-name" class="card-text"></p>
                    </div>
                    <div class="card-body text-green">
                        <h6 class="card-title">Opis</h6>
                        <p id="card-text-description" class="card-text"></p>
                    </div>
                    <div class="card-body text-green">
                        <h6 class="card-title">Email</h6>
                        <p id="card-text-email" class="card-text"></p>
                    </div>
                    <div class="card-body text-green">
                        <h6 class="card-title">Adresa</h6>
                        <p id="card-text-address" class="card-text"></p>
                    </div>
                    <div class="card-body text-green">
                        <h6 class="card-title">Tip predloga</h6>
                        <p id="card-text-type" class="card-text"></p>
                    </div>
                    <div class="card-body text-green">
                        <h6 class="card-title">Status</h6>
                        <p id="card-text-status" class="card-text"></p>
                    </div>
                    <div id="card-text-image-container" class="card-body text-green d-none">
                        <h6 class="card-title">Fotografija</h6>
                        <img id="card-text-image" src=""/>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- The div element for the map -->
    <div id="map"></div>

    <div class="d-flex d-sm-none media-bottom-map position-absolute">
        <div class="media_Icons">
            <a href="https://www.facebook.com/">
                <img class="w-100 d-block" src={{asset('assets/fb.svg')}} alt="">
            </a>
        </div>
        <div class="media_Icons">
            <a href="https://www.instagram.com/">
                <img class="w-100 d-block" src={{asset('assets/insta.svg')}} alt="">
            </a>
        </div>
        <div class="media_Icons">
            <a href="https://twitter.com/">
                <img class="w-100 d-block" src={{asset('assets/twitter.svg')}} alt="">
            </a>
        </div>
        <div class="media_Icons">
            <a href="https://www.youtube.com/">
                <img class="w-100 d-block" src={{asset('assets/youtube.svg')}} alt="">
            </a>
        </div>
    </div>
@endsection

@section('head')
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwa1UHLF_4V5kj4YUl7oZ00ln3ebQriE4&callback=initMap"
            type="text/javascript"></script>
    <script src="https://unpkg.com/@googlemaps/markerclustererplus/dist/index.min.js"></script>
    <script>
        // Initialize and add the map
        function initMap() {
            // The location of Novi Sad
            const noviSad = {lat: 45.25083910848594, lng: 19.79342532354321};

            // Set bounds coordinates
            const NOVI_SAD_BOUNDS = {
                north: 45.444292289109136,
                south: 45.05901552263233,
                west: 19.19897708658268,
                east: 20.346214574183712,
            };

            // The map, centered at Novi Sad
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 0,
                center: noviSad,
                restriction: {
                    latLngBounds: NOVI_SAD_BOUNDS,
                    strictBounds: true,
                },
                disableDefaultUI: true,
                zoomControl: true
            });

            // loadPins(map)
            let pinAdded = false;

            // Listen for map click events
            map.addListener('click', (event) => {

                if (!pinAdded) {
                    $('#right-sidebar').addClass('active');
                    $('#new-pin').removeClass('d-none').addClass('d-block');
                    $('#show-pin').removeClass('d-block').addClass('d-none');

                    let newMarker = addMapPin(event.latLng.lat(), event.latLng.lng(), map)
                    pinAdded = true

                    $('#latInput').val(event.latLng.lat())
                    $('#lngInput').val(event.latLng.lng())

                    newMarker.addListener('click', function() {
                        $('#new-pin').removeClass('d-none').addClass('d-block');
                        $('#show-pin').removeClass('d-block').addClass('d-none');
                    });
                } else {
                    $('#right-sidebar').toggleClass('active');
                }
            })

            let problems = {!! $problems !!}

            const markers = problems.map((problem) => {
                return addMapPin(problem.lat, problem.lng, map, problem.color, problem.merged_count)
            });

            // Add a marker clusterer to manage the markers.
            new MarkerClusterer(map, markers, {
                imagePath:
                    "https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m",
            });

            console.log(problems);
            markers.forEach((marker, i) => {
                marker.addListener('click', function() {
                    showMarkerDetails(problems[i], marker);
                });
            })
        }

        function addMapPin(lat, lng, map, pinColor = 'red', merged_count) {
            const newPin = {lat: lat, lng: lng}
            merged_count+=1; // Increase merged so it counts the parent also.

            let pinColor1 = "green";
            let pinLabel = "1";

            // let pinSVGHole = "M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z";
            let pinSVGHole = "M256,0C167.625,0,96,71.625,96,160c0,23.875,5.25,46.563,14.594,66.875l121.875,264.469C238.313,504.063,246.688,512,256,512s17.688-7.938,23.531-20.625l121.875-264.5C410.781,206.563,416,183.875,416,160C416,71.625,344.375,0,256,0z M256,256c-53,0-96-43-96-96s43-96,96-96s96,43,96,96S309,256,256,256z";
            let labelOriginHole = new google.maps.Point(20, 20);

            let markerImage = {
                path: pinSVGHole,
                anchor: new google.maps.Point(30, 30),
                fillOpacity: 1,
                fillColor: pinColor,
                strokeWeight: 1,
                strokeColor: "white",
                scale: 0.15,
                // url: ''
                labelOrigin: labelOriginHole
            }

            let labelNumber = merged_count > 1 ? merged_count.toString() : '';

            let label = {
                text: labelNumber,
                color: "white",
                fontSize: '20px;',
                className: 'labels',
            }

            let pinImage = {
                url: 'http://localhost:8000/storage/images/marker.svg',
                labelOrigin: new google.maps.Point(24,47),
            }

            {{--let markerUrl = {!! asset('assets/markers') !!} + pinColor + '-marker.svg'--}}

            // https://developers.google.com/maps/documentation/javascript/reference/marker#Symbol
            return new google.maps.Marker({
                map: map,
                label: label.text ? label : '',
                position: newPin,
                icon: pinImage,
                animation: google.maps.Animation.DROP,
                // labelAnchor: new google.maps.Point(0, 50)
                // draggable: true,
            });
        }

        function loadPins(map) {
            let problems = [
                {lat: 45.26398038680432, lng: 19.795909570365012, color: 'green'},
                {lat: 45.276577600275914, lng: 19.826202392578125, color: 'blue'},
                {lat: 45.246092100243196, lng: 19.824074695454037, color: 'red'},
                {lat: 45.24601629389547, lng: 19.82416008470015, color: 'red'},
            ]

            problems.forEach(problem => {
                addMapPin(problem.lat, problem.lng, map, problem.color);
            })
        }

        function readURL(input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();

                // $('body').attr({style: 'min-height: 1300px;'});

                $('#uploadedImage').attr('class','d-block')

                reader.onload = function (e) {
                    $('#uploadedImage')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function showMarkerDetails(problem) {
            // Open right sidebar
            $('#right-sidebar').addClass('active')

            // Activate show-pin.
            $('#new-pin').removeClass('d-block').addClass('d-none');
            $('#show-pin').removeClass('d-none').addClass('d-block');

            fillInProblemFields(problem)
        }

        function fillInProblemFields(problem) {
            resetViewProblemFields();

            if(problem.name) {
                $('#card-text-name-show').removeClass('d-none').addClass('d-block');
                $('#card-text-name').html(problem.name)
            }

            if(problem.image_url) {
                $('#card-text-image').attr('src', problem.image_url);
                $('#card-text-image-container').removeClass('d-none');
            }

            $('#card-text-email').html(problem.email)
            $('#card-text-description').html(problem.description)
            $('#card-text-address').html(problem.address)
            $('#card-text-type').html(problem.readable_type)
            $('#card-text-status').html(problem.translated_status)

        }

        function resetViewProblemFields(){
            $('#card-text-name').html('')
            $('#card-text-name-show').removeClass('d-block').addClass('d-none')
            $('#card-text-image').attr('src', '#');
            $('#card-text-image-container').removeClass('d-block').addClass('d-none');
            $('#card-text-email').html('')
            $('#card-text-description').html('')
            $('#card-text-address').html('')
            $('#card-text-type').html('')
            $('#card-text-status').html('')
        }

        $(document).ready(function () {
            let navHeight = $(window).width() > 700 ? 79 : 79;
            let mapHeight = $(window).height() - navHeight;
            $('#map').attr({style: 'min-height: '+mapHeight+'px;'});
            $('#left-sidebar').attr({style: 'height: '+mapHeight+'px;'}).addClass('active');
            $('#right-sidebar').attr({style: 'height: '+mapHeight+'px;'});


            $('#uploadFile').click(function (){
                $('#inputFile').click()
            })

            let errorsCount = {{count($errors)}}
            if(errorsCount) {
                $('#right-sidebar').addClass('active');
            }

            let message = {!! json_encode(\Illuminate\Support\Facades\Session::get('success')) !!};
            if(message) {
                $('#successModal').modal('show');
            }
        })
    </script>
@endsection
