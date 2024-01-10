//Registro para nuevos usuarios
const frm = document.querySelector('#frmRegistro');
let tblProductos;

//Modificacion de usuarios
const btnRegistro = document.querySelector('#btnRegistro');

//Bootstrap
var firstTabEl = document.querySelector('#myTab li:last-child button')
var firstTab = new bootstrap.Tab(firstTabEl)

let desc;

//AJAX
document.addEventListener("DOMContentLoaded", function(){

    //CONVERTIR EN EDITOR DE TEXT AREA
    ClassicEditor
        .create( document.querySelector('#descripcion'), {
            toolbar: {
                items: [
                    'exportPDF','exportWord', '|',
                    'findAndReplace', 'selectAll', '|',
                    'heading', '|',
                    'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                    'bulletedList', 'numberedList', 'todoList', '|',
                    'outdent', 'indent', '|',
                    'undo', 'redo',
                    '-',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                    'alignment', '|',
                    'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                    'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                    'textPartLanguage', '|',
                    'sourceEditing'
                ],
                shouldNotGroupWhenFull: true
            },
        })

        .then( newEditor => {
            desc = newEditor;
        } )

        .catch( error => {
            console.error( error );
        } );

    tblProductos = $('#tblProductos').DataTable({
        ajax: {
            url: base_url + 'productos/listar',
            dataSrc: ''
        },
        columns: [
            { data: 'id' },
            { data: 'nombre_product' },
            { data: 'precio_product' },
            { data: 'cantidad_product' },
            { data: 'imagen_product' },
            { data: 'accion' }
        ],
        dom,
        buttons
    } );

    //Formulario de registro de productos
    frm.addEventListener('submit', function(e){
        e.preventDefault();
        let data = new FormData(this);
        data.append('descripcion', desc.getData());
        const url = base_url + 'productos/registrar';
        const http = new XMLHttpRequest();
        http.open('POST', url, true);
        http.send(data);
        http.onreadystatechange = function (){
            if(this.readyState == 4 && this.status == 200){
                console.log(this.responseText); //nos ayuda a encontrar el problema mucho mas rapido.
                const res = JSON.parse(this.responseText);
                if(res.icono == 'success'){
                    tblProductos.ajax.reload();
                    document.querySelector('#imagen_product').value = '';
                }
                Swal.fire('Aviso', res.msg.toUpperCase(), res.icono)
                setTimeout(() => {
                    window.location.reload();
                }, 2000);
            }
        }
    });
});

//Eliminar usuarios de la base de datos
function eliminarProductos(idProd){
    Swal.fire({
        title: 'AVISO',
        text: "¿ESTAS SEGURO DE ELIMINAR ESTE PRODUCTO?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'SI, QUIERO ELIMINARLO',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + 'productos/delete/' + idProd;
            const http = new XMLHttpRequest();
            http.open('GET', url, true);
            http.send();
            http.onreadystatechange = function (){
                if(this.readyState == 4 && this.status == 200){
                    console.log(this.responseText); //nos ayuda a encontrar el problema mucho mas rapido.
                    const res = JSON.parse(this.responseText);
                    if(res.icono == 'success'){
                        tblProductos.ajax.reload();
                    }
                    Swal.fire('Aviso', res.msg.toUpperCase(), res.icono)
                }
            }
        }
      })
}

//Editar usuarios de la base de datos
function editarProductos(idProd){
    const url = base_url + 'productos/editar/' + idProd;
    const http = new XMLHttpRequest();
    http.open('GET', url, true);
    http.send();
    http.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText); //nos ayuda a encontrar el problema mucho mas rapido.
            const res = JSON.parse(this.responseText);
            document.querySelector('#id').value = res.id;
            document.querySelector('#nombre').value = res.nombre_product;
            document.querySelector('#precio').value = res.precio_product;
            document.querySelector('#cantidad').value = res.cantidad_product;
            document.querySelector('#categoria').value = res.id_categoria;
            document.querySelector('#descripcion').value = res.descripcion_product;
            document.querySelector('#imagen_actual').value = res.imagen_product;
            btnRegistro.textContent = 'Actualizar Producto';
            firstTab.show();
        }
    }
}