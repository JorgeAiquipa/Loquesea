<?php
	require_once("../entidades/eObra.php");

	class Obras {

		public function validaciones($eObra){
			$validar = "ok";
			$emailregex = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
			
			if($eObra->getNombre() == ''){
				$validar = "Ingrese la nombre de la obra";
			} elseif($eObra->getDireccion() == ''){
				$validar = "Ingrese la direccion";
			} elseif($eObra->getRuccliente() == ''){
				$validar = "Ingrese el Cliente";
			}
			
			return $validar;
		}

		public function grabar($eObra){
        return "hola";
        /*try{
            $soapobra = new SoapClient("http://localhost:1145/ObrasSOAP.svc?wsdl", array('cache_wsdl' => WSDL_CACHE_NONE,'trace' => TRUE));
            $param = array(         'Nombreobra' => $eObra->getNombre(),
                                    'Direccionobra' => $eObra->getDireccion(),
                                    'Ruccliente' => $eObra->getRuccliente()
                                    );
            $ready = $soapobra->RegistrarObras($param);
         
            var_dump($ready); //Verificar si hay resultado
        } catch (Exception $e) {
            trigger_error($e->getMessage(), E_USER_WARNING);
        }*/
 
	  }
	}
?>
