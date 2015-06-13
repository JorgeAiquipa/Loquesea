<?php
  	require_once("../modelos/mObrabk.php");
  	require_once("../entidades/eObra.php");
  	$obras = new Obras();

    if(isset($_POST['var']) && $_POST['var'] == 'listar'){
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
            echo json_encode(get_object_vars($ready));
        } catch( SoapFault $e){
            $xml = $e->faultstring;
            echo $xml;
        }
    }

  	if(isset($_POST['var']) && $_POST['var'] == 'grabar'){
    		$eObra = new EntidadObra();
    		$eObra->setObraId($_POST['txtObraId']);
    		$eObra->setNombre(utf8_decode(trim($_POST['txtDescripcion'])));
    	  $eObra->setDireccion(utf8_decode(trim($_POST['txtDireccion'])));
    		$eObra->setRucCliente(trim($_POST['slcCliente']));
    		$validar = $obras->validaciones($eObra);
    		if($validar != 'ok')
    			 echo $validar;
    		else
      			if(isset($_POST['txtObraId']) && $_POST['txtObraId'] == ''){
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
                    echo json_encode(get_object_vars($ready));
                } catch( SoapFault $e){
                    $xml = $e->faultstring;
                    echo $xml;
                }
      			} elseif(isset($_POST['txtObraId']) && $_POST['txtObraId'] != ''){
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
                    echo json_encode(get_object_vars($ready));
                } catch( SoapFault $e){
                    $xml = $e->faultstring;
                    echo $xml;
                }
            }
  	}

    if(isset($_POST['var']) && $_POST['var'] == 'cargarDatos'){    	
        try{        
            $wsdlAddress = "http://localhost:1145/ObrasSOAP.svc?wsdl";

            $options = array(
                              "soap_version" => SOAP_1_1,
                              "cache_wsdl" => WSDL_CACHE_NONE,
                              "exceptions" => false,
                              "features" => SOAP_SINGLE_ELEMENT_ARRAYS
                            );

            $webServiceClient = new SoapClient($wsdlAddress, $options);
            $idObra =  array("codigo" => $_POST['id']);
            $ready = $webServiceClient->__call("ObtenerObras", array($idObra));
            echo json_encode(get_object_vars($ready));
        } catch( SoapFault $e){
            $xml = $e->faultstring;
            echo $xml;
        }
    }

    if(isset($_POST['var']) && $_POST['var'] == 'borrar'){
        try{        
            $wsdlAddress = "http://localhost:1145/ObrasSOAP.svc?wsdl";

            $options = array(
                              "soap_version" => SOAP_1_1,
                              "cache_wsdl" => WSDL_CACHE_NONE,
                              "exceptions" => false,
                              "features" => SOAP_SINGLE_ELEMENT_ARRAYS
                            );

            $webServiceClient = new SoapClient($wsdlAddress, $options);
            $idObra =  array("codigo" => $_POST['id']);
            $ready = $webServiceClient->__call("EliminarObras", array($idObra));
            echo json_encode(get_object_vars($ready));
        } catch( SoapFault $e){
            $xml = $e->faultstring;
            echo $xml;
        }
    }


?>