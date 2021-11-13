<?php
session_start();
include "../dinas/includes/config.php";
$noTujuan = $_POST['nohp'];
$message = $_POST['msg'];

		#Process Data
		$fields_string  =   "";
        $fields     =   array(
                            'api_key'       =>  '022628e2',
                            'api_secret'    =>  'zKdAVuy0JgdoK73v',
                            'to'            =>  str_replace(0, '+62', $noTujuan),
                            'from'          =>  "MITBAN",
                            'text'          =>  $message
        );
        $url        =   "https://rest.nexmo.com/sms/json"; 


		

        //url-ify the data for the POST
	foreach($fields as $key=>$value) { 
            $fields_string .= $key.'='.$value.'&'; 
            }
	rtrim($fields_string, '&');

		//open connection
	$ch = curl_init();

	//set the url, number of POST vars, POST data
	curl_setopt($ch,CURLOPT_URL, $url);
	curl_setopt($ch,CURLOPT_POST, count($fields));
	curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

	//execute post
	$result = curl_exec($ch);
	//close connection
	curl_close($ch);

        echo "<pre>";
        print_r($result); 
        echo "</pre>";

        echo "<script>
        		alert('SMS Terkirim!');
        		window.location.href = 'kirim.php';
              </script>";




?>