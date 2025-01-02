<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Document Tracking System - MinDA</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!--begin::Web font -->
		<script src="https://cdn.bootcss.com/webfont/1.6.16/webfontloader.js"></script>
		<script>
            WebFont.load({
                google: {"families":["Montserrat:300,400,500,600,700","Roboto:300,400,500,600,700"]},
                active: function() {
                    sessionStorage.fonts = true;
                }
            });
		</script>
		<!--end::Web font -->
        <!--begin::Base Styles -->  
        <!--begin::Page Vendors -->
		<link href="{{asset('vendors')}}/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Page Vendors -->
		<link href="{{asset('vendors')}}/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
		<link href="{{asset('demo')}}/demo3/base/style.bundle.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('app')}}/style/doctrack_style.css" rel="stylesheet" type="text/css" />
		<!--end::Base Styles -->
		<link rel="shortcut icon" href="{{asset('demo')}}/demo3/media/img/logo/favicon.ico" />
        <link rel="icon" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"/>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <!-- <div class="min-h-screen bg-gray-100"> -->
        <div class="m-grid m-grid--hor m-grid--root m-page">
           
            <!-- Page Heading -->
            <!-- @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset -->

            <!-- Page Content -->
            
            <main>
                <div class="m-grid m-grid--hor m-grid--root m-page">
                    @include('layouts.navigation')
                    <div class="m-grid__item m-grid__item--fluid m-wrapper">
                        {{ $slot }}
                    </div>
                </div>
            </main>

        </div>

        <script>
		  	var url = "<?php echo url(""); ?>";
		</script>

        <script src="{{asset('vendors')}}/base/vendors.bundle.js" type="text/javascript"></script>
		<script src="{{asset('demo')}}/demo3/base/scripts.bundle.js" type="text/javascript"></script>
		<!--end::Base Scripts -->   
        <!--begin::Page Vendors -->
		<script src="{{asset('vendors')}}/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
		<!--end::Page Vendors -->  
        <!--begin::Page Snippets -->
		<script src="{{asset('app')}}/js/dashboard.js" type="text/javascript"></script>
        <script src="{{asset('app')}}/js/dashboard_procs.js" type="text/javascript"></script>
        <script src="{{asset('app')}}/js/events_doctrack.js" type="text/javascript"></script>

    </body>
</html>
