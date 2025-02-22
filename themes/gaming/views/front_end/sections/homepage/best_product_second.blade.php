<section class="product-tab-section padding-bottom tabs-wrapper"  style="position: relative;@if(isset($option) && $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif"
    data-index="{{ $option->order ?? '' }}" data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}"
    data-hide="{{ $option->is_hide ?? '' }}" data-section="{{ $option->section_name ?? '' }}"
    data-store="{{ $option->store_id ?? '' }}" data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
    <div class="full-container">
        <div class="d-flex align-items-center">
            <div class="col-xl-4 col-lg-4 col-md-6 col-12 pro-tab-left">
                <div class="left-column-img">
                    <img src="{{ get_file($section->best_product_second->section->image->image ?? '', $currentTheme) }}" class="cpu-left"
                        alt="image" id="{{ $section->best_product_second->section->image->slug ?? '' }}_preview">
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-12 pro-tab-center">
                <ul class="cat-tab tabs product-tab">
                    @foreach ($MainCategoryList as $cat_key => $category)
                    <li class="tab-link {{ $cat_key == 0 ? 'active' : '' }}" data-tab="{{ $cat_key }}">
                        <a href="javascript:;">
                            {{ $category->name }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-12 pro-tab-right">
                <div class="tabs-container">
                    @foreach ($MainCategoryList as $cat_k => $category)
                    <div id="{{ $cat_k }}" class="tab-content {{ $cat_k == 0 ? 'active' : '' }}">
                        <div class="product-img-list">
                            @foreach ($MainCategoryList as $CategoryList)
                            @if ($CategoryList->id == $category->id)
                            <div class="product-tab-img">
                                <img src="{{ get_file($CategoryList->image_path, $currentTheme) }}" class="product-img"
                                    alt="image">
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</section>