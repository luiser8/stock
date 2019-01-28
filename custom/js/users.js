var manageUserTable;

$(document).ready(function() {
	// top nav bar 
	$('#navOffice').addClass('active');
	// manage product data table
	manageUserTable = $('#manageUserTable').DataTable({
		'ajax': 'php_action/fetchUser.php',
		'order': []
	});

	// add product modal btn clicked
	$("#addUserModalBtn").unbind('click').bind('click', function() {
		// // product form reset
		$("#submitUserForm")[0].reset();		

		// remove text-error 
		$(".text-danger").remove();
		// remove from-group error
		$(".form-group").removeClass('has-error').removeClass('has-success');  

		// submit product form
		$("#submitUserForm").unbind('submit').bind('submit', function() {

			// form validation
			var level_id = $("#level_id").val();
			var username = $("#username").val();
			var password = $("#password").val();
			var email = $("#email").val();

			if(level_id == "") {
				$("#level_id").after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#level_id').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#level_id").find('.text-danger').remove();
				// success out for form 
				$("#level_id").closest('.form-group').addClass('has-success');	  	
			}	// /else

			if(username == "") {
				$("#username").after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#username').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#username").find('.text-danger').remove();
				// success out for form 
				$("#username").closest('.form-group').addClass('has-success');	  	
			}	// /else

			if(password == "") {
				$("#password").after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#password').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#password").find('.text-danger').remove();
				// success out for form 
				$("#password").closest('.form-group').addClass('has-success');	  	
			}	// /else

			if(email == "") {
				$("#email").after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#email').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#email").find('.text-danger').remove();
				// success out for form 
				$("#email").closest('.form-group').addClass('has-success');	  	
			}	// /else

			if(level_id && username && password && email) {
				// submit loading button
				//$("#createProductBtn").button('loading');

				var form = $(this);
				var formData = new FormData(this);

				$.ajax({
					url : form.attr('action'),
					type: form.attr('method'),
					data: formData,
					dataType: 'json',
					cache: false,
					contentType: false,
					processData: false,
					success:function(response) {

						if(response.success == true) {
							// submit loading button
							//$("#createProductBtn").button('reset');
							
							$("#submitUserForm")[0].reset();

							$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);
																	
							// shows a successful message after operation
							$('#add-user-messages').html('<div class="alert alert-success">'+
		            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
		            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
		          '</div>');

							// remove the mesages
		          $(".alert-success").delay(500).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
								});
							}); // /.alert

		          // reload the manage student table
							manageUserTable.ajax.reload(null, true);

							// remove text-error 
							$(".text-danger").remove();
							// remove from-group error
							$(".form-group").removeClass('has-error').removeClass('has-success');

						} // /if response.success
						
					} // /success function
				}); // /ajax function
			}	 // /if validation is ok 					

			return false;
		}); // /submit product form

	}); // /add product modal btn clicked
	

	// remove product 	

}); // document.ready fucntion

function editUser(user_id = null) {

	if(user_id) {
		// remove text-error 
		$(".text-danger").remove();
		// remove from-group error
		$(".form-group").removeClass('has-error').removeClass('has-success');
		// modal spinner
		$('.div-loading').removeClass('div-hide');
		// modal div
		$('.div-result').addClass('div-hide');

		$.ajax({
			url: 'php_action/fetchSelectedUser.php',
			type: 'post',
			data: {user_id: user_id},
			dataType: 'json',
			success:function(response) {		
			// alert(response.product_image);
				// modal spinner
				$('.div-loading').addClass('div-hide');
				// modal div
				$('.div-result').removeClass('div-hide');				

				// $("#editProductImage").fileinput({
		  //     overwriteInitial: true,
			 //    maxFileSize: 2500,
			 //    showClose: false,
			 //    showCaption: false,
			 //    browseLabel: '',
			 //    removeLabel: '',
			 //    browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
			 //    removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
			 //    removeTitle: 'Cancel or reset changes',
			 //    elErrorContainer: '#kv-avatar-errors-1',
			 //    msgErrorClass: 'alert alert-block alert-danger',
			 //    defaultPreviewContent: '<img src="stock/'+response.product_image+'" alt="Profile Image" style="width:100%;">',
			 //    layoutTemplates: {main2: '{preview} {remove} {browse}'},								    
		  // 		allowedFileExtensions: ["jpg", "png", "gif", "JPG", "PNG", "GIF"]
				// });  

				// product id 
				$(".editUserFooter").append('<input type="hidden" name="user_id" id="user_id" value="'+response.user_id+'" />');				
							
				// product name
				$("#editUserName").val(response.username);
				$("#editPassword").val(response.password);
				$("#editUserEmail").val(response.email);
				// quantity
				$("#editLevel_id").val(response.level_id);

				// update the product data function
				$("#editUserForm").unbind('submit').bind('submit', function() {

					// form validation
					var level_id = $("#editLevel_id").val();
					var username = $("#editUserName").val();
					var password = $("#editPassword").val();
					var email = $("#editUserEmail").val();

					if(level_id == "") {
						$("#editLevel_id").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editLevel_id').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#editLevel_id").find('.text-danger').remove();
						// success out for form 
						$("#editLevel_id").closest('.form-group').addClass('has-success');	  	
					}	// /else

					if(username == "") {
						$("#editUserName").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editUserName').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#editUserName").find('.text-danger').remove();
						// success out for form 
						$("#editUserName").closest('.form-group').addClass('has-success');	  	
					}	// /else

					if(password == "") {
						$("#editPassword").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editPassword').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#editPassword").find('.text-danger').remove();
						// success out for form 
						$("#editPassword").closest('.form-group').addClass('has-success');	  	
					}	// /else					

					if(email == "") {
						$("#editUserEmail").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editUserEmail').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#editUserEmail").find('.text-danger').remove();
						// success out for form 
						$("#editUserEmail").closest('.form-group').addClass('has-success');	  	
					}	// /else	

					if( level_id && username && password && email) {
						// submit loading button
						$("#editUserBtn").button('loading');

						var form = $(this);
						var formData = new FormData(this);

						$.ajax({
							url : form.attr('action'),
							type: form.attr('method'),
							data: formData,
							dataType: 'json',
							cache: false,
							contentType: false,
							processData: false,
							success:function(response) {
								console.log(response);
								if(response.success == true) {
									// submit loading button
									$("#editUserBtn").button('reset');																		

									$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);
																			
									// shows a successful message after operation
									$('#edit-user-messages').html('<div class="alert alert-success">'+
				            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
				            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
				          '</div>');

									// remove the mesages
				          $(".alert-success").delay(500).show(10, function() {
										$(this).delay(3000).hide(10, function() {
											$(this).remove();
										});
									}); // /.alert

				          // reload the manage student table
									manageUserTable.ajax.reload(null, true);

									// remove text-error 
									$(".text-danger").remove();
									// remove from-group error
									$(".form-group").removeClass('has-error').removeClass('has-success');

								} // /if response.success
								
							} // /success function
						}); // /ajax function
					}	 // /if validation is ok 					

					return false;
				}); // update the product data function

			} // /success function
		}); // /ajax to fetch product image

				
	} else {
		alert('error please refresh the page');
	}
} // /edit product function

// remove product 
function removeUser(user_id = null) {
	if(user_id) {
		// remove product button clicked
		$("#removeUserBtn").unbind('click').bind('click', function() {
			// loading remove button
			$("#removeUserBtn").button('loading');
			$.ajax({
				url: 'php_action/removeUser.php',
				type: 'post',
				data: {user_id: user_id},
				dataType: 'json',
				success:function(response) {
					// loading remove button
					$("#removeUserBtn").button('reset');
					if(response.success == true) {
						// remove product modal
						$("#removeUserModal").modal('hide');

						// update the product table
						manageUserTable.ajax.reload(null, false);

						// remove success messages
						$(".remove-messages").html('<div class="alert alert-success">'+
		            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
		            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
		          '</div>');

						// remove the mesages
	          $(".alert-success").delay(500).show(10, function() {
							$(this).delay(3000).hide(10, function() {
								$(this).remove();
							});
						}); // /.alert
					} else {

						// remove success messages
						$(".removeUserMessages").html('<div class="alert alert-success">'+
		            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
		            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
		          '</div>');

						// remove the mesages
	          $(".alert-success").delay(500).show(10, function() {
							$(this).delay(3000).hide(10, function() {
								$(this).remove();
							});
						}); // /.alert

					} // /error
				} // /success function
			}); // /ajax fucntion to remove the product
			return false;
		}); // /remove product btn clicked
	} // /if productid
} // /remove product function

function clearForm(oForm) {
	// var frm_elements = oForm.elements;									
	// console.log(frm_elements);
	// 	for(i=0;i<frm_elements.length;i++) {
	// 		field_type = frm_elements[i].type.toLowerCase();									
	// 		switch (field_type) {
	// 	    case "text":
	// 	    case "password":
	// 	    case "textarea":
	// 	    case "hidden":
	// 	    case "select-one":	    
	// 	      frm_elements[i].value = "";
	// 	      break;
	// 	    case "radio":
	// 	    case "checkbox":	    
	// 	      if (frm_elements[i].checked)
	// 	      {
	// 	          frm_elements[i].checked = false;
	// 	      }
	// 	      break;
	// 	    case "file": 
	// 	    	if(frm_elements[i].options) {
	// 	    		frm_elements[i].options= false;
	// 	    	}
	// 	    default:
	// 	        break;
	//     } // /switch
	// 	} // for
}