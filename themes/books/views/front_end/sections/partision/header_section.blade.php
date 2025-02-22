<header class="site-header header-style-one"
    style="@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif"
    data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}"
    data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"
    data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
    <div class="announcebar">
        <div class="container">
            <div class="announce-row row align-items-center">
                <div class="annoucebar-left col-6 d-flex align-items-center">
                    <p id="{{ $section->header->section->title->slug ?? '' }}_preview">{!!
                        $section->header->section->title->text ?? '' !!}
                    </p>
                    <b><a id="{{ $section->header->section->button->slug ?? '' }}_preview">{!!
                        $section->header->section->button->text ?? '' !!}
                    </a></b>
                </div>
                <div class="announcebar-right col-6 d-flex justify-content-end">
                    <ul>
                        @foreach ($pages as $page)
                        @if ($page->page_status == 'custom_page')
                        <li class="menu-lnk"><a
                                href="{{ route('custom.page', [$slug,$page->page_slug]) }}">{{ $page->name }}</a></li>
                        @else
                        @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="main-navigationbar">
        <div class="container">
            <div class="navigationbar-row d-flex align-items-center right-side-header">
                <div class="logo-col">
                    <h1>
                        <a href="{{ route('landing_page', $slug) }}">
                        <img src="{{ get_file(((isset($theme_logo) && !empty($theme_logo)) ? $theme_logo : 'themes/' . $currentTheme . '/assets/images/logo.png'), $currentTheme) }}"
                                    alt="Logo">
                        </a>
                    </h1>
                </div>
                <div class="menu-items-col">
                    <ul class="main-nav nav-desk-only">
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
                            <a href="#" class="category-btn">
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
                    </ul>
                    <ul class="menu-right d-flex justify-content-end align-items-center">
                        <li class="search-header">
                            <a href="javascript:;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="14" viewBox="0 0 15 14"
                                    fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M10.2122 11.3214C9.14028 12.1539 7.79329 12.6497 6.33041 12.6497C2.83422 12.6497 0 9.81797 0 6.32485C0 2.83173 2.83422 0 6.33041 0C9.82659 0 12.6608 2.83173 12.6608 6.32485C12.6608 7.78645 12.1646 9.13226 11.3313 10.2033L13.78 12.6496C14.089 12.9583 14.089 13.4589 13.78 13.7677C13.4709 14.0764 12.9699 14.0764 12.6609 13.7677L10.2122 11.3214ZM11.0782 6.32485C11.0782 8.94469 8.95255 11.0685 6.33041 11.0685C3.70827 11.0685 1.5826 8.94469 1.5826 6.32485C1.5826 3.70501 3.70827 1.58121 6.33041 1.58121C8.95255 1.58121 11.0782 3.70501 11.0782 6.32485Z"
                                        fill="black" />
                                </svg>
                            </a>
                        </li>
                        @guest('customers')
                        <li class="profile-header">
                            {{-- <li class="menu-lnk has-item"> --}}
                            <a href="{{ route('customer.login', $slug) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="18" viewBox="0 0 15 18"
                                    fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7.5 9.81818C4.27834 9.81818 1.66667 12.3824 1.66667 15.5455V17.1818C1.66667 17.6337 1.29357 18 0.833333 18C0.373096 18 0 17.6337 0 17.1818V15.5455C0 11.4786 3.35786 8.18182 7.5 8.18182C11.6421 8.18182 15 11.4786 15 15.5455V17.1818C15 17.6337 14.6269 18 14.1667 18C13.7064 18 13.3333 17.6337 13.3333 17.1818V15.5455C13.3333 12.3824 10.7217 9.81818 7.5 9.81818Z"
                                        fill="#1D1D1B" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M7.5 8.18182C9.34095 8.18182 10.8333 6.71657 10.8333 4.90909C10.8333 3.10161 9.34095 1.63636 7.5 1.63636C5.65905 1.63636 4.16667 3.10161 4.16667 4.90909C4.16667 6.71657 5.65905 8.18182 7.5 8.18182ZM7.5 9.81818C10.2614 9.81818 12.5 7.62031 12.5 4.90909C12.5 2.19787 10.2614 0 7.5 0C4.73858 0 2.5 2.19787 2.5 4.90909C2.5 7.62031 4.73858 9.81818 7.5 9.81818Z"
                                        fill="#1D1D1B" />
                                </svg>
                            </a>
                        </li>
                        @endguest

                        @auth('customers')
                        <ul class="main-nav nav-desk-only profile-header">
                            <li class="menu-lnk has-item">
                                <a href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="18" viewBox="0 0 15 18"
                                        fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7.5 9.81818C4.27834 9.81818 1.66667 12.3824 1.66667 15.5455V17.1818C1.66667 17.6337 1.29357 18 0.833333 18C0.373096 18 0 17.6337 0 17.1818V15.5455C0 11.4786 3.35786 8.18182 7.5 8.18182C11.6421 8.18182 15 11.4786 15 15.5455V17.1818C15 17.6337 14.6269 18 14.1667 18C13.7064 18 13.3333 17.6337 13.3333 17.1818V15.5455C13.3333 12.3824 10.7217 9.81818 7.5 9.81818Z"
                                            fill="#1D1D1B" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7.5 8.18182C9.34095 8.18182 10.8333 6.71657 10.8333 4.90909C10.8333 3.10161 9.34095 1.63636 7.5 1.63636C5.65905 1.63636 4.16667 3.10161 4.16667 4.90909C4.16667 6.71657 5.65905 8.18182 7.5 8.18182ZM7.5 9.81818C10.2614 9.81818 12.5 7.62031 12.5 4.90909C12.5 2.19787 10.2614 0 7.5 0C4.73858 0 2.5 2.19787 2.5 4.90909C2.5 7.62031 4.73858 9.81818 7.5 9.81818Z"
                                            fill="#1D1D1B" />
                                    </svg>
                                </a>
                                <div class="menu-dropdown">
                                    <ul>
                                        <li><a href="{{ route('my-account.index', $slug) }}">{{ __('My Account') }}</a>
                                        </li>
                                        <li>
                                            <form method="POST" action="{{ route('customer.logout', $slug) }}"
                                                id="form_logout">
                                                @csrf
                                                <a href="{{ route('customer.logout', $slug) }}"
                                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                                    style="background-color: transparent; width: auto;">{{ __('Log Out') }}
                                                </a>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                        @endauth
                       
                        @auth('customers')
                        <li class="header-wishlist wish-header">
                            <a href="javascript:;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" viewBox="0 0 20 16"
                                    fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M10.6295 3.52275C10.2777 3.85668 9.7223 3.85668 9.37055 3.52275L8.74109 2.92517C8.00434 2.22574 7.00903 1.79867 5.90909 1.79867C3.64974 1.79867 1.81818 3.61057 1.81818 5.84567C1.81818 7.98845 2.99071 9.75782 4.68342 11.2116C6.37756 12.6666 8.40309 13.6316 9.61331 14.1241C9.86636 14.2271 10.1336 14.2271 10.3867 14.1241C11.5969 13.6316 13.6224 12.6666 15.3166 11.2116C17.0093 9.75782 18.1818 7.98845 18.1818 5.84567C18.1818 3.61057 16.3503 1.79867 14.0909 1.79867C12.991 1.79867 11.9957 2.22574 11.2589 2.92517L10.6295 3.52275ZM10 1.62741C8.93828 0.619465 7.49681 0 5.90909 0C2.64559 0 0 2.6172 0 5.84567C0 11.5729 6.33668 14.7356 8.92163 15.7875C9.61779 16.0708 10.3822 16.0708 11.0784 15.7875C13.6633 14.7356 20 11.5729 20 5.84567C20 2.6172 17.3544 0 14.0909 0C12.5032 0 11.0617 0.619465 10 1.62741Z"
                                        fill="#051512"></path>
                                </svg>
                                <span class="count">{!! \App\Models\Wishlist::WishCount($currentTheme) !!}</span>
                            </a>
                        </li>
                        @include('front_end.hooks.header_button')
                        @endauth
                        <li class="cart-header-bg">
                            <div class="cart-header-main">
                                <div class="cart-header">
                                    <a href="javascript:;">
                                        <span class="header-desk-only icon-lable"> <b>My Cart:</b><br><b
                                                id="sub_total_main_page"> {{ 0 }}</b>
                                            {{ $currency }}</span>
                                        <span class="count">{!! \App\Models\Cart::CartCount($slug) !!}</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17"
                                            viewBox="0 0 19 17" fill="#1D1D1B">`
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M15.5698 10.627H6.97178C5.80842 10.6273 4.81015 9.79822 4.59686 8.65459L3.47784 2.59252C3.40702 2.20522 3.06646 1.92595 2.67278 1.93238H0.805055C0.360435 1.93238 0 1.57194 0 1.12732C0 0.682701 0.360435 0.322266 0.805055 0.322266H2.68888C3.85224 0.321937 4.85051 1.15101 5.0638 2.29465L6.18282 8.35672C6.25364 8.74402 6.5942 9.02328 6.98788 9.01686H15.5778C15.9715 9.02328 16.3121 8.74402 16.3829 8.35672L17.3972 2.88234C17.4407 2.64509 17.3755 2.40085 17.2195 2.21684C17.0636 2.03283 16.8334 1.92843 16.5922 1.93238H7.2455C6.80088 1.93238 6.44044 1.57194 6.44044 1.12732C6.44044 0.682701 6.80088 0.322266 7.2455 0.322266H16.5841C17.3023 0.322063 17.9833 0.641494 18.4423 1.19385C18.9013 1.74622 19.0907 2.4742 18.959 3.18021L17.9447 8.65459C17.7314 9.79822 16.7331 10.6273 15.5698 10.627ZM10.466 13.8478C10.466 12.5139 9.38464 11.4326 8.05079 11.4326C7.60617 11.4326 7.24573 11.7931 7.24573 12.2377C7.24573 12.6823 7.60617 13.0427 8.05079 13.0427C8.49541 13.0427 8.85584 13.4032 8.85584 13.8478C8.85584 14.2924 8.49541 14.6528 8.05079 14.6528C7.60617 14.6528 7.24573 14.2924 7.24573 13.8478C7.24573 13.4032 6.88529 13.0427 6.44068 13.0427C5.99606 13.0427 5.63562 13.4032 5.63562 13.8478C5.63562 15.1816 6.71693 16.2629 8.05079 16.2629C9.38464 16.2629 10.466 15.1816 10.466 13.8478ZM15.2963 15.4579C15.2963 15.0133 14.9358 14.6528 14.4912 14.6528C14.0466 14.6528 13.6862 14.2924 13.6862 13.8478C13.6862 13.4032 14.0466 13.0427 14.4912 13.0427C14.9358 13.0427 15.2963 13.4032 15.2963 13.8478C15.2963 14.2924 15.6567 14.6528 16.1013 14.6528C16.5459 14.6528 16.9064 14.2924 16.9064 13.8478C16.9064 12.5139 15.8251 11.4326 14.4912 11.4326C13.1574 11.4326 12.076 12.5139 12.076 13.8478C12.076 15.1816 13.1574 16.2629 14.4912 16.2629C14.9358 16.2629 15.2963 15.9025 15.2963 15.4579Z"
                                                fill="#1D1D1B">
                                            </path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </li>
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
                    </ul>
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
</header>