$(document).ready(function(){
			
			$("#username").bind('input', function () {
				var error_username = '';
				var username = $('#username').val();
				var id = $("input[name=id]").val();
				var _token = $('input[name="_token"]').val();
				if(username.length < 8){
					$('#error_username').html('<label class="text-danger">This value is too short. It should have 8 characters or more.</label>');
					$('#username').addClass('has-error');
					$('#submit').attr('disabled', 'disabled');
					return;
				}
				if(username != ""){
					$.ajax({
						url:"/duplicacycheck/usernameCheck",
						method:"POST",
						data:{username:username,id:id, _token:_token},
						success:function(result)
						{
							if(result != 'usernameExists')
							{
								$('#error_username').html('<label class="text-success">Username is available!</label>');
								$('#username').removeClass('has-error');
								$('#submit').attr('disabled', false);
							}
							else
							{
								$('#error_username').html('<label class="text-danger">Username is already taken!</label>');
								$('#username').addClass('has-error');
								$('#submit').attr('disabled', 'disabled');
							}
						}
				   })
				}else{
					$('#error_username').empty();
				}
			});
			
			$("#phone").bind('input', function (e) {
				e.preventDefault();
				var error_phone = '';
				var phone = $('#phone').val();
				var id = $("input[name=id]").val();
				var _token = $('input[name="_token"]').val();
				if(phone != ""){
					$.ajax({
						url:"/duplicacycheck/phoneCheck",
						method:"POST",
						data:{phone:phone,id:id, _token:_token},
						success:function(result)
						{
							if(result != 'phoneExists')
							{
								$('#error_phone').empty();
								$('#phone').removeClass('has-error');
								$('#submit').attr('disabled', false);
							}
							else
							{
								$('#error_phone').html('<label class="text-danger">phone exists in database!</label>');
								$('#phone').addClass('has-error');
								$('#submit').attr('disabled', 'disabled');
							}
						}
				   })
				}else{
					$('#error_phone').empty();
				}
			});

			$("#email").bind('input', function (e) {
				e.preventDefault();
				var error_email = '';
				var email = $('#email').val();
				var id = $("input[name=id]").val();
				var _token = $('input[name="_token"]').val();
				var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				
				if(email != "" && filter.test(email)){
					$.ajax({
						url:"/duplicacycheck/emailCheck",
						method:"POST",
						data:{email:email,id:id, _token:_token},
						success:function(result)
						{
							if(result != 'emailExists')
							{
								$('#error_email').empty();
								$('#email').removeClass('has-error');
								$('#submit').attr('disabled', false);
							}
							else
							{
								$('#error_email').html('<label class="text-danger">email exists in database!</label>');
								$('#email').addClass('has-error');
								$('#submit').attr('disabled', 'disabled');
							}
						}
				   })
				}else{
					$('#error_email').empty();
				}
			});
			$("#personalemail").bind('input', function (e) {
				e.preventDefault();
				
				var error_email = '';
				var email = $('#personalemail').val();
				var id = $("input[name=id]").val();
				var _token = $('input[name="_token"]').val();
				var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				
				if(email != "" && filter.test(email)){
					$.ajax({
						url:"/duplicacycheck/personalemailCheck",
						method:"POST",
						data:{email:email,id:id, _token:_token},
						success:function(result)
						{
							if(result != 'emailExists')
							{
								$('#perror_email').empty();
								$('#personalemail').removeClass('has-error');
								$('#submit').attr('disabled', false);
							}
							else
							{
								$('#perror_email').html('<label class="text-danger">email exists in database!</label>');
								$('#personalemail').addClass('has-error');
								$('#submit').attr('disabled', 'disabled');
							}
						}
				   })
				}else{
					$('#perror_email').empty();
				}
			});
			$("#business_email").bind('input', function (e) {
				e.preventDefault();
				
				var error_email = '';
				var email = $('#business_email').val();
				var id = $("input[name=id]").val();
				var _token = $('input[name="_token"]').val();
				var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				
				if(email != "" && filter.test(email)){
					$.ajax({
						url:"/duplicacycheck/businessemailCheck",
						method:"POST",
						data:{email:email,id:id, _token:_token},
						success:function(result)
						{
							if(result != 'emailExists')
							{
								$('#error_business_email').empty();
								$('#business_email').removeClass('has-error');
								$('#submit').attr('disabled', false);
							}
							else
							{
								$('#error_business_email').html('<label class="text-danger">email exists in database!</label>');
								$('#business_email').addClass('has-error');
								$('#submit').attr('disabled', 'disabled');
							}
						}
				   })
				}else{
					$('#error_business_email').empty();
				}
			});

			$("#first_name,#last_name,#email,#phone").bind('input', function (e) {
				e.preventDefault();
				
					var first_name = $('#first_name').val();
					var last_name = $('#last_name').val();
					var email = $('#email').val();
					var phone = $('#phone').val();
					var user_type = $('#user_type').val();
					var _token = $('input[name="_token"]').val();
					
					var i = 0;
					if(first_name != "") i++;if(last_name != "") i++;if(email != "") i++;if(phone != "") i++;
					if(i >= 1){
						
						$.ajax({
							url:"/duplicacycheck/usersuggestions",
							method:"POST",
							data:{first_name:first_name,last_name:last_name,email:email,phone:phone,user_type:user_type, _token:_token},
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
				return false;
				
			});
			
			$("#company_name,#business_email,#toll_free_n").bind('input', function () {
				var company_name = $('#company_name').val();
				var business_email = $('#business_email').val();
				var toll_free_no = $('#toll_free_no').val();
				var _token = $('input[name="_token"]').val();
				var user_type = $('#user_type').val();
				var i = 0;
				if(company_name != "") i++;if(business_email != "") i++;if(toll_free_no != "") i++;
				
				if(i > 0){
					$.ajax({
						url:"/duplicacycheck/businessinfosuggestions",
						method:"POST",
						data:{company_name:company_name,business_email:business_email,toll_free_no:toll_free_no, user_type:user_type, _token:_token},
						success:function(result)
						{
							$('#suggestedBusinessData').empty();
							if(result != ''){
								$('#suggestedBusinessData').html(result);
							}
						}
				   })
				}else{
					$('#suggestedBusinessData').empty();
				}
			});
		});