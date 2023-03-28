var datatable;

class DatataleClass {
    datatable(tab = 'today') {
        if ($('#data-table').length > 0) {
            datatable = $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                "responsive": true,
                "aaSorting": [],

                "ajax": {
                    "url": APP_URL + "/admin/product/",
                    "type": "POST",
                    "dataType": "json"
                },
                "columnDefs": [{
                    "orderable": true, //set not orderable
                },],
                columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'category_name',
                    name: 'category_name'
                },
                {
                    data: 'product_description',
                    name: 'product_description'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                },
                ]
            });
        }
    }
}
const DataTableIndexClass = new DatataleClass();
$(function () {
    DataTableIndexClass.datatable();
});

function change_status(object) {
    var id = $(object).data("id");
    var status = $(object).data("status");

    Swal.fire({
        title: 'Are you sure want change status?',
        text: "",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#5f76e8',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Confirm'
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                url: APP_URL + "/admin/product/change-status",
                type: "POST",
                data: {
                    id: id,
                    status: status
                },
                dataType: "JSON",
                success: function (data) {
                    if (data.code == 200) {
                        Swal.fire('Success!', 'Status changed successfully.', 'success');
                        datatable.ajax.reload();
                    } else {
                        Swal.fire('', 'Failed to change status', 'error');
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    Swal.fire('', 'Failed to change status', 'error');
                }
            });
        }
    });
}