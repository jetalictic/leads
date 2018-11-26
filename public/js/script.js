$( document ).ready(function() {    
    $('#example').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "data.php",
        pageLength: 50,
        "lengthMenu": [[10, 25, 50, 100, 250], [10, 25, 50, 100, 250]],
        dom: "<lB<'left'f>r<t><'bottom'l>ip>",
        buttons: [
            {
                extend: 'csv',
                text: 'Export to .csv file',
                extension: '.csv',
                exportOptions: {
                    modifier: {
                        page: 'all'
                    }
                },
                title: 'leads'
            }, 
        ]
    }); 
});

$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
} );
