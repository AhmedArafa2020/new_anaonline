<section class="review-section"  style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif"
    data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}"
    data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"
    data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
    <div class="container">
        <div class="section-title">
            <h2 id="{{ $section->review->section->title->slug ?? '' }}_preview">
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
                <span>{!!$section->review->section->title->text ?? '' !!}</span>
            </h2>
        </div>
        <div class="review-slider flex-slider">
            @foreach ($reviews as $review)
            <div class="review-itm">
                <div class="review-itm-inner card-inner">
                    <p>{{$review->description}}</p>
                    <div class="review-botton d-flex align-items-center">
                        <div class="about-pro d-flex align-items-center">
                            <div class="abt-pro-img">
                                <img
                                    src="{{ get_file($review->ProductData->cover_image_path ?? '', $currentTheme) }}">
                            </div>
                            <h6 class="review-title">
                                {{$review->ProductData->name}}
                            </h6>
                        </div>
                        <div class="about-user d-flex align-items-center">
                            <h6>
                                <span>{{ !empty($review->UserData) ? ($review->UserData->first_name ? ($review->UserData->first_name. ',') : '') : '' }}</span>
                                {{ $review->ProductData->type }}
                            </h6>
                            <div class="review-stars">
                                @for ($i = 0; $i < 5; $i++) <i
                                    class="fa fa-star {{ $i < $review->rating_no ? 'text-warning' : '' }} "></i>
                                    @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>