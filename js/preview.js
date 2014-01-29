// Make the live preview work
$(function(){
	
	$('.instruction_btn a').click(function(e) {
        $('.instruction_container').slideToggle(300,'easeInQuart');
    });
	
	
	$('#fname').keyup(function(e) {
        if($('#fname').val() == ""){
			
			$('#preview_fname').html('');
			
			if(($('#fname').val() == "") && ($('#mname').val() == "") && ($('#lname').val() == "")){
				$('#preview_main_name').show();
			}else{
				$('#preview_main_name').hide();
			}
			
			if(($('#fname').val() == "") && ($('#lname').val() == "")){
				$('#preview_main_email').show();
				$('#preview_email').hide();
			}else{
				$('#preview_main_email').hide();
			}
		
		}else{
			
			$('#preview_main_name').hide();
			$('#preview_fname').html($('#fname').val());
			
			$('#preview_main_email').hide();
			$('#preview_email').show();
			
			$('#preview_email_fname').html($('#fname').val().toLowerCase());
			
		}
    });
	
	$('#mname').keyup(function(e) {
        if($('#mname').val() == ""){
			$('#preview_mname').html('');
			if(($('#fname').val() == "") && ($('#mname').val() == "") && ($('#lname').val() == "")){
				$('#preview_main_name').show();
			}else{
				$('#preview_main_name').hide();
			}
		}else{
			$('#preview_main_name').hide();
			$('#preview_mname').html(' '+$('#mname').val());
		}
    });
	
	$('#lname').keyup(function(e) {
        if($('#lname').val() == ""){
			$('#preview_lname').html('');
			if(($('#fname').val() == "") && ($('#mname').val() == "") && ($('#lname').val() == "")){
				$('#preview_main_name').show();
			}else{
				$('#preview_main_name').hide();
			}
			
			if(($('#fname').val() == "") && ($('#lname').val() == "")){
				$('#preview_main_email').show();
				$('#preview_email').hide();
			}else{
				$('#preview_main_email').hide();
			}
			
		}else{
			$('#preview_main_name').hide();
			$('#preview_lname').html(' '+$('#lname').val());
			
			$('#preview_main_email').hide();
			$('#preview_email').show();
			
			$('#preview_email_lname').html('.'+$('#lname').val().toLowerCase());
		}
    });	
	
	$('#title').keyup(function(e) {
        if($('#title').val() == 0){
			$('#preview_title').html('');
			$('#preview_title').html('Your Title');
		}else{
			$('#preview_title').html('');
			$('#preview_title').html($('#title').val());
		}
    });
	
	$('#office_phone').keyup(function(e) {
        if($('#office_phone').val() == 0){
			$('#preview_office_phone').html('');
			$('#preview_office_phone').html('Phone Number');
		}else{
			$('#preview_office_phone').html('');
			$('#preview_office_phone').html($('#office_phone').val());
		}
    });
	
	$('#cell_phone').keyup(function(e) {
        if($('#cell_phone').val() == 0){
			$('#preview_cell_phone_container').hide();
			$('#preview_cell_phone').html('');
			$('#preview_cell_phone').html('Cell Number');
		}else{
			$('#preview_cell_phone_container').show();
			$('#preview_cell_phone').html('');
			$('#preview_cell_phone').html($('#cell_phone').val());
		}
    });
	
	$('#fax_phone').keyup(function(e) {
        if($('#fax_phone').val() == 0){
			$('#preview_fax_phone_container').hide();
			$('#preview_fax_phone').html('');
			$('#preview_fax_phone').html('Fax Number');
		}else{
			$('#preview_fax_phone_container').show();
			$('#preview_fax_phone').html('');
			$('#preview_fax_phone').html($('#fax_phone').val());
		}
    });
	
	
	$('#office').change(function(e) {
        var $val = $(this).val();
		var address_line1="", compfloor="", state="", zip="", country="";
		
		if($val == ""){
			$('#preview_main_address').show();
			$('#preview_address').hide();
			$('#preview_address').html('');
		}else{
			$('#preview_main_address').hide();
			$('#preview_address').show();
			try {
				var xmlPath = "xml/office_locations-xaxis.xml";
				$.ajax({
					type: "GET",
					url: xmlPath,
					dataType: "xml",
					success: function(data){
						
						 $(data).find('office').each(function(){
							  var name = $(this).find("office_name").text();
							  
							  if($val == name){
								  address_line1 = $(this).find("address_line1").text();
								  compfloor = $(this).find("compfloor").text();
								  state = $(this).find("state").text();
								  zip = $(this).find("office_name").text();
								  country = $(this).find("office_name").text();
								  
								  if(address_line1 == ""){ address_line1 = ""; }else{ address_line1 = $(this).find("address_line1").text()+"<br>" }
								  if(compfloor == ""){ compfloor = ""; }else{ compfloor = $(this).find("compfloor").text()+"<br>" };
								  if(state == ""){ state = ""; }else{ state = $(this).find("state").text()+" " };
								  if(zip == ""){ zip = ""; }else{ zip = $(this).find("zip").text()+"<br>" };
								  if(country == ""){ country = ""; }else{ country = $(this).find("country").text()+"<br>" };
								  
								  var main_address = address_line1+compfloor+state+zip+country;
								  
								  $('#preview_address').html(main_address);
								  						  
							  }
							  
						 });
						 
					}
				});
				
			} catch (e) {
				alert("Error while reading XML; Description – " + e.description);
			}
			
		}
    
	});
	
	
	$('#reset').click(function(e) {
       	$('#preview_fname').html('');
		$('#preview_mname').html('');
		$('#preview_lname').html('');
		$('#preview_main_name').show();
		
		$('#preview_main_email').show();
		$('#preview_email').hide();
		$('#preview_email_fname').html('');
		$('#preview_email_lname').html('');
		
		$('#preview_title').html('');
		$('#preview_title').html('Your title');
		
		$('#preview_office_phone').html('');
		$('#preview_office_phone').html('Phone Number');
		
		$('#preview_cell_phone_container').hide();
		$('#preview_cell_phone').html('');
		$('#preview_cell_phone').html('Cell Number');
		
		$('#preview_fax_phone_container').hide();
		$('#preview_fax_phone').html('');
		$('#preview_fax_phone').html('Fax Number');
		
		$('#preview_main_address').show();
		$('#preview_address').hide();
		$('#preview_address').html('');
		
    });
	
});

function parseOfficeLocationXml(xml) {
  var item = $(xml).find("template");

  $(item).each(function() {
    alert($("template").attr("template_name").text() + "<br />");
  });

}