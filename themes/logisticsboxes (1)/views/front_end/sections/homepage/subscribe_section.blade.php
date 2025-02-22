<section class="newsletter-section"
    style="position: relative;@if (isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif"
    data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}"
    data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"
    data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 col-12">
                <div class="newsletter-left-inner">
                    <div class="section-title">
                        <h2 id="{{ ($section->subscribe->section->title->slug ?? '') }}_preview">{!!
                            $section->subscribe->section->title->text ?? "" !!}</h2>
                    </div>
                    <p id="{{ ($section->subscribe->section->description->slug ?? '') }}_preview">{!!
                        $section->subscribe->section->description->text ?? "" !!} </p>
                    <div class="subscribe-form">
                        <form action="{{ route('newsletter.store', $slug) }}" method="post">
                            @csrf
                            <div class="input-wrapper">
                                <input type="email" placeholder="Type your email address..." name="email">
                                <button class="btn-subscibe">{{ __('Subscribe') }}</button>
                            </div>
                            <label for="FotterCheckbox"
                                id="{{ ($section->subscribe->section->sub_description->slug ?? '') }}_preview">{!!
                                $section->subscribe->section->sub_description->text ?? "" !!}</label>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="newsletter-image-left">
                    <img src="{{ get_file($section->subscribe->section->image->image ?? '', $currentTheme) }} " alt="">
                </div>
            </div>
        </div>
    </div>
</section>
