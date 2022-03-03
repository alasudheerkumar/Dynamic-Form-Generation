<?php

@session_start();


if(!empty($_POST['nooffields']) && !empty($_POST['fname']))
{
	$rootdir="forms/";
        
	$nooffields=$_POST['nooffields'];
	$fname=$_POST['fname'];
	    $upperhtml = "\n<html>\n<head>\n<title>form</title>\n<link rel='stylesheet' type='text/css' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>\n<script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script>\n</head>\n<body>";
    $lowerhtml = "\n\n</body>\n</html>";
    $formdata = '';
     if(!file_exists($rootdir)){
      mkdir($rootdir);
  }
  
  $rootdir.=$fname;
  mkdir($rootdir);
  $filename = $rootdir."/".$fname.".php";
  $dbname="forms/".$fname;
  $dbname.="dbcredentials.php";
  $dbfilename = $rootdir."/".$fname."dbcredentials.php";
  $dbfil= $fname."dbcredentials.php";
  $sqltable="$"."sql"."= ".'"Create table '.$fname."(";
  $sqlinsertfilename=$fname."insert.php";
  $sqlinsertcolumnPOST="";
  $sqlinsertcolumn="";
 
    for($i=1;$i<=$nooffields;$i++)
    {
    	$type=$_POST["fieldtype".$i];
    	$name=$_POST["fieldname".$i];
    	$label=$_POST["fieldlabel".$i];
		$sqltable.=$name;
		$sqlinsertcolumn.=$name;
		
		 $sqlinsertcolumnPOST.="'$"."_POST"."[";

		$sqlinsertcolumnPOST.=$name;
		$sqltable.=" ";
    	if($type=='text' || $type=='password')
    	{
			$sqltable .="varchar";
    		$req=$_POST["req".$i];

    		$minlength=$_POST["minlength".$i];
    		$maxlength=$_POST["maxlength".$i];
			$sqltable .="(".$maxlength.")";
	  		$pattern=$_POST["pattern".$i];
    		if($req=='required'){
    			$formdata=$formdata."\n<div class='row'><div class='col'>&nbsp;</div><div class='col'><b>".$label."</b>\n<input type='".$type."' required='".$req."' pattern='".$pattern."' maxlength='".$maxlength."' minlength='".$minlength."' class='form-control' name='".$name."' /></div><div class='col'>&nbsp;</div></div><br>";
       

    		}
    		if($req='')
    		{
    			$formdata=$formdata."\n<div class='row'><div class='col'>&nbsp;</div><div class='col'><b>".$label."</b>\n<input type='".$type."' pattern='".$pattern."' maxlength='".$maxlength."' minlength='".$minlength."' class='form-control' name='".$name."' /></div><div class='col'>&nbsp;</div></div><br>";
       
    		}
    		
    	 }


    	 if($type=='email' || $type=='date')
    	{
    		$req=$_POST["req".$i];
            $sqltable .="varchar(30)";
    		if($req=='required'){
    			$formdata=$formdata."\n<div class='row'><div class='col'>&nbsp;</div><div class='col'><b>".$label."</b>\n<input type='".$type."' required='".$req."' class='form-control' name='".$name."' /></div><div class='col'>&nbsp;</div></div><br>";
       

    		}
    		if($req='')
    		{
    			$formdata=$formdata."\n<div class='row'><div class='col'>&nbsp;</div><div class='col'><b>".$label."</b>\n<input type='".$type."' class='form-control' name='".$name."' /></div><div class='col'>&nbsp;</div></div><br>";
       
    		}
    		
    	 }

    	 if($type=='radio')
    	 {
    	 	$req=$_POST["req".$i];
    	 	$noofoptions=$_POST["options".$i];
             $sqltable .="varchar(30)";
			if($req=='required'){
    	 		$radiodata='';
    	 		for($k=1;$k<=$noofoptions;$k++)
    	 		{
    	 			$option=$_POST["field".$i."option".$k];
    	 			$radiodata=$radiodata."\n<input type='".$type."' required='".$req."' value='".$option."' class='form-control' name='".$name."' />".$option;
    	 		}

    			$formdata=$formdata."\n<div class='row'><div class='col'>&nbsp;</div><div class='col'><b>".$label."</b>\n".$radiodata."</div><div class='col'>&nbsp;</div></div><br>";
       

    		}
    		if($req='')
    		{

    			$radiodata='';
    	 		for($k=1;$k<=$noofoptions;$k++)
    	 		{
    	 			$option=$_POST["field".$i."option".$k];
    	 			$radiodata=$radiodata."\n<input type='".$type."' value='".$option."' class='form-control' name='".$name."' />".$option;
    	 		}

    			$formdata=$formdata."\n<div class='row'><div class='col'>&nbsp;</div><div class='col'><b>".$label."</b>\n".$radiodata."</div><div class='col'>&nbsp;</div></div><br>";
       
    			      
    		}
    		
    	 }

    	  if($type=='select')
    	 {
    	 	$req=$_POST["req".$i];
    	 	$noofoptions=$_POST["options".$i];
            $sqltable .="varchar(15)";
			if($req=='required'){
    	 		$selectdata="\n<select name='".$name."' required class='form-control'>";
    	 		$optionsdata='';
    	 		for($k=1;$k<=$noofoptions;$k++)
    	 		{
    	 			$option=$_POST["field".$i."option".$k];
    	 			$optionsdata=$optionsdata."\n<option value='".$option."' />".$option."</option>";
    	 		}

    			$formdata=$formdata."\n<div class='row'><div class='col'>&nbsp;</div><div class='col'><b>".$label."</b>\n".$selectdata.$optionsdata."</select></div><div class='col'>&nbsp;</div></div><br>";
       

    		}
    		if($req='')
    		{

    			$selectdata="\n<select name='".$name."' class='form-control'";
    	 		$optionsdata='';
    	 		for($k=1;$k<=$noofoptions;$k++)
    	 		{
    	 			$option=$_POST["field".$i."option".$k];
    	 			$optionsdata=$optionsdata."\n<option value='".$option."' />".$option."</option>";
    	 		}

    			$formdata=$formdata."\n<div class='row'><div class='col'>&nbsp;</div><div class='col'><b>".$label."</b>\n".$selectdata.$optionsdata."\n</select></div><div class='col'>&nbsp;</div></div><br>";
       	      
    		}	

       	 }

    if($i+1<=$nooffields)
	{  
        $sqltable.=",";
		
		$sqlinsertcolumn.=",";
		//$sqlinsertcolumnPOST.="'";
		$sqlinsertcolumnPOST.="]',";
		
	}
       

    }
	$sqlinsertcolumnPOST.="]'";
	$formdata=$formdata."\n\n<input type='hidden'    class='form-control' name='".$fname."' /><br>";
          $formdata=$formdata."\n<div class='row'><div class='col'>&nbsp;</div><div class='col'>\n<input type='submit' required='required' class='form-control' name='submit' /></div><div class='col'>&nbsp;</div></div><br>";

    $data=$upperhtml."\n<form method='POST' action='".$fname."insert.php'>\n".$formdata."\n</form>\n".$lowerhtml;
	$sqltable.=")";
	$sqltable.='";';
	
	$sqltable .="
	if(mysqli_query("."$"."conn".", $"."sql".")".")"." {".
    "echo". '"Database created successfully"' .";
}"." else"." {".
    "echo". '"Error creating database: "'." . "."mysqli_error($"."conn".");".
	
"}".

"mysqli_close($"."conn".");
";
	
	//$sqltable.="";";
	
	$daa="<?php
$"."servername"." = ". '"localhost"' . ";
$"."username" ." = ". '"root"' . "; 
$"."password" ." = ". '""' .";
$"."dbname" ."= ". '"dforms"' . ";

// Create connection
$"."conn" . " = new mysqli($"."servername" . ", $" ."username" . ", $" ."password ". ", $" ."dbname". ");

// Check connection
if ($"."conn"."->"."connect_error".") {
    die(" . '"Connection failed:"' . ". $"."conn"."->" ."connect_error". ");
} 
echo " . '"Connected successfully"' .";
" ;

$daa.=$sqltable;
$daa .="
?>";




//Inserting rows into tables
//$sqltable="$"."sql"."= ".'"Create table '.$fname."(";
$sqlinsertquery="<?php
$"."servername"." = ". '"localhost"' . ";
$"."username" ." = ". '"root"' . "; 
$"."password" ." = ". '""' .";
$"."dbname" ."= ". '"dforms"' . ";

// Create connection
$"."conn" . " = new mysqli($"."servername" . ", $" ."username" . ", $" ."password ". ", $" ."dbname". ");

// Check connection
if ($"."conn"."->"."connect_error".") {
    die(" . '"Connection failed:"' . ". $"."conn"."->" ."connect_error". ");
} 
echo " . '"Connected successfully"' .";
$"."sql"." = ".'"INSERT INTO '.$fname."(".$sqlinsertcolumn.")
VALUES(".$sqlinsertcolumnPOST.")".'"'.";
if (mysqli_query($"."conn, $"."sql)) {
    //echo ".'"New record created successfully"'.";
	

	header("."'location:".$fname.".php'".");
} else {
    echo ".'"Error: "'." . $"."sql;
	echo  mysqli_error($"."conn);
}

//var_dump("."$"."_POST["."]".");
 //print_r("."$"."_POST);
mysqli_close($"."conn);
?>
";
/*
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
*/
$inserting="forms/".$fname."/".$fname."insert.php";
$indes="<?php
require_once('$dbfil');
?>";


$in="forms/".$fname."/index.php";
    file_put_contents($filename,$data,FILE_APPEND);
	file_put_contents($dbfilename,$daa,FILE_APPEND);
	file_put_contents($in,$indes,FILE_APPEND);
	file_put_contents($inserting,$sqlinsertquery,FILE_APPEND);
	
    echo "form created";
	
}
else
{
	echo "kkkk";
}


// in 222 $"."sql"." = ".'"INSERT INTO '.$fname."(".$sqlinsertcolumnPOST.")
//values($_POST['".$sqlinsertcolumnPOST."']);


 ?>