
productosMinimos();
topProductos();

function productosMinimos() {
  const url = base_url + "admin/productosMinimos";
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText); //nos ayuda a encontrar el problema mucho mas rapido.
      const res = JSON.parse(this.responseText);
        let nombre = [];
        let cantidad = [];
      for (let i = 0; i < res.length; i++) {
        nombre.push(res[i]['nombre_product']);
        cantidad.push(res[i]['cantidad_product']);
      }

      var ctx = document.getElementById("productMin").getContext("2d");
      var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
      gradientStroke1.addColorStop(0, "#ee0979");
      gradientStroke1.addColorStop(1, "#ff6a00");

      var gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
      gradientStroke2.addColorStop(0, "#283c86");
      gradientStroke2.addColorStop(1, "#39bd3c");

      var gradientStroke3 = ctx.createLinearGradient(0, 0, 0, 300);
      gradientStroke3.addColorStop(0, "#7f00ff");
      gradientStroke3.addColorStop(1, "#e100ff");

      var gradientStroke4 = ctx.createLinearGradient(0, 0, 0, 300);
      gradientStroke4.addColorStop(0, "#4776e6");
      gradientStroke4.addColorStop(1, "#8e54e9");

      var gradientStroke5 = ctx.createLinearGradient(0, 0, 0, 300);
      gradientStroke5.addColorStop(0, "#42e695");
      gradientStroke5.addColorStop(1, "#3bb2b8");

      var myChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: nombre,
          datasets: [
            {
              backgroundColor: [
                gradientStroke1,
                gradientStroke2,
                gradientStroke3,
                gradientStroke4,
                gradientStroke5
              ],

              hoverBackgroundColor: [
                gradientStroke1,
                gradientStroke2,
                gradientStroke3,
                gradientStroke4,
                gradientStroke5
              ],

              data: cantidad,
              borderWidth: [1, 1, 1],
            },
          ],
        },
        options: {
          maintainAspectRatio: false,
          cutoutPercentage: 0,
          legend: {
            position: "bottom",
            display: false,
            labels: {
              boxWidth: 8,
            },
          },
          tooltips: {
            displayColors: false,
          },
        },
      });
    }
  };
}

function topProductos() {
    const url = base_url + "admin/topProductos";
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText); //nos ayuda a encontrar el problema mucho mas rapido.
        const res = JSON.parse(this.responseText);
          let nombre = [];
          let cantidad = [];
        for (let i = 0; i < res.length; i++) {
          nombre.push(res[i]['producto']);
          cantidad.push(res[i]['total']);
        }
  
        var ctx = document.getElementById("topProducto").getContext("2d");
        var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
        gradientStroke1.addColorStop(0, "#ee0979");
        gradientStroke1.addColorStop(1, "#ff6a00");
  
        var gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
        gradientStroke2.addColorStop(0, "#283c86");
        gradientStroke2.addColorStop(1, "#39bd3c");
  
        var gradientStroke3 = ctx.createLinearGradient(0, 0, 0, 300);
        gradientStroke3.addColorStop(0, "#7f00ff");
        gradientStroke3.addColorStop(1, "#e100ff");
  
        var gradientStroke4 = ctx.createLinearGradient(0, 0, 0, 300);
        gradientStroke4.addColorStop(0, "#4776e6");
        gradientStroke4.addColorStop(1, "#8e54e9");
  
        var gradientStroke5 = ctx.createLinearGradient(0, 0, 0, 300);
        gradientStroke5.addColorStop(0, "#42e695");
        gradientStroke5.addColorStop(1, "#3bb2b8");
  
        var myChart = new Chart(ctx, {
          type: "pie",
          data: {
            labels: nombre,
            datasets: [
              {
                backgroundColor: [
                  gradientStroke1,
                  gradientStroke2,
                  gradientStroke3,
                  gradientStroke4,
                  gradientStroke5
                ],
  
                hoverBackgroundColor: [
                  gradientStroke1,
                  gradientStroke2,
                  gradientStroke3,
                  gradientStroke4,
                  gradientStroke5
                ],
  
                data: cantidad,
                borderWidth: [1, 1, 1],
              },
            ],
          },
          options: {
            maintainAspectRatio: false,
            cutoutPercentage: 0,
            legend: {
              position: "bottom",
              display: false,
              labels: {
                boxWidth: 8,
              },
            },
            tooltips: {
              displayColors: false,
            },
          },
        });
      }
    };
  }
