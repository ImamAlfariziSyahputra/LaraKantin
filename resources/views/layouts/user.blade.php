<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="{{ url('assets/css/style2.css') }}" rel="stylesheet" type="text/css">
    <!-- FONTAWESOME : https://kit.fontawesome.com/a23e6feb03.js -->
    <link rel="stylesheet"   href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.  5/jquery.mCustomScrollbar.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/4cba960697.js" crossorigin="anonymous"></script>

    <title>Kantin</title>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light blue fixed-top">
        <button id="sidebarCollapse" class="btn navbar-btn">
        <i class="fas fa-lg fa-bars"></i>
        </button>
        <a class="navbar-brand" href="{{ url('/home') }}">
            <img src="{{ url('images/kantin.png') }}" width="" alt="" style="height: 50px;background-size:cover;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"   data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"  aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <?php 
                        $pesanan_utama = \App\Pesanan::where('user_id', Auth::user()->id)->where('status', 0)->first();
                        if (!empty($pesanan_utama)) {
                            $notif = \App\PesananDetail::where('pesanan_id', $pesanan_utama->id)->count();
                        }
                        
                    ?>
                    <a class="nav-link" href="{{ url('checkout') }}">
                        <i class="fa fa-shopping-cart text-white" aria-hidden="true"></i>
                        @if (!empty($notif))
                        <span class="badge badge-danger">{{ $notif }}</span>
                        @endif
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ Auth::user()->name }}<span class="caret ml-4"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('profile') }}">
                            Profile
                        </a>
                        <a class="dropdown-item" href="{{ url('history') }}">
                            Riwayat Pemesanan
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="wrapper fixed-left">
        <nav id="sidebar">
            <div class="sidebar-header p-3 py-4">
                <h4 class="text-center">
                    <i class="fas fa-user"></i>
                    <span style="font-size: 1.2rem;">SYAHREVI</span>
                </h4>
            </div>

            <hr class="my-0 mx-3 bg-white">

            <ul class="list-unstyled components mt-2">
                <li>
                    <a href="{{ url('home') }}" class="">
                        <i class="fa fa-home" aria-hidden="true"></i>
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ url('snack') }}">
                        <i class="fas fa-fw fa-clipboard"></i>Snack
                    </a>
                </li>
                <li>
                    <a href="{{ url('minuman') }}">
                        <i class="fas fa-fw fa-wine-glass"></i> Minuman
                    </a>
                </li>
                <li>
                    <a href="{{ url('wafer') }}">
                        <i class="fas fa-fw fa-wine-glass"></i> Wafer
                    </a>
                </li>
                
                <hr class="my-0 mx-3 bg-white">
            </ul>
        </nav>

        <div id="content">
            @yield('content')
        </div>

    </div>

    <!-- Sweet Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweet::alert')
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
                document.getElementById("bodyContent").style.width="100%";
            });
            $(document).on('change', '#avatar', function() {
                let avatar = $('#avatar').val()
                $('.custom-file-label').text(avatar)
            });
        });
    </script>

</body>
</html>