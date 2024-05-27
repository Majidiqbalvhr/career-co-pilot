$(document).ready(function(){
			
			$("#contact_email").bind('input', function () {
				var error_contact_email = '';
				var email = $('#contact_email').val();
				var column = "contact_email";
				var id = $("input[name=id]").val();
				var _token = $('input[name="_token"]').val();
				var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				
				if(email != "" && filter.test(email)){
					$.ajax({
						url:"/duplicacycheck/companyemailCheck",
						method:"POST",
						data:{email:email, id:id, column:column, _token:_token},
						success:function(result)
						{
							if(result != 'emailExists')
							{
								$('#error_contact_email').empty();
								$('#email').removeClass('has-error');
								$('#submit').attr('disabled', false);
							}
							else
							{
								$('#error_contact_email').html('<label class="text-danger">email exists in database!</label>');
								$('#email').addClass('has-error');
								$('#submit').attr('disabled', 'disabled');
							}
						}
				   })
				}else{
					$('#error_contact_email').empty();
				}
			});

			$("#company_email").bind('input', function () {
				var error_company_email = '';
				var email = $('#company_email').val();
				var column = "company_email";
				var id = $("input[name=id]").val();
				var _token = $('input[name="_token"]').val();
				var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				
				if(email != "" && filter.test(email)){
					$.ajax({
						url:"/duplicacycheck/companyemailCheck",
						method:"POST",
						data:{email:email, id:id, column:column, _token:_token},
						success:function(result)
						{
							if(result != 'emailExists')
							{
								$('#error_company_email').empty();
								$('#email').removeClass('has-error');
								$('#submit').attr('disabled', false);
							}
							else
							{
								$('#error_company_email').html('<label class="text-danger">email exists in database!</label>');
								$('#email').addClass('has-error');
								$('#submit').attr('disabled', 'disabled');
							}
						}
				   })
				}else{
					$('#error_company_email').empty();
				}
			});

			$("#first_name,#last_name,#email,#phone").bind('input', function () {
				var first_name = $('#first_name').val();
				var last_name = $('#last_name').val();
				var email = $('#email').val();
				var phone = $('#phone').val();
				var user_type = $('#user_type').val();
				var _token = $('input[name="_token"]').val();
				
				var i = 0;
				if(first_name != "") i++;if(last_name != "") i++;if(email != "") i++;if(phone != "") i++;
				
				if(i > 1){
					$.ajax({
						url:"/duplicacycheck/usersuggestions",
						method:"POST",
						data:{first_name:first_name,last_name:last_name,email:email,phone:phone,user_type:user_type, _token:_token},
						success:function(result)
						{
							$('#suggestedData').empty();
							if(result != ''){
								//$('#formbox').removeClass("col-lg-12").addClass("col-lg-8");
								$('#suggestedData').html(result);
							}
						}
				   })
				}else{
					$('#suggestedData').empty();
				}
			});
			
			$("#company_name,#first_name,#last_name,#phone,#email").bind('input', function () {
				var company_name = $('#company_name').val();
				var first_name = $('#first_name').val();
				var last_name = $('#last_name').val();
				var phone = $('#phone').val();
				var email = $('#email').val();
				var _token = $('input[name="_token"]').val();
				var i = 0;
				if(company_name != "") i++;if(first_name != "") i++;if(last_name != "") i++;if(phone != "") i++;if(email != "") i++;
				
				if(i > 0){
					$.ajax({
						url:"/duplicacycheck/consigneesuggestions",
						method:"POST",
						data:{company_name:company_name,first_name:first_name,last_name:last_name,phone:phone,email:email,_token:_token},
						success:function(result)
						{
							$('#suggestedData').empty();
							if(result != ''){
								$('#suggestedData').html(result);
							}
						}
				   })
				}else{
					$('#suggestedData').empty();
				}
			});
		});