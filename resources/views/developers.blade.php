@extends('app')

@section('content')

<!-- Page -->
<div class="page">      
<div class="page-content">
   <div class="page-header">
      <h1 class="page-title">Developers</h1>
      <ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
         <li class="breadcrumb-item active">Developers</li>
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
                  <th>LASTNAME</th>
                  <th>EMAIL</th>
                  <th>PROJECTS</th>
                  <th>TASKS</th>
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

<script id="objs" data-arg1="{{session('con_company')}}" src="/js/usuarios.js"></script>

@endsection