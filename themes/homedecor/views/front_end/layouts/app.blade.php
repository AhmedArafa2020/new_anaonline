<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author"
        content="Style - The Impressive Fashion Shopify Theme complies with contemporary standards. Meet The Most Impressive Fashion Style Theme Ever. Well Toasted, and Well Tested.">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
    <title>@yield('page-title') </title>
    <meta name="base-url" content="{{URL::to('/')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {!! metaKeywordSetting($metakeyword ?? '',$metadesc ?? '',$metaimage ?? '',$slug) !!}
    <link rel="shortcut icon"
    href="{{ get_file((isset($theme_favicon) && !empty($theme_favicon)) ? $theme_favicon : 'themes/' . $currentTheme  . '/assets/images/Favicon.png', $currentTheme) }}" type="image/x-icon">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/notifier.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/fonts/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/fonts/fontawesome.css') }}">

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
    {{-- pwa customer app --}}
    <meta name="mobile-wep-app-capable" content="yes">
    <meta name="apple-mobile-wep-app-capable" content="yes">
    <meta name="msapplication-starturl" content="/">
    <link rel="apple-touch-icon" href="{{ get_file((isset($theme_favicon) && !empty($theme_favicon)) ? $theme_favicon : 'themes/' . $currentTheme  . '/assets/images/Favicon.png', $currentTheme) }}">
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
<body @if (in_array(\Request::route()->getName(), ['landing_page'])) class="home home-page"] @elseif(in_array(\Request::route()->getName(),['page.article'])) class="article-page" @else
    @endif>
    <!-- [ Main Content ] start -->
    <div>
    @if(isset($pixelScript))
        @foreach ($pixelScript as $script)
            <?= $script ?>
        @endforeach
    @endif
        @yield('content')
    </div>
    <!-- [ Main Content ] end -->
   
    <!--scripts start here-->
    <script src="{{ asset('themes/' . $currentTheme . '/assets/js/jquery.slim.min.js') }}"></script>
    <script src="{{ asset('themes/'.$currentTheme.'/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('themes/'.$currentTheme.'/assets/js/slick.min.js') }}" defer="defer"></script>
    <script src="{{ asset('themes/'.$currentTheme.'/assets/js/slick-lightbox.js') }}" defer="defer"></script>
    @if($currantLang == 'ar' || $currantLang == 'he')
    <script src="{{ asset('themes/' . $currentTheme . '/assets/js/rtl-custom.js') }}" defer="defer"></script>
    @else
    <script src="{{ asset('themes/' . $currentTheme . '/assets/js/custom.js') }}" defer="defer"></script>
    @endif
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ asset('public/assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/plugins/notifier.js') }}"></script>
    <script src="{{ asset('assets/js/floating-wpp.min.js') }}"></script>
    <!--Theme Routes Script-->
    @include('front_end.jQueryRoute')
    <script src="{{ asset('js/custom.js') }}" defer="defer"></script>
    <script src="{{ asset('public/assets/js/plugins/feather.min.js') }}"></script>
    <!--scripts end here-->
    @stack('page-script')
</body>
{{-- @if ($superadmin_setting['enable_cookie'] == 'on')
    @include('layouts.cookie_consent')
@endif --}}
</html>
