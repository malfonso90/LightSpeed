<?php
 
 use Illuminate\Support\Facades\DB;
 use App\Models\Usuario;
 use App\Models\Project;
 use App\Models\Task;
  
 include $_SERVER['DOCUMENT_ROOT'].'/Classes/function.php';

$usuarios = Usuario::
orderBy('usu_pnombre','asc')->
get();

$totalData     = count($usuarios);
$totalFiltered = $totalData;
$requestData   = $_REQUEST;
$data = array();

foreach ($usuarios as $usuario) { 

	$nestedData   = array(); 
	
	$nestedData['DT_RowId'] = 'uid'.$usuario->usu_id;  // Add the row ID TR   
	$nestedData['DT_RowData'] = encrypt_decrypt('encrypt', $usuario->usu_id);    
	
	if (!empty($usuario->usu_foto)) { $foto =  $usuario->usu_foto; }else{ $foto = '/images/default.jpg';};
		
    $nestedData[] = '<img class="avatar avatar-sm" src="' . $foto . '" data-toggle="tooltip" data-original-title="' . $usuario->usu_pnombre . ' ' . $usuario->usu_snombre . '" data-container="body" title="' . $usuario->usu_pnombre . ' ' . $usuario->usu_snombre . '">';
	
	$nestedData[] = $usuario->usu_pnombre;
	$nestedData[] = $usuario->usu_papellido;
	$nestedData[] = $usuario->usu_correo;

	$tasks = Task::where('tas_usu_id', $usuario->usu_id)->get()->count();

	$projects = Project::
	where( DB::raw( "find_in_set('".$usuario->usu_id."',pro_usu_id)" ) , '>', DB::raw("'0'") )->
	get()->count();


	$nestedData[] = $projects;
	$nestedData[] = $tasks;
	
	$data[] = $nestedData;
	
};

$json_data = array(
            "draw"            => intval( $requestData ),
			"recordsTotal"    => intval( $totalData ),
            "recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
            "data"            => $data   
            );
 
echo json_encode($json_data);
