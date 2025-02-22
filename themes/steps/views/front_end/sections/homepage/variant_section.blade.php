<section class="shoes-during-testing padding-top" style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif" data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}" data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"  data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
        <img src="{{ get_file($section->variant_background->section->image->image, $currentTheme) }}" id="{{ $section->variant_background->section->image->slug ?? '' }}_preview"  class="left-shape">
            <div class="offset-container offset-left">
                <div class="d-flex offset-row">
                    <div class="offset-left-colum">
                        <div class="offset-left-colum-inner">
                            <div class="section-title">
                                <div class="subtitle" id="{{ ($section->variant_background->section->sub_title->slug ?? '') }}_preview">{!! $section->variant_background->section->sub_title->text ?? "" !!}</div>
                                <h2 id="{{ ($section->variant_background->section->title->slug ?? '') }}_preview">{!! $section->variant_background->section->title->text ?? "" !!} </h2>
                            </div>
                            <p id="{{ ($section->variant_background->section->description->slug ?? '') }}_preview">{!! $section->variant_background->section->description->text ?? "" !!}</p>
                            <a href="#" class="btn-secondary white-btn">
                                <span id="{{ ($section->variant_background->section->button->slug ?? '') }}_preview">{!! $section->variant_background->section->button->text ?? "" !!}</span>
                                <span class="btn-ic">
                                    <svg viewBox="0 0 10 5">
                                        <path
                                            d="M2.37755e-08 2.57132C-3.38931e-06 2.7911 0.178166 2.96928 0.397953 2.96928L8.17233 2.9694L7.23718 3.87785C7.07954 4.031 7.07589 4.28295 7.22903 4.44059C7.38218 4.59824 7.63413 4.60189 7.79177 4.44874L9.43039 2.85691C9.50753 2.78197 9.55105 2.679 9.55105 2.57146C9.55105 2.46392 9.50753 2.36095 9.43039 2.28602L7.79177 0.69418C7.63413 0.541034 7.38218 0.544682 7.22903 0.702329C7.07589 0.859976 7.07954 1.11192 7.23718 1.26507L8.1723 2.17349L0.397965 2.17336C0.178179 2.17336 3.46059e-06 2.35153 2.37755e-08 2.57132Z">
                                        </path>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>

                    <div class="offset-right-colum">
                        <div class="video-right-wrap">
                            <video class="video--tag" id="img-vid"
                                poster="{{ get_file($section->variant_background->section->video->image ?? '', $currentTheme) }}">
                                <source src="{{ get_file($section->variant_background->section->video->image ?? '', $currentTheme) }}"
                                    type="video/mp4">
                            </video>
                            <div class="play-vid" data-click="0" >
                                <div class="d-flex align-items-center">
                                    <span>
                                     <a href="javascript:void(0)" class="variant-play-btn"
                                    id="{{ $section->variant_background->section->button->slug ?? '' }}_preview">
                                        <svg viewBox="0 0 30 30">
                                            <path
                                                d="M15,2.5A12.5,12.5,0,1,0,27.5,15,12.51408,12.51408,0,0,0,15,2.5Zm4.96777,14.13965v.001L14.32129,20.582a2.0003,2.0003,0,0,1-3.14453-1.64062V11.05859A2.0003,2.0003,0,0,1,14.32129,9.418l5.64648,3.94141a2,2,0,0,1,0,3.28027Z"
                                                fill="none"></path>
                                            <path
                                                d="M15,0A15,15,0,1,0,30,15,15.01641,15.01641,0,0,0,15,0Zm0,27.5A12.5,12.5,0,1,1,27.5,15,12.51408,12.51408,0,0,1,15,27.5Z">
                                            </path>
                                            <path
                                                d="M19.96777,13.35938,14.32129,9.418a2.0003,2.0003,0,0,0-3.14453,1.64062v7.88282A1.99947,1.99947,0,0,0,14.32129,20.582l5.64648-3.94141v-.001a2,2,0,0,0,0-3.28027Z">
                                            </path>
                                        </svg>
                                    </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
<!--video popup start-->
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
            <iframe width="560" height="315" src="@if($section->variant_background->section->video->type == 'text')
                            {{ $section->variant_background->section->video->text }}
                        @else
                            {{ get_file($section->variant_background->section->video->text, $currentTheme) }}
                        @endif" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
        </div>
    </div>
</div>
