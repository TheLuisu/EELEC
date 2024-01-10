let tblPendientes, tblFinalizados, tblProceso;

const myModal = new bootstrap.Modal(document.getElementById("modalPedidos"));

//AJAX
document.addEventListener("DOMContentLoaded", function () {
  tblPendientes = $("#tblPendientes").DataTable({
    ajax: {
      url: base_url + "pedidos/listarPedidos",
      dataSrc: "",
    },
    columns: [
      { data: "id_transaccion" },
      { data: "monto" },
      { data: "estado" },
      { data: "fecha" },
      { data: "email" },
      { data: "nombre" },
      { data: "apellido" },
      { data: "direccion" },
      { data: "accion" },
    ],
    dom,
    buttons,
  });

  tblProceso = $("#tblProceso").DataTable({
    ajax: {
      url: base_url + "pedidos/listarProceso",
      dataSrc: "",
    },
    columns: [
      { data: "id_transaccion" },
      { data: "monto" },
      { data: "estado" },
      { data: "fecha" },
      { data: "email" },
      { data: "nombre" },
      { data: "apellido" },
      { data: "direccion" },
      { data: "accion" },
    ],
    dom,
    buttons,
  });

  tblFinalizados = $("#tblFinalizados").DataTable({
    ajax: {
      url: base_url + "pedidos/listarFinalizados",
      dataSrc: "",
    },
    columns: [
      { data: "id_transaccion" },
      { data: "monto" },
      { data: "estado" },
      { data: "fecha" },
      { data: "email" },
      { data: "nombre" },
      { data: "apellido" },
      { data: "direccion" },
      { data: "accion" },
    ],
    dom,
    buttons,
  });
});

//Eliminar usuarios de la base de datos
function cambiarProceso(idPedido, proceso) {
  Swal.fire({
    title: "AVISO",
    text: "¿ESTAS SEGURO DE CAMBIAR EL ESTADO DEL PROCESO?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "SI, QUIERO CAMBIARLO",
    cancelButtonText: "Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "pedidos/update/" + idPedido + "/" + proceso;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          console.log(this.responseText); //nos ayuda a encontrar el problema mucho mas rapido.
          const res = JSON.parse(this.responseText);
          if (res.icono == "success") {
            tblPendientes.ajax.reload();
            tblProceso.ajax.reload();
            tblFinalizados.ajax.reload();
          }
          Swal.fire("Aviso", res.msg.toUpperCase(), res.icono);
        }
      };
    }
  });
}

function verPedido(idPedido) {
  const url = base_url + "clientes/verPedido/" + idPedido;
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      let html = "";
      res.productos.forEach((row) => {
        html += `<tr>
                    <td>${row.producto}</td>
                    <td style="text-align: center;"><span class="badge bg-info">${"$" + row.precio + " " + res.moneda}</span></td>
                    <td style="text-align: center;"><span class="badge bg-warning">${row.cantidad}</span></td>
                    <td>${"$ " + parseFloat(row.precio) * parseInt(row.cantidad).toFixed(2)}</td>
                </tr>`;
      });
      document.querySelector("#tablePedidos tbody").innerHTML = html;
      myModal.show();
    }
  };
}
