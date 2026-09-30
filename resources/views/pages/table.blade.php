@extends('layouts.app')
@section('content')

<script>
    // Function on page load to scroll to specific id from the url
        function getParameterByName(name, url = window.location.href) {
            name = name.replace(/[\[\]]/g, '\\$&');
            let regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
                results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, ' '));
        }

        let section = getParameterByName('section');

        window.onload = function() {
            // Scrolling to the right Id
            let selectedItem = document.getElementById(`${section}`);
            if(selectedItem) {
                selectedItem.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        }
</script>


    <div class="container-fluid container-tables">
        <div class="row">

        <!-- First table for Area: GREEN -->

            <div class="col-12 col-lg-6 offset-lg-2 background-Table">
                <div class="first-table">
                    <div class="h1">Pristigli pedlozi građana i građanki Novog Sada</div>
                    <div class="h3">Oblast: ZELENILO</div>
                    <div class="table-responsive-sm">
                    <table class="table table-hover p-4">
                        <thead>
                            <tr>
                                <th scope="col-1"></th>
                                <th scope="col">Predlog (lokacija i opis)</th>
                                <th scope="col">Predlagač/ica</th>
                                <th scope="col">Datum predloga</th>
                                <th scope="col">Predlog je prosleđen Gradskoj upravi</th>
                                <th scope="col">Predlog je uvršten u Program</th>
                            </tr>
                        </thead>
                        <tbody>
                            <div class="suggestions-content-one">
                                <tr>
                                    <th colspan="6" class="text-center top-title paddingTop" id="g-1"><b>Predlozi za sadnju drveča</b></th>
                                </tr>

                                <tr>
                                    <th scope="row">1</th>
                                    <td>Novi Sad Novi Sad</td>
                                    <td>Petar Petrovic</td>
                                    <td>09/01/2021</td>
                                    <td>Novi Sad</td>
                                    <td>Program Novi Sad</td>

                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Novi Sad Novi Sad</td>
                                    <td>Petar Petrovic</td>
                                    <td>09/01/2021</td>
                                    <td>Novi Sad</td>
                                    <td>Program Novi Sad</td>

                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Novi Sad Novi Sad</td>
                                    <td>Petar Petrovic</td>
                                    <td>09/01/2021</td>
                                    <td>Novi Sad</td>
                                    <td>Program Novi Sad</td>

                                </tr>
                            </div>

                            <div class="suggestions-content-two">
                                <tr class="pb-0">
                                    <th colspan="6" class="text-center top-title " id="g-2">Predlozi za sadnju šiblja, cveća i drugog zelenila</th>
                                </tr>

                                <tr>
                                    <th scope="row">1</th>
                                    <td>Novi Sad Novi Sad</td>
                                    <td>Petar Petrovic</td>
                                    <td>09/01/2021</td>
                                    <td>Novi Sad</td>
                                    <td>Program Novi Sad</td>

                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Novi Sad Novi Sad</td>
                                    <td>Petar Petrovic</td>
                                    <td>09/01/2021</td>
                                    <td>Novi Sad</td>
                                    <td>Program Novi Sad</td>

                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Novi Sad Novi Sad</td>
                                    <td>Petar Petrovic</td>
                                    <td>09/01/2021</td>
                                    <td>Novi Sad</td>
                                    <td>Program Novi Sad</td>

                                </tr>
                            </div>

                            <div class="suggestions-content-two">
                                <tr class="pb-0">
                                    <th colspan="6" class="text-center top-title" id="g-3">Predlozi za rekonstrukciju/podizanje travnjaka</th>
                                </tr>

                                <tr>
                                    <th scope="row">1</th>
                                    <td>Novi Sad Novi Sad</td>
                                    <td>Petar Petrovic</td>
                                    <td>09/01/2021</td>
                                    <td>Novi Sad</td>
                                    <td>Program Novi Sad</td>

                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Novi Sad Novi Sad</td>
                                    <td>Petar Petrovic</td>
                                    <td>09/01/2021</td>
                                    <td>Novi Sad</td>
                                    <td>Program Novi Sad</td>

                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Novi Sad Novi Sad</td>
                                    <td>Petar Petrovic</td>
                                    <td>09/01/2021</td>
                                    <td>Novi Sad</td>
                                    <td>Program Novi Sad</td>

                                </tr>
                            </div>

                            <div class="suggestions-content-two">
                                <tr class="pb-0">
                                    <th colspan="6" class="text-center top-title" id="g-4">Predlozi za negu postojećih biljaka</th>
                                </tr>

                                <tr>
                                    <th scope="row">1</th>
                                    <td>Novi Sad Novi Sad</td>
                                    <td>Petar Petrovic</td>
                                    <td>09/01/2021</td>
                                    <td>Novi Sad</td>
                                    <td>Program Novi Sad</td>

                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Novi Sad Novi Sad</td>
                                    <td>Petar Petrovic</td>
                                    <td>09/01/2021</td>
                                    <td>Novi Sad</td>
                                    <td>Program Novi Sad</td>

                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Novi Sad Novi Sad</td>
                                    <td>Petar Petrovic</td>
                                    <td>09/01/2021</td>
                                    <td>Novi Sad</td>
                                    <td>Program Novi Sad</td>

                                </tr>
                            </div>

                            <div class="suggestions-content-two">
                                <tr class="pb-0">
                                    <th colspan="6" class="text-center top-title" id="g-5">Uklanjanje bolesnih i starih stabala i samoniklih biljaka</th>
                                </tr>

                                <tr>
                                    <th scope="row">1</th>
                                    <td>Novi Sad Novi Sad</td>
                                    <td>Petar Petrovic</td>
                                    <td>09/01/2021</td>
                                    <td>Novi Sad</td>
                                    <td>Program Novi Sad</td>

                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Novi Sad Novi Sad</td>
                                    <td>Petar Petrovic</td>
                                    <td>09/01/2021</td>
                                    <td>Novi Sad</td>
                                    <td>Program Novi Sad</td>

                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Novi Sad Novi Sad</td>
                                    <td>Petar Petrovic</td>
                                    <td>09/01/2021</td>
                                    <td>Novi Sad</td>
                                    <td>Program Novi Sad</td>

                                </tr>
                            </div>

                        </tbody>
                    </table>
                    </div>
                </div>
            </div>

<!-- Second table for Area: WASTE -->

            <div class="col-12 col-lg-6 offset-lg-2 background-Table">
                <div class="first-table">
                    <div class="h1">Odaberite vrstu aktivnosti koju predlažete:</div>
                    <div class="h3">Oblast: OTPAD</div>
                    <div class="table-responsive-sm">
                    <table class="table table-hover p-4">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Predlog (lokacija i opis)</th>
                                <th scope="col">Predlagač/ica</th>
                                <th scope="col">Datum predloga</th>
                                <th scope="col">Predlog je prosleđen Gradskoj upravi</th>
                                <th scope="col">Predlog je uvršten u Program</th>
                            </tr>
                        </thead>
                        <tbody>
                            <div class="suggestions-content-one">
                                <tr class="pb-0">
                                    <th colspan="6" class="text-center top-title paddingTop" id="w-1">Predlozi za uklanjanje divlje deponije</th>
                                </tr>

                                <tr>
                                    <th scope="row">1</th>
                                    <td>Novi Sad Novi Sad</td>
                                    <td>Petar Petrovic</td>
                                    <td>09/01/2021</td>
                                    <td>Novi Sad</td>
                                    <td>Program Novi Sad</td>

                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Novi Sad Novi Sad</td>
                                    <td>Petar Petrovic</td>
                                    <td>09/01/2021</td>
                                    <td>Novi Sad</td>
                                    <td>Program Novi Sad</td>

                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Novi Sad Novi Sad</td>
                                    <td>Petar Petrovic</td>
                                    <td>09/01/2021</td>
                                    <td>Novi Sad</td>
                                    <td>Program Novi Sad</td>

                                </tr>
                            </div>

                            <div class="suggestions-content-two">
                                <tr class="pb-0">
                                    <th colspan="6" class="text-center top-title" id="w-2">Predlozi za sanacija degradirane javne površine</th>
                                </tr>

                                <tr>
                                    <th scope="row">1</th>
                                    <td>Novi Sad Novi Sad</td>
                                    <td>Petar Petrovic</td>
                                    <td>09/01/2021</td>
                                    <td>Novi Sad</td>
                                    <td>Program Novi Sad</td>

                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Novi Sad Novi Sad</td>
                                    <td>Petar Petrovic</td>
                                    <td>09/01/2021</td>
                                    <td>Novi Sad</td>
                                    <td>Program Novi Sad</td>

                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Novi Sad Novi Sad</td>
                                    <td>Petar Petrovic</td>
                                    <td>09/01/2021</td>
                                    <td>Novi Sad</td>
                                    <td>Program Novi Sad</td>

                                </tr>
                            </div>

                            <div class="suggestions-content-two">
                                <tr class="pb-0">
                                    <th colspan="6" class="text-center top-title" id="w-3">Predlozi za sakupljanje i uklanjanje rasutog otpada</th>
                                </tr>

                                <tr>
                                    <th scope="row">1</th>
                                    <td>Novi Sad Novi Sad</td>
                                    <td>Petar Petrovic</td>
                                    <td>09/01/2021</td>
                                    <td>Novi Sad</td>
                                    <td>Program Novi Sad</td>

                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Novi Sad Novi Sad</td>
                                    <td>Petar Petrovic</td>
                                    <td>09/01/2021</td>
                                    <td>Novi Sad</td>
                                    <td>Program Novi Sad</td>

                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Novi Sad Novi Sad</td>
                                    <td>Petar Petrovic</td>
                                    <td>09/01/2021</td>
                                    <td>Novi Sad</td>
                                    <td>Program Novi Sad</td>

                                </tr>
                            </div>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
