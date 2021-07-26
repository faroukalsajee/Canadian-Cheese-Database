<?php 

    // solving cors block
	if (isset($_POST['getdata'])) {
        //echo '2';
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $_POST['getdata']);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		$data = curl_exec($ch);
		curl_close($ch);
		echo $data;
		exit();
	}


    
	$default_lang = 'en';



	if (isset($_GET['lang'])) {
		//setcookie("default_lang", $_GET['lang']);
		$default_lang = $_GET['lang'];
	}



?>
