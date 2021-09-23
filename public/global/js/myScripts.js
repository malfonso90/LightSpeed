$('#myDataTable').DataTable( {
"pageLength": 20,
"lengthMenu": [[20, 50, 100, 100000], [20, 50, 100, "TODOS"]],
"paging"    : true,
"info"      : true,
"responsive": true,
"processing": true,
"stateSave" : true,
"order"     : [[ 0, "asc" ]],
"language"  : {
	  "search":  "Buscar:",
	  "info":    "Mostrando _START_ al _END_ de _TOTAL_ registros",
	  "lengthMenu":     "Mostrando _MENU_ registros",       
	  "paginate": {
				  "first":      "Primera",
				  "last":       "Ultima",
				  "next":       "Proxima",
				  "previous":   "Anterior"
				 }       
   },
 });

		
function checkAvailability(inptname) {
	jQuery.ajax({
		url: "/check_username.php",
		data:'username='+$("#"+inptname).val(),
		type: "POST",
		success:function(data){
		  if(data == '1'){
			$("#user-availability-status").css("display", "block");
			$("#user-availability-status").html("<span style='color:#f44336;'>Correo No Disponible</span>");
			$( "#save" ).prop( "disabled", true );
		  } else {
			$("#user-availability-status").css("display", "block");
			$("#user-availability-status").html("<span>Correo</span>");
			$("#save").prop( "disabled", false );
		  }	
		},
		error:function (){}
	});
}

function editcheckAvailability(inptname, email) {
	var correo_db = email;	
	var correo_pg = $("#"+inptname).val();
	
	if (correo_db != correo_pg) {
		jQuery.ajax({
		url: "/check_username.php",
		data:'username='+$("#"+inptname).val(),
		type: "POST",
		success:function(data){
		  if(data == '1'){
			$("#user-availability-status").css("display", "block");
			$("#user-availability-status").html("<span style='color:#f44336;'>Correo No Disponible</span>");
			$( "#save" ).prop( "disabled", true );
		  } else {
			$("#user-availability-status").css("display", "block");
			$("#user-availability-status").html("<span>Correo</span>");
			$("#save").prop( "disabled", false );
		  }	
		},
		error:function (){}
		});
	}	
}

function onlyNumbers(evt) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}

