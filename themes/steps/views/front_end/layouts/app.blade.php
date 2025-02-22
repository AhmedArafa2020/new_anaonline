<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="base-url" content="{{ URL::to('/') }}">

    <meta name="author" content="Steps -  Shoes Store & Fashion.">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
    <title>@yield('page-title') </title>
    {!! metaKeywordSetting($metakeyword ?? '',$metadesc ?? '',$metaimage ?? '',$slug) !!}

    <link rel="shortcut icon"
        href="{{ get_file((isset($theme_favicon) && !empty($theme_favicon)) ? $theme_favicon : 'themes/' . $currentTheme  . '/assets/images/Favicon.png', $currentTheme) }}" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    @if ($currantLang == 'ar' || $currantLang == 'he')
        <link rel="stylesheet" href="{{ asset('themes/' . $currentTheme . '/assets/css/rtl-main-style.css') }}">
        <link rel="stylesheet" href="{{ asset('themes/' . $currentTheme . '/assets/css/rtl-responsive.css') }}">
        <link rel="stylesheet" href="{{ asset('css/rtl-custom.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/rtl-customizer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/rtl-floating-wpp.min.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('themes/' . $currentTheme . '/assets/css/main-style.css') }}">
        <link rel="stylesheet" href="{{ asset('themes/' . $currentTheme . '/assets/css/responsive.css') }}">
        <link rel="stylesheet" href="{{ asset('public/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/css/customizer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/floating-wpp.min.css') }}">

    @endif
    <link rel="stylesheet" href="{{ asset('themes/' . $currentTheme . '/assets/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/' . $currentTheme . '/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/fonts/tabler-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/notifier.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/fonts/fontawesome.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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


<body>
    <svg style="display: none;">
        <symbol viewBox="0 0 129 129" id="wish">
            <path
                d="m121.6,40.1c-3.3-16.6-15.1-27.3-30.3-27.3-8.5,0-17.7,3.5-26.7,10.1-9.1-6.8-18.3-10.3-26.9-10.3-15.2,0-27.1,10.8-30.3,27.6-4.8,24.9 10.6,58 55.7,76 0.5,0.2 1,0.3 1.5,0.3 0.5,0 1-0.1 1.5-0.3 45-18.4 60.3-51.4 55.5-76.1zm-57,67.9c-39.6-16.4-53.3-45-49.2-66.3 2.4-12.7 11.2-21 22.3-21 7.5,0 15.9,3.6 24.3,10.5 1.5,1.2 3.6,1.2 5.1,0 8.4-6.7 16.7-10.2 24.2-10.2 11.1,0 19.8,8.1 22.3,20.7 4.1,21.1-9.5,49.6-49,66.3z">
            </path>
        </symbol>
        <symbol viewBox="0 0 10 5" id="slickarrow">
            <path
                d="M2.37755e-08 2.57132C-3.38931e-06 2.7911 0.178166 2.96928 0.397953 2.96928L8.17233 2.9694L7.23718 3.87785C7.07954 4.031 7.07589 4.28295 7.22903 4.44059C7.38218 4.59824 7.63413 4.60189 7.79177 4.44874L9.43039 2.85691C9.50753 2.78197 9.55105 2.679 9.55105 2.57146C9.55105 2.46392 9.50753 2.36095 9.43039 2.28602L7.79177 0.69418C7.63413 0.541034 7.38218 0.544682 7.22903 0.702329C7.07589 0.859976 7.07954 1.11192 7.23718 1.26507L8.1723 2.17349L0.397965 2.17336C0.178179 2.17336 3.46059e-06 2.35153 2.37755e-08 2.57132Z">
            </path>
        </symbol>
    </svg>
   
    {{-- main content --}}
    <div class="wrapper">
    @if(isset($pixelScript))
        @foreach ($pixelScript as $script)
            <?= $script ?>
        @endforeach
    @endif
        @yield('content')

    </div>


    <script src="{{ asset('public/assets/js/plugins/notifier.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}" defer="defer"></script>

    <!--scripts start here-->
    <script src="{{ asset('themes/' . $currentTheme . '/assets/js/jquery.slim.min.js') }}"></script>
    <script src="{{ asset('themes/' . $currentTheme . '/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('themes/' . $currentTheme . '/assets/js/slick.min.js') }}" defer="defer"></script>
    @if($currantLang == 'ar' || $currantLang == 'he')
    <script src="{{ asset('themes/' . $currentTheme . '/assets/js/rtl-custom.js') }}" defer="defer"></script>
    @else
    <script src="{{ asset('themes/' . $currentTheme . '/assets/js/custom.js') }}" defer="defer"></script>
    @endif
    <script src="{{ asset('themes/' . $currentTheme . '/assets/js/slick-lightbox.js') }}" defer="defer"></script>
    <script src="{{ asset('assets/js/floating-wpp.min.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ asset('public/assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/assets/js/plugins/feather.min.js') }}"></script>
     <!--Theme Routes Script-->
     @include('front_end.jQueryRoute')
    @stack('page-script')
</body>

</html>







































