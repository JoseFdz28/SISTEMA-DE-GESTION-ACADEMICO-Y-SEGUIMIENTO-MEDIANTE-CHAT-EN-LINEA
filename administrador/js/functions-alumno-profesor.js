$('#tablealumnoprofesor').DataTable();
var tablealumnoprofesor;

document.addEventListener('DOMContentLoaded',function(){
  
    tablealumnoprofesor = $('#tablealumnoprofesor').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            "url": "./models/alumno-profesor/table_alumno_profesor.php",
            "dataSrc":""
        },
        "columns": [
            {"data":"acciones"},
            {"data":"ap_id"},
            {"data":"nombre_alumno"},
            {"data":"nombre"},
            {"data":"nombre_grado"},
            {"data":"nombre_materia"},
            {"data":"nombre_periodo"},
            {"data":"estadop"}
        ],
        "responsive": true,
        "bDestroy": true,
        "iDisplayLength":10,
        "order": [[0,"asc"]]
        
    });

    var formAlumnoProfesor = document.querySelector('#formAlumnoProfesor');
    formAlumnoProfesor.onsubmit = function (e) {
        e.preventDefault();
        var idalumnoprofesor = document.querySelector('#idalumnoprofesor').value;
        var alumno = document.querySelector('#listAlumno').value;
        var profesor = document.querySelector('#listaProfesor').value;
        var periodo = document.querySelector('#listPeriodo').value;
        var estado = document.querySelector('#listEstado').value;
        if (alumno == '' || profesor == '' || periodo == '' || estado == '') {
swal('Atencion','Todos los campos deben ser llenados','error');
return false;  
        }
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest : new ActiveXObject('Micreosoft.XMLHTTP');
        var url = './models/alumno-profesor/ajax-alumno-profesor.php';
        var form = new FormData(formAlumnoProfesor);
        request.open('POST',url,true);
        request.send(form);
        request.onreadystatechange = function(){
            if (request.readyState == 4 && request.status == 200) {
            var data = JSON.parse(request.responseText);
            if (request.status) {
                $('#modalAlumnoProfesor').modal('hide');
                formAlumnoProfesor.reset();
                swal('Crear Profesor Alumno',data.msg,'success');
                tablealumnoprofesor.ajax.reload();
            }else{
                swal('Atencion',data.msg,'error');
            }
                
            }
        }
    }
})
function openModalalpr() {
    document.querySelector('#idalumnoprofesor').value = "";
    document.querySelector('#tituloModal').innerHTML = 'Nuevo Profeso Alumno';
    document.querySelector('#action').innerHTML = 'Guardar';
    document.querySelector('#formAlumnoProfesor').reset();
    $('#modalAlumnoProfesor').modal('show');
}

window.addEventListener('load',function(){
showaProfesor();
showAlumnos();
showPeriodos();
},false);

function showaProfesor() {
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest : new ActiveXObject('Micreosoft.XMLHTTP');
    var url = './models/options/options-aprofesor.php';
    request.open('GET',url,true);
    request.send();
    request.onreadystatechange = function(){
        if (request.readyState == 4 && request.status == 200) {
        var data = JSON.parse(request.responseText);
      data.forEach(function(valor) {
        data += '<option value="'+valor.pm_id+'">Profesor: '+valor.nombre+',Grado: '+valor.nombre_grado+',Aula: '+valor.nombre_aula+',Materia: '+valor.nombre_materia+'</option>';
      });
      document.querySelector('#listaProfesor').innerHTML = data;
            
        }
    }
}

function showAlumnos() {
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest : new ActiveXObject('Micreosoft.XMLHTTP');
    var url = './models/options/options-alumnos.php';
    request.open('GET',url,true);
    request.send();
    request.onreadystatechange = function(){
        if (request.readyState == 4 && request.status == 200) {
        var data = JSON.parse(request.responseText);
      data.forEach(function(valor) {
        data += '<option value="'+valor.alumno_id+'">'+valor.nombre_alumno+'</option>';
      });
      document.querySelector('#listAlumno').innerHTML = data;
            
        }
    }
}

function showPeriodos() {
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest : new ActiveXObject('Micreosoft.XMLHTTP');
    var url = './models/options/options-periodos.php';
    request.open('GET',url,true);
    request.send();
    request.onreadystatechange = function(){
        if (request.readyState == 4 && request.status == 200) {
        var data = JSON.parse(request.responseText);
      data.forEach(function(valor) {
        data += '<option value="'+valor.periodo_id+'">'+valor.nombre_periodo+'</option>';
      });
      document.querySelector('#listPeriodo').innerHTML = data;
            
        }
    }
}

function editarAlumnoProfesor(id) {
    var idalumnoprofesor = id;
    document.querySelector('#tituloModal').innerHTML = 'Actualizar Profesor alumno profesor';
    document.querySelector('#action').innerHTML = 'Actualizar';
     var request = (window.XMLHttpRequest) ? new XMLHttpRequest : new ActiveXObject('Micreosoft.XMLHTTP');
        var url = './models/alumno-profesor/edit-alumno-profesor.php?id='+idalumnoprofesor;
        request.open('GET',url,true);
        request.send();
        request.onreadystatechange = function(){
            if (request.readyState == 4 && request.status == 200) {
                var data = JSON.parse(request.responseText);
            if (data.status) {

            document.querySelector('#idalumnoprofesor').value = data.data.ap_id;
            document.querySelector('#listAlumno').value = data.data.alumno_id;
            document.querySelector('#listaProfesor').value = data.data.pm_id;
            document.querySelector('#listPeriodo').value = data.data.periodo_id;
            document.querySelector('#listEstado').value = data.data.estadop;


                $('#modalAlumnoProfesor').modal('show');
            }else{
                swal('Atencion',data.msg,'error');
            }
                
            }
        }
}

function eliminarAlumnoProfesor(id) {
    var idalumnoprofesor = id;
    swal({
        title: "Eliminar Proceso",
        text: "Realmente desea eliminar el proceso?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si eliminar",
        cancelButtonText: "No cancelar",
        closeOnConfirm: false,
        CloseOnCancel: true
    },function (confirm) {
        if (confirm) {
            var request = (window.XMLHttpRequest) ? new XMLHttpRequest : new ActiveXObject('Micreosoft.XMLHTTP');
            var url = './models/alumno-profesor/delet-alumno-profesor.php';
            request.open('POST',url,true);
            var strData = "id="+idalumnoprofesor;
            request.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            request.send(strData);
           
            request.onreadystatechange = function(){
                if (request.readyState == 4 && request.status == 200) {
                    var data = JSON.parse(request.responseText);
                if (data.status) {
                    swal('Eliminar',data.msg,'success');
                    tablealumnoprofesor.ajax.reload();
                }else{
                    swal('Atencion',data.msg,'error');
                }
                    
                }
            }
        }
        
    })
}