var arg1 = document.getElementById("objs").getAttribute("data-arg1");

$(document).ready(function() {
			
$('#usuarios_server-side').DataTable( {
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
		"url"  : "/api/Usuarios_server-side",
    	"type" : "POST",
		"data" : { id: arg1 }, 	
			
	},
	   
	  "columnDefs": [ 
		{ "targets": [4,5,6], className: "text-center" },	  
	  
		{
		"targets": 6,  
		"className": 'actions',
		"render": function ( data, type, row, meta ) {  
		  var id  = row['DT_RowId'].replace("uid", "");   
		  var ids = row['DT_RowData'];  
		  var str = '<a href="/projects/'+ids+'" title="Projects" class="btn btn-sm btn-icon btn-pure btn-default on-default edit-row" data-toggle="tooltip" data-original-title="Projects"><i class="icon fa-line-chart" aria-hidden="true"></i></a>' +
		  			'<a href="/tasksMember/'+ids+'" id="'+ids+'" title="Tasks" class="btn btn-sm btn-icon btn-pure btn-default on-default remove-row delete" data-toggle="tooltip" data-original-title="Tasks"><i class="icon fa-tasks" aria-hidden="true"></i></a>';
		  return str;
		}
	  } ],
		  
	  
});	

});	

