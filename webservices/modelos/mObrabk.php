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
          $param = array('Nombreobra' => $eObra->getNombre(),
                        'Direccionobra' => $eObra->getDireccion(),
                        'Ruccliente' => $eObra->getRuccliente()
                        );

          $param = (object)$param;
          try{				
              $wsdlAddress = "http://localhost:1145/ObrasSOAP.svc?wsdl";

              $options = array(
                                "soap_version" => SOAP_1_1,
                                "cache_wsdl" => WSDL_CACHE_NONE,
                                "exceptions" => false,
                                "features" => SOAP_SINGLE_ELEMENT_ARRAYS
                              );

              $webServiceClient = new SoapClient($wsdlAddress, $options);
              $ready = $webServiceClient->RegistrarObras(array('obraACrear'=>$param));
              return json_encode(get_object_vars($ready));
  			  } catch( SoapFault $e){
              $xml = $e->faultstring;
              return  $xml;
  			  }
  		}

  		public function listarObras(){	
          try{				
              $wsdlAddress = "http://localhost:1145/ObrasSOAP.svc?wsdl";

              $options = array(
                                "soap_version" => SOAP_1_1,
                                "cache_wsdl" => WSDL_CACHE_NONE,
                                "exceptions" => false,
                                "features" => SOAP_SINGLE_ELEMENT_ARRAYS
                              );

              $webServiceClient = new SoapClient($wsdlAddress, $options);

              $ready = $webServiceClient->ListaObras();
              return json_encode(get_object_vars($ready));
    			}	catch( SoapFault $e){
              $xml = $e->faultstring;
              return  $xml;
    			}
  		}

  		public function cargarDatos($id){		
    			try{				
              $wsdlAddress = "http://localhost:1145/ObrasSOAP.svc?wsdl";

              $options = array(
                                "soap_version" => SOAP_1_1,
                                "cache_wsdl" => WSDL_CACHE_NONE,
                                "exceptions" => false,
                                "features" => SOAP_SINGLE_ELEMENT_ARRAYS
                              );

              $webServiceClient = new SoapClient($wsdlAddress, $options);
              $idObra =  array("codigo" => $id);
              $ready = $webServiceClient->__call("ObtenerObras", array($idObra));
              return json_encode(get_object_vars($ready));
    			} catch( SoapFault $e){
              $xml = $e->faultstring;
              return $xml;
    			}
  		}


  		public function actualizar($eObra){			
          $param = array('Id'=> $eObra->getObraId(),
             	           'Nombreobra' => $eObra->getNombre(),
                         'Direccionobra' => $eObra->getDireccion(),
                         'Ruccliente' => $eObra->getRuccliente()
                        );

          $param = (object)$param;
          try{				
              $wsdlAddress = "http://localhost:1145/ObrasSOAP.svc?wsdl";

              $options = array(
                               "soap_version" => SOAP_1_1,
                               "cache_wsdl" => WSDL_CACHE_NONE,
                               "exceptions" => false,
                               "features" => SOAP_SINGLE_ELEMENT_ARRAYS
                              );

              $webServiceClient = new SoapClient($wsdlAddress, $options);

              $ready = $webServiceClient->ModificarObras(array('obraAModificar'=>$param));
              return json_encode(get_object_vars($ready));
    			}	catch( SoapFault $e){
              $xml = $e->faultstring;
              return $xml;
    			}
  		}

      public function borrarDatos($id){
          try{				
              $wsdlAddress = "http://localhost:1145/ObrasSOAP.svc?wsdl";

              $options = array(
                                "soap_version" => SOAP_1_1,
                                "cache_wsdl" => WSDL_CACHE_NONE,
                                "exceptions" => false,
                                "features" => SOAP_SINGLE_ELEMENT_ARRAYS
                              );

              $webServiceClient = new SoapClient($wsdlAddress, $options);
              $idObra =  array("codigo" => $id);
              $ready = $webServiceClient->__call("EliminarObras", array($idObra));
              return json_encode(get_object_vars($ready));
    			} catch( SoapFault $e){
              $xml = $e->faultstring;
              return  $xml;
    			}
  		}
	}
?>	