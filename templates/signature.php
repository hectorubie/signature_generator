<?php

if($mname == ""){
	$middleName = ' ';
}else{
	$middleName = ' '.$mname.' ';		
}

//Creates the user's full name
$fullname = $fname.$middleName.$lname;


//Form information
$title = $_POST['title'];
$tele = $_POST['office_phone'];
$mobile = $_POST['cell_phone'];
$fax = $_POST['fax_phone'];

$office = $_POST['office'];

$address_line1 = '';
$compfloor = '';
$state = '';
$zip = '';
$country = '';


/* Gets the office location */
$xmlcontent = simplexml_load_file("../xml/office_locations.xml", null, true);
					
foreach($xmlcontent->office as $child){	

	if($child->office_name == $office){
		
		$address_line1 = $child->address_line1;
		$compfloor = $child->compfloor;
		$state = $child->state;
		$zip = $child->zip;
		$country = $child->country;
		
		if($address_line1 == ""){ $address_line1 = ""; }else{ $address_line1 = $child->address_line1; }
		if($compfloor == ""){ $compfloor = ""; }else{ $compfloor = $child->compfloor; }
		if($state == ""){ $state = ""; }else{ $state = $child->state; };
		if($zip == ""){ $zip = ""; }else{ $zip = $child->zip; }
		if($country == ""){ $country = ""; }else{ $country = $child->country; }
		
	}
}

/* Connects all the office location information */
if($address_line1 == ""){ 
	$html_address_line1 = "";
	$txt_address_line1 = ""; 
	$rtf_address_line1 = ""; 
}else{ 
	$html_address_line1 = $address_line1."<br>";
	$txt_address_line1 = str_replace(array("<br>", "<br/>", "<br />", "<br \>"), "\r\n" , $address_line1)."\r\n";
	$rtf_address_line1 = str_replace(array("<br>", "<br/>", "<br />", "<br \>"), " \par " , $address_line1)." \par "; 
}

if($compfloor == ""){ 
	$html_compfloor = ""; 
	$txt_compfloor = ""; 
	$rtf_compfloor = "";
}else{ 
	$html_compfloor = $compfloor."<br>";
	$txt_compfloor = str_replace(array("<br>", "<br/>", "<br />", "<br \>"), "\r\n" , $compfloor)."\r\n";
	$rtf_compfloor = str_replace(array("<br>", "<br/>", "<br />", "<br \>"), " \par " , $compfloor)." \par ";  
}

if($state == ""){ 
	$html_state = "";
	$txt_state = ""; 
	$rtf_state = ""; 
	
}else{ 
	$html_state = $state." "; 
	$txt_state = str_replace(array("<br>", "<br/>", "<br />", "<br \>"), "\r\n" , $state)."\r\n";
	$rtf_state = str_replace(array("<br>", "<br/>", "<br />", "<br \>"), " \par " , $state)." \par "; 
}

if($zip == ""){ 
	$html_zip = "";
	$txt_zip = "";
	$rtf_zip = "";
}else{ 
	$html_zip = $zip."<br>";
	$txt_zip = str_replace(array("<br>", "<br/>", "<br />", "<br \>"), "\r\n" , $zip)."\r\n";
	$rtf_zip = str_replace(array("<br>", "<br/>", "<br />", "<br \>"), " \par " , $zip)." \par "; 
}

if($country == ""){ 
	$html_country = "";
	$txt_country = "";
	$rtf_country = ""; 
}else{ 
	$html_country = $country." ";
	$txt_country = str_replace(array("<br>", "<br/>", "<br />", "<br \>"), "\r\n" , $country)."\r\n";
	$rtf_country = str_replace(array("<br>", "<br/>", "<br />", "<br \>"), " \par " , $country)." \par ";  
}


if($mobile == ""){
	$htmlcellphone ="";
	$textcellphone ="";
	$rftcellphone ="";
}else{
	$htmlcellphone='<tr>
					  <td width="10" style="padding:0 0 2px 0;  font-size:11px; font-family: Calibri, Arial, sans-serif; color:#818285;">C</td>
					  <td width="73" style="padding:0 0 2px 0;  font-size:11px; font-family: Calibri, Arial, sans-serif; color:#818285;">'.GetCorrectPhone($mobile).'</td>
					</tr>';
					
    $textcellphone = "\r\n".'C '.GetCorrectPhone($mobile);
	$rftcellphone = ' \par '.'C '.GetCorrectPhone($mobile);
}

if($fax == ""){
	$htmlfaxphone ="";
	$textfaxphone ="";
	$rftfaxphone ="";
}else{
	$htmlfaxphone='<tr>
					  <td width="10" style="padding:0 0 2px 0;  font-size:11px; font-family: Calibri, Arial, sans-serif; color:#818285;">F</td>
					  <td width="73" style="padding:0 0 2px 0;  font-size:11px; font-family: Calibri, Arial, sans-serif; color:#818285;">'.GetCorrectPhone($fax).'</td>
				   </tr>';
	$textfaxphone = "\r\n".'F '.GetCorrectPhone($fax);
	$rftfaxphone = ' \par '.'F '.GetCorrectPhone($fax);
}



/****************************************************************************************************************
	TEXT SIGNATURE
	
	1) Change the domain name to your domain name
****************************************************************************************************************/
$txt_sig = "\r\n\r\n".$fullname."\r\n".$title."\r\nT ". GetCorrectPhone($tele).$textcellphone.$textfaxphone."\r\n".strtolower($fname).".".strtolower($lname)."@domain.com\r\n".$txt_address_line1. $txt_compfloor.$txt_state.$txt_zip.$txt_country."www.domain.com \r\n\r\n\r\n";


/****************************************************************************************************************
	RTF SIGNATURE
	
	1) Change the domain name to your domain name
****************************************************************************************************************/
$rtf_sig = '{\rtf1\ansi\ansicpg1252\deff0\deflang1033\deflangfe1033{\fonttbl{\f0\fswiss\fprq2\fcharset0 Verdana;}}
{\*\generator Msftedit 5.41.15.1507;}\viewkind4\uc1\pard\cf1\b\f0\fs20
\cf2\par
\cf1\par\par '.ucwords($fname).' '.ucwords($lname).'\b0  \cf2 \par '.$title .'\par
{\field{\*\fldinst{HYPERLINK "mailto:'.strtolower($fname).'.'.strtolower($lname).'@domain.com" }}{\fldrslt{\cf1\ul '.strtolower($fname).'.'.strtolower($lname).'@domain.com}}}\cf2\ulnone\f0\fs20  \par
T '.GetCorrectPhone($tele).$rftcellphone.$rftfaxphone."\par"
.$rtf_address_line1.$rtf_compfloor.$rtf_state.$rtf_zip.$rtf_country.'
{\field{\*\fldinst{HYPERLINK "http://www.domain.com" }}{\fldrslt{\cf1\ul www.domain.com}}}\cf2\ulnone\f0\fs20\par\par
}';

/****************************************************************************************************************
	HTML SIGNATURE
	
	1) Change the domain name to your domain name
	2) Change the social Media URL to the correct one
	3) Change social Media icon SRC to the live source
****************************************************************************************************************/
$html_sig = '
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Hector Ubiera signature</title>
<style type="text/css">
body{font-size:10ps; color:#818285; font-family: Calibri, sans-serif; line-height:14px;}
</style>
</head>

<body style="font-size:11px; color:#818285; font-family: Calibri, Arial, sans-serif; line-height:14px;">
<br/><br/>
<table border="0" cellpadding="0" cellspacing="0" style="font-size:11px; color:#818285;">
	<tr>
    	<td width="100" rowspan="2" align="left" valign="top"  style="white-space:nowrap; padding:0 10px 0 0; width:100px; font-family: Calibri, Arial, sans-serif;" >
        	<a href="http://www.domain.com" target="_blank"><img src="http://www.domain.com/sig/logo.png" width="100" height="100" alt="" border="0"/></a>
        </td>
        
        <td width="1" rowspan="2" bgcolor="#CCCCCC" style="width:1px"></td>
           
      <td width="166" align="left" valign="top"  style="padding:0 10px; width:auto;">
    		<table cellpadding="0" cellspacing="0">
               <tr>
                  <td style="color:#00aeef; font-weight:bold;  white-space:nowrap; padding:0 0 2px 0; font-size:11px; font-family: Calibri, Arial, sans-serif;">'.
				  $fullname.'
              </tr>
               <tr>
                  <td style="padding:0 0 2px 0; white-space:normal; font-size:11px; font-family: Calibri, Arial, sans-serif; color:#818285;">'.$title.'</td>
               </tr>
            </table>
   	  </td>    
        
       <td width="1" rowspan="2" bgcolor="#CCCCCC" style="width:1px" ></td>
                
    	<td width="250" rowspan="2" align="left" valign="top" style="padding:0 10px;">
              <table cellpadding="0" cellspacing="0" width="250">
              		<tr>
                      <td valign="top" style="font-weight:bold; font-size:11px; font-family: Calibri, Arial, sans-serif; color:#818285;" >Company name</td>
                	</tr>
                    <tr>
                      <td style="height:3px;"></td>
                	</tr>
                   <tr>
                      <td valign="top">
                        <span style="white-space:nowrap; margin:0 0 0px 0;  font-size:11px; font-family: Calibri, Arial, sans-serif; color:#818285;">'.
                          $html_address_line1.
						  $html_compfloor.
						  $html_state.
						  $html_zip.
						  $html_country.'
                       </span>
                     </td>
                   </tr>
				   <tr>
                	<td style="height:7px;"></td>
              	   </tr>
				   <tr>
					<td>
						<table cellpadding="0" cellspacing="0">
						  <tr>
							  <td style="width:20px"><a href="https://www.facebook.com/"><img src="http://www.domain.com/sig/facebook_icon.gif" width="16" height="16" alt=""/></a></td>
							  
							  <td style="width:22px"><a href="https://twitter.com/" target="_blank"><img src="http://www.domain.com/sig/twitter_icon.gif" width="16" height="16" alt=""/></a></td>
							  
							  <td style="width:17px"><a href="http://www.linkedin.com/company/" target="_blank"><img src="http://www.domain.com/sig/linkedin_icon.gif" width="16" height="16" alt=""/></a></td>
							  
							  <td style="width:5px;"></td>
							  
							  <td style="width:1px; height:10px" bgcolor="#CCCCCC"></td>
							  
							  <td style="width:5px;"></td>
							  
							  <td style="width:100px; text-decoration:none;"><a href="http://www.domain.com" style="color:#00aeef; text-decoration:none;  font-family: Calibri, sans-serif;">domain.com</a></td>
							  
							  <td style="width:210px"></td>
						  </tr>
					  </table>
					 </td>
				  </tr>
              </table>
			  
        </td>
        
     </tr>
	<tr>
	  <td align="left" valign="bottom"  style="white-space:nowrap; padding:0 10px; width:auto; font-size:11px; font-family: Calibri, Arial, sans-serif; height="75px;"">
      		<table cellpadding="0" cellspacing="0" style=" font-size:11px; font-family: Calibri, Arial, sans-serif; color:##818285;">
               <tr>
                  <td width="10" style="padding:0 0 2px 0;  font-size:11px; font-family: Calibri, Arial, sans-serif; color:#818285;">T</td>
                  <td width="73" style="padding:0 0 2px 0;  font-size:11px; font-family: Calibri, Arial, sans-serif; color:#818285; text-decoration:none;">'.GetCorrectPhone($tele).'</td>
               </tr>'.
			   	$htmlcellphone.
                $htmlfaxphone.'
               <tr>
                  <td colspan="2" style="color:#00aeef; white-space:nowrap; padding:0 0 2px 0; font-size:11px; font-family: Calibri, Arial, sans-serif;">
				  	<a href="mailto:'.strtolower($fname).'.'.strtolower($lname).'@domain.com" style="color:#00aeef; text-decoration:none;">'.strtolower($fname).'.'.strtolower($lname).'@domain.com</a>
               </tr>
            </table>
      </td>
  </tr>
</table>
</body>
</html>
';

?>