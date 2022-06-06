<?php 
    /*
        @AUTHOR: Jeison Steven Paspur

        * Aqui encontramos un conjunto de funciones que realizan la conexion y comunicacion con el Webservice.
    */
        function getAccesKey(){
            /*
                Funcion encargada de obtener y retornar el {{accesKey}} generado con el md5 del token obtenido y la clave.
                
                @return{string} $accesKey

            */
            $curl = curl_init();
            curl_setopt_array($curl, array(
              CURLOPT_URL => 'https://develop.datacrm.la/anieto/anietopruebatecnica/webservice.php?operation=getchallenge&username=prueba',
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'GET',
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            $data = json_decode($response, true);
            $stringToken = $data['result']['token'];
            $accesKey = md5($stringToken.'Vn4HOWtkJOsPX7t'); 
            return $accesKey;
        }
        function getSessionName(){
             /*
                Funcion encargada de obtener y retornar la {{sessionName}} .
                
                @return{string} $sessionName

            */
            $acces = getAccesKey();
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://develop.datacrm.la/anieto/anietopruebatecnica/webservice.php',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => 'operation=login&username=prueba&accessKey='.$acces,
                CURLOPT_HTTPHEADER => array(
                  'Content-Type: application/x-www-form-urlencoded'
                ),
              ));
              
              $response = curl_exec($curl);
              curl_close($curl);
              $data = json_decode($response, true);
              $sessionName = $data['result']['sessionName'];
              return $sessionName;
        }
       function getData(){
           /*
                Funcion encargada de obtener y retornar los datos del query.
                
                @return{array} $data

            */
            $sessionName = getSessionName();
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://develop.datacrm.la/anieto/anietopruebatecnica/webservice.php?operation=query&sessionName='.$sessionName.'&query=select%20*%20from%20Contacts;',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
              ));
              
            
            $response = curl_exec($curl);
            $data = json_decode($response);
            curl_close($curl);
            return $data;
        }

?>