<section class="add-banner-section padding-bottom" style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif" data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}" data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"  data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                    <div class="add-banner">
                        <img src="{{ get_file($section->variant_background->section->image->image ?? '', $currentTheme) }}" class="add-bnr">
                        <div class="add-banner-column">
                            <div class="section-title">
                                <div class="subtitle" id="{{ ($section->variant_background->section->sub_title->slug ?? '') }}_preview">{!!
                        $section->variant_background->section->sub_title->text ?? "" !!}</div>
                                <h3 id="{{ ($section->variant_background->section->title->slug ?? '') }}_preview">{!!
                        $section->variant_background->section->title->text ?? "" !!}</h3>
                            </div>
                            <p id="{{ ($section->variant_background->section->description->slug ?? '') }}_preview">{!!
                        $section->variant_background->section->description->text ?? "" !!}</p>
                            <div class="add-banner-section-btn">
                                <a href="#" class="btn-secondary" tabindex="0" id="{{ ($section->variant_background->section->button->slug ?? '') }}_preview">{!!
                        $section->variant_background->section->button->text ?? "" !!}
                                    <svg xmlns="http://www.w3.org/2000/svg" class="ms-2" width="14"
                                        height="16" viewBox="0 0 14 16" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M11.1258 5.12587H2.87416C2.04526 5.12587 1.38823 5.82524 1.43994 6.65253L1.79919 12.4006C1.84653 13.158 2.47458 13.748 3.23342 13.748H10.7666C11.5254 13.748 12.1535 13.158 12.2008 12.4006L12.5601 6.65253C12.6118 5.82524 11.9547 5.12587 11.1258 5.12587ZM2.87416 3.68884C1.21635 3.68884 -0.0977 5.08759 0.00571155 6.74217L0.364968 12.4903C0.459638 14.005 1.71574 15.185 3.23342 15.185H10.7666C12.2843 15.185 13.5404 14.005 13.635 12.4903L13.9943 6.74217C14.0977 5.08759 12.7837 3.68884 11.1258 3.68884H2.87416Z"
                                            fill="#0A062D"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M3.40723 4.40738C3.40723 2.42326 5.01567 0.814819 6.99979 0.814819C8.9839 0.814819 10.5923 2.42326 10.5923 4.40738V5.8444C10.5923 6.24123 10.2707 6.56292 9.87384 6.56292C9.47701 6.56292 9.15532 6.24123 9.15532 5.8444V4.40738C9.15532 3.21691 8.19026 2.25184 6.99979 2.25184C5.80932 2.25184 4.84425 3.21691 4.84425 4.40738V5.8444C4.84425 6.24123 4.52256 6.56292 4.12574 6.56292C3.72892 6.56292 3.40723 6.24123 3.40723 5.8444V4.40738Z"
                                            fill="#0A062D"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</section>