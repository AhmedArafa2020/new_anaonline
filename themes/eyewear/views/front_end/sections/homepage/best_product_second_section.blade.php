<section class="product-prescription-section-two @if(request()->route()->getName() != 'landing_page') padding-top @endif padding-bottom" style=" position: relative;@if(isset($option) &&
    $option->is_hide == 1) opacity: 0.5; @else opacity: 1; @endif" data-index="{{ $option->order ?? '' }}"
    data-id="{{ $option->order ?? '' }}" data-value="{{ $option->id ?? '' }}" data-hide="{{ $option->is_hide ?? '' }}"
    data-section="{{ $option->section_name ?? '' }}" data-store="{{ $option->store_id ?? '' }}"
    data-theme="{{ $option->theme_id ?? '' }}">
    <div class="custome_tool_bar"></div>
    <div class="container-offset offset-right">

        <div class="row align-items-center">
            <div class="col-lg-7 col-sm-6  col-12">
                <div class="left-side-image">
                    <img src="{{ get_file($section->best_product_second->section->image->image ?? '', $currentTheme) }}"
                        id="{{ $section->best_product_second->section->image->slug ?? ''}}_preview"
                        alt="Prescription glasses and sunglasses">
                </div>
            </div>
            <div class="col-lg-5 col-sm-6 col-12 right-col">
                <div class=" banner-content-inner">
                    <div class="section-title">
                    <h2 id= "{{ $section->best_product_second->section->title->slug ?? '' }}">{!!
                            $section->best_product_second->section->title->text ?? '' !!}</h2>
                    </div>
                    <p id="{{ $section->best_product_second->section->description->slug ?? '' }}">{!!
                        $section->best_product_second->section->description->text ?? '' !!} </p>
                    <a href="{{route('page.product-list',$slug)}}" class="btn white-btn"
                        id="{{ $section->best_product_second->section->button->slug ?? '' }}">{!!
                        $section->best_product_second->section->button->text ?? '' !!}
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

