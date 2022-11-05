$('#tablebiblioteca').DataTable();
var tablebiblioteca;

document.addEventListener('DOMContentLoaded',function(){
  
    tablebiblioteca = $('#tablebiblioteca').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            "url": "./models/biblioteca/table_biblioteca.php",
            "dataSrc":""
        },
        "columns": [
          
            {"data":"biblioteca_id"},
            {"data":"titulo"},
            {"data":"tipo_id"},
            {"data":"autor"},
            {"data":"editorial"},
            {"data":"año"},
            {"data":"estado"},
        ],
        "responsive": true,
        "bDestroy": true,
        "iDisplayLength":10,
        "order": [[0,"asc"]]
        
    });
})


