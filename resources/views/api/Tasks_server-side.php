<?php
 
 use Illuminate\Support\Facades\DB;
 use App\Models\Usuario;
 use App\Models\Project;
 use App\Models\Task;
  
 include $_SERVER['DOCUMENT_ROOT'].'/Classes/function.php';

$query = Task::
select('tasks.*','pro_name','usu_pnombre','usu_papellido','usu_foto')->
leftJoin('projects', 'pro_id', '=', 'tas_pro_id')->
leftJoin('usuarios', 'usu_id', '=', 'tas_usu_id');

if (!empty($_POST['pid'])){
	$query->where('tas_pro_id', $_POST['pid']); 
}	
if (!empty($_POST['uid'])){
	$query->where('tas_usu_id', $_POST['uid']); 
}	

$query->orderBy('tas_name','asc');

$tasks = $query->get();


$totalData     = count($tasks);
$totalFiltered = $totalData;
$requestData   = $_REQUEST;
$data = array();

foreach ($tasks as $task) { 

	$nestedData   = array(); 
	
	$nestedData['DT_RowId'] = 'uid'.$task->tas_id;  // Add the row ID TR   
	$nestedData['DT_RowData'] = encrypt_decrypt('encrypt', $task->tas_id);    
	
	if (!empty($task->usu_foto)) { $foto =  $task->usu_foto; }else{ $foto = '/images/default.jpg';};
		
    $nestedData[] = '<img class="avatar avatar-sm" src="' . $foto . '" data-toggle="tooltip" data-original-title="' . $task->usu_pnombre . ' ' . $task->usu_papellido . '" data-container="body" title="' . $task->usu_pnombre . ' ' . $task->usu_papellido . '">';
	
	$nestedData[] = $task->tas_name;
	$nestedData[] = $task->pro_name;
	$nestedData[] = $task->usu_pnombre.' '.$task->usu_papellido;
	$nestedData[] = $task->tas_hours;
	
	$data[] = $nestedData;
	
};

$json_data = array(
            "draw"            => intval( $requestData ),
			"recordsTotal"    => intval( $totalData ),
            "recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
            "data"            => $data   
            );
 
echo json_encode($json_data);
