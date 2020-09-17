<!DOCTYPE html>
<html lang="en">

<head>
    {{-- CSRF Token --}}
	<meta name="csrf-token" content="{{ csrf_token() }}">

	{{-- Title --}}
	<title>{{ config('app.name', 'Universitas Muhammadiyah Cirebon') }}</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">


    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('assets_backend') }}/images/bareskrim.png" type="image/x-icon">

    <!-- select2 css -->
    <link rel="stylesheet" href="{{ asset('assets_backend') }}/css/plugins/select2.min.css">

    <!-- data tables css -->
    <link rel="stylesheet" href="{{ asset('assets_backend') }}/css/plugins/dataTables.bootstrap4.min.css">

    <!-- font css -->
    <link rel="stylesheet" href="{{ asset('assets_backend') }}/fonts/font-awsome-pro/css/pro.min.css">
    <link rel="stylesheet" href="{{ asset('assets_backend') }}/fonts/feather.css">
    <link rel="stylesheet" href="{{ asset('assets_backend') }}/fonts/fontawesome.css">

    <!-- Simple Lightbox -->
    <link rel="stylesheet" href="{{ asset('assets_backend') }}/plugins/simplelightbox-master/dist/simple-lightbox.css">

    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('assets_backend') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('assets_backend') }}/css/customizer.css">

    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    @stack('css')

    <style>
        .Disabled {
            pointer-events: none;
            cursor: not-allowed;
            opacity: 0.65;
            filter: alpha(opacity=65);
            -webkit-box-shadow: none;
            box-shadow: none;
        } 

        #numwizard li.disabled {
            cursor: not-allowed;
        }

        .swal2-container {
          z-index: 10000 !important;
        }

        #map .centerMarker{
          position:absolute;
          /*url of the marker*/
          background:url(http://maps.gstatic.com/mapfiles/markers2/marker.png) no-repeat;
          /*center the marker*/
          top:50%;left:50%;
          z-index:1;
          /*fix offset when needed*/
          margin-left:-10px;
          margin-top:-34px;
          /*size of the image*/
          height:34px;
          width:20px;
          cursor:pointer;
          color: black;
        }
        
    </style>

</head>
<body class="">

<!-- [ Pre-loader ] start -->
<div class="loader-bg">
    <div class="loader-track">
        <div class="loader-fill"></div>
    </div>
</div>
<!-- [ Pre-loader ] End -->

{{-- Mobile Header --}}
<div class="pc-mob-header pc-header">
	<div class="pcm-logo">
		<img src="{{ asset('assets_backend') }}/images/ditreskrimum.png" alt="" class="logo logo-lg" width="200">
	</div>
	<div class="pcm-toolbar">
		<a href="#!" class="pc-head-link" id="mobile-collapse">
			<div class="hamburger hamburger--arrowturn">
				<div class="hamburger-box">
					<div class="hamburger-inner"></div>
				</div>
			</div>
			<!-- <i data-feather="menu"></i> -->
		</a>
		
		<a href="#!" class="pc-head-link" id="header-collapse">
			<i data-feather="more-vertical"></i>
		</a>
	</div>
</div>

{{-- Navigation --}}
<nav class="pc-sidebar ">
	<div class="navbar-wrapper">
		<div class="m-header">
			<a href="dashboard" class="b-brand">
				<!-- ========   change your logo hear   ============ -->
				<img src="{{ asset('assets_backend') }}/images/ditreskrimum.png" alt="" class="logo logo-lg" width="200">
				<img src="{{ asset('assets_backend') }}/images/ditreskrimum.png" alt="" class="logo logo-sm" width="200">
			</a>
		</div>
		<div class="navbar-content">
			<ul class="pc-navbar">
				<li class="pc-item pc-caption">
					<label>Dashboard</label>
				</li>
				<li class="pc-item"><a href="dashboard" class="pc-link "><span class="pc-micon"><i data-feather="sidebar"></i></span><span class="pc-mtext">Dashboard</span></a></li>
				
				
				<li class="pc-item pc-caption">
					<label>Setup Data</label>
				</li>
				<li class="pc-item pc-hasmenu">
					<a href="javascript:void(0)" class="pc-link"><span class="pc-micon"><i data-feather="activity"></i></span><span class="pc-mtext">Master Data</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
					<ul class="pc-submenu">
						<li class="pc-item"><a class="pc-link" href="jenjang_pendidikan">Jenjang Pendidikan</a></li>
						<li class="pc-item"><a class="pc-link" href="merek">Merek Kendaraan</a></li>
						<li class="pc-item"><a class="pc-link" href="tipe_kendaraan">Tipe Kendaraan</a></li>
						<li class="pc-item"><a class="pc-link" href="jenis_kendaraan">Jenis Kendaraan</a></li>
						<li class="pc-item"><a class="pc-link" href="tkp">TKP</a></li>
						<li class="pc-item"><a class="pc-link" href="tindak_kejahatan">Tindak Kejahatan</a></li>
						<li class="pc-item"><a class="pc-link" href="jenis_pekerjaan">Jenis Pekerjaan</a></li>
					</ul>
				</li>
				<li class="pc-item pc-hasmenu">
					<a href="javascript:void(0)" class="pc-link "><span class="pc-micon"><i data-feather="user-check"></i></span><span class="pc-mtext">Pelaku Curanmor</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
					<ul class="pc-submenu">
						<li class="pc-item"><a class="pc-link" href="curanmor/add">Input Pelaku</a></li>
						<li class="pc-item"><a class="pc-link" href="curanmor">List Pelaku</a></li>
					</ul>
				</li>
				
			</li>
			
			<li class="pc-item pc-caption">
				<label>Laporan</label>
			</li>
			<li class="pc-item pc-hasmenu">
				<a href="javascript:void(0)" class="pc-link "><span class="pc-micon"><i data-feather="image"></i></span><span class="pc-mtext">Laporan</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
				<ul class="pc-submenu">
					<li class="pc-item"><a class="pc-link" href="rkp_curanmor">Custom Filter Laporan</a></li>
					
				</ul>
			</li>
			<li class="pc-item pc-caption">
				<label>Tracking</label>
			</li>
			<li class="pc-item"><a href="tracking" class="pc-link "><span class="pc-micon"><i data-feather="globe"></i></span><span class="pc-mtext">Tracking Lokasi Curanmor</span></a></li>
		</ul>
	</div>
</div>
</nav>

{{-- Header Menu --}}
<header class="pc-header bg-danger">
		<div class="header-wrapper">
			<div class="mr-auto pc-mob-drp">
				
			</div>
			<div class="ml-auto">
				<ul class="list-unstyled">
					<li class="dropdown pc-h-item">
						<a class="pc-head-link dropdown-toggle arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
							<img src="{{ asset('assets_backend') }}/images/user/avatar-2.jpg" alt="user-image" class="user-avtar">
							<span>
								<span class="user-name">{{ Auth()->user()->name}}</span>
								<span class="user-desc">{{ 'Developer' }}</span>
							</span>
						</a>
						<div class="dropdown-menu dropdown-menu-right pc-h-dropdown">
							<div class=" dropdown-header">
								<h6 class="text-overflow m-0">Welcome !</h6>
							</div>
							<a href="profile" class="dropdown-item">
								<i data-feather="user"></i>
								<span>My Account</span>
							</a>
							<a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="dropdown-item">
								<i data-feather="power"></i>
								<span>Logout</span>
							</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
						</div>
					</li>
				</ul>
			</div>

		</div>
	</header>


	@yield('content')

	<script src="{{ asset('assets_backend') }}/js/vendor-all.min.js"></script>
    <script src="{{ asset('assets_backend') }}/js/plugins/bootstrap.min.js"></script>
    <script src="{{ asset('assets_backend') }}/js/plugins/feather.min.js"></script>
    <script src="{{ asset('assets_backend') }}/js/pcoded.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
    <script src="{{ asset('assets_backend') }}/js/plugins/clipboard.min.js"></script>
    <script src="{{ asset('assets_backend') }}/js/uikit.min.js"></script>

    <!-- datatable Js -->
    <script src="{{ asset('assets_backend') }}/js/plugins/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets_backend') }}/js/plugins/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('assets_backend') }}/js/pages/data-basic-custom.js"></script>

    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>

    <!-- select2 Js -->
    <script src="{{ asset('assets_backend') }}/js/plugins/select2.full.min.js"></script>
    <!-- form-select-custom Js -->
    <script src="{{ asset('assets_backend') }}/js/pages/form-select-custom.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <!-- Simple Lightbox -->
    <script src="{{ asset('assets_backend') }}/plugins/simplelightbox-master/dist/simple-lightbox.js"></script>


    <script src="https://code.highcharts.com/highcharts.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    
    <script src="https://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}

    <script>
        @if ($errors->any())
            @foreach($errors->all() as $error)
                toastr.error('{{ $error }}', 'Error', {
                    closeButton: true,
                    progressBar: true,
                });
            @endforeach
        @endif
    </script>

    @stack('js')

<script>

    // header option
    $('#pct-toggler').on('click', function() {
        $('.pct-customizer').toggleClass('active');

    });
    // header option
    $('#cust-sidebrand').change(function() {
        if ($(this).is(":checked")) {
            $('.theme-color.brand-color').removeClass('d-none');
            $('.m-header').addClass('bg-dark');
        } else {
            $('.m-header').removeClassPrefix('bg-');
            $('.m-header > .b-brand > .logo-lg').attr('src', '../assets/images/logo-dark.svg');
            $('.theme-color.brand-color').addClass('d-none');
        }
    });
    // Header Color
    $('.brand-color > a').on('click', function() {
        var temp = $(this).attr('data-value');
        // $('.header-color > a').removeClass('active');
        // $('.pcoded-header').removeClassPrefix('brand-');
        // $(this).addClass('active');
        if (temp == "bg-default") {
            $('.m-header').removeClassPrefix('bg-');
        } else {
            $('.m-header').removeClassPrefix('bg-');
            $('.m-header > .b-brand > .logo-lg').attr('src', '../assets/images/logo.svg');
            $('.m-header').addClass(temp);
        }
    });
    // Header Color
    $('.header-color > a').on('click', function() {
        var temp = $(this).attr('data-value');
        // $('.header-color > a').removeClass('active');
        // $('.pcoded-header').removeClassPrefix('brand-');
        // $(this).addClass('active');
        if (temp == "bg-default") {
            $('.pc-header').removeClassPrefix('bg-');
        } else {
            $('.pc-header').removeClassPrefix('bg-');
            $('.pc-header').addClass(temp);
        }
    });
    // sidebar option
    $('#cust-sidebar').change(function() {
        if ($(this).is(":checked")) {
            $('.pc-sidebar').addClass('light-sidebar');
            $('.pc-horizontal .topbar').addClass('light-sidebar');
            // $('.m-header > .b-brand > .logo-lg').attr('src', '../assets/images/logo-dark.svg');
        } else {
            $('.pc-sidebar').removeClass('light-sidebar');
            $('.pc-horizontal .topbar').removeClass('light-sidebar');
            // $('.m-header > .b-brand > .logo-lg').attr('src', '../assets/images/logo.svg');
        }
    });
    $.fn.removeClassPrefix = function(prefix) {
        this.each(function(i, it) {
            var classes = it.className.split(" ").map(function(item) {
                return item.indexOf(prefix) === 0 ? "" : item;
            });
            it.className = classes.join(" ");
        });
        return this;
    };
    // End Customizer

    // Start my custom functions
    function _calculateAge(age) {
        var Q4A = "Your birthday is: ";
        var Bdate = age;
        var Bday = +new Date(Bdate);
        Q4A =  ~~ ((Date.now() - Bday) / (31557600000)) + " Tahun";
        return Q4A;
    }

</script>

@yield('footer_script')

