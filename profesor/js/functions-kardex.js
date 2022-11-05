document.addEventListener('DOMContentLoaded', function () {
    var formKardex = document.querySelector('#formKardex');
    formKardex.onsubmit = function (e) {
        e.preventDefault();

        var idka = document.querySelector('#idka').value;
        var idpa = document.querySelector('#idap').value;
        var alumno = document.querySelector('#alumno').value;
        var observacion = document.querySelector('#observacion').value;
        var fecha = document.querySelector('#fecha').value;
    

        if (observacion.trim() == '') {
            swal('Atencion', 'Todos los campos son necesarios', 'error');
            return false;
        }

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTTP');
        var url ='./models/Kardex/ajax-kardex.php';
        var form = new FormData(formKardex);
        request.open('POST',url,true);
        request.send(form);
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var data = JSON.parse(request.responseText);

                if (data.status) {
                swal({
                    title: "Nota registrada",
                    type: "success",
                    confirmButtonText: "Aceptar",
                    closeOnConfirm: true
                },function (confirm) {
                    if (confirm) {
                      
                            $('#modalKardex').modal('hide');
                            location.reload();
                            formKardex.reset();
                      
                    }
                })
            }else{
                swal('Atencion',data.msg, 'error');
            }
            }
        }
    }
});

function openModalKardex() {
    document.querySelector('#idka').value;
    document.querySelector('#tituloModal').innerHTML ='Nuevo Registro';
    document.querySelector('#action').innerHTML ='Guardar';
    document.querySelector('#formKardex').reset();
    $('#modalKardex').modal('show');
}


function insertarKardex(id) {
    var idkardex= id;
    document.querySelector('#tituloModal').innerHTML = 'Insertar notas';
    document.querySelector('#action').innerHTML = 'Guardar';
     var request = (window.XMLHttpRequest) ? new XMLHttpRequest : new ActiveXObject('Micreosoft.XMLHTTP');
        var url = './models/kardex/edit-kardex.php?idkardex='+idkardex;
        request.open('GET',url,true);
        request.send();
        request.onreadystatechange = function(){
            if (request.readyState == 4 && request.status == 200) {
                var data = JSON.parse(request.responseText);
            if (data.status) {

            document.querySelector('#idka').value = data.data.kardex_id;
            document.querySelector('#observacion').value = data.data.observacion;
            document.querySelector('#fecha').value = data.data.fecha;
       


                $('#modalKardex').modal('show');
            }else{
                swal('Atencion',data.msg,'error');
            }
                
            }
        }

}
