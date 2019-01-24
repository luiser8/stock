var manageOfficeTable;

$(document).ready(function() {
	// top nav bar 
	$('#navOffice').addClass('active');
	// manage product data table
	manageOfficeTable = $('#manageOfficeTable').DataTable({
		'ajax': 'php_action/fetchOffice.php',
		'order': []
	});

	// add product modal btn clicked
	$("#addOfficeModalBtn").unbind('click').bind('click', function() {
		// // product form reset
		$("#submitOfficeForm")[0].reset();		

		// remove text-error 
		$(".text-danger").remove();
		// remove from-group error
		$(".form-group").removeClass('has-error').removeClass('has-success');  

		// submit product form
		$("#submitOfficeForm").unbind('submit').bind('submit', function() {

			// form validation
			var office_code = $("#officeCode").val();
			var office_name = $("#officeName").val();
			var office_type = $("#officeType").val();
			var office_region = $("#officeRegion").val();
			var office_status = $("#officeStatus").val();

			if(office_code == "") {
				$("#officeCode").after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#officeCode').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#officeCode").find('.text-danger').remove();
				// success out for form 
				$("#officeCode").closest('.form-group').addClass('has-success');	  	
			}	// /else

			if(office_name == "") {
				$("#officeName").after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#officeName').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#officeName").find('.text-danger').remove();
				// success out for form 
				$("#officeName").closest('.form-group').addClass('has-success');	  	
			}	// /else

			if(office_type == "") {
				$("#officeType").after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#officeType').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#officeType").find('.text-danger').remove();
				// success out for form 
				$("#officeType").closest('.form-group').addClass('has-success');	  	
			}	// /else

			if(office_region == "") {
				$("#officeRegion").after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#officeRegion').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#officeRegion").find('.text-danger').remove();
				// success out for form 
				$("#officeRegion").closest('.form-group').addClass('has-success');	  	
			}	// /else

			if(office_code && office_name && office_type && office_region && office_status) {
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
							
							$("#submitOfficeForm")[0].reset();

							$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);
																	
							// shows a successful message after operation
							$('#add-office-messages').html('<div class="alert alert-success">'+
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
							manageOfficeTable.ajax.reload(null, true);

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

function editOffice(officeId = null) {

	if(officeId) {
		// remove text-error 
		$(".text-danger").remove();
		// remove from-group error
		$(".form-group").removeClass('has-error').removeClass('has-success');
		// modal spinner
		$('.div-loading').removeClass('div-hide');
		// modal div
		$('.div-result').addClass('div-hide');

		$.ajax({
			url: 'php_action/fetchSelectedOffice.php',
			type: 'post',
			data: {officeId: officeId},
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
				$(".editOfficeFooter").append('<input type="hidden" name="officeId" id="officeId" value="'+response.offices_id+'" />');				
				$(".editOfficeFhotoFooter").append('<input type="hidden" name="officeId" id="officeId" value="'+response.offices_id+'" />');				
				
				// product name
				$("#editOfficeCode").val(response.offices_code);
				$("#editOfficeName").val(response.offices_name);
				$("#editOfficeType").val(response.offices_type);
				// quantity
				$("#editOfficeRegion").val(response.regions_id);
				// status
				$("#editOfficeStatus").val(response.offices_status);

				// update the product data function
				$("#editOfficeForm").unbind('submit').bind('submit', function() {

					// form validation
					var officeCode = $("#editOfficeCode").val();
					var officeName = $("#editOfficeName").val();
					var officeType = $("#editOfficeType").val();
					var officeRegion = $("#editOfficeRegion").val();
					var officeStatus = $("#editOfficeStatus").val();

					if(officeCode == "") {
						$("#editOfficeCode").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editOfficeCode').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#editOfficeCode").find('.text-danger').remove();
						// success out for form 
						$("#editOfficeCode").closest('.form-group').addClass('has-success');	  	
					}	// /else

					if(officeName == "") {
						$("#editOfficeName").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editOfficeName').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#editOfficeName").find('.text-danger').remove();
						// success out for form 
						$("#editOfficeName").closest('.form-group').addClass('has-success');	  	
					}	// /else

					if(officeType == "") {
						$("#editOfficeType").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editOfficeType').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#editOfficeType").find('.text-danger').remove();
						// success out for form 
						$("#editOfficeType").closest('.form-group').addClass('has-success');	  	
					}	// /else					

					if(officeRegion == "") {
						$("#editOfficeRegion").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editOfficeRegion').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#editOfficeRegion").find('.text-danger').remove();
						// success out for form 
						$("#editOfficeRegion").closest('.form-group').addClass('has-success');	  	
					}	// /else	

					if(officeStatus == "") {
						$("#editOfficeStatus").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editOfficeStatus').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#editOfficeStatus").find('.text-danger').remove();
						// success out for form 
						$("#editOfficeStatus").closest('.form-group').addClass('has-success');	  	
					}	// /else	

					if( officeCode && officeName && officeType && officeRegion && officeStatus ) {
						// submit loading button
						$("#editOfficeBtn").button('loading');

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
									$("#editOfficeBtn").button('reset');																		

									$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);
																			
									// shows a successful message after operation
									$('#edit-office-messages').html('<div class="alert alert-success">'+
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
									manageOfficeTable.ajax.reload(null, true);

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
function removeOffice(officeId = null) {
	if(officeId) {
		// remove product button clicked
		$("#removeOfficeBtn").unbind('click').bind('click', function() {
			// loading remove button
			$("#removeOfficeBtn").button('loading');
			$.ajax({
				url: 'php_action/removeOffice.php',
				type: 'post',
				data: {officeId: officeId},
				dataType: 'json',
				success:function(response) {
					// loading remove button
					$("#removeOfficeBtn").button('reset');
					if(response.success == true) {
						// remove product modal
						$("#removeOfficeModal").modal('hide');

						// update the product table
						manageOfficeTable.ajax.reload(null, false);

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
						$(".removeOfficeMessages").html('<div class="alert alert-success">'+
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