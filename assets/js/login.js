const btnRegister = document.querySelector('#btnRegister');
const btnLogin = document.querySelector('#btnLogin');
const frmLogin = document.querySelector('#frmLogin');
const frmRegister = document.querySelector('#frmRegister');

//Constantes del registro
const Registrarse = document.querySelector('#Registrarse');
const nombreRegistro = document.querySelector('#nombreRegistro');
const correoRegistro = document.querySelector('#correoRegistro');
const claveRegistro = document.querySelector('#claveRegistro');

//Constantes para login
const login = document.querySelector('#login');
const correoLogin = document.querySelector('#correoLogin');
const claveLogin = document.querySelector('#claveLogin');

//Modal's del login xd
const modalLogin = new bootstrap.Modal(document.getElementById('my_modal_login'));

//Barra de busqueda
const inputBusqueda = document.querySelector('#inputModalSearch');

document.addEventListener('DOMContentLoaded', function () {
    btnRegister.addEventListener('click', function () {
        frmLogin.classList.add('d-none');
        frmRegister.classList.remove('d-none');
    })
    btnLogin.addEventListener('click', function () {
        frmLogin.classList.remove('d-none');
        frmRegister.classList.add('d-none');
    })
    //Registro
    Registrarse.addEventListener('click', function () {
        if(nombreRegistro.value == '' || correoRegistro.value == '' || claveRegistro.value == ''){
            Swal.fire("Aviso", "TODOS LOS CAMPOS SON REQUERIDOS", "warning");
        } else {
            let formData = new FormData();
            formData.append('nombre', nombreRegistro.value);
            formData.append('correo', correoRegistro.value);
            formData.append('clave', claveRegistro.value);

            const url = base_url + 'clientes/registroDirecto';
            const http = new XMLHttpRequest();
            http.open('POST', url, true);
            http.send(formData);
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    Swal.fire("Aviso", res.msg, res.icono);
                    if(res.icono == 'success'){
                        setTimeout(() => {
                            enviarCorreo(correoRegistro.value, res.token)
                        }, 2000);
                    }
                }
            }
        } 
    })

    //Login directo
    login.addEventListener('click', function () {
        if(correoLogin.value == '' || claveLogin.value == ''){
            Swal.fire("Aviso", "TODOS LOS CAMPOS SON REQUERIDOS", "warning");
        } else {
            let formData = new FormData();
            formData.append('correoLogin', correoLogin.value);
            formData.append('claveLogin', claveLogin.value);

            const url = base_url + 'clientes/loginDirecto';
            const http = new XMLHttpRequest();
            http.open('POST', url, true);
            http.send(formData);
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    Swal.fire("Aviso", res.msg, res.icono);
                    if(res.icono == 'success'){
                        setTimeout(() => {
                            window.location.reload();
                        }, 2000);
                    }
                }
            }
        } 
    })

    //Busqueda de productos
    inputBusqueda.addEventListener('keyup', function(e){
        const url = base_url + 'principal/busqueda/' + e.target.value;
        const http = new XMLHttpRequest();
        http.open('GET', url, true);
        http.send();
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                let html = '';
                res.forEach(producto => {
                    html += `
                        <div class="col-12 col-md-4 mb-4">
                            <div class="card h-100">
                                <a href="${ base_url + 'principal/details/' + producto.id }">
                                    <img src="${ base_url + producto.imagen_product }" class="card-img-top" alt="${ producto.nombre_product }">
                                </a>
                                <div class="card-body">
                                    <ul class="list-unstyled d-flex justify-content-between">
                                        <li class="text-muted text-right">${ producto.precio_product }</li>
                                    </ul>
                                    <a href="${ base_url + 'principal/details/' + producto.id }" class="h2 text-decoration-none text-dark">${ producto.nombre_product }</a>
                                    <p class="card-text">
                                        ${ producto.descripcion_product }
                                    </p>
                                </div>
                            </div>
                        </div>`;
                });
                document.querySelector('#resultBusqueda').innerHTML = html; 
            }
        }
    })

});

function enviarCorreo(correo, token){
    let formData = new FormData();
    formData.append("token", token);
    formData.append("correo", correo);

    const url = base_url + 'clientes/enviarCorreo';
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(formData);
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            Swal.fire("Aviso", res.msg, res.icono);
            if(res.icono == 'success'){
                setTimeout(() => {
                    window.location.reload();
                }, 2000);
            }
        }
    }
}

function abrirModalLogin(){
    my_modal.hide();
    modalLogin.show();
}