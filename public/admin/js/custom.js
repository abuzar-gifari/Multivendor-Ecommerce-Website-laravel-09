$(document).ready(function(){

	/* CALL DATA TABLE CLASS */

	$('#sections').DataTable();

	$(".nav-item").removeClass("active");
	$(".nav-link").removeClass("active");


	/* CHECK ADMIN PASSWORD IS CORRECT OR NOT */

	$("#current_password").keyup(function(){
		var current_password = $("#current_password").val();
		/*alert(current_password);*/
		$.ajax({
			headers: {
        		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    		},
			type:'post',
			url:'/admin/check-admin-password',
			data:{current_password:current_password},
			success:function(resp){
				if(resp=="false"){
					$("#check_password").html("<font color='red'>Current Password is Incorrect!</font>");
				}else if(resp=="true"){
					$("#check_password").html("<font color='green'>Current Password is Correct!</font>");
				}
			},error:function(){
				alert('Error');
			}
		});
	})


	/* UPDATE THE ADMIN STATUS */
	
	$(document).on("click",".updateAdminStatus",function(e){
		e.preventDefault();
		
		var status=$(this).children("i").attr('status');
		var admin_id=$(this).attr('admin_id');
		$.ajax({
			headers: {
        		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    		},
			type:"post",
			url:"/admin/update-admin-status",
			data:{status:status,admin_id:admin_id},
			success:function(resp){
				// alert(resp);
				if (res["status"]==0) {
					$("#admin-"+admin_id).html("<i style='font-size:25px;' class='mdi mdi-bookmark-outline' status='Inactive'></i>");
				}
			},error:function(){
				if (res["status"]==1) {
					$("#admin-"+admin_id).html("<i style='font-size:25px;' class='mdi mdi-bookmark-check' status='Active'></i>");
				}
			}
		})
	})
	

	/* UPDATE THE SECTION STATUS */

	$(document).on("click",".updateSectionStatus",function(e){
		e.preventDefault();
		
		var status=$(this).children("i").attr('status');
		var section_id=$(this).attr('section_id');
		$.ajax({
			headers: {
        		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    		},
			type:"post",
			url:"/admin/update-section-status",
			data:{status:status,section_id:section_id},
			success:function(resp){
				// alert(resp);
				if (res["status"]==0) {
					$("#section-"+section_id).html("<i style='font-size:25px;' class='mdi mdi-bookmark-outline' status='Inactive'></i>");
				}
			},error:function(){
				if (res["status"]==1) {
					$("#section-"+section_id).html("<i style='font-size:25px;' class='mdi mdi-bookmark-check' status='Active'></i>");
				}
			}
		})
	})


 	// confirm delete section (simple js)
	/*
		$(".confirmDelete").click(function(){
			var title = $(this).attr("title");
			if (confirm("Are you sure to delete this "+title+"?")) {
				return true;
			}else{
				return false;
			}
		})
	*/


	/* CONFIRM DELETE SECTION (SWEETALERT JS) */
		
	$(".confirmDelete").click(function(){
		var module = $(this).attr('module');
		var moduleid = $(this).attr('moduleid');
		Swal.fire({
			title: 'Are you sure?',
			text: "You won't be able to revert this!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		  }).then((result) => {
			if (result.isConfirmed) {
			  Swal.fire(
				'Deleted!',
				'Your file has been deleted.',
				'success'
			  )
			  window.location ="/admin/delete-"+module+"/"+moduleid;
			}
		})
	})
});
