<!--Aqui se junta el header con el index, ya que van separados-->
<?php include_once 'Views/template/header-principal.php'; ?>

<!-- Start Content Page -->
<div class="container-fluid bg-light py-5">
    <div class="col-md-6 m-auto text-center">
        <h1 class="h1">Contacta con Nosotros</h1>
        <p>
            Cotiza todo lo que necesites!
        </p>
    </div>
</div>

<!-- Start Map
    <div id="mapid" style="width: 100%; height: 300px;"></div>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <script>
        var mymap = L.map('mapid').setView([-23.013104, -43.394365, 13], 13);

        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            maxZoom: 18,
            attribution: 'Zay Telmplte | Template Design by <a href="https://templatemo.com/">Templatemo</a> | Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1
        }).addTo(mymap);

        L.marker([-23.013104, -43.394365, 13]).addTo(mymap)
            .bindPopup("<b>Zay</b> eCommerce Template<br />Location.").openPopup();

        mymap.scrollWheelZoom.disable();
        mymap.touchZoom.disable();
    </script>
    Ena Map -->

<!-- Start Contact -->
<div class="container py-5">
    <div class="row py-5">
        <div class="col-md-9 m-auto">
            <div class="row">
                <h2 class="h2 text-success text-center"> TE COMPARTIMOS NUESTRA UBICACIÓN EXACTA PARA QUE VISITES NUESTRA TIENDA FISICA</h2>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3596.3294025941486!2d-100.16432372385312!3d25.660373112783294!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8662c222f7aa9bdf%3A0xdf349369d47378ec!2sLince%20100%2C%20Praderas%20de%20Guadalupe%2C%2067195%20Guadalupe%2C%20N.L.!5e0!3m2!1ses-419!2smx!4v1685424389441!5m2!1ses-419!2smx" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <BR>
        <form class="col-md-9 m-auto" role="form" id="frmContactos">
            <div class="row">
            <h2 class="h2 text-success text-center"> FORMULARIO DE CONTACTO, PARA COTIZAR TODAS LAS PIEZAS QUE NECESITES</h2>
                <div class="form-group col-md-6 mb-3">
                    <label for="nombre">Nombre Completo</label>
                    <input type="text" class="form-control mt-1" id="nombre" name="name" placeholder="Nombre Completo" required>
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label for="email">Correo Electronico</label>
                    <input type="email" class="form-control mt-1" id="email" name="email" placeholder="Correo Electronico" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="inputmessage">Mensaje</label>
                <textarea class="form-control mt-1" id="message" placeholder="Mensaje" rows="8"></textarea>
            </div>
            <div class="row">
                <div class="col text-end mt-2">
                    <button type="submit" class="btn btn-success btn-lg px-3" id="btnContactos">Enviar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End Contact -->

<!--Aqui se junta el footer con el index, ya que van separados-->
<?php include_once 'Views/template/footer-principal.php'; ?>

<!-- CKEditor 5-->
<script src="<?php echo BASE_URL . 'assets/js/ckeditor.js'; ?>"></script>
<script src="<?php echo BASE_URL . 'assets/js/modulos/contactos.js'; ?>"></script>
</body>

</html>