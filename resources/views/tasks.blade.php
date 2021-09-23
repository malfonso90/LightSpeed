@extends('app')

@section('content')

<!-- Page -->
<div class="page">      
<div class="page-content">
   <div class="page-header">
      <?php
      $title = 'Tasks';
      if (!empty($project)) { $title = $project->pro_name; } 
      if (!empty($usuario)) { $title = $usuario->usu_pnombre. "'s Task List "; } 
      ?>
      <h1 class="page-title">{{$title}}</h1>
      <ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
         <li class="breadcrumb-item active">Tasks</li>
      </ol>
   </div>
   <div class="page-content container-fluid">
	   
	   <!-- Panel Table Individual column searching -->
        <div class="panel">
       
          <div class="panel-body table-responsive">
            <table class="table table-hover dataTable table-striped w-full" id="usuarios_server-side">
              <thead>
                <tr>
                  <th></th>
                  <th>NAME</th>
                  <th>PROJECT</th>
                  <th>ASSIGNED TO</th>
                  <th>HOURS</th>
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
@if (!empty($pid)) data-arg2="{{$pid}}"  @endif 
@if (!empty($uid)) data-arg3="{{$uid}}"  @endif 
src="/js/tasks.js"></script>

@endsection