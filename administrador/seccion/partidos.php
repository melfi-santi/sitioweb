<?php include('../template/cabecera.php') ?>

<?php  

$txtPartido_ID=(isset($_POST['txtPartido_ID']))?$_POST['txtPartido_ID']:"";
$txtNombrePartido=(isset($_POST['txtNombrePartido']))?$_POST['txtNombrePartido']:"";
$txtIdeologia=(isset($_POST['txtIdeologia']))?$_POST['txtIdeologia']:"";
$txtAnioFundacion=(isset($_POST['txtAnioFundacion']))?$_POST['txtAnioFundacion']:"";
$txtLiderActual=(isset($_POST['txtLiderActual']))?$_POST['txtLiderActual']:"";
$txtSedeCentral=(isset($_POST['txtSedeCentral']))?$_POST['txtSedeCentral']:"";
$txtSitioWeb=(isset($_POST['txtSitioWeb']))?$_POST['txtSitioWeb']:"";

$accion=(isset($_POST['accion']))?$_POST['accion']:"";


include('../config/bd.php');





switch($accion){

    case "Agregar";

    //poner en el otro php    INSERT INTO `partidospoliticos` (`Partido_id`, `NombrePartido`, `Ideologia`, `AnioFundacion`, `LiderActual`, `SedeCentral`, `SitioWeb`) VALUES (NULL, 'Justicialismo', 'Peronista', NULL, 'Perón', 'Casa Rosada', 'peronsape.com');
    $sentenciaSQL=  $conexion->prepare("INSERT INTO partidospoliticos (NombrePartido,Ideologia,AnioFundacion,LiderActual,SedeCentral,SitioWeb) VALUES (:nombrepartido,:ideologia,:aniofundacion,:lideractual,:sedecentral,:sitioweb);");

   
    $sentenciaSQL->bindParam(':nombrepartido',$txtNombrePartido);
    $sentenciaSQL->bindParam(':ideologia',$txtIdeologia);
    $sentenciaSQL->bindParam(':aniofundacion',$txtAnioFundacion);
    $sentenciaSQL->bindParam(':lideractual',$txtLiderActual);
    $sentenciaSQL->bindParam(':sedecentral',$txtSedeCentral);
    $sentenciaSQL->bindParam(':sitioweb',$txtSitioWeb);
    $sentenciaSQL->execute();


   
    break;

    case "Modificar";
    //echo "Presionado botón Modificar";

    $sentenciaSQL=  $conexion->prepare("UPDATE partidospoliticos SET NombrePartido=:nombrepartido WHERE  Partido_id=:partido_id");
    $sentenciaSQL->bindParam(':nombrepartido',$txtNombrePartido);
    $sentenciaSQL->bindParam(':partido_id',$txtPartido_ID);
    $sentenciaSQL->execute();


    if($txtIdeologia!=""){

        $sentenciaSQL=  $conexion->prepare("UPDATE partidospoliticos SET Ideologia=:ideologia WHERE  Partido_id=:partido_id");
        $sentenciaSQL->bindParam(':ideologia',$txtIdeologia);
        $sentenciaSQL->bindParam(':partido_id',$txtPartido_ID);
        $sentenciaSQL->execute();
    


    }

    if($txtAnioFundacion!=""){

        $sentenciaSQL=  $conexion->prepare("UPDATE partidospoliticos SET AnioFundacion=:aniofundacion WHERE  Partido_id=:partido_id");
        $sentenciaSQL->bindParam(':aniofundacion',$txtAnioFundacion);
        $sentenciaSQL->bindParam(':partido_id',$txtPartido_ID);
        $sentenciaSQL->execute();
    

    }

    if($txtLiderActual!=""){

        $sentenciaSQL=  $conexion->prepare("UPDATE partidospoliticos SET LiderActual=:lideractual WHERE  Partido_id=:partido_id");
        $sentenciaSQL->bindParam(':lideractual',$txtLiderActual);
        $sentenciaSQL->bindParam(':partido_id',$txtPartido_ID);
        $sentenciaSQL->execute();
    

    }

    if($txtSedeCentral!=""){

        $sentenciaSQL=  $conexion->prepare("UPDATE partidospoliticos SET SedeCentral=:sedecentral WHERE  Partido_id=:partido_id");
        $sentenciaSQL->bindParam(':sedecentral',$txtSedeCentral);
        $sentenciaSQL->bindParam(':partido_id',$txtPartido_ID);
        $sentenciaSQL->execute();
    

    }

    if($txtSitioWeb!=""){

        $sentenciaSQL=  $conexion->prepare("UPDATE partidospoliticos SET SitioWeb=:sitioweb WHERE  Partido_id=:partido_id");
        $sentenciaSQL->bindParam(':sitioweb',$txtSitioWeb);
        $sentenciaSQL->bindParam(':partido_id',$txtPartido_ID);
        $sentenciaSQL->execute();
    

    }



    break;

    case "Cancelar";
    //echo "Presionado botón Cancelar";
    header("location:partidos.php");

    break;


    case "Seleccionar";
    // echo "Presionado botón Seleccionar";


    $sentenciaSQL=  $conexion->prepare("SELECT * FROM partidospoliticos WHERE Partido_id=:Partido_id");
    $sentenciaSQL->bindParam(':Partido_id',$txtPartido_ID);
    $sentenciaSQL->execute();
    $partido=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

    $txtNombrePartido=$partido['NombrePartido'];
    $txtIdeologia=$partido['Ideologia'];
    $txtAnioFundacion=$partido['AnioFundacion'];
    $txtLiderActual=$partido['LiderActual'];
    $txtSedeCentral=$partido['SedeCentral'];
    $txtSitioWeb=$partido['SitioWeb'];

    break;

    case "Borrar";
    //echo "Presionado botón Borrar";

    $sentenciaSQL=  $conexion->prepare("DELETE FROM partidospoliticos WHERE Partido_id=:Partido_id");
    $sentenciaSQL->bindParam(':Partido_id',$txtPartido_ID);

    $sentenciaSQL->execute();

    header("location:partidos.php");
    break;


}

$sentenciaSQL=  $conexion->prepare("SELECT * FROM partidospoliticos");
$sentenciaSQL->execute();
$listaPartidos=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>

<div
    class="col-md-5">  
    

    <div class="card">
        <div class="card-header">Datos del Partido</div>
        <div class="card-body">
            
        <form method="POST" enctype="multipart/form-data">


        <div class = "form-group">
<label for="txtPartido_ID"></label>
<input type="hidden"  require    class="form-control" value="<?php echo $txtPartido_ID?>" name="txtPartido_ID" id="txtPartido_ID"  placeholder="Numero del ID">

<div class = "form-group">
<label for="txtNombrePartido">NombrePartido:</label>
<input type="text"  require    class="form-control" value="<?php echo $txtNombrePartido?>" name="txtNombrePartido" id="txtNombrePartido"  placeholder="NombrePartido">

</div>

<div class = "form-group">
<label for="txtIdeologia">Ideologia:</label>
<input type="text" require   class="form-control" value="<?php echo $txtIdeologia?>"   name="txtIdeologia" id="txtIdeologia"  placeholder="Ideologia"> 

</div>

<div class = "form-group">
<label for="txtAnioFundacion">AñoFundacion:</label>
<input type="text" require  class="form-control" value="<?php echo $txtAnioFundacion?>"   name="txtAnioFundacion" id="txtAnioFundacion"  placeholder="AnioFundacion">

</div>

<div class = "form-group">
<label for="txtLiderActual">LiderActual:</label>
<input type="text" require  class="form-control" value="<?php echo $txtLiderActual?>"   name="txtLiderActual" id="txtLiderActual"  placeholder="LiderActual">

</div>

<div class = "form-group">
<label for="txtSedeCentral">SedeCentral:</label>
<input type="text"require   class="form-control" value="<?php echo $txtSedeCentral?>"   name="txtSedeCentral" id="txtSedeCentral"  placeholder="SedeCentral">

</div>

<div class = "form-group">
<label for="txtSitioWeb">SitioWeb:</label>
<input type="text" require  class="form-control" value="<?php echo $txtSitioWeb?>"   name="txtSitioWeb" id="txtSitioWeb"  placeholder="SitioWeb">

<br>
</div>

    <div class="btn-group" role="group" aria-label="Button group name">
        <button
            type="submit"
            class="btn btn-success"
            name="accion"
            <?php echo ($accion=="Seleccionar")?"disabled":"";?>
            value="Agregar"
        >
            Agregar
        </button>
        <button
            type="submit"
            class="btn btn-warning"
            name="accion"
            <?php echo ($accion!="Seleccionar")?"disabled":"";?>
            value="Modificar"
        >
            Modificar
        </button>
        <button
            type="submit"
            class="btn btn-info"
            name="accion"
            <?php echo ($accion!="Seleccionar")?"disabled":"";?>
            value="Cancelar"
        >
            Cancelar
        </button>
        
    </div>
    
     

</form>

        </div>
        
    </div>
    


    
    
    
</div>










<div
    class="col-md-7">

    Tabla de partidos  (mostrar registros de los partidos)

    <div
        class="table-responsive "
    >
        <table
            class="table table-light"
        >
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre del Partido</th>
                    <th scope="col">Ideologia</th>
                    <th scope="col">Año de Fundación</th>
                    <th scope="col">Lider Actual</th>
                    <th scope="col">Sede Central</th>
                    <th scope="col">Sitio Web</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>

            <?php  foreach ($listaPartidos as $Partido){?>
                <tr class="">
                    <td><?php echo $Partido['Partido_id'];  ?></td>
                    <td><?php echo $Partido['NombrePartido'];  ?></td>
                    <td><?php echo $Partido['Ideologia']; ?></td>
                    <td><?php echo $Partido['AnioFundacion'];  ?></td>
                    <td><?php echo $Partido['LiderActual'];  ?></td>
                    <td><?php echo $Partido['SedeCentral'];  ?></td>
                    <td><?php echo $Partido['SitioWeb'];  ?></td>
                    <td>

                

                    <form  method="post">
                        
                        <input type="hidden" name="txtPartido_ID" id="txtPartido_ID"value="<?php echo $Partido['Partido_id'];  ?>"/>

                        <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary"/>

                        <input type="submit" name="accion" value="Borrar" class="btn btn-danger"/>

                    </form>
                    </td>
                </tr>
                
                <?php }   ?>
            </tbody>
        </table>
    </div>
    


</div>


<?php include('../template/pie.php') ?>