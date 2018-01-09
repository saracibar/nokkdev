<?php
require_once 'app/init.php';

if (Auth::guest()) {
	//echo "no logged";
	redirect_to(App::url());
}


if (Auth::check()) {
   //echo "si logged";
	$userid = auth::user()->id;
	$length = 28;
	$token = bin2hex(random_bytes($length));
	$date2 = time();
	require_once 'dbapi.php';
	//exit();
}
/*
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-type: text/html; charset=UTF-8');
session_start();
require_once 'app/init.php';
if (Auth::guest()) {
	redirect_to(App::url());
}else{
	$userid = auth::user()->id;
	//print_r($_POST);
	//exit();
}
*/
//print_r($_SESSION);
//print_r($_POST);
//$token = uniqid(mt_rand(), TRUE);



/*
echo "pito4";
//echo $userid;
print_r($_POST);
print_r($_SESSION);
exit();
*/

/*
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-type: text/html; charset=UTF-8');
session_start();


require_once 'app/init.php';
if (Auth::guest()) {
	redirect_to(App::url());
	//echo "gest";
	//print_r($_SESSION);

}else{
	$userid = auth::user()->id;
	//echo $userid;
	//print_r($_POST);
	//print_r($_SESSION);
	//exit();
}

//print_r($_SESSION);
//print_r($_POST);
//$token = uniqid(mt_rand(), TRUE);
$length = 28;
$token = bin2hex(random_bytes($length));
$date2 = time();
require_once 'dbapi.php';


echo $date2;
echo "<br />";
//$token =7;
	//$date2 = 0;
echo $token;

echo "<br />";



		if($_POST['step'] == 5) {
			print_r($_POST[]);
		}else{
			exit();
		}

*/
/*
echo $token;
echo " ";
echo $date2;
echo " ";
//echo $userid;
echo " ";
echo $_SESSION["propid"];
exit();
*/
Database::initialize();

if(isset($_SESSION["propid"])){
	$propid = $_SESSION["propid"];
}else{
	$propid = addToken($token,$date2,$userid);
	//$close = Database::$conn->close();

	//echo $propid;
	$_SESSION["propid"] = $propid;
}
/*
print_r($_SESSION);

echo $propid;

echo "<br />";
*/
$user_id = $userid;


$agent = isset($_SERVER['HTTP_USER_AGENT'])
               ? strtolower($_SERVER['HTTP_USER_AGENT'])
               : '';
			if($agent == '') {
                header("HTTP/1.0 404 Not Found");
				exit;
		}
		$ip = isset($_SERVER['REMOTE_ADDR'])
               ? strtolower($_SERVER['REMOTE_ADDR'])
               : '';
			   
		if(isset($_SERVER['HTTP_REFERER'])) {
			$ref = $_SERVER['HTTP_REFERER'];
			//$ref = preg_replace('#^https?://#', '', $ref);
		}else{
			echo "no ref";
			//header('Location: http://prestamospersonales.com.mx/mobile.php?flag=1'.$vars);
			exit();
		}
		
		/*	   
		if(isset($_SERVER['REQUEST_URI'])) {
			$ref = $_SERVER['REQUEST_URI'];
			//$ref = preg_replace('#^https?://#', '', $ref);
		}else{
			echo "no ref";
			//header('Location: http://prestamospersonales.com.mx/mobile.php?flag=1'.$vars);
			exit();
		}
		*/
		if(isset($_POST['formid'])) {
			$formid = $_POST['formid'];
		}else{
			echo "no form id";
			//header('Location: http://prestamospersonales.com.mx/mobile.php?flag=1'.$vars);
			exit();
		}
		
		if(isset($_POST['step'])) {
			$step = $_POST['step'];
		}else{
			echo "no form step";
			//header('Location: http://prestamospersonales.com.mx/mobile.php?flag=1'.$vars);
			exit();
		}
/*
echo "<br>";
echo $ip;
echo "<br>";
echo $ref;
echo "<br>";
echo $agent;
echo "<br>";
*/
if($formid == 10 && $step == 1){	
	$_SESSION["lat"] = $_POST['lat'];
	$_SESSION["lng"] = $_POST['lng'];
	//print_r($_SESSION);
	//exit();
}

/*
//DEBUG
foreach ($_POST as $key => $value) {
 echo htmlspecialchars($key)." - ".htmlspecialchars($value)."<br>";
}
*/
//echo "<br>////////////////////////////////////////////////////////////////////////////////<br><br>";
/*
*/
/*
$forms = array(
	//form-id,step,url,next,desc
	array(10,1,"submit-property-step1.php","submit-property-step2.php","Add property address"),
	array(10,2,"submit-property-step2.php","submit-property-step3.php","Confirm location"),
	array(10,3,"submit-property-step3.php","submit-property-step4.php","Property details"),
	array(10,4,"submit-property-step4.php","submit-property-step5.php","Property more details"),
	array(10,5,"submit-property-step5.php","submit-property-step6.php","Additional information"),
	array(10,6,"submit-property-step6.php","submit-property-step7.php","Add photos"),
);

//Countries
$country =  array(
    1 => "Australia",
    2 => "United States",
);

//States
$administrative_area_level_1 =  array(
    1 => "Victoria",
    2 => "Florida",
	3 => "Maryland",
);

//Cities
$locality =  array(
    1 => "Melbourne",
    2 => "Miami",
	3 => "Baltimore",
);


//Propery Category
$pcategory =  array(
    1 => "Home",
    2 => "Investment",
);

//Propery Types
$ptypes = array(
    1 => "Home",
    2 => "Apartment",
	3 => "Townhouse",
	4 => "Something else",
);




$fields = array(
///array(formid,step,fieldid,dbcolumn,mandaory,type),
	array(10,1,"name","name",1,0),
	array(10,1,"apt","apt",0,0),
	array(10,1,"street_number","str_number",1,0),
	array(10,1,"route","street",1,0),
	array(10,1,"postal_code","zip_id",1,0),
	array(10,1,"locality","area_id",1,1),
	array(10,1,"administrative_area_level_1","state_id",1,1),
	array(10,1,"lat","lat",1,0),
	array(10,1,"lng","lng",1,0),
	array(10,1,"country","country_id",1,1),
	array(10,2,"default_latitude","lat2",0,0),
	array(10,2,"default_longitude","lng2",0,0),
	array(10,3,"propcategory","category",1,0),
	array(10,3,"proptype","type",0,0),
	array(10,3,"propbedrooms","bedrooms",1,0),
	array(10,3,"propbathrooms","bathrooms",1,0),
	array(10,3,"propparking","parking",1,0),
	array(10,4,"proptitle","headline_id",1,1),
	array(10,4,"propdesc","description_id",1,1),
	array(10,4,"propprice","price",1,0),
	array(10,5,"propyear","year",0,0),
	array(10,5,"propsize","landsize",0,0),
	array(10,5,"propfloorspace","propertysize",0,0),
	array(10,5,"amenities[]","amenities",0,0),
	array(10,6,"status","status",0,0),
	//array(10,1,"","",1,1),
);
*/
$estaforma = array_filter($fields, function ($var) {
	global $formid, $step;
    return ($var[0] == $formid  && $var[1] == $step);
});

$toprocess = array_filter($fields, function ($var) {
	global $formid, $step;
    return ($var[0] == $formid && $var[1] == $step && $var[5] == 1);
});

if (!empty($toprocess)) {
	
	foreach($toprocess as $key => $valores) {
		
		//$key = array_search('Miami', $cities);
		
		
		// City
		if($fields[$key][2] == "suburb") {
			$value = $_POST['locality'];
			if($value){
				$_POST[$fields[$key][2]] = $value;
			}
		}
		
		// State
		if($fields[$key][2] == "state") {
			$value = $_POST['administrative_area_level_1'];
			if($value){
				$_POST[$fields[$key][2]] = $value;
			}
		}
		
		// Country
		if($fields[$key][2] == "country2") {
			$value = $_POST['country'];
			if($value){
				$_POST[$fields[$key][2]] = $value;
			}
		}
		
		
		
		// City_id
		if($fields[$key][2] == "locality") {
			$theid = array_search($_POST[$fields[$key][2]], $locality);
			if($theid){
				$_POST[$fields[$key][2]] = $theid;
			}
		}
		
		// State_id
		if($fields[$key][2] == "administrative_area_level_1") {
			$theid = array_search($_POST[$fields[$key][2]], $administrative_area_level_1);
			if($theid){
				$_POST[$fields[$key][2]] = $theid;
			}
		}
		
		// Country_id
		if($fields[$key][2] == "country") {
			$theid = array_search($_POST[$fields[$key][2]], $country);
			if($theid){
				$_POST[$fields[$key][2]] = $theid;
			}
		}
		
		// Title
		if($fields[$key][2] == "proptitle") {
			if(isset($_POST['proptitle'])) {
				global $propid;
				$meta = "prop_title";
				$value = Database::$conn->real_escape_string($_POST['proptitle']); /***************************** ESCAPED *//////////////////
				$_POST[$fields[$key][2]] = addmetaProp($propid,$meta,$value);
			}
		}
		
		// Property Description
		if($fields[$key][2] == "propdesc") {
			if(isset($_POST['propdesc'])) {
				global $propid;
				$meta = "prop_desc";
				$value = Database::$conn->real_escape_string($_POST['propdesc']); /***************************** ESCAPED FOR SECURITY *//////////////////
				$_POST[$fields[$key][2]] = addmetaProp($propid,$meta,$value);
			}
		}
		
		if($fields[$key][2] == "amenities") {
			if(isset($_POST['amenities'])) {
				global $propid;
				$category = "1"; /***************************** THIS ONE SHOULD MATCH WITH THE meta categories array in the dbapi files.-. pending fix*//////////////////
				$ff = $_POST['amenities'];
				$_POST[$fields[$key][2]] = addmetaAmen($propid,$category,$ff);
			}
		}
		
		
		
		/*
		Database::initialize();
		$propid = 2;
		$category = 1;
		$ff = array("ac","popo");

		echo addmetaAmen($propid,$category,$ff);

		$close = Database::$conn->close();
		*/
		
		/*echo "<br>////////////////////////////////////////////////////////////////////////////////<br><br>";
		
		echo "<br>";
		
		echo $fields[$key][2];
		echo "-<br>";
		echo $_POST[$fields[$key][2]];
		echo "<br>";
		*/
	}
	
}























//print_r($estaforma);
/* HAVE NOT USED THIS FUNCTION

function getlocid($type,$nameloc) {
	
	if($type == "city"){
		$key = array_search($nameloc, $cities);
	}else if($type == "state"){
		$key = array_search($nameloc,$states);
	}else if($type == "country"){
		$key = array_search($nameloc,$countries);
	}else{
		$key = 0;
	}
	return $key;
}
*/

if (!empty($estaforma)) {
	foreach($estaforma as $key => $valores) {
		//($id,$field,$column)
		$agrega = addFF($propid,$_POST[$fields[$key][2]],$fields[$key][3]);
	}
	$agrega = addFF($propid,$step,"step");
}

/*
echo "<br>////////////////////////////////////////////////////////////////////////////////<br><br>";
print_r($cities);
echo "<br>////////////////////////////////////////////////////////////////////////////////<br><br>";
$key = array_search('Miami', $cities); // fix the non capital, ie Miami != miami
echo "key: ".$key;
echo "<br>////////////////////////////////////////////////////////////////////////////////<br><br>";
echo "<br />";
echo $fields[0][3];
echo "<br>////////////////////////////////////////////////////////////////////////////////<br><br>";
print_r($_POST);
echo "<br>////////////////////////////////////////////////////////////////////////////////<br><br>";

echo $fields[5][3].": ".$_POST[$fields[5][2]];
echo "<br>////////////////////////////////////////////////////////////////////////////////<br><br>";
echo $fields[6][3].": ".$_POST[$fields[6][2]];
echo "<br>////////////////////////////////////////////////////////////////////////////////<br><br>";
echo $fields[9][3].": ".$_POST[$fields[9][2]];
echo "<br>////////////////////////////////////////////////////////////////////////////////<br><br>";

*/

/*
//Database::initialize();
//($id,$field,$column)
$agrega = addFF($propid,$_POST[$fields[0][2]],$fields[0][3]);
$agrega = addFF($propid,$_POST[$fields[1][2]],$fields[1][3]);
$agrega = addFF($propid,$_POST[$fields[2][2]],$fields[2][3]);
$agrega = addFF($propid,$_POST[$fields[3][2]],$fields[3][3]);
$agrega = addFF($propid,$_POST[$fields[4][2]],$fields[4][3]);
$agrega = addFF($propid,$_POST[$fields[5][2]],$fields[5][3]);
$agrega = addFF($propid,$_POST[$fields[6][2]],$fields[6][3]);
$agrega = addFF($propid,$_POST[$fields[7][2]],$fields[7][3]);
$agrega = addFF($propid,$_POST[$fields[8][2]],$fields[8][3]);
$agrega = addFF($propid,$_POST[$fields[9][2]],$fields[9][3]);
$agrega = addFF($propid,$step,"step");

*/

/*
$agrega = addFF(30,$_POST[$fields[9][2]],$fields[9][3]);
$agrega = addFF(30,$_POST[$fields[10][2]],$fields[10][3]);
$agrega = addFF(30,$_POST[$fields[11][2]],$fields[11][3]);
*/
//$propid = addToken($token,$date2);
$close = Database::$conn->close();

header("Location: ".$forms[$step-1][3]);
//die();

/*

$agent 
$ip
$ref


*/

/*
De donde viene
tiene post form
validar que los fields obligatorios estén llenados
agregar variables a sesion


Crear array de forms y pasos
- formid
- desc
- steps



crear array de fields con:
- nombre del array
- nombre field
- nombre bd
- obligatorio
- tipo





agregar numero de paso
pasos totales 
*/
?>