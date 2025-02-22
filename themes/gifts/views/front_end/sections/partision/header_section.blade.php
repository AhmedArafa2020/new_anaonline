<!-- ------- NAVIGATION-SECTION-START ------- -->
<header class="site-header header-style-one"
    style="@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif"
    data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}"
    data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"
    data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
    <div class="announcebar">
        <div class="container">
            <div class="announce-row row align-items-center">
                <div class="annoucebar-left col-5 d-flex justify-content-end">
                    <p>
                        <img src="{{ asset('themes/' . $currentTheme . '/assets/img/icon.png') }}" alt="" class="svg">
                        <span id="{{ $section->header->section->title->slug ?? ''}}_preview">{!! $section->header->section->title->text ?? '' !!}</span>
                    </p>
                </div>
                <div class="announcebar-right col-4 d-flex justify-content-end">
                    <a href="tel:610403403">
                        <span id="{{ $section->header->section->support_title->slug ?? ''}}_preview">{!!
                            $section->header->section->support_title->text !!}</span>
                        <img src="{{ asset('themes/' . $currentTheme . '/assets/img/call_icon.png') }}" alt=""
                            class="svg">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="main-navigationbar">
        <div class="container">
            <div class="header-bottom display-align">
                <div class="logo-col">
                    <h1>
                        <a href="{{ route('landing_page', $slug) }}">
                            <img src="{{ get_file(((isset($theme_logo) && !empty($theme_logo)) ? $theme_logo : 'themes/' . $currentTheme . '/assets/images/logo.png'), $currentTheme) }}" alt="Logo">
                        </a>
                    </h1>
                </div>
                <div class="navigationbar-row d-flex align-items-center">
                    <div class="menu-right">
                        <div class="menu-items-col">
                            <div class="menu-right-one">
                                <ul class="main-nav">
                                    <li class="menu-lnk">
                                        <a href="{{ route('page.product-list', $slug) }}"> {{ __('Shop All') }} </a>
                                    </li>
                                    @if (!empty($topNavItems))
                                        @foreach ($topNavItems as $key => $nav)
                                            @if (!empty($nav->children[0]))
                                                <li class="menu-lnk has-item">
                                                    <a href="#">
                                                        @if ($nav->title == null)
                                                            {{ $nav->title }}
                                                        @else
                                                            {{ $nav->title }}
                                                        @endif
                                                    </a>
                                                    <div class="menu-dropdown">
                                                        <ul>
                                                            @foreach ($nav->children[0] as $childNav)
                                                                @if ($childNav->type == 'custom')
                                                                    <li><a href="{{ url($childNav->slug) }}" target="{{ $childNav->target }}">
                                                                        @if ($childNav->title == null)
                                                                            {{ $childNav->title }}
                                                                        @else
                                                                            {{ $childNav->title }}
                                                                        @endif
                                                                    </a></li>
                                                                @elseif($childNav->type == 'category')
                                                                    <li><a href="{{ url($slug.'/'.$childNav->slug) }}" target="{{ $childNav->target }}">
                                                                        @if ($childNav->title == null)
                                                                            {{ $childNav->title }}
                                                                        @else
                                                                            {{ $childNav->title }}
                                                                        @endif
                                                                    </a></li>
                                                                @else
                                                                    <li><a href="{{ url($slug.'/'.$childNav->slug) }}" target="{{ $childNav->target }}">
                                                                        @if ($childNav->title == null)
                                                                            {{ $childNav->title }}
                                                                        @else
                                                                            {{ $childNav->title }}
                                                                        @endif
                                                                    </a></li>
                                                                @endif
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </li>
                                            @else
                                                @if ($nav->type == 'custom')
                                                    <li class="">
                                                        <a href="{{ url($nav->slug) }}" target="{{ $nav->target }}">
                                                            @if ($nav->title == null)
                                                                {{ $nav->title }}
                                                            @else
                                                                {{ $nav->title }}
                                                            @endif
                                                        </a>
                                                    </li>
                                                @elseif($nav->type == 'category')
                                                    <li class="">
                                                        <a href="{{  url($slug.'/'.$nav->slug) }}" target="{{ $nav->target }}" target="{{ $nav->target }}">
                                                            @if ($nav->title == null)
                                                                {{ $nav->title }}
                                                            @else
                                                                {{ $nav->title }}
                                                            @endif
                                                        </a>
                                                    </li>
                                                @else
                                                    <li class="">
                                                        <a href="{{  url($slug.'/custom/'.$nav->slug) }}"
                                                            target="{{ $nav->target }}">
                                                            @if ($nav->title == null)
                                                                {{ $nav->title }}
                                                            @else
                                                                {{ $nav->title }}
                                                            @endif
                                                        </a>
                                                    </li>
                                                @endif
                                            @endif
                                        @endforeach
                                    @endif
                                    <li class="menu-lnk">
                                        <a href="#">
                                            {{ __('Pages') }}
                                        </a>

                                        <div class="menu-dropdown">
                                            <ul>
                                                @if(isset($pages))
                                                    @foreach ($pages as $page)
                                                    <li><a
                                                            href="{{ route('custom.page',[$slug, $page->page_slug]) }}">{{ ucFirst($page->name) }}</a>
                                                    </li>
                                                    @endforeach
                                                @endif
                                                <li><a href="{{route('page.faq',['storeSlug' => $slug])}}">{{__('FAQs')}}</a></li>
                                                <li><a href="{{route('page.blog',['storeSlug' => $slug])}}">{{__('Blog')}}</a></li>
                                                <li><a href="{{route('page.product-list',['storeSlug' => $slug])}}">{{__('Collection')}}</a></li>
                                                <li><a href="{{route('page.contact_us',['storeSlug' => $slug])}}">{{__('Contact')}}</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    @include('front_end.hooks.header_link')

                                    <li class="menu-lnk has-item lang-dropdown">
                                        <a href="#">
                                            <span class="drp-text">{{ Str::upper($currantLang) }}</span>

                                        </a>
                                        <div class="menu-dropdown">
                                            <ul>
                                                @foreach ($languages as $code => $language)
                                                <li><a href="{{ route('change.languagestore', [$code]) }}"
                                                        class="@if ($language == $currantLang) active-language text-primary @endif">{{  ucFirst($language) }}</a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="menu-right-two">
                                <ul class="menu-right d-flex justify-content-end ">
                                    <li class="search-header">
                                        <a href="javascript:;" class="search">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="9" height="9"
                                                viewBox="0 0 9 9" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M2.38419e-07 3.375C2.38419e-07 5.23896 1.51104 6.75 3.375 6.75C4.15424 6.75 4.87179 6.48592 5.44305 6.04237C5.46457 6.08789 5.49415 6.13055 5.5318 6.1682L8.2318 8.8682C8.40754 9.04393 8.69246 9.04393 8.8682 8.8682C9.04393 8.69246 9.04393 8.40754 8.8682 8.2318L6.1682 5.5318C6.13055 5.49415 6.08789 5.46457 6.04237 5.44305C6.48592 4.87179 6.75 4.15424 6.75 3.375C6.75 1.51104 5.23896 0 3.375 0C1.51104 0 2.38419e-07 1.51104 2.38419e-07 3.375ZM0.9 3.375C0.9 2.0081 2.0081 0.9 3.375 0.9C4.7419 0.9 5.85 2.0081 5.85 3.375C5.85 4.7419 4.7419 5.85 3.375 5.85C2.0081 5.85 0.9 4.7419 0.9 3.375Z"
                                                    fill="#0A062D" />
                                            </svg>
                                        </a>
                                    </li>
                                    @auth('customers')
                                    <li class="wishlist-header">
                                        <a href="javascript:;" title="wish" class="wish-header">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="8"
                                                viewBox="0 0 10 8" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M5.31473 1.76137C5.13885 1.92834 4.86115 1.92834 4.68527 1.76137L4.37055 1.46259C4.00217 1.11287 3.50452 0.899334 2.95455 0.899334C1.82487 0.899334 0.909091 1.80529 0.909091 2.92284C0.909091 3.99423 1.49536 4.87891 2.34171 5.6058C3.18878 6.33331 4.20155 6.8158 4.80666 7.06205C4.93318 7.11354 5.06682 7.11354 5.19334 7.06205C5.79845 6.8158 6.81122 6.33331 7.65829 5.6058C8.50464 4.87891 9.09091 3.99422 9.09091 2.92284C9.09091 1.80529 8.17513 0.899334 7.04545 0.899334C6.49548 0.899334 5.99783 1.11287 5.62946 1.46259L5.31473 1.76137ZM5 0.813705C4.46914 0.309733 3.74841 0 2.95455 0C1.3228 0 0 1.3086 0 2.92284C0 5.78643 3.16834 7.3678 4.46081 7.89376C4.80889 8.03541 5.19111 8.03541 5.53919 7.89376C6.83166 7.3678 10 5.78643 10 2.92284C10 1.3086 8.67721 0 7.04545 0C6.25159 0 5.53086 0.309733 5 0.813705Z"
                                                    fill="#0A062D" />
                                            </svg>
                                        </a>
                                    </li>
                                    @endauth

                                    @auth('customers')
                                    <li class="profile-menu menu-lnk has-item">

                                        <a href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="22"
                                                viewBox="0 0 16 22" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M13.3699 21.0448H4.60183C4.11758 21.0448 3.72502 20.6522 3.72502 20.168C3.72502 19.6837 4.11758 19.2912 4.60183 19.2912H13.3699C13.8542 19.2912 14.2468 18.8986 14.2468 18.4143V14.7756C14.2026 14.2836 13.9075 13.8492 13.4664 13.627C10.0296 12.2394 6.18853 12.2394 2.75176 13.627C2.31062 13.8492 2.01554 14.2836 1.9714 14.7756V20.168C1.9714 20.6522 1.57883 21.0448 1.09459 21.0448C0.610335 21.0448 0.217773 20.6522 0.217773 20.168V14.7756C0.256548 13.5653 0.986136 12.4845 2.09415 11.9961C5.95255 10.4369 10.2656 10.4369 14.124 11.9961C15.232 12.4845 15.9616 13.5653 16.0004 14.7756V18.4143C16.0004 19.8671 14.8227 21.0448 13.3699 21.0448ZM12.493 4.38406C12.493 1.96281 10.5302 0 8.10892 0C5.68767 0 3.72486 1.96281 3.72486 4.38406C3.72486 6.80531 5.68767 8.76812 8.10892 8.76812C10.5302 8.76812 12.493 6.80531 12.493 4.38406ZM10.7393 4.38483C10.7393 5.83758 9.56159 7.01526 8.10884 7.01526C6.6561 7.01526 5.47841 5.83758 5.47841 4.38483C5.47841 2.93208 6.6561 1.75439 8.10884 1.75439C9.56159 1.75439 10.7393 2.93208 10.7393 4.38483Z"
                                                    fill="#183A40" />
                                            </svg>
                                        </a>
                                        <div class="menu-dropdown">
                                            <ul>
                                                <li><a
                                                        href="{{ route('my-account.index', $slug) }}">{{ __('My Account') }}</a>
                                                </li>
                                                <li>
                                                    <form method="POST"
                                                        action="{{ route('customer.logout', $slug) }}"
                                                        id="form_logout">
                                                        <a href="#"
                                                            onclick="event.preventDefault(); this.closest('form').submit();"
                                                            class="dropdown-item">
                                                            {{-- <i class="ti ti-power"></i> --}}
                                                            @csrf
                                                            {{ __('Log Out') }}
                                                        </a>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    @include('front_end.hooks.header_button')
                                    @endauth

                                    @guest('customers')
                                        <li class="profile-header">
                                            <a href="{{ route('customer.login', $slug) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="22"
                                                    viewBox="0 0 16 22" fill="none">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M13.3699 21.0448H4.60183C4.11758 21.0448 3.72502 20.6522 3.72502 20.168C3.72502 19.6837 4.11758 19.2912 4.60183 19.2912H13.3699C13.8542 19.2912 14.2468 18.8986 14.2468 18.4143V14.7756C14.2026 14.2836 13.9075 13.8492 13.4664 13.627C10.0296 12.2394 6.18853 12.2394 2.75176 13.627C2.31062 13.8492 2.01554 14.2836 1.9714 14.7756V20.168C1.9714 20.6522 1.57883 21.0448 1.09459 21.0448C0.610335 21.0448 0.217773 20.6522 0.217773 20.168V14.7756C0.256548 13.5653 0.986136 12.4845 2.09415 11.9961C5.95255 10.4369 10.2656 10.4369 14.124 11.9961C15.232 12.4845 15.9616 13.5653 16.0004 14.7756V18.4143C16.0004 19.8671 14.8227 21.0448 13.3699 21.0448ZM12.493 4.38406C12.493 1.96281 10.5302 0 8.10892 0C5.68767 0 3.72486 1.96281 3.72486 4.38406C3.72486 6.80531 5.68767 8.76812 8.10892 8.76812C10.5302 8.76812 12.493 6.80531 12.493 4.38406ZM10.7393 4.38483C10.7393 5.83758 9.56159 7.01526 8.10884 7.01526C6.6561 7.01526 5.47841 5.83758 5.47841 4.38483C5.47841 2.93208 6.6561 1.75439 8.10884 1.75439C9.56159 1.75439 10.7393 2.93208 10.7393 4.38483Z"
                                                        fill="#183A40" />
                                                </svg>
                                                <span class="desk-only icon-lable">{{ __('Login') }}</span>
                                            </a>
                                        </li>
                                    @endguest

                                    <li class="cart-header ">
                                        <a href="javascript:;" class="btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="14"
                                                viewBox="0 0 17 14" fill="none">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M13.4504 8.90368H6.43855C5.48981 8.90395 4.67569 8.22782 4.50176 7.29517L3.58917 2.35144C3.53142 2.03558 3.25368 1.80784 2.93263 1.81308H1.40947C1.04687 1.81308 0.75293 1.51913 0.75293 1.15654C0.75293 0.793942 1.04687 0.5 1.40947 0.5H2.94577C3.8945 0.499732 4.70862 1.17586 4.88255 2.10852L5.79514 7.05225C5.85289 7.3681 6.13063 7.59584 6.45168 7.59061H13.4569C13.778 7.59584 14.0557 7.3681 14.1135 7.05225L14.9407 2.58779C14.9761 2.3943 14.923 2.19512 14.7958 2.04506C14.6686 1.89499 14.4808 1.80986 14.2842 1.81308H6.66177C6.29917 1.81308 6.00523 1.51913 6.00523 1.15654C6.00523 0.793942 6.29917 0.5 6.66177 0.5H14.2776C14.8633 0.499835 15.4187 0.760337 15.793 1.2108C16.1673 1.66126 16.3218 2.25494 16.2144 2.83071L15.3872 7.29517C15.2132 8.22782 14.3991 8.90395 13.4504 8.90368ZM9.28827 11.5304C9.28827 10.4426 8.40644 9.56081 7.31866 9.56081C6.95606 9.56081 6.66212 9.85475 6.66212 10.2173C6.66212 10.5799 6.95606 10.8739 7.31866 10.8739C7.68125 10.8739 7.97519 11.1678 7.97519 11.5304C7.97519 11.893 7.68125 12.187 7.31866 12.187C6.95606 12.187 6.66212 11.893 6.66212 11.5304C6.66212 11.1678 6.36818 10.8739 6.00558 10.8739C5.64299 10.8739 5.34904 11.1678 5.34904 11.5304C5.34904 12.6182 6.23087 13.5 7.31866 13.5C8.40644 13.5 9.28827 12.6182 9.28827 11.5304ZM13.2277 12.8432C13.2277 12.4806 12.9338 12.1867 12.5712 12.1867C12.2086 12.1867 11.9146 11.8928 11.9146 11.5302C11.9146 11.1676 12.2086 10.8736 12.5712 10.8736C12.9338 10.8736 13.2277 11.1676 13.2277 11.5302C13.2277 11.8928 13.5217 12.1867 13.8843 12.1867C14.2468 12.1867 14.5408 11.8928 14.5408 11.5302C14.5408 10.4424 13.659 9.56055 12.5712 9.56055C11.4834 9.56055 10.6016 10.4424 10.6016 11.5302C10.6016 12.6179 11.4834 13.4998 12.5712 13.4998C12.9338 13.4998 13.2277 13.2058 13.2277 12.8432Z"
                                                    fill="#0A062D"></path>
                                            </svg>
                                            {{ __('Cart') }}: <span class="desk-only icon-lable" id="sub_total_main_page">
                                                {{ 0 }}</span>
                                            <div class="cart-badge">
                                                <span class="count">{!! \App\Models\Cart::CartCount($slug) !!} </span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="mobile-menu mobile-only">
                                <button class="mobile-menu-button" id="menu">
                                    <div class="one"></div>
                                    <div class="two"></div>
                                    <div class="three"></div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--header end here-->
</header>