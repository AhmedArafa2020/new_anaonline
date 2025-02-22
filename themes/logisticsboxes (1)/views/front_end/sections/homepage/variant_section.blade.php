<section
    class="store-detail-section padding-top padding-bottom"style="position: relative;@if (isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif"
    data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}"
    data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"
    data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
    <div class="container">

        <div class="row">
            @for ($i = 0; $i < $section->variant_background->loop_number; $i++)
                <div class="col-12 col-lg-4 col-md-4 col-12">
                    <div class="store-detail-inner">
                        @if ($i == 0)
                            <div class="top-air-arrow">
                                <img src="{{ asset('themes/' . $currentTheme . '/assets/images/dir-arrow.png') }}"
                                    alt="">
                            </div>
                        @elseif ($i == 1)
                            <div class="bottom-air-arrow">
                                <img src="{{ asset('themes/' . $currentTheme . '/assets/images/dir-arrow-bottom.png') }}"
                                    alt="">
                            </div>
                        @else
                        @endif
                        <div class="icon-wrap">
                            <img src="{{ get_file($section->variant_background->section->image->image->{$i} ?? '', $currentTheme) }}" alt="">

                        </div>
                        <div class="section-title">
                            <h3 d="{{ $section->variant_background->section->title->slug ?? '' }}_preview">
                                {!! $section->variant_background->section->title->text->{$i} ?? '' !!}
                            </h3>
                        </div>
                        <p id="{{ $section->variant_background->section->description->slug ?? '' }}_preview">{!! $section->variant_background->section->description->text->{$i} ?? '' !!}
                        </p>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</section>
