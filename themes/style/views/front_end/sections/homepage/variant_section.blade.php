<section class="positive-about-us"
    style="position: relative;  @if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif"
    data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}"
    data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"
    data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
    <img src="{{ get_file($section->variant_background->section->background_image->image ?? '', $currentTheme)}}"
                            id="{{ ($section->variant_background->section->background_image->slug ?? '') }}_preview" class="positive-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="column-positive-us-left">
                    <div class="vetical-text-2"
                        id="{{ ($section->variant_background->section->service_sub_title->slug ?? '') }}_preview">{!!
                        $section->variant_background->section->service_sub_title->text ?? '' !!}
                    </div>
                    <div class="section-title">
                        <h2  id="{{ ($section->variant_background->section->service_title->slug ?? '') }}_preview">{!!
                        $section->variant_background->section->service_title->text ?? '' !!}</h2>
                       
                    </div>
                    <p
                        id="{{ ($section->variant_background->section->service_description_first->slug ?? '') }}_preview">
                        {!! $section->variant_background->section->service_description_first->text ?? '' !!}</p>
                    <a href="{{route('page.product-list',$slug)}}" class="btn-secondary white-btn"
                        id="{{ ($section->variant_background->section->service_button->slug ?? '') }}_preview">{!!
                        $section->variant_background->section->service_button->text ?? '' !!}
                        <svg viewBox="0 0 10 5">
                            <path
                                d="M2.37755e-08 2.57132C-3.38931e-06 2.7911 0.178166 2.96928 0.397953 2.96928L8.17233 2.9694L7.23718 3.87785C7.07954 4.031 7.07589 4.28295 7.22903 4.44059C7.38218 4.59824 7.63413 4.60189 7.79177 4.44874L9.43039 2.85691C9.50753 2.78197 9.55105 2.679 9.55105 2.57146C9.55105 2.46392 9.50753 2.36095 9.43039 2.28602L7.79177 0.69418C7.63413 0.541034 7.38218 0.544682 7.22903 0.702329C7.07589 0.859976 7.07954 1.11192 7.23718 1.26507L8.1723 2.17349L0.397965 2.17336C0.178179 2.17336 3.46059e-06 2.35153 2.37755e-08 2.57132Z">
                            </path>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-12">
                <div class="column-positive-us-right">
                    <div class="award-logo">
                        <img src="{{ get_file($section->variant_background->section->background_image_second->image ?? '', $currentTheme)}}"
                            id="{{ ($section->variant_background->section->background_image_second->slug ?? '') }}_preview">
                    </div>
                    <div class="row">
                        @for ($i = 0; $i < $section->variant_background->loop_number ?? 1; $i++)
                            <div class="col-sm-4 col-4">
                                <div class="rating-box">
                                    <svg viewBox="0 0 18 22">
                                        <path
                                            d="M3.20339 10.373C3.75256 11.8571 4.92268 13.0273 6.40678 13.5764C4.92268 14.1256 3.75256 15.2957 3.20339 16.7798C2.65422 15.2957 1.4841 14.1256 0 13.5764C1.4841 13.0273 2.65422 11.8571 3.20339 10.373Z"
                                            fill="white"></path>
                                        <path
                                            d="M12.0507 0C13.0706 2.75619 15.2437 4.92927 17.9999 5.94915C15.2437 6.96903 13.0706 9.14212 12.0507 11.8983C11.0308 9.14212 8.85775 6.96903 6.10156 5.94915C8.85775 4.92927 11.0308 2.75619 12.0507 0Z"
                                            fill="white"></path>
                                        <path
                                            d="M7.85205 17.5422C8.99627 16.9472 9.9301 16.0134 10.5251 14.8691C11.1201 16.0134 12.0539 16.9472 13.1981 17.5422C12.0539 18.1371 11.1201 19.071 10.5251 20.2152C9.93009 19.071 8.99627 18.1371 7.85205 17.5422Z"
                                            stroke="white" stroke-width="0.677966"></path>
                                    </svg>
                                    <h3
                                        id="{{ ($section->variant_background->section->sub_title->slug ?? '') }}_preview">
                                        {!! $section->variant_background->section->sub_title->text->{$i} ?? '' !!}</h3>
                                    <h4 id="{{ ($section->variant_background->section->title->slug ?? '') }}_preview">
                                        {!! $section->variant_background->section->title->text->{$i} ?? '' !!} </h4>
                                </div>
                            </div>
                            @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>