<?php include('../template/cabecera.php') ?>

<?php  

$txtPolitico_ID=(isset($_POST['txtPolitico_ID']))?$_POST['txtPolitico_ID']:"";
$txtNombrePolitico=(isset($_POST['txtNombrePolitico']))?$_POST['txtNombrePolitico']:"";
$txtApellido=(isset($_POST['txtApellido']))?$_POST['txtApellido']:"";
$txtCargo=(isset($_POST['txtCargo']))?$_POST['txtCargo']:"";
$txtPartido_ID=(isset($_POST['txtPartido_ID']))?$_POST['txtPartido_ID']:"";
$txtFechaNacimiento=(isset($_POST['txtFechaNacimiento']))?$_POST['txtFechaNacimiento']:"";
$txtEducacion=(isset($_POST['txtEducacion']))?$_POST['txtEducacion']:"";
$txtBiografia=(isset($_POST['txtBiografia']))?$_POST['txtBiografia']:"";
$txtImagen=(isset($_POST['txtImagen']))?$_POST['txtImagen']:"";

$accion=(isset($_POST['accion']))?$_POST['accion']:"";


include('../config/bd.php');

//conexion a la base de datos




switch($accion){

    case "Agregar";

    //poner en el otro php    INSERT INTO `politicos` (`Politico_ID`, `Nombre`, `Apellido`, `Cargo`, `Partido_ID`, `FechaNacimiento`, `Educacion`, `Biografia`, `Imagen`) VALUES (NULL, 'hola', 'como', 'estas', '4', NULL, 'no se', 'hola chau', 'a.jpg');
    $sentenciaSQL=  $conexion->prepare("INSERT INTO `politicos` (`Nombre`, `Apellido`, `Cargo`, `Partido_ID`, `FechaNacimiento`, `Educacion`, `Biografia`, `Imagen`) VALUES (:nombre,:apellido,:cargo,:partido_id,:fechanacimiento,:educacion,:biografia,:imagen);");

    $sentenciaSQL->bindParam(':nombre',$txtNombrePolitico);
    $sentenciaSQL->bindParam(':apellido',$txtApellido);
    $sentenciaSQL->bindParam(':cargo',$txtCargo);
    $sentenciaSQL->bindParam(':partido_id',$txtPartido_ID);
    $sentenciaSQL->bindParam(':fechanacimiento',$txtFechaNacimiento);
    $sentenciaSQL->bindParam(':educacion',$txtEducacion);
    $sentenciaSQL->bindParam(':biografia',$txtBiografia);
    $sentenciaSQL->bindParam(':imagen',$txtImagen);


    $sentenciaSQL->execute();




    break;

    case "Modificar";
    //echo "Presionado botón Modificar";
    $sentenciaSQL=  $conexion->prepare("UPDATE politicos SET Nombre=:nombre WHERE  Politico_ID=:Politico_ID");
    $sentenciaSQL->bindParam(':nombre',$txtNombrePolitico);
    $sentenciaSQL->bindParam(':Politico_ID',$txtPolitico_ID);
    $sentenciaSQL->execute();


    if($txtApellido!=""){

        $sentenciaSQL=  $conexion->prepare("UPDATE politicos SET Apellido=:apellido WHERE  Politico_ID=:Politico_ID");
        $sentenciaSQL->bindParam(':apellido',$txtApellido);
        $sentenciaSQL->bindParam(':Politico_ID',$txtPolitico_ID);
        $sentenciaSQL->execute();
    


    }

    if($txtCargo!=""){

        $sentenciaSQL=  $conexion->prepare("UPDATE politicos SET Cargo=:cargo WHERE  Politico_ID=:Politico_ID");
        $sentenciaSQL->bindParam(':cargo',$txtCargo);
        $sentenciaSQL->bindParam(':Politico_ID',$txtPolitico_ID);
        $sentenciaSQL->execute();
    

    }

    if($txtPartido_ID!=""){

        $sentenciaSQL=  $conexion->prepare("UPDATE politicos SET Partido_ID=:partido_id WHERE  Politico_ID=:Politico_ID");
        $sentenciaSQL->bindParam(':partido_id',$txtPartido_ID);
        $sentenciaSQL->bindParam(':Politico_ID',$txtPolitico_ID);
        $sentenciaSQL->execute();
    

    }

    if($txtFechaNacimiento!=""){

        $sentenciaSQL=  $conexion->prepare("UPDATE politicos SET FechaNacimiento=:fechanacimiento WHERE  Politico_ID=:Politico_ID");
        $sentenciaSQL->bindParam(':fechanacimiento',$txtFechaNacimiento);
        $sentenciaSQL->bindParam(':Politico_ID',$txtPolitico_ID);
        $sentenciaSQL->execute();
    

    }

    if($txtEducacion!=""){

        $sentenciaSQL=  $conexion->prepare("UPDATE politicos SET Educacion=:educacion WHERE  Politico_ID=:Politico_ID");
        $sentenciaSQL->bindParam(':educacion',$txtEducacion);
        $sentenciaSQL->bindParam(':Politico_ID',$txtPolitico_ID);
        $sentenciaSQL->execute();
    

    }

    if($txtBiografia!=""){

        $sentenciaSQL=  $conexion->prepare("UPDATE politicos SET Biografia=:biografia WHERE  Politico_ID=:Politico_ID");
        $sentenciaSQL->bindParam(':biografia',$txtBiografia);
        $sentenciaSQL->bindParam(':Politico_ID',$txtPolitico_ID);
        $sentenciaSQL->execute();
    

    }

    if($txtImagen!=""){

        $sentenciaSQL=  $conexion->prepare("UPDATE politicos SET Imagen=:imagen WHERE  Politico_ID=:Politico_ID");
        $sentenciaSQL->bindParam(':imagen',$txtImagen);
        $sentenciaSQL->bindParam(':Politico_ID',$txtPolitico_ID);
        $sentenciaSQL->execute();
    

    }



    break;

    case "Cancelar";
    //echo "Presionado botón Cancelar";
    header("location:politicos.php");
    break;


    case "Seleccionar";
    //echo "Presionado botón Seleccionar";

    $sentenciaSQL=  $conexion->prepare("SELECT * FROM politicos WHERE Politico_ID=:Politico_ID");
    $sentenciaSQL->bindParam(':Politico_ID',$txtPolitico_ID);
    $sentenciaSQL->execute();
    $politico=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

    $txtNombrePolitico=$politico['Nombre'];
    $txtApellido=$politico['Apellido'];
    $txtCargo=$politico['Cargo'];
    $txtPartido_ID=$politico['Partido_ID'];
    $txtFechaNacimiento=$politico['FechaNacimiento'];
    $txtEducacion=$politico['Educacion'];
    $txtBiografia=$politico['Biografia'];
    $txtImagen=$politico['Imagen'];






    break;

    case "Borrar";
    //echo "Presionado botón Borrar";

    $sentenciaSQL=  $conexion->prepare("DELETE FROM politicos WHERE Politico_ID=:Politico_ID");
    $sentenciaSQL->bindParam(':Politico_ID',$txtPolitico_ID);

    $sentenciaSQL->execute();

    header("location:politicos.php");
    break;
}


$sentenciaSQL=  $conexion->prepare("SELECT * FROM politicos");
$sentenciaSQL->execute();
$listaPoliticos=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);


?>


<div
    class="col-md-5">  
    

    <div class="card">
        <div class="card-header">Datos del Político</div>
        <div class="card-body">
            
        <form method="POST" enctype="multipart/form-data">

        <div class = "form-group">
<label for="txtPolitico_ID"></label>
<input type="hidden"  require    class="form-control" value="<?php echo $txtPolitico_ID?>" name="txtPolitico_ID" id="txtPolitico_ID"  placeholder="Numero del ID">


<div class = "form-group">
<label for="txtNombrePolitico">NombrePolítico:</label>
<input type="text" require   class="form-control"  value="<?php echo $txtNombrePolitico?>"    name="txtNombrePolitico" id="txtNombrePolitico"  placeholder="NombrePolitico">

</div>

<div class = "form-group">
<label for="txtApellido">Apellido:</label>
<input type="text" require   class="form-control"  value="<?php echo $txtApellido?>"    name="txtApellido" id="txtApellido"  placeholder="Apellido"> 

</div>

<div class = "form-group">
<label for="txtCargo">Cargo:</label>
<input type="text" require   class="form-control"  value="<?php echo $txtCargo?>"   name="txtCargo" id="txtCargo"  placeholder="Cargo">

</div>

<div class = "form-group">
<label for="txtPartido_ID">PartidoCorrespondiente:</label>
<input type="int" require   class="form-control" value="<?php echo $txtPartido_ID?>"     name="txtPartido_ID" id="txtPartido_ID"  placeholder="Partido_ID">

</div>

<div class = "form-group">
<label for="txtFechaNacimiento">FechaNacimiento:</label>
<input type="text" require   class="form-control" value="<?php echo $txtFechaNacimiento?>"     name="txtFechaNacimiento" id="txtFechaNacimiento"  placeholder="FechaNacimiento">

</div>

<div class = "form-group">
<label for="txtEducacion">Educación:</label>
<input type="text" require   class="form-control" value="<?php echo $txtEducacion?>"     name="txtEducacion" id="txtEducacion"  placeholder="Educacion">

</div>


<div class = "form-group">
<label for="txtBiografia">Biografia:</label>
<input type="text" require   class="form-control"  value="<?php echo $txtBiografia?>"    name="txtBiografia" id="txtBiografia"  placeholder="Biografia">

</div>

<div class = "form-group">
<label for="txtImagen">Imagen (direccion web)</label>
<input type="text" require   class="form-control"  value="<?php echo $txtImagen?>"     name="txtImagen" id="txtImagen"  placeholder="Imagen">

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

    Tabla de politicos  (mostrar registros de los partidos)

    <div
        class="table-responsive "
    >
        <table
            class="table table-light"
        >
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Cargo</th>
                    <th scope="col">Partido Correspondiente</th>
                    <th scope="col">Fecha de Nacimiento</th>
                    <th scope="col">Educación</th>
                    <th scope="col">Biografía</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php  foreach ($listaPoliticos as $Politico){?>
                <tr class="">
                    <td><?php echo $Politico['Politico_ID']  ?></td>
                    <td><?php echo $Politico['Nombre']  ?></td>
                    <td><?php echo $Politico['Apellido']  ?></td>
                    <td><?php echo $Politico['Cargo']  ?></td>
                    <td><?php echo $Politico['Partido_ID']  ?></td>
                    <td><?php echo $Politico['FechaNacimiento']  ?></td>
                    <td><?php echo $Politico['Educacion']  ?></td>
                    <td><?php echo $Politico['Biografia']  ?></td>
                    <td><?php echo $Politico['Imagen']  ?></td>

                    <td>
                        
                       

                        <form  method="post">
                        <input type="hidden" name="txtPolitico_ID" id="txtPolitico_ID"value="<?php echo $Politico['Politico_ID'];  ?>"/>


                        <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary"/>

                        <input type="submit" name="accion" value="Borrar" class="btn btn-danger"/>



                        </form>


                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
    


</div>
<?php include('../template/pie.php') ?>