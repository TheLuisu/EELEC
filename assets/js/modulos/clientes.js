const tableListaProd = document.querySelector("#tableListaProductos tbody");
//const tblPendientes = document.querySelector("tblPendientes");

let tblPendientes;


const estadoEnviado = document.querySelector("#estadoEnviado");
const estadoProceso = document.querySelector("#estadoProceso");
const estadoCompletado = document.querySelector("#estadoCompletado");

document.addEventListener("DOMContentLoaded", function () {
  if (tableListaProd) {
    getListaProductos();
  }
  //AJAX
  tblPendientes = $("#tblPendientes").DataTable({
    ajax: {
      url: base_url + "clientes/listarPendientes",
      dataSrc: "",
    },
    columns: [
      { data: "id_transaccion" },
      { data: "monto" },
      { data: "fecha" },
      { data: "accion" },
    ],
  });

  // tblPedidoComplet = $("#tblPedidoComplet").DataTable({
  //   ajax: {
  //     url: base_url + "clientes/listarCompletos",
  //     dataSrc: "",
  //   },
  //   columns: [
  //     { data: "id_transaccion" },
  //     { data: "monto" },
  //     { data: "fecha" },
  //     { data: "accion" },
  //   ],
  // });
});

function getListaProductos() {
  let html = "";
  const url = base_url + "principal/listaProductos";
  const http = new XMLHttpRequest();
  http.open("POST", url, true);
  http.send(JSON.stringify(listaCarrito));
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      const res = JSON.parse(this.responseText);
      if (res.totalPaypal > 0) {
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
                    </tr>`;
        });
        tableListaProd.innerHTML = html;
        document.querySelector("#totalProducto").textContent =
          "TOTAL A PAGAR: $" + res.total;
        botonPaypal(res.totalPaypal);
      } else {
        tableListaProd.innerHTML = `
                  <tr>
                      <td colspan="5" class="text-center">EL CARRITO ESTA VACÍO</td>
                  </tr>
                  `;
      }
    }
  };
}

function botonPaypal(total) {
  paypal
    .Buttons({
      // Order is created on the server and the order id is returned
      createOrder: (data, actions) => {
        return actions.order.create({
          purchase_units: [
            {
              amount: {
                value: total,
              },
            },
          ],
        });
      },
      // Finalize the transaction on the server after payer approval
      onApprove: (data, actions) => {
        return actions.order.capture().then(function (orderData) {
          // console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
          // const transaction = orderData.purchase_units[0].payments.captures[0];
          // alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
          registrarPedido(orderData);
        });
      },
    })
    .render("#paypal-button-container");
}

function registrarPedido(datos) {
  const url = base_url + "clientes/registrarPedido";
  const http = new XMLHttpRequest();
  http.open("POST", url, true);
  http.send(
    JSON.stringify({
      pedidos: datos,
      productos: listaCarrito,
    })
  );
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      const res = JSON.parse(this.responseText);
      if (res.icono == "success") {
        localStorage.removeItem("listaCarrito");
        setTimeout(() => {
          window.location.reload();
        }, 2000);
      }
    }
  };
}

function verPedido(idPedido) {

  estadoEnviado.classList.remove('services-icon-wap');
  estadoEnviado.classList.remove('shadow');

  estadoCompletado.classList.remove('services-icon-wap');
  estadoCompletado.classList.remove('shadow');
  
  estadoProceso.classList.remove('services-icon-wap');
  estadoProceso.classList.remove('shadow');

  const mPedido = new bootstrap.Modal(document.getElementById("modalPedido"));
  const url = base_url + "clientes/verPedido/" + idPedido;
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      const res = JSON.parse(this.responseText);
      let html = "";
      if (res.pedido.proceso == 1) {
        estadoEnviado.classList.add('services-icon-wap');
        
      } else if(res.pedido.proceso == 2){
        estadoProceso.classList.add('services-icon-wap');
      } else {
        estadoCompletado.classList.add('services-icon-wap');
      }
      res.productos.forEach((row) => {
        html += `<tr>
                    <td>${row.producto}</td>
                    <td style="text-align: center;"><span class="badge bg-info">${
                      "$" + row.precio + " " + res.moneda
                    }</span></td>
                    <td style="text-align: center;"><span class="badge bg-warning">${
                      row.cantidad
                    }</span></td>
                    <td>${
                      "$ " +
                      parseFloat(row.precio) * parseInt(row.cantidad).toFixed(2)
                    }</td>
                </tr>`;
      });
      document.querySelector("#tablePedidos tbody").innerHTML = html;
      mPedido.show();
    }
  };
}
