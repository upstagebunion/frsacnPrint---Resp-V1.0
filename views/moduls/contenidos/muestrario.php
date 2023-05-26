<?php
	
	$contPorPag = 6;
	
	if(isset($_GET["search"])){
		$_GET["search"] = str_replace("<",".", $_GET["search"]);
		if(!isset($_GET["num"])){
			$pagAct = 1;
		}else{
			$pagAct = $_GET["num"];
		}
		//$imagenesPorTitulo = ControlUsuario::ctrlObtenerBusquedaPag($_GET["search"],($pagAct*$contPorPag)-$contPorPag,$pagAct*$contPorPag);
		$imagenesPorTag = ControlUsuario::ctrlObtenerBusquedaTag($_GET["search"],($pagAct*$contPorPag)-$contPorPag,$pagAct*$contPorPag);
		$imagenes = array_merge ($imagenesPorTag);
		$publicacionesTotales = count($imagenes);

	}else{
		if(!isset($_GET["num"])){
			$pagAct = 1;
		}else{
			$pagAct = $_GET["num"];
		}
		$todo = ControlUsuario::ctrlObtenerRegistro();
		$imagenes = ControlUsuario::ctrlObtRegPag(($pagAct*$contPorPag)-$contPorPag, $pagAct*$contPorPag);
		$publicacionesTotales = $todo +1;
	}
	
	$paginas = ceil($publicacionesTotales/$contPorPag);
?>

<main class="main-inicio">
	<div class="mostrador-main" id="mostrador-main">
		<?php if (isset($imagenes) && isset($_GET["search"])): ?>
			<?php if($imagenes != null || count($imagenes) > 0): ?>
				<h1 class="titulo">Muestrario || Resultados para "<?php echo $_GET["search"]; ?>"</h1>
					<div class="grid-imagenes">
						<?php foreach($imagenes as $key => $value): ?>
							<?php $descuento = ControlUsuario::ctrlObtenerPost("descuentos", "id_tipo", $value["id_tipo"]);
								  if(isset($descuento) && $descuento != false){
									$desc = floatval('0.'.$descuento['porcentaje']);
									$valorDesc = $value['precio']-($value['precio']*$desc);
									echo '<a href="index.php?pag=presentacion&id='.$value['id'].'"><img src="'.$value['ruta'].'" alt="'.$value['titulo'].'" />'.$value['titulo'].'<br/><strike> $'.$value['precio'].'.00</strike> ----> $'.$valorDesc.'.00 </a>';
								  }else{
									echo '<a href="index.php?pag=presentacion&id='.$value['id'].'"><img src="'.$value['ruta'].'" alt="'.$value['titulo'].'" />'.$value['titulo'].'<br/> $'.$value['precio'].'.00 </a>';
								  }
							?>
						<?php endforeach ?>
					</div>
					<hr />
					<div class="cont-pag">
						<ul>
							<li class="primero"><a href="index.php?search=<?php echo $_GET['search'];?>&num=1">Primera</a></li>
							<p> ... </p>
							<?php for($i=0;$i<$paginas;$i++):?>
								<li class="<?php echo $pagAct==$i+1? 'active' : ''?>"><a href="index.php?search=<?php echo $_GET['search'];?>&num=<?php echo $i+1?>"><?php echo $i+1?></a></li>
							<?php endfor?>
							<p> ... </p>
							<li class="ultima"><a href="index.php?search=<?php echo $_GET['search'];?>&num=<?php echo $paginas;?>"><?php echo $paginas;?></a></li>
						</ul>
					</div>
			<?php else: ?>
				<h1 class="titulo">No se encontraron resultados para "<?php echo $_GET["search"]; ?>"</h1>
			<?php endif ?>
		<?php else: ?>
			<h1 class="titulo">Muestrario</h1>
			<div class="grid-imagenes">
				<?php foreach($imagenes as $key => $value): ?>
					<?php $descuento = ControlUsuario::ctrlObtenerPost("descuentos", "id_tipo", $value["id_tipo"]);
						if(isset($descuento) && $descuento != false){
							$desc = floatval('0.'.$descuento['porcentaje']);
							$valorDesc = $value['precio']-($value['precio']*$desc);
							echo '<a href="index.php?pag=presentacion&id='.$value['id'].'"><img src="'.$value['ruta'].'" alt="'.$value['titulo'].'" />'.$value['titulo'].'<br/><strike> $'.$value['precio'].'.00</strike> ----> $'.$valorDesc.'.00 </a>';
						}else{
							echo '<a href="index.php?pag=presentacion&id='.$value['id'].'"><img src="'.$value['ruta'].'" alt="'.$value['titulo'].'" />'.$value['titulo'].'<br/> $'.$value['precio'].'.00 </a>';
						}
					?>
					
				<?php endforeach ?>

			</div>
			<hr />
			<div class="cont-pag">
				<ul>
					<li class="primero"><a href="index.php?pag=muestrario&num=1">Primera</a></li>
					<p> ... </p>
					<?php for($i=0;$i<$paginas;$i++):?>
						<li class="<?php echo $pagAct==$i+1? 'active' : ''?>"><a href="index.php?pag=muestrario&num=<?php echo $i+1?>"><?php echo $i+1?></a></li>
					<?php endfor?>
					<p> ... </p>
					<li class="ultima"><a href="index.php?pag=muestrario&num=<?php echo $paginas;?>"><?php echo $paginas;?></a></li>
				</ul>
			</div>
		<?php endif ?>
	</div>
	

</main>