var Select2Selects = function() {
    var _componentSelect2 = function() {
        if (!$().select2) {
            console.warn('Warning - select2.min.js is not loaded.');
            return;
        }
        $('#product_category').select2({
            minimumInputLength: 1, 
            ajax: {
                url: config.routes.categorylist,
                dataType: 'json',
            },
        });

        $('#product_subcategory').select2({
            minimumInputLength: 1,
            ajax: {
                url: config.routes.subcategorylist,
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
        $('.Products').DataTable({
        processing: true,
        serverSide: true,
        ajax: config.routes.loadtable,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'Category_Name', name: 'Subcategory_Name'},
            {data: 'Subcategory_Name', name: 'Category_Name'},
            {data: 'Product_name', name: 'Product_name'},
            {data: 'Product_qty', name: 'Product_qty'},
            {data: 'Product_price', name: 'Product_price'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
}, 0001);



$(document).on('focusout','#product_name',function(){
    if($("#product_name").val().length >= 20)
    {
        $("#product_name").css("border-bottom", "red solid 2px");
        new Noty({
            text: 'Product-Name Must Be In 20 Character.',
            type: 'error'
        }).show();
    }
    else
    {
        $("#product_name").css("border-bottom", "1px solid #ddd");
    }
});

$(document).on('click','.product_save',function(){
    if($("#product_category").val()=="" || $("#product_subcategory").val()=="" || $("#product_name").val()=="" || $("#product_price").val()=="" || $("#product_qty").val()=="")
    {
        new Noty({
            text: 'Choose or Write a few things up and try again.',
            type: 'error'
        }).show();
    }
    else  
    {
        $.ajax({
            url: config.routes.Storeproduct,
            data: {"category":$("#product_category").val(),"subcategory":$("#product_subcategory").val(),"productname":$("#product_name").val(),"productprice":$("#product_price").val(),"productqty":$("#product_qty").val()},
            dataType:"json",
            type: 'POST',
            beforeSend:function() {
                storecat();
            },
            success: function (data) {
               if(data==true)
               {      
                        new Noty({
                        text: 'Your Product Successfully Store.',
                        type: 'success'
                        }).show();                       
               }
               else
               {        new Noty({
                            text: 'Product Is Not Saved. Server Is Down.',
                            type: 'alert'
                        }).show();
                        
               }
            },
            error:function() {
                new Noty({
                    text: 'Product Is Already Saved !.',
                    type: 'alert'
                }).show();
                $("#product_name").focus();
                
            },
            complete:function() {
                $("#product_name").val("");
                $('.loaderanim').unblock();

            }
        });
    }               
});
 