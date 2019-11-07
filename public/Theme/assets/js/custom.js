/* ------------------------------------------------------------------------------
 *
 *  # Custom JS code
 *
 *  Place here all your custom js. Make sure it's loaded after app.js
 *
 * ---------------------------------------------------------------------------- */

window.alert = function() {};

var token =  $('meta[name="csrf-token"]').attr('content');  
$.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': token
          }
    });
    function Loadingpg(){
        $('.tabledata').block({
        message: '<i class="icon-spinner9 spinner"></i>',
        overlayCSS: {
            backgroundColor: '#1B2024',
            opacity: 0.85,
            cursor: 'wait'
        },
        css: {
            border: 0,
            padding: 0,
            backgroundColor: 'none',
            color: '#fff'
        }
    }); 
}

function storecat(){
    $('.loaderanim').block({
        message: '<i class="icon-spinner9 spinner"></i>',
        overlayCSS: {
            backgroundColor: '#1B2024',
            opacity: 0.85,
            cursor: 'wait'
        },
        css: {
            border: 0,
            padding: 0,
            backgroundColor: 'none',
            color: '#fff'
        }
    });
}

setTimeout(function(){ var today = new Date()
    var curHr = today.getHours()

    if (curHr < 12) {
        $("#CurrentTime").html("Good Morning");
    } else if (curHr < 18) {
        
        $("#CurrentTime").html("Good Afternoon");
    } else {
        
        $("#CurrentTime").html("Good Evening");
    } }, 0100);
    

