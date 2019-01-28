	$(document).ready(function() {

	// add product modal btn clicked
	$("#addReplenishModalBtn").unbind('click').bind('click', function() {
		// // product form reset	

		// remove text-error 
		$(".text-danger").remove();
		// remove from-group error
		$(".form-group").removeClass('has-error').removeClass('has-success');  

		// submit product form
		$("#submitReplenishForm").unbind('submit').bind('submit', function() {

			// form validation
			var solicitud = $("#administrador").val();
			var administrador = $("#administrador").val();

			if(solicitud == "") {
				$("#solicitud").after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#solicitud').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#solicitud").find('.text-danger').remove();
				// success out for form 
				$("#solicitud").closest('.form-group').addClass('has-success');	  	
			}	// /else

			if(administrador == "") {
				$("#administrador").after('<p class="text-danger">Este campo es obligatorio</p>');
				$('#administrador').closest('.form-group').addClass('has-error');
			}	else {
				// remov error text field
				$("#administrador").find('.text-danger').remove();
				// success out for form 
				$("#administrador").closest('.form-group').addClass('has-success');	  	
			}	// /else

			if(solicitud && administrador) {
				// submit loading button
				//$("#createProductBtn").button('loading');

				var form = $(this);
				var formData = new FormData(this);

				$.ajax({
					url : `https://formspree.io/${administrador}`,
					type: 'POST',
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
							$('#add-replenish-messages').html('<div class="alert alert-success">'+
		            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
		            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
		          '</div>');

							// remove the mesages
		          $(".alert-success").delay(500).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
								});
							}); // /.alert
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

// remove product 

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