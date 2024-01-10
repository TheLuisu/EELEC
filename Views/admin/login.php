<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="apple-touch-icon" href="<?php echo BASE_URL .'assets/img/favicon/apple-icon.png';?>">
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo BASE_URL .'assets/img/favicon/favicon.ico';?>">

        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo BASE_URL; ?>assets/img/favicon/apple-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo BASE_URL; ?>assets/img/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo BASE_URL; ?>assets/img/favicon/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?php  echo $data['title']?></title>
        <link href="<?php  echo BASE_URL; ?>assets/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">INICIO DE SESIÓN</h3></div>
                                    <div class="card-body">
                                        <form id="formulario">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" name="inputEmail" type="email" placeholder="name@ejemplo.com"/>
                                                <label for="inputEmail">Correo Electronico</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" name="inputPassword" type="password" placeholder="Contraseña"/>
                                                <label for="inputPassword">Contraseña</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value=""/>
                                                <label class="form-check-label" for="inputRememberPassword">Recordar Contraseña</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.html">¿Olvidaste tu contraseña?</a>
                                                <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.html">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="<?php  echo BASE_URL; ?>assets/js/scripts.js"></script>
        <script> 
            const base_url = '<?php  echo BASE_URL; ?>';
        </script>
        <script src="<?php  echo BASE_URL; ?>assets/js/modulos/login.js"></script>
        <script src="<?php  echo BASE_URL; ?>assets/js/sweetalert2.all.min.js"></script>
    </body>
</html>