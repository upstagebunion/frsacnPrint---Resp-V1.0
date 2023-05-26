<?php

	if(!isset($_SESSION["accesAllow"])){
		echo '<script>window.location = "index.php?pag=registro";</script>';
		
		return;
	}else{
		if($_SESSION["accesAllow"] != "ok" || $_SESSION['admin'] != true){
			echo '<script>window.location = "index.php?pag=registro";</script>';
		
			return;
		}
	}
?>

<main class="main-inicio">
    <div class="mostrador">
        <h1 class="titulo">Subir publicación <?php if($_SESSION["id"] == NULL){echo "todo mal";};?></h1>
        <div class="imagen">
            <img src="images/presentacion.png" />
        </div>

        <div class="grid-formulario">
            <form enctype="multipart/form-data" method="POST">
                <div class="input">
                    <p>Titulo</p>
                    <input type="text" id="ingresoTitulo" name="ingresoTitulo" value="<?php $valor = isset($_POST['ingresoTitulo']) ? $_POST['ingresoTitulo'] : ''; echo $valor; ?>"required />
                </div>
                <div class="input">
                    <p>Imagen</p>
                    <input type="file" id="archivo" name="archivo"  required ></input>
                </div>
                <div class="input-text">
                    <p>Descripción</p>
                    <textarea type="text" id="descripcion" name="descripcion" placeholder="Describe el producto" ><?php $valor = isset($_POST['descripcion']) ? $_POST['descripcion'] : ''; echo $valor; ?></textarea>
                </div>
                <div class="input-text">
                    <p>Diseno</p>
                    <textarea type="text" id="diseno" name="diseno" placeholder="Describe el diseno (o creditos al artista)" ><?php $valor = isset($_POST['diseno']) ? $_POST['diseno'] : ''; echo $valor; ?></textarea>
                </div>
                <div class="input">
                    <p>Precio</p>
                    <input type="number" id="ingresoPrecio" name="ingresoPrecio" required/>
                </div>
                <div class="input">
                    <p>Tipo</p>
                    <select id="ingresoTipo" name="ingresoTipo">
                        <?php  $tipos = ControlUsuario::ctrlObtenerRegistros("tipos");?>
                        <?php foreach($tipos as $key => $value): ?>
					        <option value="<?php echo $value['id'];?>"><?php echo $value["valor"];?></option>
				        <?php endforeach ?>
                    </select>
                </div>
                
                <div class="input">
                    <p>tags</p>
                    <input type="text" id="ingresoTags" name="ingresoTags" placeholder="Sepra cada tag por coma" value="<?php $valor = isset($_POST['ingresoTags']) ? $_POST['ingresoTags'] : ''; echo $valor; ?>" />
                </div>
                <br />
                <div class="enviar">
                    <button type="submit">Subir</button>
                </div>
            </form>
            <br />
        </div>
    </div>

    <?php 
	
			$registro = ControlUsuario::subirImagen();
			if($registro == "ok"){
				echo '<script>
						if(window.history.replaceState){
				
							window.history.replaceState(null, null, window.location.href);
				
						}
		
					 </script>';

					 echo '<div class="notificacion-verde"><p>La imágen se subió correctamente</p></div>';
			}
			else{
				echo '	<div class="notificacion-roja"><p>'.$registro.'</p></div> 
					<script>
						if(window.history.replaceState){
				
							window.history.replaceState(null, null, window.location.href);
				
						}
		
					</script>';
			}

		?>

</main>