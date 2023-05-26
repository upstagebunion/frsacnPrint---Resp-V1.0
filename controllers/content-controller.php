<?php

	Class ContentController{

		public function contenido(){

			$paginas = array("registro", "logIn", "subir-pub", "cerrar", "muestrario","presentacion", "edit-pub", 'adm-desc');

			if(isset($_GET["pag"])){
				if($_GET["pag"] == "main" || in_array($_GET["pag"], $paginas)){
					$result = "./views/moduls/contenidos/".$_GET["pag"].".php";
				}else{
					$result = "./views/moduls/contenidos/error404.php";
				}
			}elseif(isset($_GET["search"])){
				$result = "./views/moduls/contenidos/muestrario.php";
			}elseif(isset($_GET["user"])){
				$result = "./views/moduls/contenidos/error404.php";
			}else{
				$result = "./views/moduls/contenidos/main.php";
			}

			include $result;
		}

		public function selecNav($pagAct){
			if(isset($_GET["pag"])){
				$page = $_GET["pag"];
			
				if ($page == $pagAct){
					echo "class='active'";
				}
			}else{
				echo "class='active'";
			}
		}

		static public function ctrlNav(){
			if(!isset($_SESSION["accesAllow"])){
				return "./views/moduls/navs/nav.php";
			}elseif($_SESSION["accesAllow"] != "ok"){
					return "./views/moduls/navs/nav.php";
			}else{
				if($_SESSION["accesAllow"] == "ok"){
					return "./views/moduls/navs/nav-adm.php";
				}
			}
		}

		static public function ctrlHeader(){
			if(isset($_GET["pag"])){
				if($_GET["pag"] == "main"){
					return "./views/moduls/header/presentacion.php";
				}elseif($_GET["pag"] == "muestrario"){
					return "./views/moduls/header/header-busqueda.php";
				}else{
					return "./views/moduls/header/header.php";
				}
			}elseif(isset($_GET["search"])){
				return "./views/moduls/header/header-busqueda.php";
			}else{
				return "./views/moduls/header/presentacion.php";
			}	
		}

		static public function ctrlHead(){

			$paginas = array("registro", "logIn", "subir-pub", "cerrar-sesion", "muestrario","presentacion", "edit-pub", 'adm-desc');

			if(isset($_GET["pag"])){
				if($_GET["pag"] == "main"){
					return '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.css">
							<link href="./styles/styles.css" rel="stylesheet" />
							';
				}elseif(in_array($_GET["pag"], $paginas)){
					return '<link href="./styles/'.$_GET["pag"].'.css" rel="stylesheet" />';
				}
				else{
					return '<link href="./styles/error404.css" rel="stylesheet" />';
				}
			}elseif(isset($_GET["search"])){
				return '<link href="./styles/muestrario.css" rel="stylesheet" />';
			}else{
				return '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.css">
						<link href="./styles/styles.css" rel="stylesheet" />
						';
			}	
		}

	}

?>