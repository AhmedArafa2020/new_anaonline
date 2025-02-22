<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) ?? 'en' }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Perfume - The perfume accord is the 'backbone' of the fragrance and consists of the main building blocks of the scent or olfactive creation..">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
    <title>@yield('page-title')</title>
    <meta name="base-url" content="{{URL::to('/')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {!! metaKeywordSetting($metakeyword ?? '',$metadesc ?? '',$metaimage ?? '',$slug) !!}

<link rel="shortcut icon"
    href="{{ asset((isset($theme_favicon) && !empty($theme_favicon)) ? $theme_favicon : 'themes/' . $currentTheme  . '/assets/images/Favicon.png') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&amp;family=Outfit:wght@100;200;300;400;500;600;700;800;900&amp;family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('themes/' . $currentTheme . '/assets/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/' . $currentTheme . '/assets/css/jquery-ui.css') }}">
    @if($currantLang == 'ar' || $currantLang == 'he')
    <link rel="stylesheet" href="{{ asset('themes/' . $currentTheme . '/assets/css/rtl-main-style.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/' . $currentTheme . '/assets/css/rtl-responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/rtl-custom.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/rtl-customizer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/rtl-floating-wpp.min.css') }}">
    @else
    <link rel="stylesheet" href="{{ asset('themes/' . $currentTheme . '/assets/css/main-style.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/' . $currentTheme . '/assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/customizer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/floating-wpp.min.css') }}">
    @endif
    <link rel="stylesheet" href="{{ asset('public/assets/fonts/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/fonts/tabler-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/notifier.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/fonts/feather.css') }}">
   
    <style>
        .notifier {
            padding: calc(25px - 5px) calc(25px - 5px);
            border-radius: 10px;
        }

        .notifier-title {
            margin: 0 0 4px;
            padding: 0;
            font-size: 18px;
            font-weight: 400;
            color: #000;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 2px;
        }

        .notifier .notifier-body {
            font-size: 0.875rem;
        }
    </style>
    <style>
        nav ul li .active{
            background:  #d8135a !important;
            color: #ffffff
        }
    </style>
    {{-- pwa customer app --}}
    <meta name="mobile-wep-app-capable" content="yes">
    <meta name="apple-mobile-wep-app-capable" content="yes">
    <meta name="msapplication-starturl" content="/">
    <link rel="apple-touch-icon" href="{{ asset((isset($theme_favicon) && !empty($theme_favicon)) ? $theme_favicon : 'themes/' . $currentTheme . '/assets/images/Favicon.png') }}">

    @if ($store->enable_pwa_store == 'on')
        <link rel="manifest" href="{{ asset('storage/uploads/customer_app/store_' . $store->id . '/manifest.json') }}" />
    @endif
    @if (!empty($store->pwa_store($store->slug)->theme_color))
        <meta name="theme-color" content="{{ $store->pwa_store($store->slug)->theme_color }}" />
    @endif
    @if (!empty($store->pwa_store($store->slug)->background_color))
        <meta name="apple-mobile-web-app-status-bar"
            content="{{ $store->pwa_store($store->slug)->background_color }}" />
    @endif
    <style>
        {!! $storecss ?? '' !!}
    </style>
    @stack('page-style')
</head>

<body @if (in_array(\Request::route()->getName(), ['landing_page'])) class="home-wrapper home-page"
     @elseif(in_array(\Request::route()->getName(),  ['page.product'])) class="home-wrapper product-page"
     @elseif(in_array(\Request::route()->getName(), ['page.product-list'])) class="home-wrapper product-list"
     @elseif(in_array(\Request::route()->getName(), ['page.product-list'])) class="product-list" @endif>

    @yield('content')
  
   
    @if(isset($pixelScript))
        @foreach ($pixelScript as $script)
            <?= $script ?>
        @endforeach
    @endif
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.slim.min.js"></script>
    @once
    <script src="{{ asset('themes/' . $currentTheme . '/assets/js/jquery.min.js') }}"></script>
    @endonce
    <script src="{{ asset('themes/' . $currentTheme . '/assets/js/slick.js') }}" defer="defer"></script>
    <script src="{{ asset('themes/' . $currentTheme . '/assets/js/slick-lightbox.js') }}" defer="defer"></script>
    @if($currantLang == 'ar' || $currantLang == 'he')
    <script src="{{ asset('themes/' . $currentTheme . '/assets/js/rtl-custom.js') }}" defer="defer"></script>
    @else
    <script src="{{ asset('themes/' . $currentTheme . '/assets/js/custom.js') }}" defer="defer"></script>
    @endif
    <script src="{{ asset('themes/' . $currentTheme . '/assets/js/jquery-ui.js') }}" defer="defer"></script>
    <script src="{{ asset('public/assets/js/plugins/notifier.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}" defer="defer"></script>
    <script src="{{ asset('public/assets/js/plugins/bootstrap.min.js') }}"></script>

    <script src="{{ asset('public/assets/js/plugins/feather.min.js') }}"></script>

    <script src="{{ asset('assets/js/floating-wpp.min.js') }}"></script>
   <!--Theme Routes Script-->
   @include('front_end.jQueryRoute')
     <!--scripts end here-->
   @if ($message = Session::get('success'))
        <script>
            notifier.show('Success', '{!! $message !!}', 'success', site_url +
                '/public/assets/images/notification/ok-48.png', 4000);
        </script>
    @endif

    @if ($message = Session::get('error'))
        <script>
            notifier.show('Error', '{!! $message !!}', 'danger', site_url +
                '/public/assets/images/notification/high_priority-48.png', 4000);
        </script>
    @endif
    @stack('page-script')
   
  

</body>
</html>