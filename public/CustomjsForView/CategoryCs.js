
setTimeout(
    function LoadTable() {
        $('.dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: config.routes.loadtable,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'Category_Name', name: 'Category_Name'}  ,
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
}, 0001);
    
    $(document).on('click','.updatecategory',function(event){
        var catidUp = event.target.id;
        if(catidUp=="")
        {
            new Noty({
                    text: 'Warning! Please Refresh The Page And Check Your Internet Connection.',
                    type: 'warning'
                    }).show();
        }
        else
        {
        $.ajax({
                url: config.routes.getpcategory,
                data: {"Id":catidUp},
                dataType:"json",
                type: 'POST',
                beforeSend:function() {
                    Loadingpg();
                },
                success: function (data) {
                $('#CategoryModal').modal('show');
                $("#ucat").val(data.Category_Name);
                $("#ucatid").val(data.Id);
                },
                error:function() {},
                complete:function() {
                   $('.tabledata').unblock();
                }
            });
        }
    });


    $(document).on('click','.btnupdatecategory',function(event){
        var updatenamecategory = $("#ucat").val();
        var upadtecatid=$("#ucatid").val();
        if(updatenamecategory=="" || upadtecatid=="")
        {
            new Noty({
                    text: 'Warning! Name Is Empty .',
                    type: 'warning'
                    }).show();
        }
        else
        {
            $('#CategoryModal').modal('hide');
        $.ajax({
                url: config.routes.updatecategory,
                data: {"Id":upadtecatid,"upName":updatenamecategory},
                dataType:"json",
                type: 'POST',
                beforeSend:function() {
                    Loadingpg();
            },
                success: function (data) {
                   
            swal({
                title: 'Good job!',
                text: 'Well Done Category Update!',
                type: 'success',
                showCloseButton: true
            }).catch(swal.noop);
    
                },
                error:function() {},
                complete:function() {
                   $('.tabledata').unblock();
                }
            });
        }
    });

   
    
    /* $(document).on('focusout','.Category',function(){
        if($(".Category").val() != "")
        {
            $.ajax({
                url: config.routes.getcategory,
                data: {"Cname":$(".Category").val()},
                dataType:"json",
                type: 'POST',
                beforeSend:function() {}, 
                success: function (data) {
                    if ( data.length != 0 ){
                    $(".savecategory").attr("disabled", true);
                    new Noty({
                    text: 'Warning! Please Check The Name Is Alredy Exist In Your System.',
                    type: 'warning'
                    }).show();
                 }else{
                    $(".savecategory").attr("disabled", false);
                 }

                 },
                error:function() {},
                complete:function() {}
            });
        }
        }); */
        

    $(document).on('click','.savecategory',function(){
        if($(".Category").val()=="")
        {
            new Noty({
                text: 'Please Fill The Category Name.',
                type: 'error'
            }).show();
        }
        else
        {
            $.ajax({
                url: config.routes.StoreCategory,
                data: {"Cname":$(".Category").val()},
                dataType:"json",
                type: 'POST',
                beforeSend:function() {
                    storecat();
                },
                success: function (data) {
                   if(data==true)
                   {      new Noty({
                            text: 'You successfully Store Category.',
                            type: 'success'
                            }).show();
                            $(".Category").focus();
                           
                   }
                   else
                   {        new Noty({
                                text: 'Category Is Not Saved. Server Is Down.',
                                type: 'alert'
                            }).show();
                            
                   }
                },
                error:function() {
                    new Noty({
                        text: 'Category Is Already Saved !.',
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
$(document).on('click','.deltecategory',function(event){
    var catidUp = event.target.id;
    if(catidUp=="")
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
            url: config.routes.deltecategory,
            data: {"Id":catidUp},
            dataType:"json",
            type: 'POST',
            beforeSend:function() {
                Loadingpg(); 
            },
            success: function (data) {
                $('.tabledata').unblock();
                swal(
                 'Deleted!',
                 'Your Category Has been deleted.',
                 'success'
             );
            },
            error:function() {
                $('.tabledata').unblock();
                new Noty({
                    text: 'Your Category Has Subcategory Please Delete it First.',
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