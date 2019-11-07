var Select2Selects = function() {
    var _componentSelect2 = function() {
        if (!$().select2) {
            console.warn('Warning - select2.min.js is not loaded.');
            return;
        }

        $('#updatecategory').select2({
            minimumInputLength: 1,
            ajax: {
                url: config.routes.categorylist,
                dataType: 'json',
            },
        });
        
        $('#category').select2({
            minimumInputLength: 1,
            ajax: {
                url: config.routes.categorylist,
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
        $('.SubcategoryTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: config.routes.loadtable,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'Subcategory_Name', name: 'Subcategory_Name'},
            {data: 'Category_Name', name: 'Category_Name'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
}, 0001);

var GlobalCategory;
setTimeout(
    function LoadTable() {
        $('.SubcategoryTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: config.routes.loadtable,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'Subcategory_Name', name: 'Subcategory_Name'},
            {data: 'Category_Name', name: 'Category_Name'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
}, 0001);

$(document).on('click','.subcategoryupdate',function(event){
    var updatesubcategory = $("#updatecategory").val();
    var upadtesubid=$("#UsubcategoryId").val();
    var updatesubcategoryname=$("#updatesubcategory").val();
    if(updatesubcategory=="" || upadtesubid=="" || updatesubcategoryname =="")
    {
        new Noty({
                text: 'Choose Category Or Type Name ? .',
                type: 'warning'
                }).show();
    }
    else
    {
        
    $.ajax({
            url: config.routes.SaveUpdateSubcategory,
            data: {"Id":upadtesubid,"updateSubcategory":updatesubcategoryname,"Updatecategory":updatesubcategory},
            dataType:"json",
            type: 'POST',
            beforeSend:function() {
            },
            success: function (data) {
                new Noty({
                    text: 'You Sub-Category successfully update.',
                    type: 'success'
                    }).show();
                    $('#SubcategoryUpdateModal').modal('hide');
            },
            error:function() {
                new Noty({
                    text: 'Subcategory Has Been Not Update!.',
                    type: 'alert'
                }).show();
            },
            complete:function() {
                
            }
        });
    }
});


$(document).on('click','.updatesubcategory',function(event){
    var SubcategoryID = event.target.id;
    if(SubcategoryID=="")
    {
        new Noty({
                text: 'Warning! Please Refresh The Page And Check Your Internet Connection.',
                type: 'warning'
                }).show();
    }
    else
    {
    $.ajax({
            url: config.routes.GetUpdateData,
            data: {"Id":SubcategoryID},
            dataType:"json",
            type: 'POST',
            beforeSend:function() {
                Loadingpg();
            },
            success: function (subCategory) {
            $('#SubcategoryUpdateModal').modal('show');
            if ($('#updatecategory').find("option[value='" + subCategory.CategoryId + "']").length) {
                $('#updatecategory').val(subCategory.CategoryId).trigger('change');
            } else { 
                var newOption = new Option(subCategory.Category_Name, subCategory.CategoryId, true, true);
                $('#updatecategory').append(newOption).trigger('change');
            }   
            $("#updatesubcategory").val(subCategory.Subcategory_Name);
            $("#UsubcategoryId").val(subCategory.Id);
            },
            error:function() {
                new Noty({
                    text: 'Cannot Find Subcategory Please Check Connection!.',
                    type: 'alert'
                }).show();
            },
            complete:function() {
               $('.tabledata').unblock();
            }
        });
    }
});



$(document).on('click','.savesubcategory',function(){
    if($(".subCategory").val()=="" || $("#category").val()=="")
    {
        new Noty({
            text: 'Choose or Write a few things up and try again.',
            type: 'error'
        }).show();
    }
    else
    {
        $.ajax({
            url: config.routes.Storesubcategory,
            data: {"subcategory":$(".subCategory").val(),"CategoryId":$("#category").val()},
            dataType:"json",
            type: 'POST',
            beforeSend:function() {
                storecat();
            },
            success: function (data) {
               if(data==true)
               {      new Noty({
                        text: 'You successfully Store Sub-Category.',
                        type: 'success'
                        }).show();
                        $(".subCategory").val("");
                        $(".subCategory").focus();
                       
               }
               else
               {        new Noty({
                            text: 'Sub Category Is Not Saved. Server Is Down.',
                            type: 'alert'
                        }).show();
                        
               }
            },
            error:function() {
                new Noty({
                    text: 'Sub Category Is Already Saved !.',
                    type: 'alert'
                }).show();
                $(".Category").focus();
                
            },
            complete:function() {
                $(".Category").val("");
                $('.loaderanim').unblock();

            }
        });
    }               
});

$(document).on('click','.deletesubcategory',function(event){
    var SubcatId = event.target.id;
    if(SubcatId=="")
    {
        new Noty({
                text: 'Warning! Please Refresh The Page And Check Your Internet Connection.',
                type: 'warning'
                }).show();
    }
    else
    {   
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            confirmButtonText: 'Yes, delete it!',
            confirmButtonClass: 'btn btn-success',
            buttonsStyling: false
        }).then(function (result) {
            if (result.value = true) {
            $.ajax({
            url: config.routes.deletesubcategory,
            data: {"Id":SubcatId},
            dataType:"json",
            type: 'POST',
            beforeSend:function() {
                Loadingpg(); 
            },
            success: function (data) {
                $('.tabledata').unblock();
                swal(
                 'Deleted!',
                 'Your Sub-Category Has been deleted.',
                 'success'
             );
            },
            error:function() {
                $('.tabledata').unblock();
                new Noty({
                    text: 'Your Subcategory Not Deleted.',
                    type: 'warning'
                    }).show();
            },
            complete:function() {
              
        }
    });
 }
});
}
});