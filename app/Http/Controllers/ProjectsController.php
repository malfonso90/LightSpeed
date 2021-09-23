<?php

namespace App\Http\Controllers;
use App\Models\Usuario;

use Illuminate\Http\Request;

require_once $_SERVER['DOCUMENT_ROOT'].'/Classes/function.php';	


class ProjectsController extends Controller
{
    public function memberProjects($id)
    {
        $uid = encrypt_decrypt('decrypt', $id);

        $usuario = Usuario::
        select('usu_pnombre','usu_foto')->
        where('usu_id', $uid)->
        first();
        
        return view("projects",compact('uid','usuario'));        

    }      
}
