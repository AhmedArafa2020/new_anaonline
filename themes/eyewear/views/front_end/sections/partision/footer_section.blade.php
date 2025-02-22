<footer class="site-footer" style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif" data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}" data-hide="{{ $option->is_hide  ?? '' }}" data-section="{{ $option->section_name  ?? '' }}"  data-store="{{ $option->store_id  ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
<div class="custome_tool_bar"></div>
    <div class="container">

        @include('front_end.hooks.footer_link')

        <div class="footer-row">
            <div class="footer-col footer-link footer-link-1">
                <div class="footer-widget">
                    <p id="{{ $section->footer->section->description->slug ?? '' }}_preview"> {!!
                        $section->footer->section->description->text ?? '' !!}</p>
                    @if(isset($section->footer->section->footer_link))
                    <ul class="footer-list-social" role="list">
                        @for ($i = 0; $i < $section->footer->section->footer_link->loop_number ?? 1; $i++)
                            <li>
                                <a href="{{ $section->footer->section->footer_link->social_link->{$i} ?? '#'}}"
                                    target="_blank" id="social_link_{{ $i }}">
                                    <img src="{{ get_file($section->footer->section->footer_link->social_icon->{$i}->image ?? 'themes/' . $currentTheme . '/assets/images/youtube.svg', $currentTheme) }}"
                                        class="{{ 'social_icon_'. $i .'_preview' }}" alt="icon"
                                        id="social_icon_{{ $i }}">
                                </a>
                            </li>
                            @endfor
                    </ul>
                    @endif
                </div>
            </div>
            @if(isset($section->footer->section->footer_menu_type))
                @for ($i = 0; $i < $section->footer->section->footer_menu_type->loop_number ?? 1; $i++)
                    @if(isset($section->footer->section->footer_menu_type->footer_title->{$i}))
                        <div class="footer-col footer-link footer-link-{{$i+2}}">
                            <div class="footer-widget">
                                <h2 class="h6"> {{ $section->footer->section->footer_menu_type->footer_title->{$i} ?? ''}} </h2>
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
        </div>
        <div class="footer-bottom">
            <div class="row align-items-center">
                <div class="col-12 col-md-6">
                <p id="{{ $section->footer->section->copy_right->slug ?? '' }}_preview">{!! $section->footer->section->copy_right->text ?? '' !!}</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!--footer end here-->
