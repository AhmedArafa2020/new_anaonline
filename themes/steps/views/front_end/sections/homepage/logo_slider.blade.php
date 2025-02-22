<section class="our-client-section padding-bottom padding-top" style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif" data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}" data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"  data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>  
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3 col-12">
                    <div class="our-client-left">
                        
                            <div class="section-title">
                                <div class="subtitle" id="{{ $section->logo_slider->section->sub_title->slug ?? '' }}_preview"> {!! $section->logo_slider->section->sub_title->text ?? '' !!}</div>
                                <h2 id="{{ $section->logo_slider->section->title->slug ?? '' }}_preview">{!! $section->logo_slider->section->title->text ?? '' !!} </h2>
                            </div>
                    </div>
                </div>

                <div class="col-md-9 col-12">
                        <div class="our-client-right">
                            <div class="client-logo-slider common-arrows">
                            @for($i=0; $i<count(objectToArray($section->logo_slider->section->image->image)); $i++)
                                <div class="client-logo-item">
                                    <a href="#">
                                        <img src="{{ get_file($section->logo_slider->section->image->image->{$i} ?? '', $currentTheme) }}" alt="logo">
                                    </a>
                                </div>
                            @endfor
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </section>