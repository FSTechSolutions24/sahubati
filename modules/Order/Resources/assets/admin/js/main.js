$('#order-status').change((e) => {
    $.ajax({
        type: 'PUT',
        url: route('admin.orders.status.update', e.currentTarget.dataset.id),
        data: { status: e.currentTarget.value },
        success: (message) => {
            success(message);
        },
        error: (xhr) => {
            error(xhr.responseJSON.message);
        },
    });
});

$('#is_order_paid').change((e) => {


    if($('#is_order_paid').is(':checked')){
        var is_order_paid = 1;
    } else {
        var is_order_paid = 0;
    }

    $.ajax({
        type: 'PUT',
        url: route('admin.orders.is_order_paid.update', e.currentTarget.dataset.id),
        data: { is_order_paid: is_order_paid },
        success: (message) => {
            success(message);
        },
        error: (xhr) => {
            error(xhr.responseJSON.message);
        },
    });
});
