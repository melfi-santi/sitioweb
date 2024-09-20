<?php include("template/cabecera.php");?>

<?php   
include("administrador/config/bd.php");


$sentenciaSQL=  $conexion->prepare("SELECT * FROM partidospoliticos");
$sentenciaSQL->execute();
$listaPartidos=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>



<?php 
    foreach($listaPartidos as $partido){ ?>





<div class="container">
    <div class="row">
        <div
            class="col-3"
        >


<div class="card">

  
    <div class="card-body">
        <h4 class="card-title"><?php echo $partido['NombrePartido'];  ?></h4>
        <h4 class="card-text"><?php echo $partido['Ideologia'];  ?></h4>
        <h4 class="card-text"><?php echo $partido['AnioFundacion'];  ?></h4>
        <h4 class="card-text"><?php echo $partido['LiderActual'];  ?></h4>
        <h4 class="card-text"><?php echo $partido['SedeCentral'];  ?></h4>
        
        <a
            name="txtSitioWeb"
            id="txtSitioWeb"
            class="btn btn-primary"
            href="<?php $partido['SitioWeb'];?>"
            role="button"
            >Ver sitio web:</a
        >
        
    </div>
</div>

</div>
        
        
        </div>
    </div>


<?php  } ?>



<?php include("template/pie.php");?>


