
<section class="subscribe-section" style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif"
    data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}"
    data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"
    data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
        <div class="container ">
            <div class="row align-items-center subscribe-bg">
                <div class="col-lg-4 col-12">
                    <div class="section-title">
                        <h4 id="{{ $section->subscribe->section->title->slug ?? '' }}_preview">{!!
                                $section->subscribe->section->title->text ?? '' !!}
                        </h4>
                    </div>
                </div>
                <div class="col-lg-3 col-12">
                    <div class="subscribe-detail">
                    <p id="{{ $section->subscribe->section->description->slug ?? '' }}_preview">{!!
                            $section->subscribe->section->description->text ?? '' !!}</p>
                    </div>
                </div>
                <div class="col-lg-5 col-12">

                    <div class="footer-subscribe-form">
                    {!! \App\Models\Newsletter::Subscribe($currentTheme, $slug, $section) !!}
                    </div>
                </div>
            </div>
        </div>
    </section>