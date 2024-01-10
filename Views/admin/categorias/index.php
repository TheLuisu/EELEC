<?php include_once 'Views/template/header-admin.php';?>

<button class="btn btn-primary mb-2" type="button" id="nuevoUsuario">Nueva Categoria</button>

<!-- Tabla para mostrar usuarios -->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover aling-middle text-center" style="width:100%;" id="tblCategorias">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Imagen</th>
                            <th class="text-center">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="nuevoModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="titleModal"></h5>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form id="frmRegistro">
                    <div class="modal-body">
                        <input type="hidden" id="id" name="id">
                        <input type="hidden" id="imagen_actual" name="imagen_actual">
                        <div class="form-group mb-2">
                            <label for="categoria">Categoria</label>
                            <input id="categoria" class="form-control" type="text" name="categoria" placeholder="Categorias">
                        </div>
                        <div class="form-group">
                            <label for="imagen_categorias">Imagen (Opcional)</label>
                            <input id="imagen_categorias" class="form-control-file" type="file" name="imagen_categorias">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit" id="btnRegistro">Registrar</button>
                        <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include_once 'Views/template/footer-admin.php';?>

<script src="<?php echo BASE_URL . 'assets/js/modulos/categorias.js'; ?>"></script>

</body>

</html>