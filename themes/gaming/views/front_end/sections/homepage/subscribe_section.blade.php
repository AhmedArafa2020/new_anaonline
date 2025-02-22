<section class="subscribe-section padding-top padding-bottom" style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif" data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}" data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"  data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
        <div class="container">
                <div class="row fifth-sec align-items-center">
                    <div class="col-md-5 col-12">
                        <div class="subscribe-content">
                            <div class="section-title">
                                <span class="slide-label subsc-label">{{!empty($latest_product->ProductData) ? $latest_product->ProductData->name : ''}} </span>
                                 <h2 id="{{ $section->subscribe->section->title->slug ?? '' }}_preview">{!! $section->subscribe->section->title->text ?? '' !!}</h2>
                                 <p id="{{ $section->subscribe->section->description->slug ?? '' }}_preview">{!! $section->subscribe->section->description->text ?? '' !!}</p>
                            </div>
                            <div class="search-form-wrapper banner-search-form">
                                {!! \App\Models\Newsletter::Subscribe($currentTheme, $slug, $section) !!}        
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-12">
                        <div class="subscribe-part-img">
                        <img src="{{ get_file($section->subscribe->section->image->image ?? 'themes/'.$currentTheme.'/assets/img/banner-sec-7.png', $currentTheme)}}"
                            id="{{ $section->subscribe->section->image->slug ?? '' }}_preview">
                        </div>
                    </div>
                </div>
        </div>
    </section>