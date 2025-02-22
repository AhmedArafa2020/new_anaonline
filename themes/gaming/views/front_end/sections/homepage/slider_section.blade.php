<section class="home-banner-main" style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif"
    data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}"
    data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"
    data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
    <div class="home-banner-section">
        <img src="{{asset('themes/'.$currentTheme.'/assets/images/design-circle-2.png')}}" class="design-circle-2"
            alt="image">
        <img src="{{asset('themes/'.$currentTheme.'/assets/images/design-circle-1.png')}}" class="design-circle-1"
            alt="image">
        <img src="{{asset('themes/'.$currentTheme.'/assets/images/main-conent-games.png')}}" class="main-content-games"
            alt="image">
        <img src="{{ get_file($section->slider->section->image_left->image ?? '', $currentTheme) }}"
            class="half-bluthooth-left {{ ($section->slider->section->image_left->slug ?? '').'_preview'}}" alt="image">
        <img src="{{ get_file($section->slider->section->image_right->image ?? '', $currentTheme) }}"
            class="half-bluthooth-right {{ ($section->slider->section->image_right->slug ?? '').'_preview'}}"
            alt="image">
        <img src="{{asset('themes/'.$currentTheme.'/assets/images/round-img-big.png')}}" class="round-img-big"
            alt="image">
        <img src="{{asset('themes/'.$currentTheme.'/assets/images/round-img-small.png')}}" class="round-img-small"
            alt="image">
        <img src="{{asset('themes/'.$currentTheme.'/assets/images/full-bluthooth.png')}}" class="full-bluthooth"
            alt="image">
        <img src="{{asset('themes/'.$currentTheme.'/assets/images/top-star.png')}}" class="top-star" alt="image">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="home-banner-contain">
                        <div class="banner-tagline">
                            <div class="tagline-row d-flex align-items-center"
                                id="{{ $section->slider->section->sub_title->slug ?? '' }}_preview">{!!
                                $section->slider->section->sub_title->text ?? '' !!}
                            </div>
                        </div>
                        <div class="section-title">
                            <h2 class="xl-text" id="{{ ($section->slider->section->title->slug ?? ''). '_preview'}}">
                                {!! $section->slider->section->title->text ?? "" !!}</h2>
                            <p id="{{ $section->slider->section->description->slug ?? '' }}_preview">{!!
                                $section->slider->section->description->text ?? '' !!} </p>
                        </div>
                        <div class="btn-flex d-flex">
                            <a href="{{route('page.product-list',$slug)}}" class="btn-primary"
                                id="{{ $section->slider->section->button->slug ?? '' }}_preview">
                                {!! $section->slider->section->button->text ?? '' !!}
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17"
                                    fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M11.0801 11.334L11.5042 11.9203C11.8709 12.4273 12.4637 12.7507 13.1277 12.7507C14.3316 12.7507 15.2631 11.6955 15.1137 10.5008L14.5652 6.11208C14.4322 5.04867 13.5283 4.25065 12.4566 4.25065H4.54294C3.47125 4.25065 2.56727 5.04867 2.43435 6.11208L1.88575 10.5008C1.73642 11.6955 2.66792 12.7507 3.87184 12.7507C4.53583 12.7507 5.12857 12.4273 5.49529 11.9203L5.91944 11.334H11.0801ZM10.3564 12.7507C10.9792 13.6116 11.9918 14.1673 13.1277 14.1673C15.1837 14.1673 16.7745 12.3653 16.5195 10.3251L15.9709 5.93636C15.7493 4.16401 14.2427 2.83398 12.4566 2.83398H4.54294C2.75679 2.83398 1.25016 4.16401 1.02862 5.93636L0.480024 10.3251C0.225003 12.3653 1.81579 14.1673 3.87184 14.1673C5.00767 14.1673 6.02032 13.6116 6.64311 12.7507H10.3564Z"
                                        fill="white" />
                                    <path
                                        d="M5.66797 5.66602C5.27677 5.66602 4.95964 5.98315 4.95964 6.37435V7.08268H4.2513C3.8601 7.08268 3.54297 7.39981 3.54297 7.79102C3.54297 8.18222 3.8601 8.49935 4.2513 8.49935H4.95964V9.20768C4.95964 9.59888 5.27677 9.91601 5.66797 9.91601C6.05917 9.91601 6.3763 9.59888 6.3763 9.20768V8.49935H7.08464C7.47584 8.49935 7.79297 8.18222 7.79297 7.79102C7.79297 7.39981 7.47584 7.08268 7.08464 7.08268H6.3763V6.37435C6.3763 5.98315 6.05917 5.66602 5.66797 5.66602Z"
                                        fill="white" />
                                    <path
                                        d="M12.75 7.08268C13.1412 7.08268 13.4583 6.76555 13.4583 6.37435C13.4583 5.98315 13.1412 5.66602 12.75 5.66602C12.3588 5.66602 12.0417 5.98315 12.0417 6.37435C12.0417 6.76555 12.3588 7.08268 12.75 7.08268Z"
                                        fill="white" />
                                    <path
                                        d="M11.3333 9.91601C11.7245 9.91601 12.0417 9.59888 12.0417 9.20768C12.0417 8.81648 11.7245 8.49935 11.3333 8.49935C10.9421 8.49935 10.625 8.81648 10.625 9.20768C10.625 9.59888 10.9421 9.91601 11.3333 9.91601Z"
                                        fill="white" />
                                </svg>
                            </a>
                            <a href="{{route('page.product-list',$slug)}}" class="btn-transparent"
                                id="{{ $section->slider->section->button_second->slug ?? '' }}_preview">
                                {!! $section->slider->section->button_second->text ?? '' !!}
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17"
                                    fill="rgba(131, 131, 131, 1)">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M11.0801 11.334L11.5042 11.9203C11.8709 12.4273 12.4637 12.7507 13.1277 12.7507C14.3316 12.7507 15.2631 11.6955 15.1137 10.5008L14.5652 6.11208C14.4322 5.04867 13.5283 4.25065 12.4566 4.25065H4.54294C3.47125 4.25065 2.56727 5.04867 2.43435 6.11208L1.88575 10.5008C1.73642 11.6955 2.66792 12.7507 3.87184 12.7507C4.53583 12.7507 5.12857 12.4273 5.49529 11.9203L5.91944 11.334H11.0801ZM10.3564 12.7507C10.9792 13.6116 11.9918 14.1673 13.1277 14.1673C15.1837 14.1673 16.7745 12.3653 16.5195 10.3251L15.9709 5.93636C15.7493 4.16401 14.2427 2.83398 12.4566 2.83398H4.54294C2.75679 2.83398 1.25016 4.16401 1.02862 5.93636L0.480024 10.3251C0.225003 12.3653 1.81579 14.1673 3.87184 14.1673C5.00767 14.1673 6.02032 13.6116 6.64311 12.7507H10.3564Z"
                                        fill="rgba(131, 131, 131, 1)" />
                                    <path
                                        d="M5.66797 5.66602C5.27677 5.66602 4.95964 5.98315 4.95964 6.37435V7.08268H4.2513C3.8601 7.08268 3.54297 7.39981 3.54297 7.79102C3.54297 8.18222 3.8601 8.49935 4.2513 8.49935H4.95964V9.20768C4.95964 9.59888 5.27677 9.91601 5.66797 9.91601C6.05917 9.91601 6.3763 9.59888 6.3763 9.20768V8.49935H7.08464C7.47584 8.49935 7.79297 8.18222 7.79297 7.79102C7.79297 7.39981 7.47584 7.08268 7.08464 7.08268H6.3763V6.37435C6.3763 5.98315 6.05917 5.66602 5.66797 5.66602Z"
                                        fill="rgba(131, 131, 131, 1)" />
                                    <path
                                        d="M12.75 7.08268C13.1412 7.08268 13.4583 6.76555 13.4583 6.37435C13.4583 5.98315 13.1412 5.66602 12.75 5.66602C12.3588 5.66602 12.0417 5.98315 12.0417 6.37435C12.0417 6.76555 12.3588 7.08268 12.75 7.08268Z"
                                        fill="rgba(131, 131, 131, 1)" />
                                    <path
                                        d="M11.3333 9.91601C11.7245 9.91601 12.0417 9.59888 12.0417 9.20768C12.0417 8.81648 11.7245 8.49935 11.3333 8.49935C10.9421 8.49935 10.625 8.81648 10.625 9.20768C10.625 9.59888 10.9421 9.91601 11.3333 9.91601Z"
                                        fill="rgba(131, 131, 131, 1)" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>