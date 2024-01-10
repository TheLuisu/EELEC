//Registro para nuevos usuarios
const nuevo = document.querySelector('#nuevoUsuario');
const frm = document.querySelector('#frmRegistro');
const titleModal = document.querySelector('#titleModal');
let tblUsuarios;

//Modificacion de usuarios
const btnRegistro = document.querySelector('#btnRegistro');

const myModal = new bootstrap.Modal(document.getElementById('nuevoModal'));

//AJAX
document.addEventListener("DOMContentLoaded", function(){
    tblUsuarios = $('#tblUsuarios').DataTable({
        ajax: {
            url: base_url + 'usuarios/listar',
            dataSrc: ''
        },
        columns: [
            { data: 'id' },
            { data: 'nombres' },
            { data: 'apellidos' },
            { data: 'correo' },
            { data: 'perfil' },
            { data: 'accion' }
        ],
        dom,
        buttons
    } );

    //Levantar modal
    nuevo.addEventListener('click', function(){
        document.querySelector('#id').value = '';
        titleModal.textContent = "REGISTRAR USUARIO"
        btnRegistro.textContent = "Registrar usuario"
        frm.reset();
        document.querySelector('#password').removeAttribute('readonly');
        myModal.show();
    });

    //Formulario de registro
    frm.addEventListener('submit', function(e){
        e.preventDefault();
        let data = new FormData(this);
        const url = base_url + 'usuarios/registrar';
        const http = new XMLHttpRequest();
        http.open('POST', url, true);
        http.send(data);
        http.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                console.log(this.responseText); //nos ayuda a encontrar el problema mucho mas rapido.
                const res = JSON.parse(this.responseText);
                if(res.icono == 'success'){
                    myModal.hide();
                    tblUsuarios.ajax.reload();
                }
                Swal.fire('Aviso', res.msg.toUpperCase(), res.icono)
            }
        }
    });
});

//Eliminar usuarios de la base de datos
function eliminarUser(idUser){
    Swal.fire({
        title: 'AVISO',
        text: "¿ESTAS SEGURO DE ELIMINAR ESTE A USUARIO?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'SI, QUIERO ELIMINARLO',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + 'usuarios/delete/' + idUser;
            const http = new XMLHttpRequest();
            http.open('GET', url, true);
            http.send();
            http.onreadystatechange = function (){
                if(this.readyState == 4 && this.status == 200){
                    console.log(this.responseText); //nos ayuda a encontrar el problema mucho mas rapido.
                    const res = JSON.parse(this.responseText);
                    if(res.icono == 'success'){
                        tblUsuarios.ajax.reload();
                    }
                    Swal.fire('Aviso', res.msg.toUpperCase(), res.icono)
                }
            }
        }
      })
}

//Editar usuarios de la base de datos
function editarUser(idUser){
    const url = base_url + 'usuarios/editar/' + idUser;
    const http = new XMLHttpRequest();
    http.open('GET', url, true);
    http.send();
    http.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText); //nos ayuda a encontrar el problema mucho mas rapido.
            const res = JSON.parse(this.responseText);
            document.querySelector('#id').value = res.id;
            document.querySelector('#nombre').value = res.nombres;
            document.querySelector('#apellido').value = res.apellidos;
            document.querySelector('#correo').value = res.correo;
            // document.querySelector('#password').setAttribute('readonly', 'readonly');
            document.querySelector('#password').value = '';
            btnRegistro.textContent = 'Actualizar usuario';
            titleModal.textContent = "ACTUALIZAR USUARIO"
            myModal.show();
            // if(res.icono == 'success'){
            //     myModal.hide();
            //     tblUsuarios.ajax.reload();
            // }
            // Swal.fire('Aviso', res.msg.toUpperCase(), res.icono)
        }
    }
}