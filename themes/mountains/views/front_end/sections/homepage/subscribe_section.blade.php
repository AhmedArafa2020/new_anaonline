<section style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif"
    data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}"
    data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"
    data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
    <div class="place-section place-section-second padding-top padding-bottom">
        <div class="row no-gutters justify-content-between align-items-center flex-dairection">
            <div class="col-lg-4 col-md-4 col-12">
                <div class="place-left">
                    <img src="{{ get_file($section->subscribe->section->image->image ?? '', $currentTheme) }}" class="place-left-one" alt="">
                    <img src="{{ get_file($section->subscribe->section->background_image->image ?? '', $currentTheme) }}" class="place-left-two" alt="">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
                <div class="footer-widget">
                    <div class="footer-subscribe">
                        <div class="subtitle" id="{{ $section->subscribe->section->sub_title->slug ?? '' }}">{!!
                            $section->subscribe->section->sub_title->text ?? '' !!}</div>
                        <h2 id="{{ $section->subscribe->section->title->slug ?? '' }}">{!!
                            $section->subscribe->section->title->text ?? '' !!}</h2>
                    </div>
                    <p id="{{ $section->subscribe->section->description->slug ?? '' }}">{!!
                        $section->subscribe->section->description->text ?? '' !!}</p>
                    <form class="footer-subscribe-form" action="{{ route('newsletter.store', $slug) }}" method="post">
                        @csrf
                        <div class="input-wrapper">
                            <input type="email" placeholder="TYPE YOUR EMAIL ADDRESS..." name="email">
                            <button type="submit" class="btn-subscibe"> {{ __('SUBSCRIBE') }}
                            </button>
                        </div>
                        <div class="checkbox-custom">
                            <input type="checkbox" class="" id="subsection">
                            <label for="subsection" id="{{ ($section->subscribe->section->newsletter_description->slug ?? '') }}_preview">{!!$section->subscribe->section->newsletter_description->text ?? "" !!}</label>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
                <div class="place-right">
                    <div class="place-right-image">
                        <img src="{{ get_file($section->subscribe->section->service_image->image ?? '', $currentTheme) }}" alt="">
                    </div>
                    <div class="place-right-image">
                        <img src="{{ get_file($section->subscribe->section->service_second_image->image ?? '', $currentTheme) }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>