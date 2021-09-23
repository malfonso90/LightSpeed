var arg1 = document.getElementById("objs").getAttribute("data-arg1");
var arg2 = document.getElementById("objs").getAttribute("data-arg2");

$(document).ready(function() {

	$('#Proyectos_server-side').DataTable( { 
	"fixedHeader": true,
	"pageLength" : 20,
	"lengthMenu" : [[20, 50, 100, -1], [20, 50, 100, "All"]],
	"paging"     : true,
	"info"       : true,
	"responsive" : true,
	"processing" : true,
	"stateSave"  : true,
	"order"      : [[ 0, "asc" ]],
	"ajax"       : {
		"headers": {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
		"url"    : "/api/Proyectos_server-side",
    	"type"   : "POST",
		"data"   : { id: arg1, uid: arg2 },	
	},
	   
	  "columnDefs": [ 
	  { "targets": [2,3,4], className: "text-center" },	  
	  { "width": "40%", "targets": 0 },

	  {		  
		"targets": 4,  
		"className": 'actions',
		"render": function ( data, type, row, meta ) {  
		  var id  = row['DT_RowId'].replace("uid", "");  
		  var ids = row['DT_RowData'];  
		  var str = 
		  '<a href="/tasks/'+ids+'" title="Tasks" class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row" data-toggle="tooltip" data-original-title="Tasks"><i class="icon fa-tasks" aria-hidden="true"></i></a>';
		  //'<a href="#'+ids+'" title="Developers" class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row" data-toggle="tooltip" data-original-title="Developers"><i class="icon fa-users" aria-hidden="true"></i></a>'; 
		  return str;
		}
	  } ],
	  
	 });
} );
