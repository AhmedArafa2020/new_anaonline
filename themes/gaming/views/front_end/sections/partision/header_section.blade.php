<!--header start here-->
@if (\Request::route()->getName() == 'landing_page' || \Request::route()->getName() == 'page.product')
<header class="site-header header-style-one inner-header trans-header"
    style="@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif"
    data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}"
    data-hide="{{ $option->is_hide  ?? '' }}" data-section="{{ $option->section_name  ?? '' }}"
    data-store="{{ $option->store_id  ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
    @else
    <header class="site-header header-style-one inner-header"
        style="@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif"
        data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}"
        data-value="{{ $option->id ?? '' }}" data-hide="{{ $option->is_hide  ?? '' }}"
        data-section="{{ $option->section_name  ?? '' }}" data-store="{{ $option->store_id  ?? '' }}"
        data-theme="{{ $option->theme_id ?? '' }}">
        <div class="custome_tool_bar"></div>
        @endif
        <div class="main-navigationbar">
            <div class="container">
                <div class="navigationbar-row d-flex align-items-center">
                    <div class="menu-items-col right-side-header">
                        <div class="logo-col mobile-only">
                            <h1>
                                <a href="{{ route('landing_page', $slug) }}">
                                <img src="{{ get_file(((isset($theme_logo) && !empty($theme_logo)) ? $theme_logo : 'themes/' . $currentTheme . '/assets/images/logo.png'), $currentTheme) }}"
                                    alt="Logo">
                                </a>
                            </h1>
                        </div>
                        <ul class="main-nav">
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
                            <li class="menu-lnk has-item">
                                <a href="javascript:void()">
                                    {{__('Pages')}}
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
                        </ul>
                        <div class="logo-col">
                            <h1>
                                <a href="{{ route('landing_page', $slug) }}">
                                <img src="{{ get_file(((isset($theme_logo) && !empty($theme_logo)) ? $theme_logo : 'themes/' . $currentTheme . '/assets/images/logo.png'), $currentTheme) }}"
                                    alt="Logo">
                                </a>
                            </h1>
                        </div>
                        <ul class="menu-right">
                            @auth('customers')
                            <li class="profile-menu">
                                <ul class="main-nav">
                                    <li class="menu-lnk has-item">
                                        <a href="#">
                                            <span>{{ __('My profile') }}</span>
                                        </a>
                                        <div class="menu-dropdown ">
                                            <ul>
                                                <li>
                                                    <a
                                                        href="{{ route('my-account.index', $slug) }}">{{ __('My Account') }}</a>
                                                </li>
                                                <li>
                                                    <form method="POST" action="{{ route('customer.logout',$slug) }}"
                                                        id="form_logout">
                                                        @csrf
                                                        <a href="#"
                                                            onclick="event.preventDefault(); this.closest('form').submit();"
                                                            class="dropdown-item">
                                                            {{ __('Log Out') }}
                                                        </a>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            @include('front_end.hooks.header_button')
                            @endauth
                            <li class="menu-lnk has-item lang-dropdown">
                                <a href="#">
                                    <span class="link-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" width="24px">
                                            <path
                                                d="M160 243.1L147.2 272h25.69L160 243.1zM576 63.1L336 64v384l240 0c35.35 0 64-28.65 64-64v-256C640 92.65 611.3 63.1 576 63.1zM552 232h-1.463c-8.082 27.78-21.06 49.29-35.06 66.34c7.854 4.943 13.33 7.324 13.46 7.375c12.22 5 18.19 18.94 13.28 31.19C538.4 346.3 529.5 352 519.1 352c-2.906 0-5.875-.5313-8.75-1.672c-1-.3906-14.33-5.951-31.26-18.19c-16.69 12.04-29.9 17.68-31.18 18.19C445.9 351.5 442.9 352 440 352c-9.562 0-18.59-5.766-22.34-15.2c-4.844-12.3 1.188-26.19 13.44-31.08c.748-.3047 6.037-2.723 13.25-7.189c-3.375-4.123-6.742-8.324-9.938-13.03c-7.469-10.97-4.594-25.89 6.344-33.34c11.03-7.453 25.91-4.594 33.34 6.375c1.883 2.77 3.881 5.186 5.854 7.682C487.3 256.8 494.1 245.5 499.5 232H408C394.8 232 384 221.3 384 208S394.8 184 408 184h48c0-13.25 10.75-24 24-24S504 170.8 504 184h48c13.25 0 24 10.75 24 24S565.3 232 552 232zM0 127.1v256c0 35.35 28.65 64 64 64L304 448V64L64 63.1C28.65 63.1 0 92.65 0 127.1zM74.06 318.3l64-144c7.688-17.34 36.19-17.34 43.88 0l64 144c5.375 12.11-.0625 26.3-12.19 31.69C230.6 351.3 227.3 352 224 352c-9.188 0-17.97-5.312-21.94-14.25L193.1 319.6C193.3 319.7 192.7 320 192 320H128c-.707 0-1.305-.3418-1.996-.4023l-8.066 18.15c-5.406 12.14-19.69 17.55-31.69 12.19C74.13 344.5 68.69 330.4 74.06 318.3z"
                                                fill="#FEBD2F" />
                                        </svg>
                                    </span>
                                    <span class="drp-text">{{ Str::upper($currantLang) }}</span>
                                    <div class="lang-icn">

                                    </div>
                                </a>
                                <div class="menu-dropdown">
                                    <ul>
                                        @foreach ($languages as $code => $language)
                                        <li><a href="{{ route('change.languagestore', [$code]) }}"
                                                class="@if ($language == $currantLang) active-language text-primary @endif">{{ ucFirst($language) }}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                            @guest('customers')
                            <li class="profile-header">
                                <a href="{{ route('customer.login', $slug) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13"
                                        fill="white">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M6.5 7.04159C4.40592 7.04159 2.70833 8.73917 2.70833 10.8333V11.9166C2.70833 12.2157 2.46582 12.4583 2.16667 12.4583C1.86751 12.4583 1.625 12.2157 1.625 11.9166V10.8333C1.625 8.14086 3.80761 5.95825 6.5 5.95825C9.19239 5.95825 11.375 8.14086 11.375 10.8333V11.9166C11.375 12.2157 11.1325 12.4583 10.8333 12.4583C10.5342 12.4583 10.2917 12.2157 10.2917 11.9166V10.8333C10.2917 8.73917 8.59408 7.04159 6.5 7.04159Z"
                                            fill="white" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M6.5 5.95841C7.69662 5.95841 8.66667 4.98837 8.66667 3.79175C8.66667 2.59513 7.69662 1.62508 6.5 1.62508C5.30338 1.62508 4.33333 2.59513 4.33333 3.79175C4.33333 4.98837 5.30338 5.95841 6.5 5.95841ZM6.5 7.04175C8.29493 7.04175 9.75 5.58667 9.75 3.79175C9.75 1.99682 8.29493 0.541748 6.5 0.541748C4.70507 0.541748 3.25 1.99682 3.25 3.79175C3.25 5.58667 4.70507 7.04175 6.5 7.04175Z"
                                            fill="white" />
                                    </svg>
                                </a>
                            </li>
                            @endguest

                            @auth('customers')
                            <li class="whislist-header">
                                <a href="javascript:;" title="wish" class="wish-header">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 20 16"
                                        fill="white">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M10.6295 3.52275C10.2777 3.85668 9.7223 3.85668 9.37055 3.52275L8.74109 2.92517C8.00434 2.22574 7.00903 1.79867 5.90909 1.79867C3.64974 1.79867 1.81818 3.61057 1.81818 5.84567C1.81818 7.98845 2.99071 9.75782 4.68342 11.2116C6.37756 12.6666 8.40309 13.6316 9.61331 14.1241C9.86636 14.2271 10.1336 14.2271 10.3867 14.1241C11.5969 13.6316 13.6224 12.6666 15.3166 11.2116C17.0093 9.75782 18.1818 7.98845 18.1818 5.84567C18.1818 3.61057 16.3503 1.79867 14.0909 1.79867C12.991 1.79867 11.9957 2.22574 11.2589 2.92517L10.6295 3.52275ZM10 1.62741C8.93828 0.619465 7.49681 0 5.90909 0C2.64559 0 0 2.6172 0 5.84567C0 11.5729 6.33668 14.7356 8.92163 15.7875C9.61779 16.0708 10.3822 16.0708 11.0784 15.7875C13.6633 14.7356 20 11.5729 20 5.84567C20 2.6172 17.3544 0 14.0909 0C12.5032 0 11.0617 0.619465 10 1.62741Z"
                                            fill="white"></path>
                                    </svg>
                                    <span class="count wishlist-counter">{!! \App\Models\Wishlist::WishCount($currentTheme)
                                        !!}</span>
                                </a>
                            </li>
                            @endauth

                            <li class="cart-header">
                                <a href="#">
                                    <span class="icon-label"><svg width="23  " height="23" viewBox="0 0 19 19" fill="white" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.91797 15.834C7.91797 17.1457 6.85465 18.209 5.54297 18.209C4.23129 18.209 3.16797 17.1457 3.16797 15.834C3.16797 14.5223 4.23129 13.459 5.54297 13.459C6.85465 13.459 7.91797 14.5223 7.91797 15.834ZM6.33464 15.834C6.33464 16.2712 5.98019 16.6257 5.54297 16.6257C5.10574 16.6257 4.7513 16.2712 4.7513 15.834C4.7513 15.3968 5.10574 15.0423 5.54297 15.0423C5.98019 15.0423 6.33464 15.3968 6.33464 15.834Z" fill="white"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.8346 15.834C15.8346 17.1457 14.7713 18.209 13.4596 18.209C12.148 18.209 11.0846 17.1457 11.0846 15.834C11.0846 14.5223 12.148 13.459 13.4596 13.459C14.7713 13.459 15.8346 14.5223 15.8346 15.834ZM14.2513 15.834C14.2513 16.2712 13.8969 16.6257 13.4596 16.6257C13.0224 16.6257 12.668 16.2712 12.668 15.834C12.668 15.3968 13.0224 15.0423 13.4596 15.0423C13.8969 15.0423 14.2513 15.3968 14.2513 15.834Z" fill="white"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M1.66578 2.01983C1.86132 1.62876 2.33685 1.47025 2.72792 1.66578L3.52236 2.06301C4.25803 2.43084 4.75101 3.15312 4.82547 3.97225L4.86335 4.38888C4.88188 4.59276 5.05283 4.74887 5.25756 4.74887H15.702C17.0838 4.74887 18.0403 6.12909 17.5551 7.42297L16.1671 11.1245C15.8195 12.0514 14.9333 12.6655 13.9433 12.6655H6.19479C4.96644 12.6655 3.94076 11.7289 3.82955 10.5056L3.24864 4.1156C3.22382 3.84255 3.05949 3.60179 2.81427 3.47918L2.01983 3.08196C1.62876 2.88643 1.47025 2.41089 1.66578 2.01983ZM5.47346 6.3322C5.2407 6.3322 5.05818 6.53207 5.07926 6.76388L5.40638 10.3622C5.44345 10.77 5.78534 11.0822 6.19479 11.0822H13.9433C14.2733 11.0822 14.5687 10.8775 14.6845 10.5685L16.0726 6.86702C16.1696 6.60825 15.9783 6.3322 15.702 6.3322H5.47346Z" fill="white"></path>
                            </svg></span>
                                    {{--<span class="cart_color">{{ $currency }}</span>

                                    <svg width="23  " height="23" viewBox="0 0 19 19" fill="white"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7.91797 15.834C7.91797 17.1457 6.85465 18.209 5.54297 18.209C4.23129 18.209 3.16797 17.1457 3.16797 15.834C3.16797 14.5223 4.23129 13.459 5.54297 13.459C6.85465 13.459 7.91797 14.5223 7.91797 15.834ZM6.33464 15.834C6.33464 16.2712 5.98019 16.6257 5.54297 16.6257C5.10574 16.6257 4.7513 16.2712 4.7513 15.834C4.7513 15.3968 5.10574 15.0423 5.54297 15.0423C5.98019 15.0423 6.33464 15.3968 6.33464 15.834Z"
                                            fill="white"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M15.8346 15.834C15.8346 17.1457 14.7713 18.209 13.4596 18.209C12.148 18.209 11.0846 17.1457 11.0846 15.834C11.0846 14.5223 12.148 13.459 13.4596 13.459C14.7713 13.459 15.8346 14.5223 15.8346 15.834ZM14.2513 15.834C14.2513 16.2712 13.8969 16.6257 13.4596 16.6257C13.0224 16.6257 12.668 16.2712 12.668 15.834C12.668 15.3968 13.0224 15.0423 13.4596 15.0423C13.8969 15.0423 14.2513 15.3968 14.2513 15.834Z"
                                            fill="white"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M1.66578 2.01983C1.86132 1.62876 2.33685 1.47025 2.72792 1.66578L3.52236 2.06301C4.25803 2.43084 4.75101 3.15312 4.82547 3.97225L4.86335 4.38888C4.88188 4.59276 5.05283 4.74887 5.25756 4.74887H15.702C17.0838 4.74887 18.0403 6.12909 17.5551 7.42297L16.1671 11.1245C15.8195 12.0514 14.9333 12.6655 13.9433 12.6655H6.19479C4.96644 12.6655 3.94076 11.7289 3.82955 10.5056L3.24864 4.1156C3.22382 3.84255 3.05949 3.60179 2.81427 3.47918L2.01983 3.08196C1.62876 2.88643 1.47025 2.41089 1.66578 2.01983ZM5.47346 6.3322C5.2407 6.3322 5.05818 6.53207 5.07926 6.76388L5.40638 10.3622C5.44345 10.77 5.78534 11.0822 6.19479 11.0822H13.9433C14.2733 11.0822 14.5687 10.8775 14.6845 10.5685L16.0726 6.86702C16.1696 6.60825 15.9783 6.3322 15.702 6.3322H5.47346Z"
                                            fill="white"></path>
                                    </svg>--}}
                                    <span class="count-1 count"> {!! \App\Models\Cart::CartCount($slug)
                                        !!}</span>
                                </a>
                            </li>
                            <div class="mobile-menu">
                                <button class="mobile-menu-button" id="menu">
                                    <div class="one"></div>
                                    <div class="two"></div>
                                    <div class="three"></div>
                                </button>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="announcebar">
            <div class="container">
                <div class="announce-row">
                    <div class="annoucebar-left">
                        <a href="{{ route('page.product-list', $slug) }}" id="{{ $section->header->section->title->slug ?? '' }}_preview"> {!!
                            $section->header->section->title->text ?? '' !!}
                        </a>
                    </div>
                    <div class="search-form-wrapper">
                        <form>
                            <div class="form-inputs">
                                <input type="search" placeholder="Search Product..." class="form-control search_input"
                                    list="products" name="search_product" id="product">
                                <datalist id="products">
                                    @foreach ($search_products as $product => $pros)
                                    <option value="{{$pros}}"></option>
                                    @endforeach
                                </datalist>
                                <input type="hidden" name="" id="" class="btn search_product_globaly">
                                <button type="submit" class="btn search_product_globaly">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 13 13"
                                        fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M9.47487 10.5039C8.48031 11.2764 7.23058 11.7363 5.87332 11.7363C2.62957 11.7363 0 9.10906 0 5.86816C0 2.62727 2.62957 0 5.87332 0C9.11706 0 11.7466 2.62727 11.7466 5.86816C11.7466 7.22423 11.2863 8.47286 10.5131 9.46655L12.785 11.7362C13.0717 12.0227 13.0717 12.4871 12.785 12.7736C12.4983 13.06 12.0334 13.06 11.7467 12.7736L9.47487 10.5039ZM10.2783 5.86816C10.2783 8.29884 8.30612 10.2693 5.87332 10.2693C3.44051 10.2693 1.46833 8.29884 1.46833 5.86816C1.46833 3.43749 3.44051 1.46704 5.87332 1.46704C8.30612 1.46704 10.2783 3.43749 10.2783 5.86816Z"
                                            fill="#C6C6C6" />
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="announcebar-right">
                        <a href="{{ route('page.product-list', $slug) }}" id="{{ $section->header->section->button->slug ?? '' }}_preview"> {!!
                            $section->header->section->button->text ?? '' !!}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--header end here-->
