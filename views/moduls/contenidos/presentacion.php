<?php
	if (isset($_GET["id"])){
		if(is_numeric($_GET["id"])){
			$post = ControlUsuario::ctrlObtenerPost("productos", "id", $_GET["id"]);
			if($post != null){
				$tipo = ControlUsuario::ctrlObtenerPost("tipos", "id", $post["id_tipo"]);
				$descuento = ControlUsuario::ctrlObtenerPost("descuentos", "id_tipo", $post["id_tipo"]);
				if($descuento != null){
					$desc = floatval('0.'.$descuento['porcentaje']);
					$precioConDescuento = $post['precio'] - ($post['precio']*$desc);
				}
			}else{
				echo '<script>window.location = "index.php?pag=error404";</script>';
			}
		}else{
			echo '<script>window.location = "index.php?pag=error404";</script>';
		}
	}else{
		echo '<script>window.location = "index.php?pag=error404";</script>';
	}
?>

<main class="main-inicio">
    <div class="mostrador" >
        <h1 class="titulo"><?php echo $post["titulo"];?> <?php if(isset($_SESSION['admin']) && $_SESSION['admin'] == true){echo '<a href="index.php?pag=edit-pub&id='.$_GET['id'].'">Editar</a>';}else{echo '';}?></h1>
        <div class="imagen">
            <img src="<?php echo $post['ruta'];?>"/>
        </div>
        <div class="descripcion">
            <h1>Descripción</h1>
            <p><?php  
				if($post["descripcion"] != null && $post["descripcion"] != "" && $post["descripcion"] != " "){
					$texto = nl2br($post["descripcion"]);
				}else{
					$texto = "No hay descripcion disponible...";
				}
				echo $texto; ?>
			</p>
            
			<h1>Diseno</h1>
            <p><?php  
				if($post["diseno"] != null && $post["diseno"] != "" && $post["diseno"] != " "){
					$texto = nl2br($post["diseno"]);
				}else{
					$texto = "No hay descripcion disponible...";
				}
				echo $texto; ?>
			</p>
			<h1>Precio</h1>
			<?php
				if(isset($descuento) && $descuento != false){
					echo '<p class="precio"> <strike> $'.$post['precio'].' .00</strike> --> $' .$precioConDescuento.'.00</p>';
				}else{
					echo '<p class="precio"> $'.$post['precio'].'.00 </p>';
				}
			?>
			<h1>Tipo</h1>
            <p><?php  
				echo $tipo['valor']; ?>
			</p>
        </div>
    </div>


</main>