        <div class="row row-cols-2 row-cols-md-3 g-3">
            <?php foreach ($paquetes as $paquete) { ?>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="d-flex flex-column">
                        <div class="card" style="background-color: #054568ff; color:beige">
                            <div class="card-body">
                                <img src="https://picsum.photos/50/50" alt="Logo del paquete" class="card-img-top mb-2">
                                <h5 class="card-title"><?= $paquete['nombre_paquete'] ?></h5>
                                <p class="card-text"><?= $paquete['descripcion_breve'] ?></p>
                            </div>
                            <div class="card-footer">
                                
                            </div>
                            <div class="card-footer border-0 mt-3">
                         
                                
                            </div>
                        </div>

                    </div>
                </div>
              <?php } ?>


                