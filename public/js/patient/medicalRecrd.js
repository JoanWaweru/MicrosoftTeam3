
$(document).ready( function () {
    $('#example').DataTable({
        "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
              $('td', nRow).css('background-color', '#1c1c1c');
              
          }
    });
} );