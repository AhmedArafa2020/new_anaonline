
<section class="three-col-sec padding-bottom" style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif" data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}" data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"  data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-4 col-12">
                        <div class="left-col">
                            <div class="section-title">
                            <h2 id="{{ $section->variant_background->section->title->slug ?? '' }}_preview">
                                 {!! $section->variant_background->section->title->text ?? '' !!}</h2>
                            </div>
                            <p id="{{ $section->variant_background->section->description->slug ?? '' }}_preview">{!!
                             $section->variant_background->section->description->text ?? '' !!} </p>
                            <div class="btn-wrapper">
                                <a href="{{ route('page.product-list', $slug) }}" class="btn" id="{{ $section->variant_background->section->button->slug ?? '' }}_preview">
                                 {!! $section->variant_background->section->button->text ?? '' !!}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16"
                                        viewBox="0 0 14 16" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M11.1258 5.12596H2.87416C2.04526 5.12596 1.38823 5.82533 1.43994 6.65262L1.79919 12.4007C1.84653 13.1581 2.47458 13.7481 3.23342 13.7481H10.7666C11.5254 13.7481 12.1535 13.1581 12.2008 12.4007L12.5601 6.65262C12.6118 5.82533 11.9547 5.12596 11.1258 5.12596ZM2.87416 3.68893C1.21635 3.68893 -0.0977 5.08768 0.00571155 6.74226L0.364968 12.4904C0.459638 14.0051 1.71574 15.1851 3.23342 15.1851H10.7666C12.2843 15.1851 13.5404 14.0051 13.635 12.4904L13.9943 6.74226C14.0977 5.08768 12.7837 3.68893 11.1258 3.68893H2.87416Z"
                                            fill="white"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M3.40723 4.40744C3.40723 2.42332 5.01567 0.81488 6.99979 0.81488C8.9839 0.81488 10.5923 2.42332 10.5923 4.40744V5.84447C10.5923 6.24129 10.2707 6.56298 9.87384 6.56298C9.47701 6.56298 9.15532 6.24129 9.15532 5.84447V4.40744C9.15532 3.21697 8.19026 2.2519 6.99979 2.2519C5.80932 2.2519 4.84425 3.21697 4.84425 4.40744V5.84447C4.84425 6.24129 4.52256 6.56298 4.12574 6.56298C3.72892 6.56298 3.40723 6.24129 3.40723 5.84447V4.40744Z"
                                            fill="white"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="img-wrapper">
                            <img src="{{ get_file($section->variant_background->section->image->image ?? 'themes/'.$currentTheme.'/assets/img/banner-sec-7.png', $currentTheme)}}" alt="chocolate" id="{{ $section->variant_background->section->image->slug ?? '' }}_preview">
                        </div>
                    </div>
					<div class="col-md-4 col-12">
                        <div class="right-col">
                            <div class="section-title">
                                <h2 id="{{ $section->variant_background->section->title->slug ?? '' }}_preview">
                                    {!! $section->variant_background->section->title->text ?? '' !!}</h2>
                            </div>
                            <p id="{{ $section->variant_background->section->description->slug ?? '' }}_preview">{!!
                                $section->variant_background->section->description->text ?? '' !!} </p>
                            <div class="btn-wrapper">
                                <a href="{{ route('page.product-list', $slug) }}" class="btn" id="{{ $section->variant_background->section->button->slug ?? '' }}_preview">
                                    {!! $section->variant_background->section->button->text ?? '' !!}
                                       <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16"
                                           viewBox="0 0 14 16" fill="none">
                                           <path fill-rule="evenodd" clip-rule="evenodd"
                                               d="M11.1258 5.12596H2.87416C2.04526 5.12596 1.38823 5.82533 1.43994 6.65262L1.79919 12.4007C1.84653 13.1581 2.47458 13.7481 3.23342 13.7481H10.7666C11.5254 13.7481 12.1535 13.1581 12.2008 12.4007L12.5601 6.65262C12.6118 5.82533 11.9547 5.12596 11.1258 5.12596ZM2.87416 3.68893C1.21635 3.68893 -0.0977 5.08768 0.00571155 6.74226L0.364968 12.4904C0.459638 14.0051 1.71574 15.1851 3.23342 15.1851H10.7666C12.2843 15.1851 13.5404 14.0051 13.635 12.4904L13.9943 6.74226C14.0977 5.08768 12.7837 3.68893 11.1258 3.68893H2.87416Z"
                                               fill="white"></path>
                                           <path fill-rule="evenodd" clip-rule="evenodd"
                                               d="M3.40723 4.40744C3.40723 2.42332 5.01567 0.81488 6.99979 0.81488C8.9839 0.81488 10.5923 2.42332 10.5923 4.40744V5.84447C10.5923 6.24129 10.2707 6.56298 9.87384 6.56298C9.47701 6.56298 9.15532 6.24129 9.15532 5.84447V4.40744C9.15532 3.21697 8.19026 2.2519 6.99979 2.2519C5.80932 2.2519 4.84425 3.21697 4.84425 4.40744V5.84447C4.84425 6.24129 4.52256 6.56298 4.12574 6.56298C3.72892 6.56298 3.40723 6.24129 3.40723 5.84447V4.40744Z"
                                               fill="white"></path>
                                       </svg>
                                   </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>









