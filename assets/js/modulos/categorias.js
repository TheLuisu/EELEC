//Registro para nuevos usuarios
const nuevo = document.querySelector('#nuevoUsuario');
const frm = document.querySelector('#frmRegistro');
const titleModal = document.querySelector('#titleModal');
let tblCategorias;

//Modificacion de usuarios
const btnRegistro = document.querySelector('#btnRegistro');

const myModal = new bootstrap.Modal(document.getElementById('nuevoModal'));

//AJAX
document.addEventListener("DOMContentLoaded", function(){
    tblCategorias = $('#tblCategorias').DataTable({
        ajax: {
            url: base_url + 'categorias/listar',
            dataSrc: ''
        },
        columns: [
            { data: 'id' },
            { data: 'categorias' },
            { data: 'imagen_categorias' },
            { data: 'accion' }
        ],
        dom,
        buttons
    } );

    //Levantar modal
    nuevo.addEventListener('click', function(){
        document.querySelector('#id').value = '';
        document.querySelector('#imagen_categorias').value = '';
        document.querySelector('#imagen_actual').value = '';
        titleModal.textContent = "REGISTRAR CATEGORIA"
        btnRegistro.textContent = "Registrar categoria"
        frm.reset();
        myModal.show();
    });

    //Formulario de registro de categorias
    frm.addEventListener('submit', function(e){
        e.preventDefault();
        let data = new FormData(this);
        const url = base_url + 'categorias/registrar';
        const http = new XMLHttpRequest();
        http.open('POST', url, true);
        http.send(data);
        http.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                console.log(this.responseText); //nos ayuda a encontrar el problema mucho mas rapido.
                const res = JSON.parse(this.responseText);
                if(res.icono == 'success'){
                    myModal.hide();
                    tblCategorias.ajax.reload();
                    document.querySelector('#imagen_categorias').value = '';
                }
                Swal.fire('Aviso', res.msg.toUpperCase(), res.icono)
            }
        }
    });
});

//Eliminar usuarios de la base de datos
function eliminarCategorias(idCat){
    Swal.fire({
        title: 'AVISO',
        text: "¿ESTAS SEGURO DE ELIMINAR ESTA CATEGORIA?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'SI, QUIERO ELIMINARLO',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + 'categorias/delete/' + idCat;
            const http = new XMLHttpRequest();
            http.open('GET', url, true);
            http.send();
            http.onreadystatechange = function (){
                if(this.readyState == 4 && this.status == 200){
                    console.log(this.responseText); //nos ayuda a encontrar el problema mucho mas rapido.
                    const res = JSON.parse(this.responseText);
                    if(res.icono == 'success'){
                        tblCategorias.ajax.reload();
                    }
                    Swal.fire('Aviso', res.msg.toUpperCase(), res.icono)
                }
            }
        }
      })
}

//Editar usuarios de la base de datos
function editarCategorias(idCat){
    const url = base_url + 'categorias/editar/' + idCat;
    const http = new XMLHttpRequest();
    http.open('GET', url, true);
    http.send();
    http.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText); //nos ayuda a encontrar el problema mucho mas rapido.
            const res = JSON.parse(this.responseText);
            document.querySelector('#id').value = res.id;
            document.querySelector('#categoria').value = res.categorias;
            document.querySelector('#imagen_actual').value = res.imagen_categorias;
            btnRegistro.textContent = 'Actualizar categoria';
            titleModal.textContent = "ACTUALIZAR CATEGORIA"
            myModal.show();
        }
    }
}