<section class="product-second-section" style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif" data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}" data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"  data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
    <img src="{{ get_file($section->variant_background->section->image->image ?? '', $currentTheme)}}"
                        id="{{ $section->variant_background->section->image->slug ?? '' }}_preview" alt="banner image" class="background-img">
    <div class="container">
        <div class=" banner-content-inner">
            <div class="section-title">
                <h2 id="{{ $section->variant_background->section->title->slug ?? '' }}">{!!
                    $section->variant_background->section->title->text ?? '' !!}</h2>
            </div>
            <p id="{{ $section->variant_background->section->description->slug ?? '' }}">{!!
                    $section->variant_background->section->description->text ?? '' !!}</p>
        </div>
        <div class="row product-list-row">
            {!! \App\Models\Product::GetLatestProduct($currentTheme, $slug , 2) !!}
        </div>
    </div>
</section>