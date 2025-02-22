<!-- --------- FOOTER-SECTION-START --------- -->
<footer class="site-footer" style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif" data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}" data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"  data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
    <div class="container">
        
        @include('front_end.hooks.footer_link')

        <div class="footer-row">

            <div class="footer-col footer-subscribe-col footer-contact">

                <div class="footer-widget">
                    <div class="footer-subscribe">
                        <div class="subtitle" id="{{ $section->footer->section->sub_title->slug ?? '' }}_preview"> {!! $section->footer->section->sub_title->text ?? '' !!}
                        </div>
                        <h3 id="{{ $section->footer->section->title->slug ?? '' }}_preview"> {!! $section->footer->section->title->text ?? '' !!}</h3>
                    </div>
                    <p id="{{ $section->footer->section->description->slug ?? '' }}_preview"> {!! $section->footer->section->description->text ?? '' !!}</p>
                </div>
            </div>
            @if(isset($section->footer->section->footer_menu_type))
                @for ($i = 0; $i < $section->footer->section->footer_menu_type->loop_number ?? 1; $i++)
                <div class="footer-col footer-link footer-link-{{$i}}">

                    <div class="footer-widget">
                        <h2> {{ $section->footer->section->footer_menu_type->footer_title->{$i} ?? ''}} </h2>
                            @php
                                $footer_menu_id = $section->footer->section->footer_menu_type->footer_menu_ids->{$i} ?? '';
                                $footer_menu = get_nav_menu($footer_menu_id);
                            @endphp
                        <ul>
                            @if (!empty($footer_menu))
                                @foreach ($footer_menu as $key => $nav)
                                    @if ($nav->type == 'custom')
                                        <li><a href="{{ url($nav->slug) }}"
                                                target="{{ $nav->target }}">
                                                @if ($nav->title == null)
                                                    {{ $nav->title }}
                                                @else
                                                    {{ $nav->title }}
                                                @endif
                                            </a></li>
                                    @elseif($nav->type == 'category')
                                        <li><a href="{{ url($slug.'/'.$nav->slug) }}"
                                                target="{{ $nav->target }}">
                                                @if ($nav->title == null)
                                                    {{ $nav->title }}
                                                @else
                                                    {{ $nav->title }}
                                                @endif
                                            </a></li>
                                    @else
                                        <li><a href="{{ url($slug.'/custom/'.$nav->slug) }}"
                                                target="{{ $nav->target }}">
                                                @if ($nav->title == null)
                                                    {{ $nav->title }}
                                                @else
                                                    {{ $nav->title }}
                                                @endif
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                @endfor
            @endif
            <div class="footer-col footer-subscribe-col">
                <div class="footer-widget">
                    <div class="footer-subscribe">
                        <h2 id="{{ $section->footer->section->newsletter_title->slug ?? '' }}_preview"> {!! $section->footer->section->newsletter_title->text ?? '' !!}</h2>
                    </div>
                    <p id="{{ $section->footer->section->newsletter_description->slug ?? '' }}_preview"> {!! $section->footer->section->newsletter_description->text ?? '' !!}</p>
                    <div class="footer-subscribe-form subscribe-section-form">
                        <form class="footer-subscribe-form" action="{{ route('newsletter.store',$slug) }}" method="post">
                            @csrf
                            <div class="input-wrapper">
                                <input type="email" placeholder="Type your email address..." name="email">
                                <button type="submit" class="btn-subscibe">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.9595 9.00095C14.2361 8.72433 14.2361 8.27584 13.9595 7.99921L9.70953 3.74921C9.43291 3.47259 8.98441 3.47259 8.70779 3.74921C8.43117 4.02584 8.43117 4.47433 8.70779 4.75095L12.4569 8.50008L8.70779 12.2492C8.43117 12.5258 8.43117 12.9743 8.70779 13.2509C8.98441 13.5276 9.4329 13.5276 9.70953 13.2509L13.9595 9.00095ZM4.04286 13.2509L8.29286 9.00095C8.56948 8.72433 8.56948 8.27584 8.29286 7.99921L4.04286 3.74921C3.76624 3.47259 3.31775 3.47259 3.04113 3.74921C2.7645 4.02583 2.7645 4.47433 3.04113 4.75095L6.79026 8.50008L3.04112 12.2492C2.7645 12.5258 2.7645 12.9743 3.04112 13.2509C3.31775 13.5276 3.76624 13.5276 4.04286 13.2509Z" fill="#0A062D"></path>
                                    </svg>
                                </button>
                            </div>
                        </form>
                        <div class="checkbox-custom">
                            <input type="checkbox" class="" id="FotterCheckbox2">
                            <label for="FotterCheckbox2" id="{{ ($section->footer->section->newsletter_sub_title->slug ?? '') }}_preview">{!! $section->footer->section->newsletter_sub_title->text ?? "" !!}</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-social-media">

            <div class="footer-link footer-link-1">
                <div class="footer-widget">
                    <div class="copy-right">
                        <span id="{{ $section->footer->section->copy_right->slug ?? '' }}_preview"> {!! $section->footer->section->copy_right->text ?? '' !!}</span>
                    </div>
                </div>
            </div>

            <div class="footer-link footer-link-2">
                <div class="footer-widget">
                    <ul class="footer-list-social" role="list">
                            @for ($i = 0; $i < $section->footer->section->footer_link->loop_number ?? 1; $i++)
                                <li>
                                    <a href="{{ $section->footer->section->footer_link->social_link->{$i} ?? '#'}}" target="_blank" id="social_link_{{ $i }}">
                                        <img src="{{ get_file($section->footer->section->footer_link->social_icon->{$i}->image ?? 'themes/' . $currentTheme . '/assets/images/youtube.svg', $currentTheme) }}" class="{{ 'social_icon_'. $i .'_preview' }}" alt="icon" id="social_icon_{{ $i }}">
                                    </a>
                                </li>
                            @endfor
                        </ul>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</footer>
<!-- ---------- FOOTER-SECTION-END ---------- -->

<div class="mobile-menu-wrapper">
    <div class="menu-close-icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="34" viewBox="0 0 35 34" fill="none">
            <line x1="2.29695" y1="1.29289" x2="34.1168" y2="33.1127" stroke="white" stroke-width="2" />
            <line x1="0.882737" y1="33.1122" x2="32.7025" y2="1.29242" stroke="white" stroke-width="2" />
        </svg>
    </div>
    <div class="mobile-menu-bar">
        <ul class="mobile-only">
            <li class="mobile-item has-children">
                <a href="javascript:void()" class="acnav-label">
                    {{ __('Gifty Products')}}
                    <svg class="menu-open-arrow" xmlns="http://www.w3.org/2000/svg" width="20" height="11"
                        viewBox="0 0 20 11">
                        <path fill="#24272a"
                            d="M.268 1.076C.373.918.478.813.584.76l.21.474c.79.684 2.527 2.158 5.21 4.368 2.738 2.21 4.159 3.316 4.264 3.316.474-.053 1.158-.369 1.947-1.053.842-.631 1.632-1.42 2.474-2.368.895-.948 1.737-1.842 2.632-2.58.842-.789 1.578-1.262 2.105-1.42l.316.684c0 .21-.106.474-.316.737-.053.21-.263.421-.474.579-.053.052-.316.21-.737.474l-.526.368c-.421.263-1.105.947-2.158 2l-1.105 1.053-2.053 1.947c-1 .947-1.579 1.421-1.842 1.421-.263 0-.684-.263-1.158-.895-.526-.631-.842-1-1.052-1.105l-.737-.579c-.316-.316-.527-.474-.632-.474l-5.42-4.315L.267 2.339l-.105-.421-.053-.369c0-.157.053-.315.158-.473z">
                        </path>
                    </svg>
                    <svg class="close-menu-ioc" xmlns="http://www.w3.org/2000/svg" width="20" height="18"
                        viewBox="0 0 20 18">
                        <path fill="#24272a"
                            d="M19.95 16.75l-.05-.4-1.2-1-5.2-4.2c-.1-.05-.3-.2-.6-.5l-.7-.55c-.15-.1-.5-.45-1-1.1l-.1-.1c.2-.15.4-.35.6-.55l1.95-1.85 1.1-1c1-1 1.7-1.65 2.1-1.9l.5-.35c.4-.25.65-.45.75-.45.2-.15.45-.35.65-.6s.3-.5.3-.7l-.3-.65c-.55.2-1.2.65-2.05 1.35-.85.75-1.65 1.55-2.5 2.5-.8.9-1.6 1.65-2.4 2.3-.8.65-1.4.95-1.9 1-.15 0-1.5-1.05-4.1-3.2C3.1 2.6 1.45 1.2.7.55L.45.1c-.1.05-.2.15-.3.3C.05.55 0 .7 0 .85l.05.35.05.4 1.2 1 5.2 4.15c.1.05.3.2.6.5l.7.6c.15.1.5.45 1 1.1l.1.1c-.2.15-.4.35-.6.55l-1.95 1.85-1.1 1c-1 1-1.7 1.65-2.1 1.9l-.5.35c-.4.25-.65.45-.75.45-.25.15-.45.35-.65.6-.15.3-.25.55-.25.75l.3.65c.55-.2 1.2-.65 2.05-1.35.85-.75 1.65-1.55 2.5-2.5.8-.9 1.6-1.65 2.4-2.3.8-.65 1.4-.95 1.9-1 .15 0 1.5 1.05 4.1 3.2 2.6 2.15 4.3 3.55 5.05 4.2l.2.45c.1-.05.2-.15.3-.3.1-.15.15-.3.15-.45z">
                        </path>
                    </svg>
                </a>
                <ul class="mobile_menu_inner acnav-list">
                    <li class="menu-h-link">
                        <ul>
                            @foreach ($MainCategoryList as $category)
                                <li><a href="{{route('page.product-list',[$slug,'main_category' => $category->id ])}}">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </li>

            <li class="mobile-item">
                <a href="{{route('page.product-list',$slug)}}"> {{ __('Shop All') }} </a>
            </li>

            <li class="mobile-item has-children">
                <a href="javascript:void()" class="acnav-label">
                    {{ __('Pages')}}
                    <svg class="menu-open-arrow" xmlns="http://www.w3.org/2000/svg" width="20" height="11"
                        viewBox="0 0 20 11">
                        <path fill="#24272a"
                            d="M.268 1.076C.373.918.478.813.584.76l.21.474c.79.684 2.527 2.158 5.21 4.368 2.738 2.21 4.159 3.316 4.264 3.316.474-.053 1.158-.369 1.947-1.053.842-.631 1.632-1.42 2.474-2.368.895-.948 1.737-1.842 2.632-2.58.842-.789 1.578-1.262 2.105-1.42l.316.684c0 .21-.106.474-.316.737-.053.21-.263.421-.474.579-.053.052-.316.21-.737.474l-.526.368c-.421.263-1.105.947-2.158 2l-1.105 1.053-2.053 1.947c-1 .947-1.579 1.421-1.842 1.421-.263 0-.684-.263-1.158-.895-.526-.631-.842-1-1.052-1.105l-.737-.579c-.316-.316-.527-.474-.632-.474l-5.42-4.315L.267 2.339l-.105-.421-.053-.369c0-.157.053-.315.158-.473z">
                        </path>
                    </svg>
                    <svg class="close-menu-ioc" xmlns="http://www.w3.org/2000/svg" width="20" height="18"
                        viewBox="0 0 20 18">
                        <path fill="#24272a"
                            d="M19.95 16.75l-.05-.4-1.2-1-5.2-4.2c-.1-.05-.3-.2-.6-.5l-.7-.55c-.15-.1-.5-.45-1-1.1l-.1-.1c.2-.15.4-.35.6-.55l1.95-1.85 1.1-1c1-1 1.7-1.65 2.1-1.9l.5-.35c.4-.25.65-.45.75-.45.2-.15.45-.35.65-.6s.3-.5.3-.7l-.3-.65c-.55.2-1.2.65-2.05 1.35-.85.75-1.65 1.55-2.5 2.5-.8.9-1.6 1.65-2.4 2.3-.8.65-1.4.95-1.9 1-.15 0-1.5-1.05-4.1-3.2C3.1 2.6 1.45 1.2.7.55L.45.1c-.1.05-.2.15-.3.3C.05.55 0 .7 0 .85l.05.35.05.4 1.2 1 5.2 4.15c.1.05.3.2.6.5l.7.6c.15.1.5.45 1 1.1l.1.1c-.2.15-.4.35-.6.55l-1.95 1.85-1.1 1c-1 1-1.7 1.65-2.1 1.9l-.5.35c-.4.25-.65.45-.75.45-.25.15-.45.35-.65.6-.15.3-.25.55-.25.75l.3.65c.55-.2 1.2-.65 2.05-1.35.85-.75 1.65-1.55 2.5-2.5.8-.9 1.6-1.65 2.4-2.3.8-.65 1.4-.95 1.9-1 .15 0 1.5 1.05 4.1 3.2 2.6 2.15 4.3 3.55 5.05 4.2l.2.45c.1-.05.2-.15.3-.3.1-.15.15-.3.15-.45z">
                        </path>
                    </svg>
                </a>
                <ul class="mobile_menu_inner acnav-list">
                    <li class="menu-h-link">
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
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>



<!--video popup start-->
<div id="popup-box" class="overlay-popup">
    <div class="popup-inner">
        <div class="content">
            <a class=" close-popup" href="javascript:void(0)">
                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="34" viewBox="0 0 35 34" fill="none">
                    <line x1="2.29695" y1="1.29289" x2="34.1168" y2="33.1127" stroke="white" stroke-width="2">
                    </line>
                    <line x1="0.882737" y1="33.1122" x2="32.7025" y2="1.29242" stroke="white" stroke-width="2">
                    </line>
                </svg>
            </a>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/9xwazD5SyVg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
        </div>
    </div>
</div>
