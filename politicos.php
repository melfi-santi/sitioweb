<?php include("template/cabecera.php");?>


<?php   
include("administrador/config/bd.php");


$sentenciaSQL=  $conexion->prepare("SELECT * FROM politicos");
$sentenciaSQL->execute();
$listaPoliticos=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);



?>

<?php 
    foreach($listaPoliticos as $politico){ ?>

<div class="container">
    <div class="row">
        <div
            class="col-3"
        >

<div class="card">

    <img class="card-img-top" src="<?php echo $politico['Imagen']; ?>" alt="" />
    <div class="card-body">
        <h4 class="card-title"><?php echo $politico['Nombre']; ?></h4>
        <h6 class="card-title"><?php echo $politico['Apellido']; ?></h6>
        <h6 class="card-text"><?php echo $politico['Cargo']; ?></h6>
        <h6 class="card-text"><?php echo $politico['Partido_ID']; ?></h6>
        <h6 class="card-text"><?php echo $politico['FechaNacimiento']; ?></h6>
        <h6 class="card-text"><?php echo $politico['Educacion']; ?></h6>
        <h6 class="card-text"><?php echo $politico['Biografia']; ?></h6>
        
        

    </div>
</div>

</div>
</div>
    </div>

<?php  } ?>

<?php include("template/pie.php");?>