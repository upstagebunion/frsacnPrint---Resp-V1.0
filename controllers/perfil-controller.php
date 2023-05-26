<?php

	class UserCont{
		static public function ctrlObtenerUsuario($autor_id){
			$tabla = "registros";
			$item = "id";
			$value = $autor_id;
			$respuesta = UserModel::mdlObtenerUser($tabla, $item, $value);
			return $respuesta;
		}

		static public function ctrlComent(){
			if(isset($_POST["coment"]) && $_POST["coment"] != "" && strlen($_POST["coment"]) <= 200){
				if(isset($_SESSION["accesAllow"])){
					if($_SESSION["accesAllow"] == "ok"){
						$tabla = "comentarios";
						$datos = array("coment" => $_POST["coment"],"id" => $_SESSION["id"], "post" => $_GET["pop"]);
						$respuesta = UserModel::mdlComent($tabla, $datos);
						return $respuesta;
					}
				}else{
					return "Debe iniciar sesión para comentar";
				}
			}
			else{
				return "Coloque algun comentario (Max. 200 Caracteres)";
			}
		}

		static public function ctrlObtenerBusqueda($busqueda){
			$tabla = "imagenes";
			$item = "autor_id";
			$value = $busqueda;
			$respuesta = FormularioModel::mdlObtenerVarRegistros($tabla, $item, $value, null, null);

			return $respuesta;
		}
	}

?>