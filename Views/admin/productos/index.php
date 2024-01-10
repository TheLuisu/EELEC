<?php include_once 'Views/template/header-admin.php';?>

<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#listaProducto" type="button" role="tab" aria-controls="listaProducto" aria-selected="true">Listado de Productos</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#nuevoProducto" type="button" role="tab" aria-controls="nuevoProducto" aria-selected="false">Nuevo Producto</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="listaProducto" role="tabpanel" aria-labelledby="home-tab">
    <!-- Tabla para mostrar usuarios -->
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover aling-middle text-center" style="width:100%;" id="tblProductos">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Precio</th>
                                <th class="text-center">Cantidad</th>
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
    </div>
    <div class="tab-pane fade" id="nuevoProducto" role="tabpanel" aria-labelledby="profile-tab">
    <div class="card">
        <div class="card-body p-4">
            <form id="frmRegistro">
                    <div class="row">
                        <input type="hidden" id="id" name="id">
                        <input type="hidden" id="imagen_actual" name="imagen_actual">
                        <div class="col-md-5">
                            <div class="form-group mb-2">
                                <label for="nombre">Producto</label>
                                <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre del producto">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group mb-2">
                                <label for="precio">Precio</label>
                                <input id="precio" class="form-control" type="text" name="precio" placeholder="Precio">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group mb-2">
                                <label for="cantidad">Cantidad</label>
                                <input id="cantidad" class="form-control" type="number" name="cantidad" placeholder="Cantidad">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label for="categoria">Categoria</label>
                                <select id="categoria" class="form-control" name="categoria">
                                    <option value = "">Seleccionar</option>
                                    <?php foreach ($data['categorias'] as $categoria){?>
                                    <option value = "<?php echo $categoria['id'];?>"><?php echo $categoria['categorias'];?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="descripcion">Descripcion</label>
                                <input id="descripcion" class="form-control" type="text" name="descripcion" placeholder="Descripcion">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="imagen_product">Imagen (Opcional)</label>
                                <input id="imagen_product" class="form-control" type="file" name="imagen_product">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit" id="btnRegistro">Registrar</button>
                    </div>
            </form>
        </div>
    </div>
    </div>
</div>

<?php include_once 'Views/template/footer-admin.php';?>
<script src="<?php echo BASE_URL . 'assets/js/ckeditor.js'; ?>"></script>
<script src="<?php echo BASE_URL . 'assets/js/modulos/productos.js'; ?>"></script>

</body>

</html>