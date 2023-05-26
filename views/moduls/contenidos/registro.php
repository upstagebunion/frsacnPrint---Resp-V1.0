<main class="main-inicio">
<div class="mostrador">
    <h1 class="titulo">Registrarse<a href="editar-producto.html">Editar</a></h1>
    <div class="imagen">
        <img src="images/presentacion.png" />
    </div>
    <div class="grid-formulario">
        <form method="post">
            <div class="input">
                <p>Usuario</p>
                <input type="text" id="ingresoUsuario" name="ingresoUsuario" value="<?php $valor = isset($_POST['ingresoUsuario']) ? $_POST['ingresoUsuario'] : ''; echo $valor; ?>"/>
            </div>
            <div class="input">
                <p>Correo Electronico</p>
                <input type="text" id="ingresoEmail" name="ingresoEmail" placeholder="tucorreo@gmail.com" value="<?php $valor = isset($_POST['ingresoEmail']) ? $_POST['ingresoEmail'] : ''; echo $valor; ?>" />
            </div>
            <div class="input">
                <p>Contrasena</p>
                <input type="password" id="ingresoPassword" name="ingresoPassword" />
            </div>
            <div class="input">
                <p>Confirmar contrasena</p>
                <input type="password" id="confirmPassword" name="confirmPassword" />
            </div>
            <br />
            <div class="enviar">
                <button type="submit">Ingresar</button>
            </div>
        </form>
        <br/>
    </div>
</div>

    <?php 
	    
			$registro = ControlUsuario::ctrlRegistro();

			if($registro == "ok"){
				echo '<script>
						if(window.history.replaceState){
				
							window.history.replaceState(null, null, window.location.href);
				            window.location = "index.php?pag=logIn";
						}
		
					 </script>';

					 echo '<div class="notificacion-verde"><p>Usuario registrado correctamente</p></div>';
			}
			else{
				echo '<div class="notificacion-roja"><p>'.$registro.'</p></div>
				<script>
						if(window.history.replaceState){
				
							window.history.replaceState(null, null, window.location.href);
						}
				</script>';
			}

		?>
</main>