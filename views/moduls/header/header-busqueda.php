<header class="header">

    <div class="contenedor-logo">
        <a href="index.php" class="logo"><i class="fas fa-home"></i><span>Inicio</span></a>
    </div>

    <div class="barra-busqueda">
		<form method="get">
			<input type="text" name="search" placeholder="Buscar diseno" value="<?php $valor = isset($_GET['search']) ? $_GET['search'] : ''; echo $valor; ?>"/>
			<button type="submit"><i class="fas fa-search"></i></button>
		</form>
	</div>

    <div class="botones-header">
        <p>Bienvenido</p>
    </div>

</header>