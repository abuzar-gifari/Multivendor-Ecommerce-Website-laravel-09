$(document).ready(function(){

	/* CALL DATA TABLE CLASS */

	$('#sections').DataTable();
	$('#categories').DataTable();
	$('#brands').DataTable();
	$('#products').DataTable();

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

	/*
	@if ($section['status']==1)
		<a href="javascript:void(0)" class="updateSectionStatus" id="{{ $section['id'] }}" section_id="{{ $section['id'] }}">
			<i style="font-size:25px;" class="mdi mdi-bookmark-check" status="Active"></i>
		</a>
	@else
		<a href="javascript:void(0)" class="updateSectionStatus" id="{{ $section['id'] }}" section_id="{{ $section['id'] }}">
			<i style="font-size:25px;" class="mdi mdi-bookmark-outline" status="Inactive"></i>
		</a>
	@endif
	*/

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


	/* UPDATE THE BRAND STATUS */

	$(document).on("click",".updateBrandStatus",function(e){
		e.preventDefault();
		
		var status=$(this).children("i").attr('status');
		var brand_id=$(this).attr('brand_id');
		$.ajax({
			headers: {
        		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    		},
			type:"post",
			url:"/admin/update-brand-status",
			data:{status:status,brand_id:brand_id},
			success:function(resp){
				// alert(resp);
				if (res["status"]==0) {
					$("#brand-"+brand_id).html("<i style='font-size:25px;' class='mdi mdi-bookmark-outline' status='Inactive'></i>");
				}
			},error:function(){
				if (res["status"]==1) {
					$("#brand-"+brand_id).html("<i style='font-size:25px;' class='mdi mdi-bookmark-check' status='Active'></i>");
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


	/* UPDATE THE CATEGORY STATUS */

	$(document).on("click",".updateCategoryStatus",function(e){
		e.preventDefault();
		
		var status=$(this).children("i").attr('status');
		var category_id=$(this).attr('category_id');
		$.ajax({
			headers: {
        		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    		},
			type:"post",
			url:"/admin/update-category-status",
			data:{status:status,category_id:category_id},
			success:function(resp){
				if (res["status"]==0) {
					$("#category-"+category_id).html("<i style='font-size:25px;' class='mdi mdi-bookmark-outline' status='Inactive'></i>");
				}
			},error:function(){
				if (res["status"]==1) {
					$("#category-"+category_id).html("<i style='font-size:25px;' class='mdi mdi-bookmark-check' status='Active'></i>");
				}
			}
		})
	})

	
	/* APPEND CATEGORIES LEVEL */

	$("#section_id").change(function(){
		var section_id=$(this).val();
		$.ajax({
			headers: {
        		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    		},
			type:"get",
			url:"/admin/append-categories-level",
			data:{section_id:section_id},
			success:function(resp){
				$("#appendCategoriesLevel").html(resp);
			},error:function(){
				// alert("error");
			}
		})
	})


	/* UPDATE THE PRODUCT STATUS */

	$(document).on("click",".updateProductStatus",function(e){
		e.preventDefault();
		
		var status=$(this).children("i").attr('status');
		var product_id=$(this).attr('product_id');
		$.ajax({
			headers: {
        		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    		},
			type:"post",
			url:"/admin/update-product-status",
			data:{status:status,product_id:product_id},
			success:function(resp){
				// alert(resp);
				if (res["status"]==0) {
					$("#product-"+product_id).html("<i style='font-size:25px;' class='mdi mdi-bookmark-outline' status='Inactive'></i>");
				}
			},error:function(){
				if (res["status"]==1) {
					$("#product-"+product_id).html("<i style='font-size:25px;' class='mdi mdi-bookmark-check' status='Active'></i>");
				}
			}
		})
	})

	// Products Attributes Add/Remove
	var maxField = 10; //Input fields increment limitation
    var addButton = $(".add_button"); //Add button selector
    var wrapper = $(".field_wrapper"); //Input field wrapper
    var fieldHTML =
        '<div><input type="text" name="size[]" placeholder="Size" style="width: 120px;" required=""/>&nbsp;<input type="text" name="sku[]" placeholder="Sku" style="width: 120px;" required=""/>&nbsp;<input type="text" name="price[]" placeholder="Price" style="width: 120px;" required=""/>&nbsp;<input type="text" name="stock[]" placeholder="Stock" style="width: 120px;" required=""/>&nbsp;<a href="javascript:void(0);" class="remove_button">Remove</a></div>'; //New input field html
    var x = 1; //Initial field counter is 1

    //Once add button is clicked
    $(addButton).click(function () {
        //Check maximum number of input fields
        if (x < maxField) {
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });

    //Once remove button is clicked
    $(wrapper).on("click", ".remove_button", function (e) {
        e.preventDefault();
        $(this).parent("div").remove(); //Remove field html
        x--; //Decrement field counter
    });
});
