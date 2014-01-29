<?php
session_start();
ob_start ();

//includes function for filedown
include "recurseZip.php";
include "functions.php";
include ("get_os.php");


$fname = ucwords($_POST['fname']);
$mname = ucwords($_POST['mname']);
$lname = ucwords($_POST['lname']);

$user_os  =   getOS();

if($user_os == "Win"){

	  $path = '../generated_signatures/'.$fname.'_'.$lname.'-Windows';
	  
	  if(!file_exists($path)){
		  
			  $signature_dir = mkdir($path, 0777);
			  $sigfile_dir = mkdir($path."/sig_files", 0777);
			  
			  chmod($path, 0777);
			  chmod($path."/sig_files", 0777);
			  
			  include ("../templates/signature.php");
			  
			  $file_path = $path."/sig_files";
			  $file_name = '';
			  
			  //creates a .HTML file
			  $file_extention = ".htm";
			  
			  $file = $file_path."/".$file_name.$file_extention;
			  $create_file = fopen($file,'w+') ;
			  $write_to_file= fwrite($create_file, $html_sig);
			  fclose($create_file);
			  chmod($file_path."/".$file_name.$file_extention, 0777);

		  
		  ///////////////////////////////////////////////////////////////////////////
		  //creates txt file
			  
			  $file_extention_txt = ".txt";
			  
			  $file_txt = $file_path."/".$file_name.$file_extention_txt;
			  $create_file_txt = fopen($file_txt,'w+') ;
			  $write_to_file_txt = fwrite($create_file_txt, $txt_sig);
			  fclose($create_file_txt);
			  chmod($file_path."/".$file_name.$file_extention_txt, 0777);
			  
		  ///////////////////////////////////////////////////////////////////////////
		  //creates rtf file
		  
			  $file_extention_rtf = ".rtf";
			  
			  //creates the rtf file
			  $file_rtf = $file_path."/".$file_name.$file_extention_rtf;
			  $create_file_rtf = fopen($file_rtf,'w+');
			  $write_to_file_rtf = fwrite($create_file_rtf, $rtf_sig);
			  fclose($create_file_rtf);
			  chmod($file_path."/".$file_name.$file_extention_rtf, 0777);
		  
		  //////////////////////////////////////////////////////////////////////////
		  
		  ///////////////////////////////////////////////////////////////////////////
		  //creates bat file
			  
			  $bat_sig = 'Xcopy /s /I /C /F /R /Y sig_files\* "%USERPROFILE%\AppData\Roaming\Microsoft\Signatures\"';
			  //$file_extention_bat =".bat";
		  
			  
			  //creates bat file
			  $file_bat = $path."/"."install.bat";
			  $create_file_bat = fopen($file_bat,'w') ;
			  $write_to_file_bat = fwrite($create_file_bat, $bat_sig);
			  fclose($create_file_bat);
			  chmod($path."/"."install.bat", 0777);
		  
		  //////////////////////////////////////////////////////////////////////////
		  
		  //zip and prompts for download
		  $src= $path;
		  
		  //Destination folder where we create Zip file.
		  $dst= $path;
		  $z = new recurseZip();
		  $z->compress($src,$dst);
		  
		  $files = ($path."/".$fname.'_'.$lname."-Windows.zip");
			  
		  chmod($files, 0777);
	  
		  downloadFile($files);
		  ob_flush();	
		  //header("location: ../index.php");
	  
	  ////////////////////////////////////////////////////////////////////////////////
	  }else{ //else incase the file already exist
	  ///////////////////////////////////////////////////////////////////////////////
		  
		 include ("../templates/signature.php");
			  
			  $file_path = $path."/sig_files";
			  $file_name = '';
			  
			  //creates a .HTML file
			  $file_extention = ".htm";
			  
			  $file = $file_path."/".$file_name.$file_extention;
			  $create_file = fopen($file,'w+') ;
			  $write_to_file= fwrite($create_file, $html_sig);
			  fclose($create_file);
			  chmod($file_path."/".$file_name.$file_extention, 0777);

		  
		  ///////////////////////////////////////////////////////////////////////////
		  //creates txt file
			  
			  $file_extention_txt = ".txt";
			  
			  $file_txt = $file_path."/".$file_name.$file_extention_txt;
			  $create_file_txt = fopen($file_txt,'w+') ;
			  $write_to_file_txt = fwrite($create_file_txt, $txt_sig);
			  fclose($create_file_txt);
			  chmod($file_path."/".$file_name.$file_extention_txt, 0777);
			  
		  ///////////////////////////////////////////////////////////////////////////
		  //creates rtf file
		  
			  $file_extention_rtf = ".rtf";
			  
			  //creates the rtf file
			  $file_rtf = $file_path."/".$file_name.$file_extention_rtf;
			  $create_file_rtf = fopen($file_rtf,'w+');
			  $write_to_file_rtf = fwrite($create_file_rtf, $rtf_sig);
			  fclose($create_file_rtf);
			  chmod($file_path."/".$file_name.$file_extention_rtf, 0777);
		  
		  //////////////////////////////////////////////////////////////////////////
		  
		  ///////////////////////////////////////////////////////////////////////////
		  //creates bat file
			  
			  $bat_sig = 'Xcopy /s /I /C /F /R /Y sig_files\* "%USERPROFILE%\AppData\Roaming\Microsoft\Signatures\"';
			  //$file_extention_bat =".bat";
		  
			  
			  //creates bat file
			  $file_bat = $path."/"."install.bat";
			  $create_file_bat = fopen($file_bat,'w') ;
			  $write_to_file_bat = fwrite($create_file_bat, $bat_sig);
			  fclose($create_file_bat);
			  chmod($path."/"."install.bat", 0777);
		  
		  //////////////////////////////////////////////////////////////////////////
		  
		  //zip and prompts for download
		  $src= $path;
		  
		  //Destination folder where we create Zip file.
		  $dst= $path;
		  $z = new recurseZip();
		  $z->compress($src,$dst);
		  
		  $files = ($path."/".$fname.'_'.$lname."-Windows.zip");
			  
		  chmod($files, 0777);
	  
		  downloadFile($files);
		  //header("location: ../index.php");
	  }
	  
}//end of windows if statement

if($user_os == "Mac"){
			  
	$path = '../generated_signatures/'.$fname.'_'.$lname.'-Mac';
	
	if(!file_exists($path)){
		
		$sigfile_dir = mkdir($path, 0777);
		chmod($path, 0777);
		
		include ("../templates/signature.php");
		
		//create mac html
		$file_name = '';
		$file_extention = ".html";
		
		$file = $path."/".$file_name.$file_extention;
		$create_file = fopen($file,'w+') ;
		$write_to_file= chmod(fwrite($create_file, $html_sig), 0777);
		fclose($create_file);
		chmod($path."/".$file_name.$file_extention, 0777);
		
		//copy pdf mac instrustions
		//$targetFile = "../instructions/mac_html_sig_instructions.pdf";
		//$targetCopy = $path."/mac_html_sig_instructions.pdf";
		// Use the built in copy function now
		copy($targetFile, $targetCopy);
		
		//zip and prompts for download
		$src= $path;
		
		//Destination folder where we create Zip file.
		$dst= $path;
		$z = new recurseZip();
		$z->compress($src,$dst);
		
		$files = ($path."/".$fname.'_'.$lname."-Mac.zip");
			
		chmod($files, 0777);
	
		downloadFile($files);
		ob_flush();
		
	 }else{
		 include ("../templates/signature.php");
		
		//create mac html
		$file_name = '';
		$file_extention = ".html";
		
		$file = $path."/".$file_name.$file_extention;
		$create_file = fopen($file,'w+') ;
		$write_to_file= chmod(fwrite($create_file, $html_sig), 0777);
		fclose($create_file);
		chmod($path."/".$file_name.$file_extention, 0777);
		
		//copy pdf mac instrustions
		//$targetFile = "../instructions/mac_html_sig_instructions.pdf";
		//$targetCopy = $path."/mac_html_sig_instructions.pdf";
		// Use the built in copy function now
		copy($targetFile, $targetCopy);
		
		//zip and prompts for download
		$src= $path;
		
		//Destination folder where we create Zip file.
		$dst= $path;
		$z = new recurseZip();
		$z->compress($src,$dst);
		
		$files = ($path."/".$fname.'_'.$lname."-Mac.zip");
			
		chmod($files, 0777);
	
		downloadFile($files);
		 
	 }

}//end of Mac if statement

?>

