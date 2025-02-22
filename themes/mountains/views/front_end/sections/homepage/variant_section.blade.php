<section class="products padding-bottom">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-sm-6 col-12">
                <div class="img-wrapper">
                    <img src="{{ get_file($section->variant_background->section->image->image ?? '', $currentTheme) }}" id="{{ $section->variant_background->section->image->slug ?? '' }}" alt="ring">
                </div>
            </div>
            <div class="col-sm-6 col-12">
                <div class="section-title">
                    <h2 id="{{ $section->variant_background->section->title->slug ?? '' }}_preview"> {!!
                    $section->variant_background->section->title->text ?? '' !!}
                    </h2>
                    <p id="{{ $section->variant_background->section->description->slug ?? '' }}_preview"> {!!
                    $section->variant_background->section->description->text ?? '' !!}
                    </p>
                    <a href="{{ route('page.product-list', [$slug, 'main_category' => $product->category_id]) }}"
                        class="home-btn btn" id="{{ $section->variant_background->section->button->slug ?? '' }}_preview"> {!!
                    $section->variant_background->section->button->text ?? '' !!}
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16"
                            viewBox="0 0 14 16" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M11.1258 5.12599H2.87416C2.04526 5.12599 1.38823 5.82536 1.43994 6.65265L1.79919 12.4008C1.84653 13.1581 2.47458 13.7481 3.23342 13.7481H10.7666C11.5254 13.7481 12.1535 13.1581 12.2008 12.4008L12.5601 6.65265C12.6118 5.82536 11.9547 5.12599 11.1258 5.12599ZM2.87416 3.68896C1.21635 3.68896 -0.0977 5.08771 0.00571155 6.74229L0.364968 12.4904C0.459638 14.0051 1.71574 15.1852 3.23342 15.1852H10.7666C12.2843 15.1852 13.5404 14.0051 13.635 12.4904L13.9943 6.74229C14.0977 5.08771 12.7836 3.68896 11.1258 3.68896H2.87416Z"
                                fill="#F2DFCE" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M3.40723 4.4075C3.40723 2.42339 5.01567 0.814941 6.99979 0.814941C8.9839 0.814941 10.5923 2.42339 10.5923 4.4075V5.84453C10.5923 6.24135 10.2707 6.56304 9.87384 6.56304C9.47701 6.56304 9.15532 6.24135 9.15532 5.84453V4.4075C9.15532 3.21703 8.19026 2.25197 6.99979 2.25197C5.80932 2.25197 4.84425 3.21703 4.84425 4.4075V5.84453C4.84425 6.24135 4.52256 6.56304 4.12574 6.56304C3.72892 6.56304 3.40723 6.24135 3.40723 5.84453V4.4075Z"
                                fill="#F2DFCE" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>