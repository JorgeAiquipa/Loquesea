<?php
	class Conexion {
		
		public static function abrir(){ //conexion de escritura
			try{
				$conn = new PDO('mysql:host=localhost;dbname=controlmix', 'marsa', 'marsa2015');
				//$conn = new PDO('mysql:host=localhost;dbname=controlmix', 'root', 'sebluc2010');
				//$conn = new PDO('mysql:host=213.239.218.3;dbname=praimusx_controlmix', 'linke', 'eLSoPL@PeDoS');
				return $conn;
			} catch(PDOException $e) {
				echo "Error : " . $e->getMessage();
				die();
			}
		}

		public static function abrir2(){ //conexion de lectura
			try{
				$conn = new PDO('mysql:host=localhost;dbname=controlmix', 'marsa', 'marsa2015');
				//$conn = new PDO('mysql:host=localhost;dbname=controlmix', 'root', 'sebluc2010');
				//$conn = new PDO('mysql:host=213.239.218.3;dbname=praimusx_controlmix', 'linke', 'eLSoPL@PeDoS');
				return $conn;
			} catch(PDOException $e) {
				echo "Error : " . $e->getMessage();
				die();
			}
		}
	}
?>
