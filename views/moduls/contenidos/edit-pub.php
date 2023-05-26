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

    $post = ControlUsuario::ctrlObtenerPost("productos", "id", $_GET["id"]);
?>

<main class="main-inicio">
    <div class="mostrador">
        <h1 class="titulo">Editar publicación</h1>
        <div class="imagen">
            <img src="images/presentacion.png" />
        </div>

        <div class="grid-formulario">
            <form enctype="multipart/form-data" method="POST">
                <div class="input">
                    <p>Titulo</p>
                    <input type="text" id="ingresoTitulo" name="ingresoTitulo" value="<?php echo $post['titulo']; ?>"required />
                </div>
                <div class="input">
                    <p>Imagen</p>
                    <input type="file" id="archivo" name="archivo" ></input>
                </div>
                <div class="input-text">
                    <p>Descripción</p>
                    <textarea type="text" id="descripcion" name="descripcion" placeholder="Describe el producto" ><?php  echo $post['descripcion']; ?></textarea>
                </div>
                <div class="input-text">
                    <p>Diseno</p>
                    <textarea type="text" id="diseno" name="diseno" placeholder="Describe el diseno (o creditos al artista)" ><?php  echo $post['diseno']; ?></textarea>
                </div>
                <div class="input">
                    <p>Precio</p>
                    <input type="number" id="ingresoPrecio" name="ingresoPrecio" value="<?php  echo $post['precio']; ?>" required/>
                </div>
                <div class="input">
                    <p>Tipo</p>
                    <select id="ingresoTipo" name="ingresoTipo">
                        <?php  $tipos = ControlUsuario::ctrlObtenerRegistros("tipos");?>
                        <?php foreach($tipos as $key => $value): ?>
					        <option value="<?php echo $value['id'];?>"  <?php if($value['id'] == $post['id_tipo']){ echo 'selected';}else{ echo '';} ?>><?php echo $value["valor"];?></option>
				        <?php endforeach ?>
                    </select>
                </div>
                
                <div class="input">
                    <p>tags</p>
                    <input type="text" id="ingresoTags" name="ingresoTags" placeholder="Sepra cada tag por coma" value="<?php echo $post['tag']; ?>" />
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
	
			$registro = ControlUsuario::editImagen($_GET['id']);
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