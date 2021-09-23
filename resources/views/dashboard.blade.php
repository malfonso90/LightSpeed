@extends('app')

@section('content')

<?php

use App\Models\Usuario;
use App\Models\Company;
use App\Models\Project;
use App\Models\Task;

$usuario = Usuario::
    where('usu_id', session('con_userid'))->
    first();
	
if ($usuario) {
	$usu_telefono = $usuario->usu_telefono;
	$usu_correo   = $usuario->usu_correo;
}

$consumidor = Company:: 
    where('con_id', session('con_company'))->
    first();

if ($consumidor) { 
    $con_nombre    = $consumidor->con_nombre;
		$con_direccion = $consumidor->con_direccion;
		$con_provincia = str_replace("PROVINCIA","",$consumidor->Provincia);
		$con_canton    = str_replace("CANTON","",$consumidor->Canton);
		$con_distrito  = $consumidor->Distrito;
		$con_telefono1 = $consumidor->con_telefono1;
		$con_correo1   = $consumidor->con_correo1;
		$con_telefono2 = $consumidor->con_telefono2;
		$con_correo2   = $consumidor->con_correo2;
		$con_estado    = $consumidor->con_estado;
		$con_website   = $consumidor->con_website;
		$con_facebook  = $consumidor->con_facebook;
		$con_categoria = $consumidor->con_cat_nombre;
		$con_vence     = date("m/d/Y",strtotime($consumidor->con_vencimiento)); 
		$con_logo      = $consumidor->con_logo;
  
    session(['con_nombre' => $con_nombre]);
    session(['con_logo'   => $con_logo]);

}

$projects = Project::get()->count();
$users    = Usuario::get()->count();
$tasks    = Task::get()->count();
	
?>

<!-- Page -->
<div class="page">
<div class="page-content">    
   <div class="page-header">
      <h1 class="page-title">Welcome {{ session('con_username') }} </h1>
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="/dashboard">{{session('con_nombre')}}</a></li>
         <li class="breadcrumb-item active">User Portal</li>
      </ol>
      <div class="page-header-actions">
     	<h1 class="page-title">
     	 
    <?php 
		if (!empty(session('con_logo'))) { 
			echo '<img style="margin-bottom:10px;" class="bg-white img-bordered" src="'.session('con_logo').'" data-toggle="tooltip" data-original-title="'.session('con_nombre').'" data-container="body" title="'.session('con_nombre').'" />';
		}else{ 
			if (!empty(session('con_foto'))) { 
				echo '<img style="margin-bottom:-8px;" class="avatar avatar-100 bg-white img-bordered" src="'.session('con_foto').'" data-toggle="tooltip" data-original-title="'.session('con_username').'" data-container="body" title="'.session('con_username').'" />';
			}else { echo '<img style="margin-bottom:-8px;" class="avatar avatar-100 bg-white img-bordered" src="/images/default.jpg" data-toggle="tooltip" data-original-title="'.session('con_username').'" data-container="body" title="'.session('con_username').'" />'; } 
		}
		?>
     	
     	&nbsp;</h1>
      </div>
   </div>
   
        <div class="row" data-plugin="matchHeight" data-by-row="true">

          <div class="col-xl-3 col-md-6">
            <!-- Widget Linearea Two -->
            <div class="card card-shadow" id="widgetLineareaTwo">
              <div class="card-block p-20 pt-10">
                <div class="clearfix">
                  <div class="grey-800 float-left py-10">
                    <i class="icon fa-line-chart green-600 font-size-24 vertical-align-bottom mr-5"></i>Projects
                  </div>
                  <span class="float-right grey-700 font-size-30">{{$projects}}</span>
                </div>
                <div class="mb-20 grey-500">
                  <i class="icon md-long-arrow-up green-500 font-size-16"></i> Total of Projects 
                </div>
              </div>
            </div>
            <!-- End Widget Linearea Two -->
          </div>

          <div class="col-xl-3 col-md-6">
            <!-- Widget Linearea One-->
            <div class="card card-shadow" id="widgetLineareaOne">
              <div class="card-block p-20 pt-10">
                <div class="clearfix">
                  <div class="grey-800 float-left py-10">
                    <i class="icon fa-tasks blue-400 font-size-24 vertical-align-bottom mr-5"></i>Tasks
                  </div>
                <span class="float-right grey-700 font-size-30">{{$tasks}}</span>
                </div>
                <div class="mb-20 grey-500">
                  <i class="icon md-long-arrow-up green-500 font-size-16"></i> Number of Tasks
                </div>
                
              </div>
            </div>
            <!-- End Widget Linearea One -->
          </div>
                   
          <div class="col-xl-3 col-md-6">
            <!-- Widget Linearea Three -->
            <div class="card card-shadow" id="widgetLineareaThree">
              <div class="card-block p-20 pt-10">
                <div class="clearfix">
                  <div class="grey-800 float-left py-10">
                    <i class="icon fa-users red-500 font-size-24 vertical-align-bottom mr-5"></i>Users
                  </div>
                  <span class="float-right grey-700 font-size-30">{{$users}}</span>
                </div>
                <div class="mb-20 grey-500">
                  <i class="icon md-long-arrow-up red-500 font-size-16"></i> Total Users
                </div>
              </div>
            </div>
            <!-- End Widget Linearea Three -->
          </div>
          
          <div class="col-xl-3 col-md-6">
            <!-- Widget Linearea Four -->
            <div class="card card-shadow" id="widgetLineareaFour">
              <div class="card-block p-20 pt-10">
                <div class="clearfix">
                  <div class="grey-800 float-left py-10">
                    <i class="icon fa-file-text yellow-600 font-size-24 vertical-align-bottom mr-5"></i> Orders
                  </div>
                  <span class="float-right grey-700 font-size-30">1000</span>
                </div>
                <div class="mb-20 grey-500">
                  <i class="icon md-long-arrow-up green-500 font-size-16"></i> Orders 
                </div>
              </div>
            </div>
            <!-- End Widget Linearea Four --> 
          </div>   
        
        </div>
   	   
       <div class="row">
	      
         <div class="col-lg-6 masonry-item" >
		   <div class="panel">
			   <div class="panel-heading">
				  <h3 class="panel-title">
					 Company Information
					 <!--<span class="badge badge-pill badge-info">5</span>-->
				  </h3>
			   </div>
			   <div class="table-responsive">
				  <table class="table table-striped">
					  <tbody>
						<tr>
						   <td>Name: </td>
						   <td>{{$con_nombre}}</td>
						</tr>
						<tr>
						   <td>Address:</td>
						   <td>{{$con_direccion}}</td>
						</tr>
						@if(!empty($con_provincia))
						<tr>
						   <td>City:</td>
						   <td>{{$con_provincia}} </td>
            </tr>
            @endif
						@if(!empty($con_canton))
						<tr>
						   <td>State:</td>
						   <td>{{$con_canton}} </td>
            </tr>
            @endif
						@if(!empty($con_telefono1))
						<tr>
						   <td>Phone:</td>
						   <td>{{$con_telefono1}}</td>
            </tr>
            @endif
						@if(!empty($con_correo1))
						<tr>
						   <td>Email:</td>
						   <td>{{$con_correo1}}</td>
            </tr>
            @endif
					</tbody>
				  </table>
			   </div>
			</div>


         </div>
         
         <div class="col-lg-6 masonry-item" >
	         
            	  <!-- Right Column  -->           
         </div>
         
      
   </div>
</div>
</div>
<!-- End Page -->

@endsection