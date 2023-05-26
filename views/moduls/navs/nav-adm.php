<?php $verif = new ContentController; ?>
<?php if(isset($_GET["pag"])): ?>

    <nav class="lateral-izquierdo" id="lateral-izquierdo">
        <div class="enlaces">
            <a href="index.php?pag=main" <?php $verif -> selecNav("main"); ?> ><i class="fas fa-tshirt"></i>Inicio</a>
            <a href="index.php?pag=muestrario"  <?php $verif -> selecNav("muestrario"); ?> ><i class="fas fa-tshirt"></i>Muestrario</a>
            <a href="index.php#about-main" ><i class="fas fa-tshirt"></i>Conócenos</a>
            <a href="index.php#contactanos-main" ><i class="fas fa-tshirt"></i>Contactanos</a>
            <hr />
            <?php if(isset($_SESSION['admin']) && $_SESSION['admin'] == true) :?>
                <a href="index.php?pag=adm-desc" <?php $verif -> selecNav("adm-desc"); ?> ><i class="fas fa-tshirt"></i>Administrar</a>
                <a href="index.php?pag=subir-pub" <?php $verif -> selecNav("subir-pub"); ?> ><i class="fas fa-tshirt"></i>Subir Publicacion</a>
            <?php else: ?>
            <?php endif ?>
            <a href="index.php?pag=favoritos" <?php $verif -> selecNav("favoritos"); ?> ><i class="fas fa-tshirt"></i>Favoritos</a>
            <a href="index.php?pag=pedidos" <?php $verif -> selecNav("pedidos"); ?> ><i class="fas fa-tshirt"></i>Pedidos</a>
            <a href="index.php?pag=cerrar" <?php $verif -> selecNav("cerrar"); ?> ><i class="fas fa-tshirt"></i>Cerrar Sesión</a>
        </div>
        <div class="boton">
            <button id="menuLateralIzquierdoMostrar"><img src="images/boton.png" /></button>
        </div>
    </nav>

<?php else: ?>
	<nav class="lateral-izquierdo" id="lateral-izquierdo">
        <div class="enlaces">
            <a href="index.php?pag=main" class="active"><i class="fas fa-tshirt"></i>Inicio</a>
            <a href="index.php?pag=muestrario"><i class="fas fa-tshirt"></i>Muestrario</a>
            <a href="index.php#about-main"><i class="fas fa-tshirt"></i>Conócenos</a>
            <a href="index.php#contactanos-main"><i class="fas fa-tshirt"></i>Contactanos</a>
            <hr />
            <?php if(isset($_SESSION['admin']) && $_SESSION['admin'] == true) :?>
                <a href="index.php?pag=adm-desc" <?php $verif -> selecNav("adm-desc"); ?> ><i class="fas fa-tshirt"></i>Administrar</a>
                <a href="index.php?pag=subir-pub" <?php $verif -> selecNav("subir-pub"); ?> ><i class="fas fa-tshirt"></i>Subir Publicacion</a>
            <?php else: ?>
            <?php endif ?>
            <a href="index.php?pag=favoritos"><i class="fas fa-tshirt"></i>Favoritos</a>
            <a href="index.php?pag=pedidos"><i class="fas fa-tshirt"></i>Pedidos</a>
            <a href="index.php?pag=cerrar"><i class="fas fa-tshirt"></i>Cerrar Sesión</a>
        </div>
        <div class="boton">
            <button id="menuLateralIzquierdoMostrar"><img src="images/boton.png" /></button>
        </div>
    </nav>

<?php endif ?>