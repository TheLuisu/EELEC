<!--Aqui se junta el header con el index, ya que van separados-->
<?php include_once 'Views/template/header-principal.php';?>

<!-- Start Banner Hero -->
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="<?php echo BASE_URL .''; ?>./assets/img/motor-banner.png" alt="" width="1000">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-success"><b>Equipos Electricos </b>y de Control</h1>
                                <h3 class="h2"></h3>
                                <p>Inicia sus actividades dedicada a la comercialización de MOTORES ELECTRICOS y EQUIPO DE CONTROL, con el objetivo de brindar soluciones a la industria. Siendo una empresa que crece y que se adapta a la expectativa de sus clientes, se renueva constantemente introduciendo una gama amplia de material eléctrico en general y nuevas marcas que ofrecer.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="<?php echo BASE_URL .''; ?>./assets/img/banner_img_02.jpg" alt="" width="450">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">CABLE, TUBERÍA, ILUMINACIÓN Y ACCESORIOS ELÉCTRICOS</h1>
                                <h3 class="h2">Nuestro mayor compromiso es ser un proveedor confiable, ofreciendo una respuesta inmediata  y un servicio de excelencia.</h3>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="<?php echo BASE_URL .''; ?>./assets/img/bomba-banner.png" alt="" width="950">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">EQUIPO DE CONTROL Y AUTOMATIZACIÓN</h1>
                                <h3 class="h2"></h3>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- End Banner Hero -->


    <!-- INICIO DE CATEGORIAS -->
    <!--
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Categorias</h1>
                <p>
                    Estas son las categorias de los productos que estamos manejando actualemente en Equipos Electricos y de Control.
                </p>
            </div>
        </div>
        <div class="row">
            <?php foreach ($data['categorias'] as $categoria) { ?>
                <div class="col-12 col-md-4 p-1 mt-3">
                    <a href="<?php echo BASE_URL .'principal/categorias/' . $categoria['id'];?>"><img src="<?php echo $categoria['imagen_categorias']; ?>" class="rounded-circle img-fluid border"></a>
                    <h5 class="text-center mt-3 mb-3"><?php echo $categoria['categorias']; ?></h5>
                    <p class="text-center"><a class="btn btn-success">Go Shop</a></p>
                </div>
            <?php }?>
        </div>
    </section> -->
    <!-- CATEGORIAS EN FORMA DE CUADRADO-->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">MARCAS ESTABLECIDAS</h1>
                <p>
                    Estas son las marcas de los productos que estamos manejando actualemente en Equipos Electricos y de Control.
                </p>
            </div>
        </div>
        <div class="row">
            <?php foreach ($data['categorias'] as $categoria) { ?>
                <div class="col-12 col-md-4 p-1 mt-3">
                    <a href="<?php echo BASE_URL .'principal/categorias/' . $categoria['id'];?>"><img src="<?php echo $categoria['imagen_categorias']; ?>" class="card-img-top img-fluid border"></a>
                    <h5 class="text-center mt-3 mb-3"><?php echo $categoria['categorias']; ?></h5>
                    <p class="text-center"><a class="btn btn-success">Go Shop</a></p>
                </div>
            <?php }?>
        </div>
    </section>
    <!--FIN DE LAS CATEGORIAS EN FORMA DE CUADRADO-->

    <!-- FIN DE LAS CATEGORIAS -->

    <!-- INICIO DE NUEVOS PRODUCTOS -->
    <section class="bg-light">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">NUEVOS PRODUCTOS</h1>
                    <p>
                        ESTOS SON LOS PRODUCTOS NUEVOS QUE EL ADMINISTRADOR IRA AGREGANDO, ACTUALMENTE HAY IMAGENES DE ROBOTS PORQUE NO TENEMOS LOS PRODUCTOS QUE EL CLIENTE AGREGARA EN PROXIMAS VERSIONES
                    </p>
                </div>
            </div>
            <div class="row">
                <?php foreach ($data['nuevosProductos'] as $producto) { ?>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="<?php echo BASE_URL . 'principal/details/' . $producto['id']; ?>">
                            <img src="<?php echo $producto['imagen_product']; ?>" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                </li>
                                <li class="text-muted text-right"><?php echo MONEDA . ' ' . $producto['precio_product']; ?></li>
                            </ul>
                            <a href="<?php echo BASE_URL . 'principal/detail/' . $producto['id']; ?>" class="h2 text-decoration-none text-dark"><?php echo $producto['nombre_product']; ?></a>
                            <p class="card-text">
                            <?php echo $producto['descripcion_product']; ?>
                            </p>
                            <p class="text-muted">Reviews (24)</p>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- End Featured Product -->

<!--Aqui se junta el footer con el index, ya que van separados-->
<?php include_once 'Views/template/footer-principal.php';?>

</body>
</html>