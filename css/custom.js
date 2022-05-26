// Pouzije datatablea pre tabulky s triedou tablejs 
$(document).ready(function() {
    $('.table').DataTable();
} );


$(document).ready(function() {
    $('.display').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    } );
} );