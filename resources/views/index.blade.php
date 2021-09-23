<?php
use App\Models\Usuario;

$users = Usuario::where('usu_id', 1)->first();

session_start();
$register 				= "BK_CONSUMIDOR";  

session(['con_userid'   => $users->usu_id]);
session(['con_username' => $users->usu_pnombre." ".$users->usu_snombre." ".$users->usu_papellido." ".$users->usu_sapellido]); 
session(['con_foto'     => $users->usu_foto]);
session(['con_sexo' 	=> $users->usu_sexo]);
session(['con_company'	=> $users->usu_company]);
session(['register'     => $register]);
session(['con_correo' 	=> $users->usu_correo]);
session(['con_master' 	=> $users->usu_master]);

echo "<script language='javascript' type='text/javascript'>window.open('/dashboard','_self');</script>";               
