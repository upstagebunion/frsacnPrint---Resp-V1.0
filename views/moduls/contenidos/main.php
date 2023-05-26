


<?php
		//$todo = ControlUsuario::ctrlObtenerRegistro();
		$imagenes = ControlUsuario::ctrlObtRegPag(0, 6);
?>

<div class="notificacion-roja">
    <p>Actualmente la pagina se encuentra en desarrollo por lo que algunas funciones pueden no funcionar correctamente.</p>
</div>

<div class="carousel-main">
    <div class="carousel-container">
        <button aria-label="Previous" class="glider-prev"><i class="fas fa-arrow-circle-left"></i></button>

        <div class="carousel">
            <div class="elemento-carousel"><img src="images/banner.jpg" /></div>
            <div class="elemento-carousel"><img src="images/banner-2.jpg" /></div>
            <div class="elemento-carousel"><img src="images/banner-3.jpg" /></div>
        </div>

        <button aria-label="Next" class="glider-next"><i class="fas fa-arrow-circle-right"></i></button>
        <div role="tablist" class="carousel-indicador" id="dots"></div>
    </div>
</div>
<main class="main-inicio">


    <div class="mostrador-main" id="mostrador-main">
        <h1 class="titulo">Muestrario</h1>
        <h3><a href="index.php?pag=muestrario">Ver más</a></h3>
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
    </div>

    <div class="about-main">
        <h1 class="titulo">Diseño personalizado</h1>
        <div class="diseno-cont">
            <h2>¿Ya cuentas con tu diseño? / ¿Quieres encargarnos tu diseño?</h2>
            <a href="#contactanos-main">Mándanos un correo con la siguiente información</a>
            <p class="pegado">(Si lo deseas puedes usar otra de nuestras redes de contacto)</p>
            <ul>
                <li>Producto o productos que se desean. (Playeras, tazas, mousepads, etc.)</li>
                <li>Cantidad de productos.</li>
                <li>El diseno con el que deseas personalizar tus productos.</li>
            </ul>
        </div>
    </div>

    <div class="about-main" id="about-main">
        <h1 class="titulo">Conócenos</h1>
        <div class="conocenos-cont">
            <h2>¿Quienes somos?</h2>
            <p>Nuestra empresa está dedicada a la personalización de mercancía utilizando principalmente el método de la sublimación textil, además de la creación y vectorización de diseños. De esta forma te ofrecemos el medio para crear un diseno de acuerdo a cual sea la idea que tengas en mente.</p>
            <h2>Servicio</h2>
            <p>Ofrecemos el medio para digitalizar tu idea en un diseño o ilustración así como el método para materializarlo imprimiendolo en cualquier producto que permita la sublimación.</p>
        </div>
    </div>
    <hr />
    <div class="about-main" id="procedimiento-main">
        <h1 class="titulo">¿Cómo Trabajamos?</h1>
        <div class="conocenos-cont">
            <h2>Para Comenzar</h2>
            <p>
                Al momento de hacer algún encargo o pedir el producto, se evaluará la dificultad del mismo, tomando en cuenta si se tendrá que realizar el diseño, la complejidad de este, y la cantidad de productos en los que se imprimirá.
                Entonces se estimará la fecha de entrega y el costo aproximado del producto (cotización), en caso de haber cambios en el precio se te notificará antes de seguir con el encargo.
                <br />
                <br />
                Para comenzar con el trabajo se te solicita un anticipo del 50% del costo total. <b>Una vez hecho el pago del anticipo y una vez encargada la elaboración del diseño no habrá posibilidad de rembolso</b>, esto con la finalidad de no hacer perder el tiempo y trabajo a los artistas involucrados.
                <br />
                <br />
                En el caso que no se necesite hacer el diseño y nos lo proporciones en buena resolución <b>el rembolso estará disponible hasta el momento en el que se imprima el primer producto.</b>
                <br />
                <br />
                Para entregar la mercancía final se necesitará completar el pago al 100%.
            </p>
            <h2>Diseño</h2>
            <p>
                Al crear el diseño se necesitará que nos proporciones <b>una descripción lo más detallada posible</b> del diseño que tienes en mente,
                en ese momento se comunicará al artista y este se encargará de hacer el boceto.
                <br />
                Este boceto se te enviará para que lo revises y hagas los cambios que creas
                pertinentes, una vez lo hayas revisado y corregido se notificará al artista para que complete el trabajo <b>
                    (Sólo se permitirá una revisión
                    con sus respectivos cambios)
                </b>.
                <br />
                Después de que el artista entregue el diseño se comenzará el proceso de sublimación en los productos deseados.
            </p>
            <h2>Entrega</h2>
            <p>
                Se especificará con anticipación el método de entrega dependiendo de la cantidad de productos, podrá ser por paquetería o entrega en algún punto específico acordado.
            </p>
            <h2>Compra en tienda</h2>
            <p>
                Venderemos productos con diseños pre-fabricados directamente en tiendas, outlets, nuestra tienda web, tiendas online (amazón, mercado libre), convenciones, etc. Estos lugares se especificarán dentro de esta página web en donde también se exponen dichos diseños.
                En estos casos el pago será directo y la entrega lo más inmediata posible sujeto a disponibilidad.
            </p>
            <h2>Métodos de pago</h2>
            <p>
                En caso de una <b>compra directa</b> con nosotros se podrá pagar a través de <b>Oxxo Pay (Efectivo), Pay Pal, Transferencia SPEI (interbancaria).</b><br />
                En caso de una compra a traves de tiendas externas el método de pago dependera por completo de la tienda.
            </p>
        </div>
    </div>
    <hr />
    <div class="about-main" id="contactanos-main">
        <h1 class="titulo">Contactanos</h1>
        <div class="contacto-cont">
            <h2>Redes Sociales</h2>
            <p>
                <a href="https://www.facebook.com/FRSANC.s/" target="_blank"><i class="fab fa-facebook"></i>Facebook</a>
                <a href="https://www.instagram.com/frsanc.sublimacion/" target="_blank"><i class="fab fa-instagram"></i>Instagram</a>
                <a href="#contactanos-main" id="abrir-correo"><i class="fas fa-envelope-open-text"></i>Correo</a>
            </p>
        </div>
    </div>
</main>

<div class="overlay" id="overlay">
    <div class="popup" id="popup">
        <a href="#contactanos-main" id="cerrar" class="cerrar"><i class="fas fa-times"></i></a>
        <img id="imagen" src="images/correo.jpg" type="image/jpg" alt="correo" />
    </div>
</div>