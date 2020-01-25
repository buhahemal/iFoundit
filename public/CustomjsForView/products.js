var Select2Selects = function() {
    var _componentSelect2 = function() {
        if (!$().select2) {
            console.warn('Warning - select2.min.js is not loaded.');
            return;
        }
        $('#product_category').select2({
            minimumInputLength: 1, 
            ajax: {
                url: config.routes.pcatlist,
                dataType: 'json',
            },
        });

    };
    return {
        init: function() {
            _componentSelect2();
        }
    }
}();
document.addEventListener('DOMContentLoaded', function() {
    Select2Selects.init();
});

setTimeout(
    function LoadTable() {
        $('.dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: config.routes.loadtable,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'Name', name: 'Name'}  ,
            {data: 'Description', name: 'Description'}  , 
            {
                name: 'Image',
                data: 'Image',
                render: function (Image) {
                    return "<img src=http://localhost/iFoundit/public/ItemsImg/"+ Image +" }} height=\"115\"/>";
                },
            },  
            {data: 'PostUsername', name: 'PostUsername'}  ,
            {data: 'ClaimUsername', name: 'ClaimUsername'}  ,
            {data: 'Category_Name', name: 'Category_Name'}  ,
            {data: 'created_at', name: 'created_at'}  ,
            {data: 'Status', name: 'Status',
                render: function (Status) {
                    if(Status==2)
                    {
                        return "<span class='badge bg-success-400'>Sucess</span>";
                    }
                    if(Status==1)
                    {
                        return "<span class='badge bg-danger'>Pending</span>";
                    }
                },
            } ,
        ]
    });
}, 0001);