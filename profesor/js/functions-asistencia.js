document.addEventListener('DOMContentLoaded', function () {
    var formAsistencia = document.querySelector('#formAsistencia');
    formAsistencia.onsubmit = function (e) {
        e.preventDefault();
      
        var idap = document.querySelector('#idap[]').value;
        var estado = document.querySelector('#estado[]').value;
    
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTTP');
        var url ='./models/boletin/ajax-boletin.php';
        var form = new FormData(formBoletin);
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
                      
                            $('#modalBoletin').modal('hide');
                            location.reload();
                            formBoletin.reset();
                      
                    }
                })
            }else{
                swal('Atencion',data.msg, 'error');
            }
            }
        }
    }
});

function modalBoletin() {
    $('#modalBoletin').modal('show');
}

function insertarNota(id) {
    var idboletin= id;
    document.querySelector('#tituloModal').innerHTML = 'Insertar notas';
    document.querySelector('#action').innerHTML = 'Guardar';
     var request = (window.XMLHttpRequest) ? new XMLHttpRequest : new ActiveXObject('Micreosoft.XMLHTTP');
        var url = './models/boletin/edit-boletin.php?idboletin='+idboletin;
        request.open('GET',url,true);
        request.send();
        request.onreadystatechange = function(){
            if (request.readyState == 4 && request.status == 200) {
                var data = JSON.parse(request.responseText);
            if (data.status) {

            document.querySelector('#idbo').value = data.data.bo_id;
            document.querySelector('#nota1').value = data.data.primerTrimestre;
            document.querySelector('#nota2').value = data.data.segundoTrimestre;
            document.querySelector('#nota3').value = data.data.tercerTrimestre;


                $('#modalBoletin').modal('show');
            }else{
                swal('Atencion',data.msg,'error');
            }
                
            }
        }

}
