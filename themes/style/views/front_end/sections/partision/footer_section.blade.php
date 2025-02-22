<!--footer start here-->
<footer class="site-footer"
    style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif"
    data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}"
    data-hide="{{ $option->is_hide  ?? '' }}" data-section="{{ $option->section_name  ?? '' }}"
    data-store="{{ $option->store_id  ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
    <div class="container">
   
        @include('front_end.hooks.footer_link')

        <div class="footer-row">
            <div class="footer-col footer-subscribe-col">
                <div class="footer-widget">
                    <h3 class="footer-subscribe-col"
                        id="{{ $section->footer->section->newsletter_title->slug ?? '' }}_preview">
                        {!! $section->footer->section->newsletter_title->text ?? '' !!}</h3>
                    <p id="{{ $section->footer->section->newsletter_description->slug ?? '' }}_preview">
                        {!! $section->footer->section->newsletter_description->text ?? '' !!} </p>
                    <form class="footer-subscribe-form" action='{{ route("newsletter.store",$slug) }}' method="post">
                        @csrf
                        <div class="input-wrapper">
                            <input type="email" placeholder="Enter email address..." name="email">
                            <button type="submit" class="btn-subscibe">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                    fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4.97863e-08 9.99986C-7.09728e-06 10.4601 0.373083 10.8332 0.83332 10.8332L17.113 10.8335L15.1548 12.7358C14.8247 13.0565 14.817 13.584 15.1377 13.9142C15.4584 14.2443 15.986 14.2519 16.3161 13.9312L19.7474 10.5979C19.9089 10.441 20.0001 10.2254 20.0001 10.0002C20.0001 9.77496 19.9089 9.55935 19.7474 9.40244L16.3161 6.0691C15.986 5.74841 15.4584 5.75605 15.1377 6.08617C14.817 6.41628 14.8247 6.94387 15.1548 7.26456L17.1129 9.1668L0.833346 9.16654C0.373109 9.16653 7.24653e-06 9.53962 4.97863e-08 9.99986Z"
                                        fill="#183A40" />
                                </svg>
                            </button>
                        </div><br>
                        <label for="subscibecheck"
                            id="{{ $section->footer->section->newsletter_sub_title->slug ?? '' }}_preview">
                            {!! $section->footer->section->newsletter_sub_title->text ?? '' !!}
                        </label>
                    </form>
                </div>
                <ul class="article-socials d-flex align-items-center icon">
                    @for ($i = 0; $i < $section->footer->section->footer_link->loop_number ?? 1; $i++)
                        <li>
                            <a href="{{ $section->footer->section->footer_link->social_link->{$i} ?? '#'}}"
                                target="_blank" id="social_link_{{ $i }}">
                                <img src="{{ get_file($section->footer->section->footer_link->social_icon->{$i}->image ?? 'themes/' . $currentTheme . '/assets/images/youtube.svg', $currentTheme) }}"
                                    class="{{ 'social_icon_'. $i .'_preview' }}" alt="icon" id="social_icon_{{ $i }}">
                            </a>
                        </li>
                        @endfor
                </ul>
            </div>
            @if(isset($section->footer->section->footer_menu_type))
            @for ($i = 0; $i < $section->footer->section->footer_menu_type->loop_number ?? 1; $i++)
                @if(isset($section->footer->section->footer_menu_type->footer_title->{$i}))
                <div class="footer-col footer-link footer-link-{{$i+1}}">
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
                            <li><a href="{{ url($nav->slug) }}" target="{{ $nav->target }}">
                                    @if ($nav->title == null)
                                    {{ $nav->title }}
                                    @else
                                    {{ $nav->title }}
                                    @endif
                                </a></li>
                            @elseif($nav->type == 'category')
                            <li><a href="{{ url($slug.'/'.$nav->slug) }}" target="{{ $nav->target }}">
                                    @if ($nav->title == null)
                                    {{ $nav->title }}
                                    @else
                                    {{ $nav->title }}
                                    @endif
                                </a></li>
                            @else
                            <li><a href="{{ url($slug.'/custom/'.$nav->slug) }}" target="{{ $nav->target }}">
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
                @endif
                @endfor
                @endif
                <div class="footer-col footer-link footer-link-3">
                    <div class="footer-widget">
                            <h2 id="{{ $section->footer->section->title->slug ?? '' }}_preview">
                                {!! $section->footer->section->title->text ?? '' !!} </h2>
                                <div class="numberlink contactlink">
                                    <a href="tel:+4800213212">+48 0021-32-12</a>
                                </div>
                                <h2>EMAIL:</h2>
                                <div class="numberlink contactlink">
                                    <a href="tel:+4800213212">shop@company.com</a>
                                </div>
                    </div>
                </div>
        </div>
        <div class="footer-bottom">
            <div class="row align-items-center">
                <div class="col-12 col-md-6">
                    <p id="{{ $section->footer->section->copy_right->slug ?? '' }}_preview">
                        {!! $section->footer->section->copy_right->text ?? '' !!} </p>
                </div>

                <div class="col-12 col-md-6">
                    <ul class="policy-links d-flex align-items-center justify-content-end">
                        <li><a href="{{ $section->footer->section->privacy_policy->link ?? '#' }}"><span id="{{ $section->footer->section->privacy_policy->slug ?? '' }}_preview">{{ $section->footer->section->privacy_policy->text ?? __('Policy Privacy')}}</span></a></li>
                        <li><a href="{{ $section->footer->section->terms_and_conditions->link ?? '#' }}"><span id="{{ $section->footer->section->privacy_policy->slug ?? '' }}_preview">{{ $section->footer->section->terms_and_conditions->text ?? __('Terms and conditions')}}</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="cookie">
        <p id="{{ $section->footer->section->footer_cookie->text->slug ?? '' }}_preview">{!! $section->footer->section->footer_cookie->text !!}</p>
        <button class="cookie-close">
            <svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" viewBox="0 0 8 8" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M7.20706 0.707107L6.49995 0L3.60354 2.89641L0.707134 0L2.67029e-05 0.707107L2.89644 3.60352L0 6.49995L0.707107 7.20706L3.60354 4.31062L6.49998 7.20706L7.20708 6.49995L4.31065 3.60352L7.20706 0.707107Z"
                    fill="#30383D"></path>
            </svg>
        </button>
    </div>
</footer>
<!--footer end here-->