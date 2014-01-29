<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Signature Generator | Xaxis</title>

<!-- CSS -->
<link rel="stylesheet" type="text/css" href="scripts/bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/style.css">



</head>

<body class="gray_bg">

<div id="wrap">
	<div id="main">

        <div class="wrapper">
        
                <div class="sig_preview white_bg clearfix">
                    
                    <div class="sig_container white_bg clearfix margin_bottom">
                    
                        <div class="heading"> Preview Signature </div>
                    
                        <table border="0" cellpadding="0" cellspacing="0" style="font-size:12px; color:#818285;">
                          <tr>
                              <td width="99" rowspan="2" align="left" valign="top"  style="white-space:nowrap; padding:0 10px 0 0; width:85px;">
                                  <img src="images/logo.png"alt="" width="100" height="100"/>
                              </td>
                              
                              <td width="1" rowspan="2" bgcolor="#CCCCCC" style="width:1px"></td>
                                 
                            <td width="166" align="left" valign="top"  style="padding:0 10px; width:auto;">
                                  <table cellpadding="0" cellspacing="0">
                                     <tr>
                                        <td style="color:#00aeef; font-weight:bold; white-space:nowrap; padding:0 0 2px 0;">
                                        <span id="preview_main_name">Your Name</span> 
                                        <span id="preview_fname"></span>
                                        <span id="preview_mname"></span>
                                        <span id="preview_lname"></span>
                                    </tr>
                                     <tr>
                                        <td style="padding:0 0 2px 0; white-space:normal" id="preview_title">Your title</td>
                                     </tr>
                                  </table>
                                  
                                  
                                  
                                  
                            </td>    
                              
                             <td width="1" rowspan="2" bgcolor="#CCCCCC" style="width:1px" ></td>
                                      
                              <td width="147" rowspan="2" align="left" valign="top" style="padding:0 10px;">
                                    <table cellpadding="0" cellspacing="0">
                                          <tr>
                                          
                                          <!-- Change company name -->
                                            <td valign="top" style="font-weight:bold;" >Company Name</td>
                                            
                                          </tr>
                                          <tr>
                                            <td height="3" ></td>
                                          </tr>
                                         <tr>
                                            <td valign="top">
                                              <span style="white-space:nowrap; margin:0 0 2px 0; min-height:65px; display:block;" id="preview_main_address">
                                                Office Location
                                              </span>
                                              <span style="white-space:nowrap; margin:0 0 2px 0;" id="preview_address">
                                                
                                              </span>
                                           </td>
                                         </tr>
                                    </table>
                                    
                                    <table>
                                      <tr>
                                        <td height="3"></td>
                                      </tr>
                                    </table>
                                    
                                    <!-- 
                                    	1) Change the section below so that the social media buttons can link to the correct URL.
                                        2) Change the SRC of the social media button to a live link
                                     -->
                                        
                                    <table cellpadding="0" cellspacing="0">
                                      <tr>
                                          <td style="width:15pt"><a href="#"><img src="images/facebook_icon.gif" width="16" height="16" alt=""/></a></td>
                                          <td style="width:15pt"><a href="#" target="_blank"><img src="images/twitter_icon.gif" width="16" height="16" alt=""/></a></td>
                                          <td style="width:12pt"><a href="#" target="_blank"><img src="images/linkedin_icon.gif" width="16" height="16" alt=""/></a></td>
                                          <td style="width:5px;"></td>
                                          <td style="width:1px; height:10pt" bgcolor="#CCCCCC"></td>
                                          <td style="width:5px;"></td>
                                          <td style="width:15pt"><a href="http://www.website.com" style="color:#00aeef; text-decoration:none;">Website</a></td>
                                      </tr>
                                  </table>
                                  
                                  <!-- END OF SECTION -->
                                  
                                  
                              </td>
                              
                           </tr>
                          <tr>
                            <td height="75" align="left" valign="bottom"  style="white-space:nowrap; padding:0 10px; width:auto;">
                                  <table cellpadding="0" cellspacing="0">
                                     <tr>
                                        <td width="15" style="padding:0 0 2px 0;">T</td>
                                        <td width="73" style="padding:0 0 2px 0;" id="preview_office_phone">Phone Number</td>
                                     </tr>
                                     <tr id="preview_cell_phone_container" style="display:none;">
                                        <td width="15" style="padding:0 0 2px 0;">C</td>
                                        <td width="73" style="padding:0 0 2px 0;" id="preview_cell_phone"></td>
                                     </tr>
                                     <tr id="preview_fax_phone_container" style="display:none;">
                                        <td width="15" style="padding:0 0 2px 0;">F</td>
                                        <td width="73" style="padding:0 0 2px 0;" id="preview_fax_phone"></td>
                                     </tr>
                                     <tr>
                                     
                                     <!-- Change the domain name to your domain -->
                                     
                                        <td colspan="2" style="color:#00aeef;white-space:nowrap; padding:0 0 2px 0;">
                                        <span id="preview_main_email" style="color:#00aeef;">email@domain.com</span>
                                        <span id="preview_email" style="color:#00aeef; display:none;">
                                            <span id="preview_email_fname"></span><span id="preview_email_lname"></span>@domain.com
                                        </span>
                                     </tr>
                                  </table>
                            </td>
                        </tr>
                      </table>
                      <span id="ad_creative_container" style="display:none">
                        <br>
                        <table border="0" align="center" cellpadding="0" cellspacing="0" style="white-space:nowrap">
                          <tr>
                            <td id="preview_ad_creative">
                                
                            </td>
                          </tr>
                        </table>
                      </span>
                    </div>
               </div><!-- END OF PREVIEW -->
            
                <div class="form gray_bg clearfix">
                    <div class="form_instructions">
                        <div class="main_container clearfix">
                            <div class="pull_left">
                              Fill in all the required fields in the boxes below.<br>
                              Your email will be automatically generated.<br>
                            </div>
                            
                            <div class="pull_right">
                            	<span class="instruction_btn"><a href="#instructions"><span class="instruction_link">How to install <span class="instruction_icon"></span></span></a></span>
                                <div class="instruction_container">
                                      <ul>
                                          <li>Click "Download"</li>
                                          <li>Save the .zip file to your desktop</li>
                                          <li>Open the .zip folder and "extract"<br>
											 &nbsp;&nbsp;&nbsp;the content to your desktop</li>
                                          <li>Open the extracted folder on your <br>
                                          &nbsp;&nbsp;&nbsp;&nbsp;desktop and double click "install.bat"</li>
                                         
                                          <br><span class="note">
                                              	<div class="outlook_link">
                                                    <a href="instructions/instructions_2010.pdf" target="_blank" class="pdf_instructions"><span class="pdf_icon"></span> <span class="outlook_instructions">Windows Outlook 2010 Instructions</span></a>
                                                    
                                                    <!--<br>
                                                    
                                                    <a href="instructions/mac_html_sig_instructions.pdf" target="_blank" class="pdf_instructions"><span class="pdf_icon"></span> <span class="outlook_instructions">Mac Outlook 2011 Instructions</span></a>-->
                                                </div>
                                      		 </span>
                                      </ul>
                                  		
                                      
                               </div>
                            </div>
                        </div>
                    </div>
                    <div class="main_container">
                    
            
                        
                        <form action="php/download.php" name="signature_form" enctype="multipart/form-data" method="post" id="signature_form" autocomplete="off">
                            <span class="input_fields clearfix">
                                <span class="pull_left margin_right">
                                    <label>Office Location <span class="required">(required)</span></label>
                                    <select name="office" id="office">
                                    <option value="">None</option>
                                   
								   		<?php
											/* Gets all the office location that are in the XML file */
                                        $xml_office_content = simplexml_load_file("xml/office_locations.xml", null, true);
                                                        
                                        foreach($xml_office_content->office as $child){			
                                            echo  '<option value="'.$child->office_name.'"'; 
                                            echo '>'.$child->office_name.'</option>';
                                        }
                                    ?>
                                   </select>
                              </span>
                              
                           </span>
                           
                           <span class="input_fields clearfix">
                                <span class="pull_left margin_right">
                                    <label>First Name <span class="required">(required)</span></label>
                                    <input type="text" name="fname" id="fname" size="39" value="">
                              </span>
                              
                              <span class="pull_left margin_right">
                                    <label>Middle Name</label>
                                    <input type="text" name="mname" id="mname" size="39" value="">
                              </span>
                              
                              <span class="pull_left">
                                    <label>Last Name <span class="required">(required)</span></label>
                                    <input type="text" name="lname" id="lname" size="39" value="">
                              </span>
                           </span>
                           
                           <span class="input_fields clearfix">
                                <span class="pull_left margin_right">
                                    <label>Title <span class="required">(required)</span></label>
                                    <input type="text" name="title" id="title" class="large_input_field" value="">
                              </span>
                          </span>
                          
                          
                          <span class="input_fields clearfix">
                                <span class="pull_left margin_right">
                                    <label>Office Phone <span class="required">(required)</span></label>
                                    <input type="text" name="office_phone" id="office_phone" size="39" value="">
                              </span>
                              
                              <span class="pull_left margin_right">
                                    <label>Cell Phone</label>
                                    <input type="text" name="cell_phone" id="cell_phone" size="39" value="">
                              </span>
                              
                              <span class="pull_left">
                                    <label>Fax Phone</label>
                                    <input type="text" name="fax_phone" id="fax_phone" size="39" value="">
                              </span>
                          </span>
                           
                          <span class="input_fields"> 
                            <input type="submit" name="submit" value="DOWNLOAD"> &nbsp;&nbsp;&nbsp; <input type="reset" name="reset" value="RESET FORM" id="reset">
                          </span>
                        </form>
                    </div><!-- END OF Main Container -->
               </div><!-- END OF FORM -->
               
        </div><!-- END OF WRAPPER -->
        
	</div><!-- end of main -->
</div><!-- end of wrap -->

<div id="footer">
	<div class="footer_container clearfix">
    	<span class="pull_left line_height">
            <span style="color:#FFFFFF">Copyright &copy; 2013 Signature Generator - Hector Ubiera. All Rights Reserved</span>
        </span>
   	</div>
</div><!-- end of footer -->

<!-- JS -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script src="scripts/jquery_validate/dist/jquery.validate.js"></script>

<script src="scripts/bootstrap/js/bootstrap.js"></script>

<script src="js/validate.js"></script>
<script src="js/preview.js"></script>


</body>
</html>