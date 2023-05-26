<?php
	
	class Crypt{
		
		static public function encrypt($str, $salt){
			$numEspacio = round ( (strlen($str)/2) , 1 , PHP_ROUND_HALF_UP);
			$paraEnc=$str."2".$numEspacio;
			$encString = crypt($paraEnc , $salt);
			return $encString;
		}

	}

?>