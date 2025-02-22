<section class=" subscribe-sec mb-6"style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif" data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}" data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"  data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
    <div class="container">
        <div class="bg-sec">

            <img src="{{   get_file($section->subscribe->section->image->image ?? '', $currentTheme)  }}" class="banner-img"
                alt="plant1">

            <div class="contnent">
                <div class="common-heading">
                    <span class="sub-heading" id="{{ ($section->subscribe->section->sub_title->slug ?? '') }}_preview">{!! $section->subscribe->section->sub_title->text ?? "" !!}</span>
                    <h2 id="{{ ($section->subscribe->section->title->slug ?? "") }}_preview">{!! $section->subscribe->section->title->text ?? "" !!}</h2>
                    <p id="{{ ($section->subscribe->section->description->slug ?? '') }}_preview">{!! $section->subscribe->section->description->text ?? "" !!}</p>
                </div>
                <form action="{{ route('newsletter.store', $slug) }}" class="form-subscribe-form"
                    method="post">
                    @csrf
                    <div class="input-box">
                        <input type="email" placeholder="Type your email address..." name="email">
                        <button>
                            <img src="{{ asset('themes/' . $currentTheme . '/assets/images/icons/right-arrow.svg') }}"
                                alt="right-arrow">
                        </button>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check1">
                        <label class="form-check-label" for="check1">
                            <p id="{{ ($section->subscribe->section->sub_description->slug ?? '') }}_preview">{!! $section->subscribe->section->sub_description->text ?? "" !!}</p>
                        </label>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
