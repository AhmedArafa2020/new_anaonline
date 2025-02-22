<header class="site-header header-style-one" style="@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif" data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}" data-hide="{{ $option->is_hide  ?? '' }}" data-section="{{ $option->section_name  ?? '' }}"  data-store="{{ $option->store_id  ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
    <div class="main-navigationbar">
        <div class="container">
            <div class="navigationbar-row d-flex justify-content-between align-items-center">
                <div class="logo-col">
                    <h1>
                        <a href="{{route('landing_page',$slug)}}">
                        <img src="{{ get_file(((isset($theme_logo) && !empty($theme_logo)) ? $theme_logo : 'themes/' . $currentTheme . '/assets/images/logo.png'), $currentTheme) }}"
                                    alt="Logo">
                        </a>
                    </h1>
                </div>
                <div class="menu-items-col right-side-header">
                    <div class="search-form-wrapper-header desk-only">
                        <form>
                            <div class="form-inputs">
                                <input type="search" placeholder="Search Product..." class="form-control search_input" list="products" name="search_product" id="product">
                                <datalist id="products">
                                @foreach ($search_products as $pro_id => $pros)
                                    <option value="{{$pros}}"></option>
                                @endforeach
                                </datalist>
                                <button type="submit"  class="btn search_product_globaly">
                                    <svg>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M0.000169754 6.99457C0.000169754 10.8576 3.13174 13.9891 6.99473 13.9891C8.60967 13.9891 10.0968 13.4418 11.2807 12.5226C11.3253 12.6169 11.3866 12.7053 11.4646 12.7834L17.0603 18.379C17.4245 18.7432 18.015 18.7432 18.3792 18.379C18.7434 18.0148 18.7434 17.4243 18.3792 17.0601L12.7835 11.4645C12.7055 11.3864 12.6171 11.3251 12.5228 11.2805C13.442 10.0966 13.9893 8.60951 13.9893 6.99457C13.9893 3.13157 10.8577 0 6.99473 0C3.13174 0 0.000169754 3.13157 0.000169754 6.99457ZM1.86539 6.99457C1.86539 4.1617 4.16187 1.86522 6.99473 1.86522C9.8276 1.86522 12.1241 4.1617 12.1241 6.99457C12.1241 9.82743 9.8276 12.1239 6.99473 12.1239C4.16187 12.1239 1.86539 9.82743 1.86539 6.99457Z">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="search-header mobile-only">
                        <a href="javascript:;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.000169754 6.99457C0.000169754 10.8576 3.13174 13.9891 6.99473 13.9891C8.60967 13.9891 10.0968 13.4418 11.2807 12.5226C11.3253 12.6169 11.3866 12.7053 11.4646 12.7834L17.0603 18.379C17.4245 18.7432 18.015 18.7432 18.3792 18.379C18.7434 18.0148 18.7434 17.4243 18.3792 17.0601L12.7835 11.4645C12.7055 11.3864 12.6171 11.3251 12.5228 11.2805C13.442 10.0966 13.9893 8.60951 13.9893 6.99457C13.9893 3.13157 10.8577 0 6.99473 0C3.13174 0 0.000169754 3.13157 0.000169754 6.99457ZM1.86539 6.99457C1.86539 4.1617 4.16187 1.86522 6.99473 1.86522C9.8276 1.86522 12.1241 4.1617 12.1241 6.99457C12.1241 9.82743 9.8276 12.1239 6.99473 12.1239C4.16187 12.1239 1.86539 9.82743 1.86539 6.99457Z" fill="#ffffff"></path>
                            </svg>
                        </a>
                    </div>
                    <div class="menu-item-right">
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
                        <ul class="menu-right d-flex align-items-center justify-content-end ">
                            @auth('customers')
                            <ul class="main-nav">
                                <li class="menu-lnk has-item">
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="18"
                                            viewBox="0 0 15 18" fill="none" >
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M7.5 9.81818C4.27834 9.81818 1.66667 12.3824 1.66667 15.5455V17.1818C1.66667 17.6337 1.29357 18 0.833333 18C0.373096 18 0 17.6337 0 17.1818V15.5455C0 11.4786 3.35786 8.18182 7.5 8.18182C11.6421 8.18182 15 11.4786 15 15.5455V17.1818C15 17.6337 14.6269 18 14.1667 18C13.7064 18 13.3333 17.6337 13.3333 17.1818V15.5455C13.3333 12.3824 10.7217 9.81818 7.5 9.81818Z"
                                                fill="white" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M7.5 8.18182C9.34095 8.18182 10.8333 6.71657 10.8333 4.90909C10.8333 3.10161 9.34095 1.63636 7.5 1.63636C5.65905 1.63636 4.16667 3.10161 4.16667 4.90909C4.16667 6.71657 5.65905 8.18182 7.5 8.18182ZM7.5 9.81818C10.2614 9.81818 12.5 7.62031 12.5 4.90909C12.5 2.19787 10.2614 0 7.5 0C4.73858 0 2.5 2.19787 2.5 4.90909C2.5 7.62031 4.73858 9.81818 7.5 9.81818Z"
                                                fill="white" />
                                        </svg>
                                    </a>
                                    <div class="menu-dropdown">
                                        <ul>
                                            <li><a href="{{ route('my-account.index',$slug) }}" style="width: auto; background-color: transparent;">{{__('My Account')}}</a></li>
                                            <li>
                                                <form method="POST" action="{{ route('customer.logout',$slug) }}" id="form_logout">
                                                    @csrf
                                                    <a href="{{ route('customer.logout',$slug) }}" onclick="event.preventDefault(); this.closest('form').submit();" style="background-color: transparent; width: auto;">{{__('Log Out')}}
                                                    </a>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                            <li class="heart-header">
                                <a href="javascript:;" title="wish" class="wish-header">
                                    <div class="cart-header-sub">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="20"
                                            viewBox="0 0 20 16" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M10.6295 3.52275C10.2777 3.85668 9.7223 3.85668 9.37055 3.52275L8.74109 2.92517C8.00434 2.22574 7.00903 1.79867 5.90909 1.79867C3.64974 1.79867 1.81818 3.61057 1.81818 5.84567C1.81818 7.98845 2.99071 9.75782 4.68342 11.2116C6.37756 12.6666 8.40309 13.6316 9.61331 14.1241C9.86636 14.2271 10.1336 14.2271 10.3867 14.1241C11.5969 13.6316 13.6224 12.6666 15.3166 11.2116C17.0093 9.75782 18.1818 7.98845 18.1818 5.84567C18.1818 3.61057 16.3503 1.79867 14.0909 1.79867C12.991 1.79867 11.9957 2.22574 11.2589 2.92517L10.6295 3.52275ZM10 1.62741C8.93828 0.619465 7.49681 0 5.90909 0C2.64559 0 0 2.6172 0 5.84567C0 11.5729 6.33668 14.7356 8.92163 15.7875C9.61779 16.0708 10.3822 16.0708 11.0784 15.7875C13.6633 14.7356 20 11.5729 20 5.84567C20 2.6172 17.3544 0 14.0909 0C12.5032 0 11.0617 0.619465 10 1.62741Z"
                                                fill="white" />
                                        </svg>
                                    </div>

                                </a>
                            </li>
                            @include('front_end.hooks.header_button')
                            @endauth
                            @guest('customers')
                                <li class="profile-header">
                                    <a href="{{ route('customer.login',$slug) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="18"
                                            viewBox="0 0 15 18" fill="none" >
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M7.5 9.81818C4.27834 9.81818 1.66667 12.3824 1.66667 15.5455V17.1818C1.66667 17.6337 1.29357 18 0.833333 18C0.373096 18 0 17.6337 0 17.1818V15.5455C0 11.4786 3.35786 8.18182 7.5 8.18182C11.6421 8.18182 15 11.4786 15 15.5455V17.1818C15 17.6337 14.6269 18 14.1667 18C13.7064 18 13.3333 17.6337 13.3333 17.1818V15.5455C13.3333 12.3824 10.7217 9.81818 7.5 9.81818Z"
                                                fill="white" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M7.5 8.18182C9.34095 8.18182 10.8333 6.71657 10.8333 4.90909C10.8333 3.10161 9.34095 1.63636 7.5 1.63636C5.65905 1.63636 4.16667 3.10161 4.16667 4.90909C4.16667 6.71657 5.65905 8.18182 7.5 8.18182ZM7.5 9.81818C10.2614 9.81818 12.5 7.62031 12.5 4.90909C12.5 2.19787 10.2614 0 7.5 0C4.73858 0 2.5 2.19787 2.5 4.90909C2.5 7.62031 4.73858 9.81818 7.5 9.81818Z"
                                                fill="white" />
                                        </svg>
                                    </a>
                                </li>
                            @endguest
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
                        <ul class="menu-right-end">
                            <li class="cart-header">
                                <a href="javascript:;">
                                    <span class="icon-lable" >{{__('My Cart:')}} <b> <span id="sub_total_main_page">{{ 0 }}</span></b></span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19"
                                        viewBox="0 0 19 19" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7.91797 15.834C7.91797 17.1457 6.85465 18.209 5.54297 18.209C4.23129 18.209 3.16797 17.1457 3.16797 15.834C3.16797 14.5223 4.23129 13.459 5.54297 13.459C6.85465 13.459 7.91797 14.5223 7.91797 15.834ZM6.33464 15.834C6.33464 16.2712 5.98019 16.6257 5.54297 16.6257C5.10574 16.6257 4.7513 16.2712 4.7513 15.834C4.7513 15.3968 5.10574 15.0423 5.54297 15.0423C5.98019 15.0423 6.33464 15.3968 6.33464 15.834Z"
                                            fill="white" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M15.8346 15.834C15.8346 17.1457 14.7713 18.209 13.4596 18.209C12.148 18.209 11.0846 17.1457 11.0846 15.834C11.0846 14.5223 12.148 13.459 13.4596 13.459C14.7713 13.459 15.8346 14.5223 15.8346 15.834ZM14.2513 15.834C14.2513 16.2712 13.8969 16.6257 13.4596 16.6257C13.0224 16.6257 12.668 16.2712 12.668 15.834C12.668 15.3968 13.0224 15.0423 13.4596 15.0423C13.8969 15.0423 14.2513 15.3968 14.2513 15.834Z"
                                            fill="white" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M1.66578 2.01983C1.86132 1.62876 2.33685 1.47025 2.72792 1.66578L3.52236 2.06301C4.25803 2.43084 4.75101 3.15312 4.82547 3.97225L4.86335 4.38888C4.88188 4.59276 5.05283 4.74887 5.25756 4.74887H15.702C17.0838 4.74887 18.0403 6.12909 17.5551 7.42297L16.1671 11.1245C15.8195 12.0514 14.9333 12.6655 13.9433 12.6655H6.19479C4.96644 12.6655 3.94076 11.7289 3.82955 10.5056L3.24864 4.1156C3.22382 3.84255 3.05949 3.60179 2.81427 3.47918L2.01983 3.08196C1.62876 2.88643 1.47025 2.41089 1.66578 2.01983ZM5.47346 6.3322C5.2407 6.3322 5.05818 6.53207 5.07926 6.76388L5.40638 10.3622C5.44345 10.77 5.78534 11.0822 6.19479 11.0822H13.9433C14.2733 11.0822 14.5687 10.8775 14.6845 10.5685L16.0726 6.86702C16.1696 6.60825 15.9783 6.3322 15.702 6.3322H5.47346Z"
                                            fill="white" />
                                    </svg>
                                    <span class="count">{!! \App\Models\Cart::CartCount($slug) !!}</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="mobile-menu">
                    <button class="mobile-menu-button" id="menu">
                        <div class="one"></div>
                        <div class="two"></div>
                        <div class="three"></div>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>
