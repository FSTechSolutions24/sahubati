@extends('storefront::public.layout')

@section('title', setting('store_tagline'))

@section('content')
    @includeUnless(is_null($slider), 'storefront::public.home.sections.slider')

    @if (setting('storefront_features_section_enabled'))
        <home-features :features="{{ json_encode($features) }}"></home-features>
    @endif

    @if (setting('storefront_one_column_banner5_enabled'))
        <banner-one-column :banner="{{ json_encode($oneColumnBanner5) }}"></banner-one-column>
    @endif

    @if (setting('storefront_featured_categories_section_enabled'))
        <featured-categories :data="{{ json_encode($featuredCategories) }}"></featured-categories>
    @endif

    @if (setting('storefront_two_column_banners_enabled'))
        <banner-two-column :data="{{ json_encode($twoColumnBanners) }}"></banner-two-column>
    @endif

    @if (setting('storefront_one_column_banner_enabled'))
        <banner-one-column :banner="{{ json_encode($oneColumnBanner) }}"></banner-one-column>
    @endif

    @if (setting('storefront_three_column_full_width_banners_enabled'))
        <banner-three-column-full-width :data="{{ json_encode($threeColumnFullWidthBanners) }}">
        </banner-three-column-full-width>
    @endif

    @if (setting('storefront_product_tabs_1_section_enabled'))
        <product-tabs-one :data="{{ json_encode($productTabsOne) }}"></product-tabs-one>
    @endif

    @if (setting('storefront_two_column_banners1_enabled'))
        <banner-two-column :data="{{ json_encode($twoColumnBanners1) }}"></banner-two-column>
    @endif

    @if (setting('storefront_one_column_banner1_enabled'))
        <banner-one-column :banner="{{ json_encode($oneColumnBanner1) }}"></banner-one-column>
    @endif

    @if (setting('storefront_top_brands_section_enabled') && $topBrands->isNotEmpty())
        <top-brands :top-brands="{{ json_encode($topBrands) }}"></top-brands>
    @endif

    @if (setting('storefront_product_tabs_2_section_enabled'))
        <product-tabs-two :data="{{ json_encode($tabProductsTwo) }}"></product-tabs-two>
    @endif

    @if (setting('storefront_two_column_banners2_enabled'))
        <banner-two-column :data="{{ json_encode($twoColumnBanners2) }}"></banner-two-column>
    @endif

        @if (setting('storefront_one_column_banner2_enabled'))
        <banner-one-column :banner="{{ json_encode($oneColumnBanner2) }}"></banner-one-column>
    @endif

    @if (setting('storefront_flash_sale_and_vertical_products_section_enabled'))
        <flash-sale-and-vertical-products
            :data="{{ json_encode($flashSaleAndVerticalProducts) }}"
            :flash-sale-enabled="{{ setting('storefront_active_flash_sale_campaign') ? 'true' : 'false' }}"
        >
        </flash-sale-and-vertical-products>
    @endif

    @if (setting('storefront_two_column_banners3_enabled'))
        <banner-two-column :data="{{ json_encode($twoColumnBanners3) }}"></banner-two-column>
    @endif

    @if (setting('storefront_one_column_banner3_enabled'))
        <banner-one-column :banner="{{ json_encode($oneColumnBanner3) }}"></banner-one-column>
    @endif


    @if (setting('storefront_product_grid_section_enabled'))
        <product-grid :data="{{ json_encode($productGrid) }}"></product-grid>
    @endif


    @if (setting('storefront_two_column_banners4_enabled'))
        <banner-two-column :data="{{ json_encode($twoColumnBanners4) }}"></banner-two-column>
    @endif

    @if (setting('storefront_one_column_banner4_enabled'))
        <banner-one-column :banner="{{ json_encode($oneColumnBanner4) }}"></banner-one-column>
    @endif

    @if (setting('storefront_three_column_banners_enabled'))
        <banner-three-column :data="{{ json_encode($threeColumnBanners) }}"></banner-three-column>
    @endif

    @if (setting('storefront_product_packages_section_enabled'))
        <product-packages :data="{{ json_encode($productPackages) }}"></product-packages>
    @endif

    @if (setting('storefront_blogs_section_enabled'))
        <blog-posts :data="{{ json_encode($blogPosts) }}"></blog-posts>
    @endif
@endsection
