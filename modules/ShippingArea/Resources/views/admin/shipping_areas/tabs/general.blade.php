{{ Form::text('name', trans('shippingarea::attributes.name'), $errors, $shippingarea, ['labelCol' => 2, 'required' => true]) }}
{{ Form::number('cost', trans('shippingarea::attributes.cost'), $errors, $shippingarea, ['labelCol' => 2, 'required' => true]) }}
{{-- {{ Form::wysiwyg('body', trans('shippingarea::attributes.body'), $errors, $shippingarea, ['labelCol' => 2, 'required' => true]) }} --}}

<div class="row">
    <div class="col-md-8">
        {{ Form::checkbox('is_active', trans('shippingarea::attributes.is_active'), trans('shippingarea::pages.form.enable_the_shippingarea'), $errors, $shippingarea) }}
    </div>
</div>
