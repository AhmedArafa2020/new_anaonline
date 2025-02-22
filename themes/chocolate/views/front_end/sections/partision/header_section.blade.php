<!--header start here-->
<header class="site-header header-style-one" style="@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif" data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}" data-hide="{{ $option->is_hide  ?? '' }}" data-section="{{ $option->section_name  ?? '' }}"  data-store="{{ $option->store_id  ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
    <div class="announcebar">
        <div class="container">
            <div class="announce-row row align-items-center">
                <div class="annoucebar-left col-6 d-flex">
                        <p id="{{ $section->header->section->title->slug ?? '' }}_preview">{!! $section->header->section->title->text ?? '' !!}</p>
                </div>
                <div class="announcebar-right col-6 d-flex justify-content-end">
                    <ul class="d-flex">
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
            <div class="navigationbar-row d-flex align-items-center">
                <div class="logo-col">
                    <h1>
                        <a href="{{ route('landing_page',$slug) }}">
                        <img src="{{ get_file(((isset($theme_logo) && !empty($theme_logo)) ? $theme_logo : 'themes/' . $currentTheme . '/assets/images/logo.png'), $currentTheme) }}"
                                    alt="Logo">
                        </a>
                    </h1>
                </div>
                <div class="menu-items-col right-side-header">
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

                        @auth('customers')
                            <li class="menu-lnk has-item">
                                <a href="#">
                                    <span class="menu-lnk">{{ __('My profile') }}</span>
                                </a>
                                <div class="menu-dropdown">
                                    <ul>
                                        <li><a href="{{ route('my-account.index',$slug) }}">{{ __('My Account') }}</a></li>
                                        @auth('customers')
                                    <li class="wishlist-header">
                                        <a href="javascript:;" title="wish" class="wish-header">
                                            <span class="desk-only icon-lable">{{ __('Wishlist') }}</span>
                                        </a>
                                    </li>
                                    @endauth    
                                        <li>
                                            <form method="POST" action="{{ route('customer.logout',$slug) }}" id="form_logout">
                                                <a href="#"
                                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                                    class="dropdown-item">
                                                    <i class=""></i>
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
                            <li class="menu-dropdown">
                                <a href="{{ route('customer.login',$slug) }}">

                                    <span class="">{{ __('Login') }}</span>
                                </a>
                            </li>

                        @endguest
                    </ul>
                    <ul class="menu-right d-flex  justify-content-end align-items-center">
                        <a href="tel:+00 544-213-615" class="phone-icons">
                            <svg height="22" viewBox="0 0 48 48" width="20" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13.25 21.59c2.88 5.66 7.51 10.29 13.18 13.17l4.4-4.41c.55-.55 1.34-.71 2.03-.49 2.24.74 4.65 1.14 7.14 1.14 1.11 0 2 .89 2 2v7c0 1.11-.89 2-2 2-18.78 0-34-15.22-34-34 0-1.11.9-2 2-2h7c1.11 0 2 .89 2 2 0 2.49.4 4.9 1.14 7.14.22.69.06 1.48-.49 2.03l-4.4 4.42z"
                                    fill="#fff"></path>
                            </svg>
                        </a>
                        <li class="profile-header">
                            <div class="profile-suport">
                                    <span id="{{ $section->header->section->support_title->slug ?? '' }}_preview">{!! $section->header->section->support_title->text ?? '' !!}</span>
                                    <a href="tel:{{ $section->header->section->support_value->text ?? '' }}">
                                        <span class="support-span" id="{{ $section->header->section->support_value->slug ?? '' }}_preview">{!! $section->header->section->support_value->text ?? '' !!}</span>
                                    </a>
                            </div>
                        </li>

                        <li class="cart-header">
                            <a href="javascript:;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="19" height="17"
                                    viewBox="0 0 19 17" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M15.5698 10.627H6.97178C5.80842 10.6273 4.81015 9.79822 4.59686 8.65459L3.47784 2.59252C3.40702 2.20522 3.06646 1.92595 2.67278 1.93238H0.805055C0.360435 1.93238 0 1.57194 0 1.12732C0 0.682701 0.360435 0.322266 0.805055 0.322266H2.68888C3.85224 0.321937 4.85051 1.15101 5.0638 2.29465L6.18282 8.35672C6.25364 8.74402 6.5942 9.02328 6.98788 9.01686H15.5778C15.9715 9.02328 16.3121 8.74402 16.3829 8.35672L17.3972 2.88234C17.4407 2.64509 17.3755 2.40085 17.2195 2.21684C17.0636 2.03283 16.8334 1.92843 16.5922 1.93238H7.2455C6.80088 1.93238 6.44044 1.57194 6.44044 1.12732C6.44044 0.682701 6.80088 0.322266 7.2455 0.322266H16.5841C17.3023 0.322063 17.9833 0.641494 18.4423 1.19385C18.9013 1.74622 19.0907 2.4742 18.959 3.18021L17.9447 8.65459C17.7314 9.79822 16.7331 10.6273 15.5698 10.627ZM10.466 13.8478C10.466 12.5139 9.38464 11.4326 8.05079 11.4326C7.60617 11.4326 7.24573 11.7931 7.24573 12.2377C7.24573 12.6823 7.60617 13.0427 8.05079 13.0427C8.49541 13.0427 8.85584 13.4032 8.85584 13.8478C8.85584 14.2924 8.49541 14.6528 8.05079 14.6528C7.60617 14.6528 7.24573 14.2924 7.24573 13.8478C7.24573 13.4032 6.88529 13.0427 6.44068 13.0427C5.99606 13.0427 5.63562 13.4032 5.63562 13.8478C5.63562 15.1816 6.71693 16.2629 8.05079 16.2629C9.38464 16.2629 10.466 15.1816 10.466 13.8478ZM15.2963 15.4579C15.2963 15.0133 14.9358 14.6528 14.4912 14.6528C14.0466 14.6528 13.6862 14.2924 13.6862 13.8478C13.6862 13.4032 14.0466 13.0427 14.4912 13.0427C14.9358 13.0427 15.2963 13.4032 15.2963 13.8478C15.2963 14.2924 15.6567 14.6528 16.1013 14.6528C16.5459 14.6528 16.9064 14.2924 16.9064 13.8478C16.9064 12.5139 15.8251 11.4326 14.4912 11.4326C13.1574 11.4326 12.076 12.5139 12.076 13.8478C12.076 15.1816 13.1574 16.2629 14.4912 16.2629C14.9358 16.2629 15.2963 15.9025 15.2963 15.4579Z"
                                        fill="white" />
                                </svg>
                                <span>  {{ $currency ?? '' }}
                                   <span  id="sub_total_main_page">{{ 0 }}</span>
                                </span>
                                <svg class="bottom-icons-header" xmlns="http://www.w3.org/2000/svg" width="12"
                                    height="10" viewBox="0 0 8 5" fill="none">
                                    <path d="M1 1L4 4L7 1" stroke="white" stroke-width="1" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg>
                            </a>
                        </li>
                        <li class="menu-lnk has-item lang-dropdown">
                            <a href="#">
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
</header>
