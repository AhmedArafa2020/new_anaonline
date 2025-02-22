
@foreach($best_seller_category as $category)
    <div class="col-md-3 col-sm-6 col-12 category-card">
        <div class="category-inner">
            <a href="{{route('page.product-list',[$slug,'main_category' => $category->id ])}}" class="category-img" >
                <img src="{{ get_file($category->icon_path, $currentTheme) }}" alt="" style="width: 30%;">
            </a>
            <div class="category-contant">
                <div class="top-content">
                    <div class="section-title">
                        <h3>{{$category->name}}</h3>
                    </div>
                  
                </div>
                <div class="bottom-content">
                    <a href="{{route('page.product-list',[$slug,'main_category' => $category->id ])}}" class="link-btn">{{ $section->category->section->button_second->text ?? "" }}</a>
                </div>
            </div>
        </div>
    </div>
@endforeach