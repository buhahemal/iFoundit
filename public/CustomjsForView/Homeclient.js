
setTimeout(
    function LoadTable() {
        var  category = $('#category');
        $.ajax({
            url: config.routes.categorygetall,
            type: 'GET',
            beforeSend:function() {
                
            },
            success: function (data) {
                for(i=0;i<=data.length;i++)
                {
                    var $option = "<option value='"+data[i].Id+"'>"+ data[i].Category_Name+"</option>";
                    category.append($option);
                }
            },
            error:function() {
                
            },
            complete:function() {
            }
        });
    },0005);

    