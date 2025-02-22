

<section class="category-section padding-bottom" style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif" data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}" data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"  data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
    <div class="container">
        <div class="category-bg">
            <div class="section-title d-flex justify-content-between align-items-center">
                @if(isset($section->modern_product->section->title))
                <div class="section-title-left">
                    <h2 id="{{ $section->modern_product->section->title->slug ?? '' }}_preview"> {!! $section->modern_product->section->title->text ?? '' !!} </h2>
                </div>
                <a href="{{ route('page.product-list', $slug) }}" class="btn-secondary"
                    id="{{ $section->modern_product->section->button->slug ?? '' }}_preview">
                    {!! $section->modern_product->section->button->text ?? '' !!}
                </a>
                @endif
            </div>
            <div class="row">
                @foreach ($MainCategoryList->take(3) as $category)
                    <div class="col-md-3 col-sm-6 col-12 category-card">
                        <div class="category-inner">
                            <a href="{{route('page.product-list',[$slug,'main_category' => $category->id ])}}" class="align-items-center" >
                                <img src="{{ get_file($category->icon_path, $currentTheme) }}" alt="">
                            </a>
                            <div class="category-contant">
                                <div class="top-content">
                                    <div class="section-title">
                                        <h5>
                                            {!! $category->name !!}
                                        </h5>
                                    </div>
                                </div>
                                <div class="bottom-content">
                                    <a href="{{ route('page.product-list', [$slug, 'main_category' => $category->id]) }}" class="link-btn">{!! $section->modern_product->section->show_more_button->text ?? __('Show more') !!}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
