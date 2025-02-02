te View File
Now i will create a file autocomplete.blade.php in following path resources/views/.

<!DOCTYPE html>
<html>
<head>
    <title>Laravel 5 - Autocomplete Mutiple Fields Using jQuery, Ajax and MySQL</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
</head>
<body>
<div class="container">
  <h1>Laravel 5 - Autocomplete Mutiple Fields Using jQuery, Ajax and MySQL</h1>
  
      
    <table class="table table-bordered">
      <tr>
          <th><input class='check_all' type='checkbox' onclick="select_all()"/></th>
          <th>S. No</th>
          <th>Country Name</th>
          <th>Country code</th>
      </tr>
      <tr>
          <td><input type='checkbox' class='chkbox'/></td>
          <td><span id='sn'>1.</span></td>
          <td><input class="form-control autocomplete_txt" type='text' data-type="countryname" id='countryname_1' name='countryname[]'/></td>
          <td><input class="form-control autocomplete_txt" type='text' data-type="country_code" id='country_code_1' name='country_code[]'/> </td>
        </tr>
      </table>
      <button type="button" class='btn btn-danger delete'>- Delete</button>
      <button type="button" class='btn btn-success addbtn'>+ Add More</button>
  
</div>
<script type="text/javascript">
          
 $(".delete").on('click', function() {
  $('.chkbox:checkbox:checked').parents("tr").remove();
  $('.check_all').prop("checked", false); 
  updateSerialNo();
});
var i=$('table tr').length;
$(".addbtn").on('click',function(){
  count=$('table tr').length;
  
    var data="<tr><td><input type='checkbox' class='chkbox'/></td>";
      data+="<td><span id='sn"+i+"'>"+count+".</span></td>";
      data+="<td><input class='form-control autocomplete_txt' type='text' data-type='countryname' id='countryname_"+i+"' name='countryname[]'/></td>";
      data+="<td><input class='form-control autocomplete_txt' type='text' data-type='country_code' id='country_code_"+i+"' name='country_code[]'/></td></tr>";
  $('table').append(data);
  i++;
});
        
function select_all() {
  $('input[class=chkbox]:checkbox').each(function(){ 
    if($('input[class=check_all]:checkbox:checked').length == 0){ 
      $(this).prop("checked", false); 
    } else {
      $(this).prop("checked", true); 
    } 
  });
}
function updateSerialNo(){
  obj=$('table tr').find('span');
  $.each( obj, function( key, value ) {
    id=value.id;
    $('#'+id).html(key+1);
  });
}
//autocomplete script
$(document).on('focus','.autocomplete_txt',function(){
    $(this).autocomplete({
      minLength: 1,
      source: function( request, response ) {
           $.ajax({
               type:'GET',
               url: "{{ URL::to('searchproduct') }}",
               dataType: "json",
               data: {
                   term : request.term,
               },
               success: function(data) {

                   var array = $.map(data, function (item) {
                      return {
                          label: item['Name'],
                          value: item['Id'],
                          data : item
                      }
                  });
                   response(array)
               }
           });
                  
      },
      select: function( event, ui ) {
          var data = ui.item.data;           
          id_arr = $(this).attr('id'); 
          id = id_arr.split("_");
          elementId = id[id.length-1];
         
         console.log(ui.item.data);
      }
  });
  
   
   
});
</script>
</body>
</html>