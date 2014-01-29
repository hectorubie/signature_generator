// JavaScript Document
$(function(){
	/* Validates the form using jQuery validate */	
	$( "#signature_form" ).validate({
		  rules: 
		  {
			  office: 
			  {
				  required: true
			  }, 
			  
			  fname: 
			  {
				  required: true
			  },
			  
			  lname: 
			  {
				  required: true
			  },
			  
			  title: 
			  {
				  required: true
			  },
			  
			  office_phone:
			  {
				  required: true
			  }
		  },   
		  errorPlacement: function(error, element) {
				error.appendTo( element.addClass("input_error") );
		  },
		  validClass: "input_success"
	 });
	
	
	
	
	
})