document.addEventListener('DOMContentLoaded', function () {
    var formKardex = document.querySelector('#formCitacion');
    formKardex.onsubmit = function (e) {
        e.preventDefault();

        var idpm = document.querySelector('#idpm').value;
        var idcitacion = document.querySelector('#idcitacion').value;
        var detalle = document.querySelector('#detalle').value;
        var fecha = document.querySelector('#fecha').value;
    

        if (detalle.trim() == '') {
            swal('Atencion', 'Todos los campos son necesarios', 'error');
            return false;
        }

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTTP');
        var url ='./models/citacion/ajax-citacion.php';
        var form = new FormData(formCitacion);
        request.open('POST',url,true);
        request.send(form);
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var data = JSON.parse(request.responseText);

                if (data.status) {
                swal({
                    title: "Citacion registrada",
                    type: "success",
                    confirmButtonText: "Aceptar",
                    closeOnConfirm: true
                },function (confirm) {
                    if (confirm) {
                      
                            $('#modalCitacion').modal('hide');
                            location.reload();
                            formCitacion.reset();
                      
                    }
                })
            }else{
                swal('Atencion',data.msg, 'error');
            }
            }
        }
    }
});

function openModalCitacion() {
    document.querySelector('#idcitacion').value;
    document.querySelector('#tituloModal').innerHTML ='Nuevo Registro';
    document.querySelector('#action').innerHTML ='Guardar';
    document.querySelector('#formCitacion').reset();
    $('#modalCitacion').modal('show');
}


function insertarCitacion(id) {
    var idcitacion= id;
    document.querySelector('#tituloModal').innerHTML = 'Insertar citaciones';
    document.querySelector('#action').innerHTML = 'Guardar';
     var request = (window.XMLHttpRequest) ? new XMLHttpRequest : new ActiveXObject('Micreosoft.XMLHTTP');
        var url = './models/citacion/edit-citacion.php?idcitacion='+idcitacion;
        request.open('GET',url,true);
        request.send();
        request.onreadystatechange = function(){
            if (request.readyState == 4 && request.status == 200) {
                var data = JSON.parse(request.responseText);
            if (data.status) {

            document.querySelector('#idcitacion').value = data.data.citacion_id;
            document.querySelector('#detalle').value = data.data.detalle;
            document.querySelector('#fecha').value = data.data.fecha;
       


                $('#modalCitacion').modal('show');
            }else{
                swal('Atencion',data.msg,'error');
            }
                
            }
        }

}
