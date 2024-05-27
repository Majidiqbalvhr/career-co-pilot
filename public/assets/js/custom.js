$(document).ready(function(){
	$('#selectstate').selectize({   create: false, sortField: {field: 'text',direction: 'asc'},dropdownParent: 'body'});
	$('#selectcountry').selectize({   create: false, sortField: {field: 'text',direction: 'asc'},dropdownParent: 'body'});

	$('.selectize-drop-header').selectize(	{sortField: 'text',hideSelected: false,plugins: {  'dropdown_header': {    title: 'Select'  }}  });

	$('[data-toggle="dropdown-list"]').select2();
	
	$('#select-shipper').selectize({
		create: false,
		sortField: 'text'
	});
	
	$('#select-carrier').selectize({
		create: false,
		sortField: 'text'
	});

	$('#demo-foo-filter-shipper').selectize({
		create: false,
		sortField: 'text'
	});
	$('#demo-foo-filter-carrier').selectize({
		create: false,
		sortField: 'text'
	});
	$('#demo-foo-filter-partner').selectize({
		create: false,
		sortField: 'text'
	});
	$('#demo-foo-filter-agent').selectize({
		create: false,
		sortField: 'text'
	});

	$('#update-carrier').selectize({
		create: false,
		sortField: 'text'
	});
	
	$('#select-state').selectize({
		create: false,
		sortField: 'text'
	});
	var $countryselect = $('#select-country').selectize({
		create: false,
		sortField: 'text'
	});

	$('#select-state2').selectize({
		create: false,
		sortField: 'text'
	});
	var $countryselect2 =  $('#select-country2').selectize({
		create: false,
		sortField: 'text'
	});
	$('#select-state3').selectize({
		create: false,
		sortField: 'text'
	});
	$('#select-incorp-state').selectize({
		create: false,
		sortField: 'text'
	});
	var $countryselect3 =  $('#select-country3').selectize({
		create: false,
		sortField: 'text'
	});
	
	$('#select-partner').selectize({
		create: false,
		sortField: 'text'
	});
	$('#select-agent').selectize({
		create: false,
		sortField: 'text'
	});
	
	$('#select-consignor').selectize({
		create: false,
		sortField: 'text'
	});
	$('#select-consignee').selectize({
		create: false,
		sortField: 'text'
	});
	$( "#select-state" ).change(function() {
		var state = $('#select-state').val();
		var _token = $('input[name="_token"]').val();
		if(state != ''){
			$.ajax({
				type: "POST",
				url: "/duplicacycheck/getCountry",
				data:{state:state, _token:_token},
				beforeSend: function() {
					//$("#state-list").addClass("loader");
				},
				success: function(data){
					var selectize = $countryselect[0].selectize;
					selectize.setValue(selectize.search(data['name']).items[0].id);
				}
			});
		}
	});
	
	$( "#select-state2" ).change(function() {
		var state = $('#select-state2').val();
		var _token = $('input[name="_token"]').val();
		if(state != ''){
			$.ajax({
				type: "POST",
				url: "/duplicacycheck/getCountry",
				data:{state:state, _token:_token},
				beforeSend: function() {
					//$("#state-list").addClass("loader");
				},
				success: function(data){
					var selectize = $countryselect2[0].selectize;
					selectize.setValue(selectize.search(data['name']).items[0].id);
				}
			});
		}
	});
	
	$( "#select-state3" ).change(function() {
		var state = $('#select-state3').val();
		var _token = $('input[name="_token"]').val();
		if(state != ''){
			$.ajax({
				type: "POST",
				url: "/duplicacycheck/getCountry",
				data:{state:state, _token:_token},
				beforeSend: function() {
					//$("#state-list").addClass("loader");
				},
				success: function(data){
					var selectize = $countryselect3[0].selectize;
					selectize.setValue(selectize.search(data['name']).items[0].id);
				}
			});
		}
	});
	

	$('[data-toggle="input-mask"]').each(function (idx, obj) {
			
		var maskFormat = $(obj).data("maskFormat"); 
		var reverse = $(obj).data("reverse");    
		if (reverse != null) $(obj).mask(maskFormat, { 'reverse': reverse    });else $(obj).mask(maskFormat);  
	});
	
	/**
	 * Desc: Popover effeect
	 * @author: <Puneet.Singh@shinelogisticsllc.com>
	 */
	$('[data-toggle="popover"]').popover();
	
});


	$(function () {
		$(" #company_phone, #contact_phone, #bank_acc_phone, .phone, #carrier_rate, #shipper_rate, #smanager_phone, #owner_phone, #billing_phone, #truckstop_daystopay, #credit_limit, #no_of_loads").keypress(function (e) {
			var keyCode = e.keyCode || e.which;
 
			//Regex for Valid Characters i.e. Alphabets and Numbers.
			//var regex = /^[0-9]+$/;
			var regex= /^[0-9]*(\.[0-9]{0,2})?$/;
 
			//Validate TextBox value against the Regex.
			var isValid = regex.test(String.fromCharCode(keyCode));
			if (!isValid) {
				//$("#lblError").html("Only Alphabets and Numbers allowed.");
			}
 
			return isValid;
		});
	});

	