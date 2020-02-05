<?php

    class unifaat{

        public function teste(){
            //$service_url = "";

            $token = "";
            $password = "";  
            $content = "applicationx-www-form-urlencoded";
            $headers = array('Token:'.$token, 'Password:'.$password, 'Content-Type:'.$content);

            $curl = curl_init($service_url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);            
            $curl_response = curl_exec($curl);

            curl_close($curl);

            return $curl_response;
            

        }

        public function consultaAluno($matricula){

            //$service_url = "";
            $token = "";
            $password = "";
            
            $content = "multipart/form-data";
            $headers = array('Token:'.$token, 'Password:'.$password, 'Content-Type:'.$content);
            $ra = array('matricula'=>$matricula);
            
            $curl = curl_init($service_url);
        
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $ra);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLINFO_HEADER_OUT, true);
                
            $curl_response = curl_exec($curl);
            $info = curl_getinfo($curl);
            curl_close($curl);

            return $curl_response;
        }

        public function connVerify(){
            $connected = @fsockopen("www.google.com", 80); 
            $is_conn = $connected ? true : false;
            return $is_conn;
        }

    }

 ?>


