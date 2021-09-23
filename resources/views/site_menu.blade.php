<?php
 use App\Models\Project;
 use App\Models\Usuario;
?>

<div class="site-menubar">
    <div class="site-menubar-body">
      <div>
        <div>
          <ul class="site-menu" data-plugin="menu">
            <li class="site-menu-category">User Portal</li>  
              
              <li class="site-menu-item">
                  <a class="animsition-link" href="/dashboard">
                      <i class="site-menu-icon icon fa-home" aria-hidden="true"></i>
                      <span class="site-menu-title">Home</span>
                  </a>
              </li>
                          
              <li class="site-menu-item">
                <a class="animsition-link" href="/projects">
                    <i class="site-menu-icon icon fa-line-chart" aria-hidden="true"></i>
                    <span class="site-menu-title">Projects</span>
                </a>
            </li>

            <?php
            $usuarios = Usuario::orderBy('usu_pnombre','asc')->get();
            ?>

            <li class="site-menu-item has-sub">
              <a href="javascript:void(0)">
                  <i class="site-menu-icon icon fa-line-chart" aria-hidden="true"></i>
                  <span class="site-menu-title">Projects by Members</span>
                  <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub" style="">
                                  
              @foreach ($usuarios as $usuario) 
                
                <li class="site-menu-item">
                <a class="animsition-link" href="/projects/{{encrypt_decrypt('encrypt', $usuario->usu_id)}}">
                    <span class="site-menu-title">
                      <?php
                      if (!empty($usuario->usu_foto)) { $foto =  $usuario->usu_foto; }else{ $foto = '/images/default.jpg';};
                      ?>
                      <img class="avatar avatar-sm" src="{{$foto}}" data-container="body" >
                      
                                        
                      {{$usuario->usu_pnombre}}
                    </span>
                  </a>
                </li>

              @endforeach
              
              </ul>
            </li>

            <li class="site-menu-item">
              <a class="animsition-link" href="/tasks">
                  <i class="site-menu-icon icon fa-tasks" aria-hidden="true"></i>
                  <span class="site-menu-title">Tasks</span>
              </a>
            </li>

            <?php
            $proyectos = Project::orderBy('pro_name','asc')->get();
            ?>

            <li class="site-menu-item has-sub">
              <a href="javascript:void(0)">
                  <i class="site-menu-icon icon fa-tasks" aria-hidden="true"></i>
                  <span class="site-menu-title">Tasks by Projects</span>
                  <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub" style="">
                                  
              @foreach ($proyectos as $proyecto) 
                
                <li class="site-menu-item">
                <a class="animsition-link" href="/tasks/{{encrypt_decrypt('encrypt', $proyecto->pro_id)}}">
                    <span class="site-menu-title">{{$proyecto->pro_name}}</span>
                  </a>
                </li>

              @endforeach
              
              </ul>
            </li>

            <li class="site-menu-item has-sub">
              <a href="javascript:void(0)">
                  <i class="site-menu-icon icon fa-tasks" aria-hidden="true"></i>
                  <span class="site-menu-title">Tasks by Members</span>
                  <span class="site-menu-arrow"></span>
              </a>
              <ul class="site-menu-sub" style="">
                                  
              @foreach ($usuarios as $usuario) 
                
                <li class="site-menu-item">
                <a class="animsition-link" href="/tasksMember/{{encrypt_decrypt('encrypt', $usuario->usu_id)}}">
                    <span class="site-menu-title">
                      <?php
                      if (!empty($usuario->usu_foto)) { $foto =  $usuario->usu_foto; }else{ $foto = '/images/default.jpg';};
                      ?>
                      <img class="avatar avatar-sm" src="{{$foto}}" data-container="body" >
                      
                                        
                      {{$usuario->usu_pnombre}}
                    </span>
                  </a>
                </li>

              @endforeach
              
              </ul>
            </li>

            <li class="site-menu-item">
                  <a class="animsition-link" href="/developers">
                      <i class="site-menu-icon icon fa-users" aria-hidden="true"></i>
                      <span class="site-menu-title">Developers</span>
                  </a>
            </li>
         
          </ul>
         </div>
     </div>
  </div>
  
    <div class="site-menubar-footer">
      <a href="" class="fold-show" data-placement="top" data-toggle="tooltip"
        data-original-title="Profile">
        <span class="icon md-account" aria-hidden="true"></span>
      </a>
      <a href="/dashboard" data-placement="top" data-toggle="tooltip" data-original-title="Home">
        <span class="icon fa-home" aria-hidden="true"></span>
      </a>
      <a href="" data-placement="top" data-toggle="tooltip" data-original-title="Exit">
        <span class="icon md-power" aria-hidden="true"></span>
      </a>
    </div>
    
  </div>
  
