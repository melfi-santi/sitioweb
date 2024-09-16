<?php  include("template/cabecera.php"); 

/*
     session_start();

        if($_POST){
            if(($_POST['usuario']=="develoteca")&&($_POST['contrasenia']=="sistema")){

                $_SESSION['usuario']="ok";
                $_SESSION['nombreUsuario']="Develoteca";

                header('location:inicio.php');

            }else{

                $mensaje="error: El usuario o contraseña son incorrectos";
            }


           
        }

?>

        <main>
            
        <div class="container">
            <div class="row">


            <div
                class="col-md-4      "
            >
                
            </div>
            


                <div class="col-md-4" >
                <br></br><br>
                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body">

                    <?php if(isset($mensaje)) { ?>
                        <div
                            class="alert alert-danger"
                            role="alert"
                        >
                            <?php echo $mensaje; ?>
                        </div>
                        
                        <?php } ?>
                    <form   method="POST">
                    <div class = "form-group">
                    <label >Usuario</label>
                    <input type="text" class="form-control" name="usuario"  placeholder="Escribir tu usuario">
                    
                    </div>
                    <div class="form-group">
                    <label for="exampleInputPassword1">Contraseña:</label>
                    <input type="password" class="form-control" name="contrasenia" placeholder="Esribir contraseña">
                    </div>
                    <br>    
                    <button type="submit" class="btn btn-primary">Entrar al Administrador</button>
                    </form>

                    </div>
                   
                </div>
                
                
            </div>
        </div>
        

        </main>

        */

 include("template/pie.php"); ?>       