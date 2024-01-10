const btnAddDeseo = document.querySelectorAll(".btnAddDeseo");
const btnAddCarrito = document.querySelectorAll(".btnAddCarrito");
const btnDeseo = document.querySelector('#btnCantidadDeseo');
const btnCarrito = document.querySelector('#btnCantidadCarrito');
const verCarrito = document.querySelector('#verCarrito');
const tableListaCarrito = document.querySelector('#tableListaCarrito tbody');

const my_modal = new bootstrap.Modal(document.getElementById("my_modal"));

let listaDeseo, listaCarrito;

document.addEventListener("DOMContentLoaded", function () {
  if (localStorage.getItem("listaDeseo") != null) {
    listaDeseo = JSON.parse(localStorage.getItem("listaDeseo"));
  }

  if (localStorage.getItem("listaCarrito") != null) {
    listaCarrito = JSON.parse(localStorage.getItem("listaCarrito"));
  }

  for (let i = 0; i < btnAddDeseo.length; i++) {
    btnAddDeseo[i].addEventListener("click", function () {
      let idProducto = btnAddDeseo[i].getAttribute("prod");
      agregarDeseo(idProducto);
    });
  }

  for (let i = 0; i < btnAddCarrito.length; i++) {
    btnAddCarrito[i].addEventListener("click", function () {
      let idProducto = btnAddCarrito[i].getAttribute("prod");
      agregarCarrito(idProducto, 1);
    });
  }

  cantidadDeseo();
  cantidadCarrito();

  //Ver Carrito
  verCarrito.addEventListener("click", function () {
    getListaCarrito();
    my_modal.show();
  })
});

//Agregar productos a la lista de deseos
function agregarDeseo(idProducto) {
  if (localStorage.getItem("listaDeseo") == null) {
    listaDeseo = [];
  } else {
    let listaExiste = JSON.parse(localStorage.getItem("listaDeseo"));
    for (let i = 0; i < listaExiste.length; i++) {
      if (listaExiste[i]["idProducto"] == idProducto) {
        Swal.fire(
          "Aviso",
          "EL PRODUCTO YA ESTA EN LA LISTA DE DESEOS",
          "warning"
        );
        return;
      }
    }
    listaDeseo.concat(localStorage.getItem("listaDeseo"));
  }
  listaDeseo.push({
    idProducto: idProducto,
    cantidad: 1,
  });
  localStorage.setItem("listaDeseo", JSON.stringify(listaDeseo));
  Swal.fire("Aviso", "PRODUCTO AGREGADO A LA LISTA DE DESEOS", "success");
  cantidadDeseo();
}

function cantidadDeseo() {
  let listas = JSON.parse(localStorage.getItem("listaDeseo"));
  if (listas != null) {
    btnDeseo.textContent = listas.length;
  } else {
    btnDeseo.textContent = 0;
  }
}

//Agregar productos al carrito
function agregarCarrito(idProducto, cantidad, accion = false) {
  if (localStorage.getItem("listaCarrito") == null) {
    listaCarrito = [];
  } else {
    let listaExiste = JSON.parse(localStorage.getItem("listaCarrito"));
    for (let i = 0; i < listaExiste.length; i++) {
      if (accion) {
        eliminarListaDeseo(idProducto);
      }
      if (listaExiste[i]["idProducto"] == idProducto) {
        Swal.fire("Aviso", "EL PRODUCTO YA ESTA EN EL CARRITO", "warning");
        return;
      }
    }
    listaCarrito.concat(localStorage.getItem("listaCarrito"));
  }
  listaCarrito.push({
    idProducto: idProducto,
    cantidad: cantidad,
  });
  localStorage.setItem("listaCarrito", JSON.stringify(listaCarrito));
  Swal.fire("Aviso", "PRODUCTO AGREGADO AL CARRITO", "success");
  cantidadCarrito();
}

function cantidadCarrito() {
  let listas = JSON.parse(localStorage.getItem("listaCarrito"));
  if (listas != null) {
    btnCarrito.textContent = listas.length;
  } else {
    btnCarrito.textContent = 0;
  }
}

//Ver Carrito

function getListaCarrito() {
  const url = base_url + "principal/listaProductos";
  const http = new XMLHttpRequest();
  http.open("POST", url, true);
  http.send(JSON.stringify(listaCarrito));
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      let html = "";
      res.productos.forEach((producto) => {
        html += `<tr>
                    <td>
                        <img class="img-thumbnail rounded-circle" src="${
                          producto.imagen
                        }" alt="" width="50">
                    </td>
                    <td>${producto.nombre}</td>
                    <td style="text-align: center;">
                        <span class="badge bg-info">${
                          "$" + producto.precio + " " + res.moneda
                        }</span>
                    </td>
                    <td style="text-align: center;">
                        <span class="badge bg-warning"> ${
                          producto.cantidad
                        } </span>
                    </td>
                    <td>${producto.subTotal}</td>
                    <td>
                        <button class="btn btn-danger btnEliminarCarrito" type="button" prod="${
                          producto.id
                        }"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>`;
      });
      tableListaCarrito.innerHTML = html;
      document.querySelector("#totalGeneral").textContent = res.total;
      btnEliminarCarrito();
    }
  };
}

function btnEliminarCarrito() {
  let listaEliminar = document.querySelectorAll(".btnEliminarCarrito");
  for (let i = 0; i < listaEliminar.length; i++) {
    listaEliminar[i].addEventListener("click", function () {
      let idProducto = listaEliminar[i].getAttribute("prod");
      eliminarListaCarrito(idProducto);
    });
  }
}

function eliminarListaCarrito(idProducto) {
  for (let i = 0; i < listaCarrito.length; i++) {
    if (listaCarrito[i]["idProducto"] == idProducto) {
      listaCarrito.splice(i, 1);
    }
  }
  localStorage.setItem("listaCarrito", JSON.stringify(listaCarrito));
  getListaCarrito();
  cantidadCarrito();
  Swal.fire("Aviso", "PRODUCTO ELIMINADO CORRECTAMENTE", "success");
}
