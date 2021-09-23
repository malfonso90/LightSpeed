<?php

// Insert Sistem Notifications
function notificar($recibe, $subject, $notas, $link, $tipo) {
	$crud = new Crud();
	$result = $crud->execute("INSERT INTO lic_notificaciones ( not_recibe,not_subject,not_notas,not_link,not_tipo ) VALUES ('$recibe','$subject','$notas','$link','$tipo')");
    return true;
}

// USO DE FUNCION PARA ENCRIPTAR O REVERSAR

//$plain_txt = "Mi texto plano o id";
//$encrypted_txt = encrypt_decrypt('encrypt', $plain_txt);
//$decrypted_txt = encrypt_decrypt('decrypt', $encrypted_txt);

function encrypt_decrypt($action, $string) {
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $secret_key = 'BKADMINPIMCOMPANY0123456789cefghjloqrstuvwxz';
    $secret_iv  = 'BKADMINPIMCOMPANY0123456789CEFGHJLOQRSTUVWXZ';
    
    // hash
    $key = hash('sha256', $secret_key);
    
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    if ( $action == 'encrypt' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if( $action == 'decrypt' ) {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
    return $output;
}


// Funcion para subir imagenes y fotosd
// $target_dir = directorio destino
// $base_name =  Nombre del Archivo
// $tmp_name = Nombre del Archivo Temp

function upload($target_dir, $base_name, $tmp_name) {

	$base_name    = basename($base_name);
	$target_file  = $target_dir . $base_name;
	$size         = getimagesize($tmp_name);

	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	if($size !== false) {
		$mensaje = "Archivo imagen - " . $size["mime"] . ".";
		//$uploadOk = 1;
	} else {
		$mensaje = "Este archivo no es una imagen.";
		$uploadOk = 0;
	}
	
	// Check if folder does not exists, create it
	if (!file_exists($target_dir)) {
		mkdir($target_dir, 0777, true);	
	}
	
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 500000) {
		$mensaje = "Lo sentimos, su archivo es muy grande.";
		$uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
		$mensaje = "Lo sentimos, solo archivos JPG, JPEG, PNG & GIF son permitidos.";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		$mensaje = "Lo sentimos, su imagen no se pudo subir.";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($tmp_name, $target_file)) {
			$mensaje = "La imagen ha sido subida.";
		} else {
			$mensaje = "Lo sentimos, ha ocurrido un error subiendo su imagen.";
			$uploadOk = 0;

		}
	}
	
	return $uploadOk;
	//return $mensaje;
	//echo $mensaje;

}
 
function f_usuario($valor) {	
	$crud = new Crud();
	$result = $crud->getData("SELECT * FROM lic_usuarios WHERE usu_id = $valor");
	foreach ($result as $res) {
		$usu_nombre 	= $res['usu_pnombre'];
		$usu_apellido 		= $res['usu_papellido'];
	} 
	$descripcion = $usu_nombre.' '.$usu_apellido;
	return $descripcion;
}

// detect mobile device
function isMobileDevice() {
	return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
	
function isMobileDev(){
    if(isset($_SERVER['HTTP_USER_AGENT']) and !empty($_SERVER['HTTP_USER_AGENT'])){
       $user_ag = $_SERVER['HTTP_USER_AGENT'];
       if(preg_match('/(Mobile|Android|GoBrowser|[0-9]x[0-9]*|uZardWeb\/|Mini|Doris\/|Skyfire\/|iPhone|Fennec\/|Maemo|Iris\/|CLDC\-|Mobi\/)/uis',$user_ag)){
          return true;
       };
    };
    return false;
}

// Converts bytes into human readable file size.	
function FileSizeConvert($bytes) {
  
	$bytes = floatval($bytes);
	$arBytes = array(
		0 => array(
			"UNIT" => "TB",
			"VALUE" => pow(1024, 4)
		),
		1 => array(
			"UNIT" => "GB",
			"VALUE" => pow(1024, 3)
		),
		2 => array(
			"UNIT" => "MB",
			"VALUE" => pow(1024, 2)
		),
		3 => array(
			"UNIT" => "KB",
			"VALUE" => 1024
		),
		4 => array(
			"UNIT" => "B",
			"VALUE" => 1
		),
	);

    foreach($arBytes as $arItem) {
	
        if($bytes >= $arItem["VALUE"]) {
            $result = $bytes / $arItem["VALUE"];
            $result = str_replace(".", "," , strval(round($result, 2)))." ".$arItem["UNIT"];
            break;
        }
    }
    return $result;
}



?>