var manageRegionTable;

$(document).ready(function() {
	// top nav bar 
	$('#navRegion').addClass('active');
	// manage product data table
	manageRegionTable = $('#manageRegionTable').DataTable({
		'ajax': 'php_action/fetchRegion.php',
		'order': []
	});

	// add product modal btn clicked
	$("#addRegionModalBtn").unbind('click').bind('click', function() {
		// // product form reset
		$("#submitRegionForm")[0].reset();		

		// remove text-error 
		$(".text-danger").remove();
		// remove from-group error
		$(".form-group").removeClass('has-error').removeClass('has-success');  

		// submit product form
		$("#submitRegionForm").unbind('submit').bind('submit', function() {

			// form validation
			var regions_name = $("#regions_name").val();
			var regions_zone = $("#regions_zone").val();
			var regions_status = $("#regions_status").val();

			if(regions_name == "") {
				$("#regions_name").after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#regions_name').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#regions_name").find('.text-danger').remove();
				// success out for form 
				$("#regions_name").closest('.form-group').addClass('has-success');	  	
			}	// /else

			if(regions_zone == "") {
				$("#regions_zone").after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#regions_zone').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#regions_zone").find('.text-danger').remove();
				// success out for form 
				$("#regions_zone").closest('.form-group').addClass('has-success');	  	
			}	// /else

			if(regions_name && regions_zone && regions_status) {
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
							
							$("#submitRegionForm")[0].reset();

							$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);
																	
							// shows a successful message after operation
							$('#add-region-messages').html('<div class="alert alert-success">'+
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
							manageRegionTable.ajax.reload(null, true);

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

function editRegion(regionId = null) {

	if(regionId) {
		
		// remove text-error 
		$(".text-danger").remove();
		// remove from-group error
		$(".form-group").removeClass('has-error').removeClass('has-success');
		// modal spinner
		$('.div-loading').removeClass('div-hide');
		// modal div
		$('.div-result').addClass('div-hide');

		$.ajax({
			url: 'php_action/fetchSelectedRegion.php',
			type: 'post',
			data: {regionId: regionId},
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
				$(".editRegionFooter").append('<input type="hidden" name="regionId" id="regionId" value="'+response.regions_id+'" />');				
				$(".editRegionPhotoFooter").append('<input type="hidden" name="regionId" id="regionId" value="'+response.regions_id+'" />');				
				
				// product name
				$("#editRegionName").val(response.regions_name);
				// quantity
				$("#editRegionZone").val(response.regions_zone);
				// status
				$("#editRegionsStatus").val(response.regions_status);

				// update the product data function
				$("#editRegionForm").unbind('submit').bind('submit', function() {

					// form validation
					var regionName = $("#editRegionName").val();
					var regionsZone = $("#editRegionZone").val();
					var regionStatus = $("#editRegionStatus").val();
								

					if(regionName == "") {
						$("#editRegionName").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editRegionName').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#editRegionName").find('.text-danger').remove();
						// success out for form 
						$("#editRegionName").closest('.form-group').addClass('has-success');	  	
					}	// /else

					if(regionZone == "") {
						$("#editRegionZone").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editRegionZone').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#editRegionZone").find('.text-danger').remove();
						// success out for form 
						$("#editRegionZone").closest('.form-group').addClass('has-success');	  	
					}	// /else

					if(regionStatus == "") {
						$("#editRegionStatus").after('<p class="text-danger">Este campo es obligatorio</p>');
						$('#editRegionStatus').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#editRegionStatus").find('.text-danger').remove();
						// success out for form 
						$("#editRegionStatus").closest('.form-group').addClass('has-success');	  	
					}	// /else					

					if(regionName && regionZone && regionStatus) {
						// submit loading button
						$("#editRegionBtn").button('loading');

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
									$("#editRegionBtn").button('reset');																		

									$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);
																			
									// shows a successful message after operation
									$('#edit-region-messages').html('<div class="alert alert-success">'+
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
									manageRegionTable.ajax.reload(null, true);

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
function removeRegion(regionId = null) {
	if(regionId) {
		// remove product button clicked
		$("#removeRegionBtn").unbind('click').bind('click', function() {
			// loading remove button
			$("#removeRegionBtn").button('loading');
			$.ajax({
				url: 'php_action/removeRegion.php',
				type: 'post',
				data: {regionId: regionId},
				dataType: 'json',
				success:function(response) {
					// loading remove button
					$("#removeRegionBtn").button('reset');
					if(response.success == true) {
						// remove product modal
						$("#removeRegionModal").modal('hide');

						// update the product table
						manageRegionTable.ajax.reload(null, false);

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
						$(".removeRegionMessages").html('<div class="alert alert-success">'+
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