$(document).ready( function () {
  
    // Mengesave History Page
    var savedPage =  isNaN(localStorage.getItem('datatablePage')) ? 0 : localStorage.getItem('datatablePage')
    var table = $('#dataTable').DataTable({
        displayStart: savedPage  * 10
    });

    table.on( 'page.dt', function () {
    var info = table.page.info();
    localStorage.setItem("datatablePage", info.page)
    });
  
    // Data Picker Initialization
    $('.datepicker').pickadate();

} );