<div class="accordion-box-content">
    <div class="row">
        <div class="col-md-8">
            {{ Form::checkbox('storefront_one_column_banner2_enabled', trans('storefront::attributes.section_status'), trans('storefront::storefront.form.enable_one_column_banner_section2'), $errors, $settings) }}
        </div>
    </div>

    <div class="tab-content clearfix">
        <div class="panel-wrap">
            @include('storefront::admin.storefront.tabs.partials.single_banner', [
                'label' => trans('storefront::storefront.form.banner'),
                'name' => 'storefront_one_column_banner2',
                'banner' => $banner,
            ])
        </div>
    </div>
</div>
