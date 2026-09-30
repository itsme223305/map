@if(Route::current()->uri !== '/' && !str_contains(Route::current()->uri, 'admin')&& !str_contains(Route::current()->uri, 'confirmProblem'))
<div>
    <nav id="navbar-menu" class="navbar navbar-expand-lg navbar-dark mb-0">
        <a class="navbar-brand ml-4" href="{{route('home.get')}}">
            <img class="d-none d-sm-block" src="{{asset('assets/logo.svg')}}">
            <img class="d-block d-sm-none" src="{{asset('assets/logo.png')}}">
        </a>
        <button id="small-burger" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <img id="small-burger-image" src="{{asset('assets/mobilemenu.png')}}" alt="">
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a id="nav-link" class="nav-link {{Route::current()->uri === '/' ? 'text-black' : ''}}" href="{{route('home.get')}}">EKODINAR.RS</a>
                </li>

                <li>
                    <div class="divider"></div>
                </li>

                <li class="nav-item active">
                    <a id="nav-link" class="nav-link {{Route::current()->uri === 'map' ? 'text-black' : ''}}" href="{{route('map.get')}}">MAPA</a>
                </li>

                <li>
                    <div class="divider"></div>
                </li>

                <li class="nav-item active">
                    <a id="nav-link" class="nav-link" href="#">POLITIKA</a>
                </li>

                <li>
                    <div class="divider"></div>
                </li>

                <li class="nav-item active">
                    <a id="nav-link" class="nav-link" href="#">AKTERI</a>
                </li>
            </ul>

            <div>
                {{-- Icon --}}
                <div class="square-container ">
                    {{-- Search icon --}}
                    <div id="search-icon">
                        <img src="{{asset('assets/search-plus.svg')}}" class="mt-3">
                    </div>

                    <p class="square-container-text text-center question mt-2">
                        PRIJAVA
                        PREDLOGA
                    </p>
                </div>

                <div class="fb-icons">
                    <a href="#"><img class="navbar-icon mr-1" src="{{asset('assets/fb.svg')}}"></a>
                    <a href="#"><img class="navbar-icon mr-1" src="{{asset('assets/insta.svg')}}"></a>
                    <a href="#"><img class="navbar-icon mr-1" src="{{asset('assets/twitter.svg')}}"></a>
                    <a href="#"><img class="navbar-icon mr-1" src="{{asset('assets/youtube.svg')}}"></a>
                </div>
            </div>
        </div>
    </nav>

    <div class="black-line"></div>
</div>
@endif
<script type="text/javascript">
    $(document).ready(function () {
        $('.open-icon').on('click', function () {
            $('#left-sidebar').toggleClass('active');
        });

        $('.close-icon').on('click', function () {
            $('#left-sidebar').toggleClass('active');
        });

        $('#toggle-propositions').on('click', function () {
            $('.left-sidebar-propositions-open').toggleClass('active');
            $('#toggle-propositions').toggleClass('active');
        });

        $('#rightSidebarCollapse').on('click', function () {
            $('#right-sidebar').toggleClass('active');
        });
    });
</script>
