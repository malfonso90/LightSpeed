<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\Usuario;

use Illuminate\Http\Request;

require_once $_SERVER['DOCUMENT_ROOT'].'/Classes/function.php';	


class TasksController extends Controller
{
    public function projectTasks($id)
    {
        $pid = encrypt_decrypt('decrypt', $id);

        $project = Project::
        select('projects.pro_name')->
        where('pro_id', $pid)->
        first();
        
        return view("tasks",compact('pid','project'));        

    }    

    public function taskMember($id)
    {
        $uid = encrypt_decrypt('decrypt', $id);

        $usuario = Usuario::
        select('usu_pnombre')->
        where('usu_id', $uid)->
        first();
        
        return view("tasks",compact('uid','usuario'));        

    }      
    
    
}
