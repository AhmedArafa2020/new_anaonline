<section class="video-sec"
style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif"
        data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}"
        data-value="{{ $option->id ?? '' }}" data-hide="{{ $option->is_hide ?? '' }}"
        data-section="{{ $option->section_name ?? '' }}" data-store="{{ $option->store_id ?? '' }}"
        data-theme="{{ $option->theme_id ?? '' }}">
        <div class="custome_tool_bar"></div>
        <img src="{{ get_file($section->modern_product->section->background_image->image ?? 'themes/'.$currentTheme.'/assets/img/banner-sec-7.png', $currentTheme) }}"
            id="{{ $section->modern_product->section->background_image->slug ?? '' }}_preview" alt="chocolate"
            class="banner-bg-img">

            <div class="container">
                <div class="video-content" >
                        <div class="section-title">
                                <span class="sub-title"
                                    id="{{ $section->modern_product->section->sub_title->slug ?? ''}}_preview">
                                    {!! $section->modern_product->section->sub_title->text ?? ''!!}</span>
                                <h2 id="{{ $section->modern_product->section->title->slug ?? ''}}_preview">
                                    {!! $section->modern_product->section->title->text ?? ''!!}</h2>
                        </div>
                        <p id="{{ $section->modern_product->section->description->slug ?? ''}}_preview">
                                {!! $section->modern_product->section->description->text ?? ''!!}</p>
                        <div class="btn-wrapper justify-content-center">
                            <a href="javascript:void(0)" class="variant-play-btn" id="{{ $section->modern_product->section->button->slug ?? '' }}_preview">
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.2" viewBox="0 0 45 44"
                                    width="45" height="44">
                                    <path fill-rule="evenodd" class="a"
                                        d="m26.9 19.9c1.5 1 1.5 3.2 0 4.2l-6.1 4.1c-1.6 1.1-3.9-0.1-3.9-2.1v-8.2c0-2 2.3-3.2 3.9-2.1zm-0.7 1.1l-6.1-4.1c-0.8-0.6-1.9 0-1.9 1v8.2c0 1 1.1 1.6 1.9 1l6.1-4c0.8-0.5 0.8-1.6 0-2.1z" />
                                    <rect class="b" x=".5" y=".5" width="44" height="43" rx="21.5" />
                                </svg>
                                <span id="{{ $section->modern_product->section->button->slug ?? ''}}_preview">{!!
                                                $section->modern_product->section->button->text ?? __('Play Video') !!}</span>
                            </a>
                        </div>
                </div>
            </div>
        </section>


    <!-- video popup -->
    <div id="variant-popup-box" class="overlay-popup">
        <div class="popup-inner">
            <div class="content">
                <a class="close-popup" href="javascript:void(0)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="34" viewBox="0 0 35 34" fill="none">
                        <line x1="2.29695" y1="1.29289" x2="34.1168" y2="33.1127" stroke="white" stroke-width="2">
                        </line>
                        <line x1="0.882737" y1="33.1122" x2="32.7025" y2="1.29242" stroke="white" stroke-width="2">
                        </line>
                    </svg>
                </a>
                <iframe width="560" height="315" src="@if($section->modern_product->section->video->type == 'text')
                                {{ $section->modern_product->section->video->text }}
                            @else
                                {{ get_file($section->modern_product->section->video->text, $currentTheme) }}
                            @endif" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
            </div>
        </div>
    </div>
