@extends('layouts.app')
@section('content')
    <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-dark" id="navbar_Home">
        <a class="navbar-brand py-0" href="#">
        <img class="d-block mx-5" src={{asset('assets/logo.png')}} alt="">
        </a>


        <div class="d-none d-sm-none d-md-none collapse navbar-collapse justify-content-end px-3" id="navbarSupportedContent">
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
    </nav>
        <div class="overlay">
            <div class="row background m-0">
                <div class="col-6 col-sm-6 col-md-3 col-lg-2 px-4 offset-lg-2 justify-content-center">
                    <a href="#"><img class="w-100 d-block " src={{asset('assets/icon01.png')}}  alt=""></a>

                    <div class="text-under ">
                        <p>Vizuelni prikaz prihoda i rashoda Budžetskog fonda za zaštitu životne sredine Grada Novog Sada, zakonska regulativa, instrumenti i finansiranje zaštite životne sredine u Republici Srbiji…</p>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-3 col-lg-2 px-4 justify-content-center">
                 <a href="{{route('map.get')}}">
                    <img class="d-block smallest" src={{asset('assets/icon02.png')}}  alt="">
                    <div class="text-gotham">
                        <h2 class="mb-0">Mapa</h2>
                        <p class="mb-0">Prijava predloga</p>
                    </div>
                </a>
                    <div class="text-under ">
                        <p>Označi na mapi tvoj predlog za uređenje i/ili sanaciju i uključi se u kreiranje Programa korišćenja sredstava Budžetskog fonda za zaštitu životne sredine Grada Novog Sada…</p>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-3 col-lg-2 px-4 justify-content-center">
                <a href="#">
                    <img class="d-block smallest" src={{asset('assets/icon03.png')}}  alt="">
                    <div class="text-gotham">
                        <h2 class="mb-0">Politika</h2>
                        <p class="mb-0">Osnovne informacije</p>
                    </div>
                </a>
                    <div class="text-under ">
                        <p>Mehanizmi učešća građana i dokumenti javnih politika u oblasti zaštite životne sredine...</p>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-3 col-lg-2 px-4 mx-md-1 justify-content-center">
                    <a href="#">
                        <img class="d-block smallest" src={{asset('assets/icon04.png')}} alt="">
                        <div class="text-gotham">
                            <h2 class="mb-0">Akteri</h2>
                            <p class="mb-0">Udruzenja</p>
                        </div>
                    </a>

                    <div class="text-under ">
                        <p>Zajedničko delovanje možda je najpresudnije upravo u oblasti očuvanja i zaštite prirodnih resursa i životne sredine - trenutno Zemlju trošimo 1,6 puta brže nego što je ekosistemu potrebno da se regeneriše. Kako i gde možeš da se uključiš i daš svoj doprinos u aktivnostima koje imaju za cilj manje otpada, čištiju vodu, čistiji vazduh, više zelenila…</p>
                    </div>
                </div>
            </div>

            <div class="d-flex d-md-none media-Bottom" >
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
        </div>
    </div>
@endsection
