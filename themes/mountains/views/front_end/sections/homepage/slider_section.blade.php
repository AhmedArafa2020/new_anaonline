<section class="main-home-first-section"
    style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif"
    data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}"
    data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"
    data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
    <img src="{{ asset('themes/' . $currentTheme  . '/assets/images/banner-pattern.png') }}" class="bner-ptrn">
    <div class="offset-container offset-left">
        <div class="row no-gutters">
            <div class="home-slider-left-col col-md-5 col-12">
                <div class="home-lfet-contennt-wrp">
                    <div class="home-left-slider">
                        @for ($i = 0; $i < $section->slider->loop_number ?? 1; $i++)
                            <div class="left-slider-item">
                                <div class="left-slide-itm-inner">
                                    <div class="section-title">
                                        <span class="subtitle"
                                            id="{{ ($section->slider->section->sub_title->slug ?? '').'_'. $i }}_preview">
                                            {!! $section->slider->section->sub_title->text->{$i} ?? "" !!}</span>
                                        <h2 id="{{ ($section->slider->section->title->slug ?? '').'_'. $i }}_preview">
                                            {!! $section->slider->section->title->text->{$i} ?? "" !!}
                                        </h2>
                                    </div>
                                    <p id="{{ ($section->slider->section->description->slug ?? '').'_'. $i }}_preview">
                                        {!! ($section->slider->section->description->text->{$i} ?? '') !!}</p>
                                    <a href="{{ route('page.product-list', $slug) }}" class="btn"
                                        id="{{ ($section->slider->section->button->slug ?? '').'_'. $i }}_preview">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                            viewBox="0 0 12 12" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M9.9 4.2C11.0598 4.2 12 3.2598 12 2.1C12 0.940202 11.0598 0 9.9 0C8.7402 0 7.8 0.940202 7.8 2.1C7.8 3.2598 8.7402 4.2 9.9 4.2ZM9.9 3C9.40294 3 9 2.59706 9 2.1C9 1.60294 9.40294 1.2 9.9 1.2C10.3971 1.2 10.8 1.60294 10.8 2.1C10.8 2.59706 10.3971 3 9.9 3ZM2.57574 11.8241C2.81005 12.0584 3.18995 12.0584 3.42426 11.8241C3.65858 11.5898 3.65858 11.2099 3.42426 10.9756L2.64853 10.1999L3.42417 9.42421C3.65849 9.18989 3.65849 8.81 3.42417 8.57568C3.18986 8.34137 2.80996 8.34137 2.57564 8.57568L1.8 9.35133L1.02436 8.57568C0.790041 8.34137 0.410142 8.34137 0.175827 8.57568C-0.0584871 8.81 -0.0584871 9.18989 0.175827 9.42421L0.951472 10.1999L0.175736 10.9756C-0.0585786 11.2099 -0.0585786 11.5898 0.175736 11.8241C0.410051 12.0584 0.789949 12.0584 1.02426 11.8241L1.8 11.0484L2.57574 11.8241ZM3.22027 0.197928C3.10542 0.07071 2.94164 -0.00131571 2.77025 1.8239e-05C2.59886 0.00135223 2.43623 0.0759186 2.32337 0.204908L0.748444 2.00491C0.530241 2.2543 0.555521 2.63335 0.804908 2.85156C1.0543 3.06976 1.43335 3.04448 1.65156 2.79509L2.17492 2.19693V2.58746C2.17492 5.1349 4.24003 7.2 6.78746 7.2C8.67215 7.2 10.2 8.72785 10.2 10.6125V11.4C10.2 11.7314 10.4686 12 10.8 12C11.1314 12 11.4 11.7314 11.4 11.4V10.6125C11.4 8.0651 9.3349 6 6.78746 6C4.90277 6 3.37492 4.47215 3.37492 2.58746V2.15994L3.95465 2.80207C4.17671 3.04803 4.55611 3.06741 4.80207 2.84535C5.04803 2.62329 5.06741 2.24389 4.84535 1.99793L3.22027 0.197928Z"
                                                fill="black" />
                                        </svg>
                                        {!! $section->slider->section->button->text->{$i} ?? "" !!}
                                    </a>
                                </div>
                            </div>
                            @endfor
                    </div>
                </div>
            </div>
            <div class="home-slider-right-col col-md-7 col-12">
                <div class="customarrows">
                    <div class="slick-prev left"><img
                            src="{{ asset('themes/' . $currentTheme . '/assets/images/arrow.png') }}"></div>
                    <div class="slick-next right"><img
                            src="{{ asset('themes/' . $currentTheme . '/assets/images/right-arr.png') }}"></div>
                </div>
                <div class="home-right-slider">
                    @for ($i = 0; $i < $section->slider->loop_number ?? 1; $i++)
                        <div class="home-right-item">
                            <div class="banner-image">
                                <img src="{{ get_file($section->slider->section->image->image->{$i} ?? '', $currentTheme) }}" alt="banner"
                                    id="{{ ($section->slider->section->image->slug ?? '').'_'. $i }}_preview">
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</section>