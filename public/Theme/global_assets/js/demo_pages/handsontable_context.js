/* ------------------------------------------------------------------------------
 *
 *  # Handsontable - Excel-like tables with extensive funtionality
 *
 *  Demo JS code for handsontable_context.html page
 *
 * ---------------------------------------------------------------------------- */


// Setup module
// ------------------------------

var HotContextMenu = function() {


    //
    // Setup module components
    //

    
    // HOT context menu examples
    var _componentHotContextMenu = function(productdata) {
        
        if (typeof Handsontable == 'undefined') {
            console.warn('Warning - handsontable.min.js is not loaded.');
            return;
        }

        // Define element
        var hot_context_copy = document.getElementById('hot_context_copy');
        var sheetclip = new SheetClip();
        var clipboardCache = '';

        // Initialize with options
            hot_context_copy_init = new Handsontable(hot_context_copy, {
            data: productdata,
            rowHeaders: true,
            stretchH: 'all',
            contextMenu: false,
            colHeaders: ['P_name', 'Mrp', 'S.P.', 'Dis', 'Qty','Gst','Total'],
            columnSummary: [
            {
            destinationRow: 13,
            destinationColumn: 4,
            reversedRowCoords: true,
            type: 'sum',
            forceNumeric: true
            }],
            columns: [
                {
                    data: 'P_name',
                    readOnly: true,
                    width: 40

                },
                {
                    data: 'mrp',
                    readOnly: true,
                    width: 10

                },
                {
                   data: 'Purchase_rate',
                    readOnly: true,
                    width: 10
                  
                },
                {
                    data: 'dis',
                    readOnly: true,
                    className: 'htLeft',
                    width: 10
                   
                },
                {
                    data: 1,
                    className: 'htLeft QtyChange',
                    width: 10
                    
                },
                {
                    data: 'GST',
                    readOnly: true,
                    type: 'numeric',
                    className: 'htLeft',
                    width: 10
                   
                },
                {
                    data: 'Purchase_rate',
                    readOnly: true,
                    className: 'htLeft',
                    width: 10
                    
                }
            ],

            beforeChange: function(changes, source){
                /*console.log("Before Change Event");
                console.log(source);
                console.log(changes);
                var row = source[0][0], col = source[0][1];
                  if(row  === 0 && col  === 0){
                   //operation for cell (0,0)
                  }*/
            },
            afterCopy: function(changes,source) {
                clipboardCache = sheetclip.stringify(changes);
                console.log(source);
                console.log(changes);

            },
            afterCut: function(changes,source) {
                clipboardCache = sheetclip.stringify(changes);
                console.log(source);
                console.log(changes);
            },
            afterPaste: function(changes,source) {
                clipboardCache = sheetclip.stringify(changes);
                console.log(source);
                console.log(changes);
            },
            afterChange: function(changes, source,e) {
               /* console.log("After Change Event");
                console.log(e);
                console.log(changes);
                console.log(source);*/

            } 
            
        });
    };



    


    



    // 
    // Return objects assigned to module
    //


    return {
        init: function(productdata) {
            _componentHotContextMenu(productdata);
        }
    }
}();


// Initialize module
// ------------------------------


    

