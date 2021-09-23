<?php
 
use App\Models\Project;
use App\Models\Task;
use App\Models\Usuario;

include $_SERVER['DOCUMENT_ROOT'].'/Classes/function.php';

//$proyectos = Project::orderBy('pro_name','asc')->get();

$query = Project::select('*');

if (!empty($_POST['uid'])){
	$uid = $_POST['uid'];
	$query->whereRaw("find_in_set($uid,pro_usu_id)");
}	
$query->orderBy('pro_name','asc');

$proyectos = $query->get();

$totalData     = count($proyectos);
$totalFiltered = $totalData;
$requestData   = $_REQUEST;
$data = array();

foreach ($proyectos as $proyecto) { 

	$nestedData   = array();
	
	$nestedData['DT_RowId'] = 'uid'. $proyecto->pro_id;  // Add the row ID TR   
	$nestedData['DT_RowData'] = encrypt_decrypt('encrypt', $proyecto->pro_id);    
	
	$nestedData[] = $proyecto->pro_name; 

	$usuarios = Usuario::
	whereIn('usu_id', explode(',', $proyecto->pro_usu_id))->get();

	$members = "";
	foreach ($usuarios as $usuario) { 

		if (!empty($usuario->usu_foto)) { $foto =  $usuario->usu_foto; }else{ $foto = '/images/default.jpg';};
		
		$members = $members.'<img class="avatar avatar-sm" src="' . $foto . '" data-toggle="tooltip" data-original-title="' . $usuario->usu_pnombre . ' ' . $usuario->usu_papellido . '" data-container="body" title="' . $usuario->usu_pnombre . ' ' . $usuario->usu_papellido . '"> ';

       //$members = $members.$usuario->usu_pnombre.", ";
	}
	$nestedData[] = $members;

	$tasks = Task::where('tas_pro_id', $proyecto->pro_id)->get()->count();
	
	$hours = Task::where('tas_pro_id', $proyecto->pro_id)->sum('tas_hours');

	$nestedData[] = $tasks;
	$nestedData[] = $hours;
	
	$data[] = $nestedData;
	
};

$json_data = array(
            "draw"            => intval( $requestData ),
			"recordsTotal"    => intval( $totalData ),
            "recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
            "data"            => $data   
            );
 
echo json_encode($json_data);

