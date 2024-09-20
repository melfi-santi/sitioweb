<?php include('template/cabecera.php'); ?>
            
            
            <div class="col-md-12">


            <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                <?php //<h1 class="display-5 fw-bold">Bienvenido <?php echo $nombreUsuario; ? ></h1> ?>
                <h1 class="display-5 fw-bold">Bienvenido</h1>
                <p class="col-md-8 fs-4">
                    En esta sección, se van a administrar los partidos y políticos de la campaña electoral 2023
                </p>
                <button class="btn btn-primary btn-lg" href="seccion/partidos.php" type="button">
                   Partidos
                </button>
                <button class="btn btn-primary btn-lg" href="seccion/politicos.php" type="button">
                    Politicos
                </button>
            </div>
        </div>
        



            </div>
            
<?php include('template/pie.php'); ?>
       