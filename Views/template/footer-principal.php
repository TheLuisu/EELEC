<!-- AQUI INICIA EL APARTADO DEL CARRITO DE COMPRAS-->
<div id="my_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title"><i class="fas fa-cart-arrow-down"></i> Carrito</h5>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table align-middle table-light table-bordered table-striped table-hover" id="tableListaCarrito">
                        <thead>
                            <tr>
                                <th style="text-align: center;">#</th>
                                <th style="text-align: center;">Producto</th>
                                <th style="text-align: center;">Precio</th>
                                <th style="text-align: center;">Cantidad</th>
                                <th style="text-align: center;">Subtotal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <h3>Total: $</h3>
                <h3 id='totalGeneral'></h3>
                <?php if(!empty($_SESSION['correoCliente'])){ ?>
                    <a class="btn btn-outline-primary" href="<?php echo BASE_URL . 'clientes'; ?>">Comprar Ahora</a>
                <?php } else { ?>
                    <a class="btn btn-outline-primary" href="#" onclick="abrirModalLogin();">Iniciar Sesión</a>
                <?php }?>
            </div>
        </div>
    </div>
</div>
<!-- AQUI TERMINA EL APARTADO DEL CARRITO DE COMPRAS-->

<!-- AQUI INICIA EL APARTADO DEL LOGIN DIRECTO-->
<div id="my_modal_login" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="title-login"> Inicio de Sesión | Registro</h5>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body m-3">
                <form method="get" action="">
                    <div class="form-group mb-3">
                        <div class="text-center">
                            <img class="img-thumbnail rounded-circle" src="<?php echo BASE_URL . 'assets/img/logo.png'; ?>" alt="" width="150">
                        </div>
                        <!-- Formulario de inicio de sesion-->
                        <div class="row">
                            <div class="col-md-12" id="frmLogin">
                                <div class="form-group">
                                    <label for="correoLogin"><i class="fas fa-envelope"></i> Correo</label>
                                    <input id="correoLogin" class="form-control" type="text" name="correoLogin" placeholder="Correo Electrónico">
                                </div>
                                <div class="form-group mb-3" id="frmLogin">
                                    <label for="claveLogin"><i class="fas fa-key"></i> Contraseña</label>
                                    <input id="claveLogin" class="form-control" type="text" name="claveLogin" placeholder="Contraseña">
                                </div>
                                <a href="#" id="btnRegister">¿Aun no tienes una cuenta?</a>
                                <div class="float-end">
                                    <button class="btn btn-primary btn-lg" type="button" id="login">Iniciar Sesión</button>
                                </div>
                            </div>

                            <!-- Formulario de registro -->
                            <div class="col-md-12 d-none" id="frmRegister">
                                <div class="form-group">
                                    <label for="nombreRegistro"><i class="fas fa-list"></i> Nombre Completo</label>
                                    <input id="nombreRegistro" class="form-control" type="text" name="nombreRegistro" placeholder="Nombre Completo">
                                </div>
                                <div class="form-group">
                                    <label for="correoRegistro"><i class="fas fa-envelope"></i> Correo</label>
                                    <input id="correoRegistro" class="form-control" type="text" name="correoRegistro" placeholder="Correo Electrónico">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="claveRegistro"><i class="fas fa-key"></i> Contraseña</label>
                                    <input id="claveRegistro" class="form-control" type="text" name="claveRegistro" placeholder="Contraseña">
                                </div>
                                <a href="#" id="btnLogin">¿Ya tienes una cuenta?</a>
                                <div class="float-end">
                                    <button class="btn btn-primary btn-lg" type="button" id="Registrarse">Registrarse</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- AQUI TERMINA EL APARTADO DEL LOGIN DIRECTO-->

<!-- Start Footer -->
<footer class="bg-dark" id="tempaltemo_footer">
    <div class="container">
        <div class="row">

            <div class="col-md-4 pt-5">
                <h2 class="h2 text-success border-bottom pb-3 border-light logo">Equipos Electricos y de Control</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <li>
                        <i class="fas fa-map-marker-alt fa-fw"></i>
                        Lince No.100, col. Praderas de Guadalupe, Guadaluoe, NL
                    </li>
                    <li>
                        <i class="fa fa-phone fa-fw"></i>
                        <a class="text-decoration-none" href="tel:010-020-0340">811 600 1145</a>
                    </li>
                    <li>
                        <i class="fa fa-envelope fa-fw"></i>
                        <a class="text-decoration-none" href="mailto:info@company.com">equiposelectricosydecontrol@hotmail.com</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-4 pt-5">
                <h2 class="h2 text-light border-bottom pb-3 border-light">Marcas</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <li><a class="text-decoration-none" href="#">Altamira</a></li>
                    <li><a class="text-decoration-none" href="#">The Electric Controller</a></li>
                    <li><a class="text-decoration-none" href="#">Hubbell</a></li>
                    <li><a class="text-decoration-none" href="#">ABB</a></li>
                    <li><a class="text-decoration-none" href="#">Autonics</a></li>
                    <li><a class="text-decoration-none" href="#">Crouzet</a></li>
                    <li><a class="text-decoration-none" href="#">Carlo Gavazzi</a></li>
                </ul>
            </div>

            <div class="col-md-4 pt-5">
                <h2 class="h2 text-light border-bottom pb-3 border-light">Informacion</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <li><a class="text-decoration-none" href="#">Inicio</a></li>
                    <li><a class="text-decoration-none" href="#">Acerda de nosotros</a></li>
                    <li><a class="text-decoration-none" href="#">Localización de tiendas</a></li>
                    <li><a class="text-decoration-none" href="#">Preguntas frecuentes</a></li>
                    <li><a class="text-decoration-none" href="#">Contactanos</a></li>
                </ul>
            </div>

        </div>

        <div class="row text-light mb-4">
            <div class="col-12 mb-3">
                <div class="w-100 my-3 border-top border-light"></div>
            </div>
            <!-- <div class="col-auto me-auto">
                <ul class="list-inline text-left footer-icons">
                    <li class="list-inline-item border border-light rounded-circle text-center">
                        <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                    </li>
                    <li class="list-inline-item border border-light rounded-circle text-center">
                        <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                    </li>
                    <li class="list-inline-item border border-light rounded-circle text-center">
                        <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                    </li>
                    <li class="list-inline-item border border-light rounded-circle text-center">
                        <a class="text-light text-decoration-none" target="_blank" href="https://www.linkedin.com/"><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
                    </li>
                </ul>
            </div> -->
            <div class="col-auto">
                <label class="sr-only" for="subscribeEmail">Email address</label>
                <div class="input-group mb-2">
                    <input type="text" class="form-control bg-dark border-light" id="subscribeEmail" placeholder="Notificaciones">
                    <div class="input-group-text btn-success text-light">Subscribete</div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-100 bg-black py-3">
        <div class="container">
            <div class="row pt-2">
                <div class="col-12">
                    <p class="text-left text-light">
                        Copyright &copy; 2023 Equipos Electricos
                        | Designed by <a rel="sponsored" href="https://templatemo.com" target="_blank">Luis Castillo</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

</footer>
<!-- End Footer -->

<!-- Start Script -->
<script src="<?php echo BASE_URL . ''; ?>assets/js/jquery-1.11.0.min.js"></script>
<script src="<?php echo BASE_URL . ''; ?>assets/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo BASE_URL . ''; ?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo BASE_URL . ''; ?>assets/js/templatemo.js"></script>
<script src="<?php echo BASE_URL . ''; ?>assets/js/custom.js"></script>
<script src="<?php echo BASE_URL . ''; ?>assets/js/carrito.js"></script>
<script src="<?php echo BASE_URL . ''; ?>assets/js/login.js"></script>
<script>
    const base_url = '<?php echo BASE_URL . ''; ?>';
</script>
<script src="<?php echo BASE_URL . ''; ?>assets/js/sweetalert2.all.min.js"></script>
<!-- End Script -->