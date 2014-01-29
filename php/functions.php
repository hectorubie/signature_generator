<?php

//gets office locations
function getOfficeFullAddress($office){
	$address = array();
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
			
			$address = array('address_line1'=>$address_line1, 'compfloor'=>$compfloor, 'state'=>$state, 'zip'=>$zip, 'country'=>$country);
		}
	}
	
	return $address;
	
}

//changes the users phone numbers so it will always look the same
function GetCorrectPhone($string){
	$num = str_replace(array('.', '-'), ' ' , $string);	
	return $num;
}

//display infomation on upload folder
function getContent($htmlHeader, /*$header_Words,*/ $letterDate, $main_content, $footer_Words){
	echo $htmlHeader;
	/*echo $header_Words."<br>";*/
	echo $letterDate;
	echo $main_content."<br>";
	echo $footer_Words."<br>";
}


//copys files from the upload directory and moves it to the new user upload folder
function full_copy( $source, $target ) {
	if ( is_dir( $source ) ) {
		@mkdir( $target );
		$d = dir( $source );
		while ( FALSE !== ( $entry = $d->read() ) ) {
			if ( $entry == '.' || $entry == '..' ) {
				continue;
			}
			$Entry = $source . '/' . $entry; 
			if ( is_dir( $Entry ) ) {
				full_copy( $Entry, $target . '/' . $entry );
				continue;
			}
			copy( $Entry, $target . '/' . $entry );
		}
 
		$d->close();
	}else {
		copy( $source, $target );
	}
}



function downloadFile( $fullPath ){

  // Must be fresh start
  if( headers_sent() )
    die('Headers Sent');

  // Required for some browsers
  if(ini_get('zlib.output_compression'))
    ini_set('zlib.output_compression', 'Off');

  // File Exists?
  if( file_exists($fullPath) ){
   
    // Parse Info / Get Extension
    $fsize = filesize($fullPath);
    $path_parts = pathinfo($fullPath);
    $ext = strtolower($path_parts["extension"]);
   
    // Determine Content Type
    switch ($ext) {
      case "pdf": $ctype="application/pdf"; break;
      case "exe": $ctype="application/octet-stream"; break;
      case "zip": $ctype="application/zip"; break;
      case "doc": $ctype="application/msword"; break;
      case "xls": $ctype="application/vnd.ms-excel"; break;
      case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
      case "gif": $ctype="image/gif"; break;
      case "png": $ctype="image/png"; break;
      case "jpeg":
      case "jpg": $ctype="image/jpg"; break;
      default: $ctype="application/force-download";
    }

    header("Pragma: public"); // required
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: private",false); // required for certain browsers
    header("Content-Type: $ctype");
    header("Content-Disposition: attachment; filename=\"".basename($fullPath)."\";" );
    header("Content-Transfer-Encoding: binary");
    header("Content-Length: ".$fsize);
    ob_clean();
    flush();
    readfile( $fullPath );

  } else
    die('File Not Found');

} 



//deletes all files in the upload folder
//when the user is ready to 
function emptyDir($path) { 
 
     // init the debug string
     $debugStr = '';
     $debugStr .= "Deleting Contents Of: $path<br /><br />";
 
     // parse the folder
     IF ($handle = OPENDIR($path)) {
 
          WHILE (FALSE !== ($file = READDIR($handle))) {
 
               IF ($file != "." && $file != "..") {
 
               // If it's a file, delete it
               IF(IS_FILE($path."/".$file)) {
 
                    IF(UNLINK($path."/".$file)) {
                    $debugStr .= "Deleted File: ".$file."<br />";     
                    }
 
               } ELSE {
 
                    // It's a directory...
                    // crawl through the directory and delete the contents               
                    IF($handle2 = OPENDIR($path."/".$file)) {
 
                         WHILE (FALSE !== ($file2 = READDIR($handle2))) {
 
                              IF ($file2 != "." && $file2 != "..") {
                                   IF(UNLINK($path."/".$file."/".$file2)) {
                                   $debugStr .= "Deleted File: $file/$file2<br />";     
                                   }
                              }
 
                         }
 
                    }
 
                    IF(RMDIR($path."/".$file)) {
                    $debugStr .= "Directory: ".$file."<br />";     
                    }
 
               }
 
               }
 
          }
 
     }
     RETURN $debugStr;
}

//deletes directory
function delete_directory($dirname) {
   if (is_dir($dirname))
	  $dir_handle = opendir($dirname);
   if (!$dir_handle)
	  return false;
   while($file = readdir($dir_handle)) {
	  if ($file != "." && $file != "..") {
		 if (!is_dir($dirname."/".$file))
			unlink($dirname."/".$file);
		 else
			delete_directory($dirname.'/'.$file);    
	  }
   }
   closedir($dir_handle);
   rmdir($dirname);
   return true;
}
     

?>