@extends('app')

@section('content')
        
<!-- Page -->
<div class="page">       
<div class="page-content">
   <div class="page-header">
    <?php
    $title = 'Projects';
    if (!empty($usuario)) { 
      $title = $usuario->usu_pnombre. "'s Project List "; 
      $foto = $usuario->usu_foto; 
    } 
    ?>
    <h1 class="page-title">
      @if (!empty($usuario))
      <img class="avatar avatar-sm" src="{{$foto}}" data-container="body" >
      @endif
      {{$title}}
    </h1>
     <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
         <li class="breadcrumb-item active">Projects</li>
      </ol>
   </div>
   <div class="page-content container-fluid">
	   
	   <!-- Panel Table Individual column searching -->
        <div class="panel">
       
          <div class="panel-body table-responsive">
            <table class="table table-hover dataTable table-striped w-full" id="Proyectos_server-side">
              <thead>
                <tr>
                  <th>PROJECT NAME</th>
                  <th>MEMBERS</th>
                  <th>TASKS</th>
                  <th>HOURS</th>
                  <th>OPTIONS</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
        <!-- End Panel Table Individual column searching -->
	   
   </div>
</div>
</div>
<!-- End Page -->

<script id="objs" 
data-arg1="{{session('con_company')}}" 
@if (!empty($uid)) data-arg2="{{$uid}}"  @endif 
src="/js/proyectos.js"></script>

@endsection
