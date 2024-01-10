<?php include_once 'Views/template/header-admin.php'; ?>

<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
    <div class="col">
        <div class="card radius-10 border-start border-0 border-3 border-warning">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Pedidos Pendientes</p>
                        <h4 class="my-1 text-warning"><?php echo $data['pendientes']['total'] ?></h4>
                    </div>
                    <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto"><!--<i class='bx bxs-cart'></i>--><i class='fas fa-exclamation-circle'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 border-start border-0 border-3 border-info">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Pedidos en Proceso</p>
                        <h4 class="my-1 text-info"><?php echo $data['procesos']['total'] ?></h4>
                    </div>
                    <div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto"><i class='fas fa-spinner'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 border-start border-0 border-3 border-success">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Pedidos Finalizados</p>
                        <h4 class="my-1 text-success"><?php echo $data['finalizados']['total'] ?></h4>
                    </div>
                    <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class='fas fa-check-circle'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-10 border-start border-0 border-3 border-warning">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <p class="mb-0 text-secondary">Total Productos</p>
                        <h4 class="my-1 text-warning"><?php echo $data['productos']['total'] ?></h4>
                    </div>
                    <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto"><i class='bx bxs-group'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end row-->

<div class="row">
    <!-- <div class="col-12 col-lg-8">
                        <div class="card radius-10">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h6 class="mb-0">Sales Overview</h6>
                                    </div>
                                    <div class="dropdown ms-auto">
                                        <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
									</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="javascript:;">Action</a>
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                            </li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center ms-auto font-13 gap-2 my-3">
                                    <span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1" style="color: #14abef"></i>Sales</span>
                                    <span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1" style="color: #ffc107"></i>Visits</span>
                                </div>
                                <div class="chart-container-1">
                                    <canvas id="chart1"></canvas>
                                </div>
                            </div>
                            <div class="row row-cols-1 row-cols-md-3 row-cols-xl-3 g-0 row-group text-center border-top">
                                <div class="col">
                                    <div class="p-3">
                                        <h5 class="mb-0">24.15M</h5>
                                        <small class="mb-0">Overall Visitor <span> <i class="bx bx-up-arrow-alt align-middle"></i> 2.43%</span></small>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="p-3">
                                        <h5 class="mb-0">12:38</h5>
                                        <small class="mb-0">Visitor Duration <span> <i class="bx bx-up-arrow-alt align-middle"></i> 12.65%</span></small>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="p-3">
                                        <h5 class="mb-0">639.82</h5>
                                        <small class="mb-0">Pages/Visit <span> <i class="bx bx-up-arrow-alt align-middle"></i> 5.62%</span></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
    <div class="col-12 col-lg-4">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0">Reporte Gráfico de Pedidos</h6>
                    </div>
                </div>
                <div class="chart-container-2 mt-4">
                    <canvas id="reportePedidos"></canvas>
                </div>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Finalizados <span class="badge bg-success rounded-pill"><?php echo $data['finalizados']['total'] ?></span>
                </li>
                <!-- <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center"> Hola <span class="badge bg-danger rounded-pill">10</span>
                                </li> -->
                <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">En Proceso <span class="badge bg-primary rounded-pill"><?php echo $data['procesos']['total'] ?></span>
                </li>
                <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Pendientes <span class="badge bg-warning text-dark rounded-pill"><?php echo $data['pendientes']['total'] ?></span>
                </li>
                <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Reporte gráfico <span class="badge bg-warning text-dark rounded-pill"></span>
                </li>
            </ul>
        </div>
    </div>

    <div class="col-12 col-lg-4">
        <div class="card radius-10 w-100">
            <div class="card-header bg-transparent">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0">Productos con minimo stock</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="chart-container-1">
                    <canvas id="productMin"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-4">
        <div class="card radius-10 w-100">
            <div class="card-header bg-transparent">
                <div class="d-flex align-items-center">
                    <div>
                        <h6 class="mb-0">Productos mas vendidos</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="chart-container-1">
                    <canvas id="topProducto"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="row row-cols-1 row-cols-lg-3">
    <!-- <div class="col d-flex">
                        <div class="card radius-10 w-100">
                            <div class="card-body">
                                <p class="font-weight-bold mb-1 text-secondary">Weekly Revenue</p>
                                <div class="d-flex align-items-center mb-4">
                                    <div>
                                        <h4 class="mb-0">$89,540</h4>
                                    </div>
                                    <div class="">
                                        <p class="mb-0 align-self-center font-weight-bold text-success ms-2">4.4% <i class="bx bxs-up-arrow-alt mr-2"></i>
                                        </p>
                                    </div>
                                </div>
                                <div class="chart-container-0">
                                    <canvas id="chart3"></canvas>
                                </div>
                            </div>
                        </div>
                    </div> -->
    <!-- <div class="col d-flex">
                        <div class="card radius-10 w-100">
                            <div class="card-header bg-transparent">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h6 class="mb-0">Orders Summary</h6>
                                    </div>
                                    <div class="dropdown ms-auto">
                                        <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
											</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="javascript:;">Action</a>
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                            </li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart-container-1">
                                    <canvas id="chart4"></canvas>
                                </div>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Completed <span class="badge bg-gradient-quepal rounded-pill">25</span>
                                </li>
                                <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Pending <span class="badge bg-gradient-ibiza rounded-pill">10</span>
                                </li>
                                <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Process <span class="badge bg-gradient-deepblue rounded-pill">65</span>
                                </li>
                            </ul>
                        </div>
                    </div> -->
    <!-- <div class="col d-flex">
                        <div class="card radius-10 w-100">
                            <div class="card-header bg-transparent">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h6 class="mb-0">Top Selling Categories</h6>
                                    </div>
                                    <div class="dropdown ms-auto">
                                        <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
											</a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="javascript:;">Action</a>
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                            </li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart-container-0">
                                    <canvas id="chart5"></canvas>
                                </div>
                            </div>
                            <div class="row row-group border-top g-0">
                                <div class="col">
                                    <div class="p-3 text-center">
                                        <h4 class="mb-0 text-danger">$45,216</h4>
                                        <p class="mb-0">Clothing</p>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="p-3 text-center">
                                        <h4 class="mb-0 text-success">$68,154</h4>
                                        <p class="mb-0">Electronic</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
</div>
<!--end row-->


</body>

<?php include_once 'Views/template/footer-admin.php'; ?>

<script>
    var ctx = document.getElementById("reportePedidos").getContext('2d');

    var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
    gradientStroke1.addColorStop(0, '#fc4a1a');
    gradientStroke1.addColorStop(1, '#f7b733');

    var gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
    gradientStroke2.addColorStop(0, '#4776e6');
    gradientStroke2.addColorStop(1, '#8e54e9');
    
    var gradientStroke3 = ctx.createLinearGradient(0, 0, 0, 300);
    gradientStroke3.addColorStop(0, '#42e695');
    gradientStroke3.addColorStop(1, '#3bb2b8');

    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Pendientes", "En Proceso", "Finalizados"],
            datasets: [{
                backgroundColor: [
                    gradientStroke1,
                    gradientStroke2,
                    gradientStroke3,
                ],
                hoverBackgroundColor: [
                    gradientStroke1,
                    gradientStroke2,
                    gradientStroke3,
                ],
                data: [<?php echo $data['pendientes']['total'] ?>,<?php echo $data['procesos']['total'] ?>, <?php echo $data['finalizados']['total'] ?>],
                borderWidth: [1, 1, 1]
            }]
        },
        options: {
            maintainAspectRatio: false,
            cutoutPercentage: 75,
            legend: {
                position: 'bottom',
                display: false,
                labels: {
                    boxWidth: 8
                }
            },
            tooltips: {
                displayColors: false,
            }
        }
    });
</script>

<script src="<?php echo BASE_URL . ''; ?>assets/js/index.js"></script>

</html>