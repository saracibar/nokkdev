<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

////////////////////////// ARRAYS //////////////////////////////////

$forms = array(
	//form-id,step,url,next,desc
	array(10,1,"submit-property-step1.php","submit-property-step2.php","Add property address"),
	array(10,2,"submit-property-step2.php","submit-property-step3.php","Confirm location"),
	array(10,3,"submit-property-step3.php","submit-property-step4.php","Property details"),
	array(10,4,"submit-property-step4.php","submit-property-step5.php","Property more details"),
	array(10,5,"submit-property-step5.php","submit-property-step6.php","Additional information"),
	array(10,6,"submit-property-step6.php","submit-property-step7.php","Add photos"),
	array(10,7,"submit-property-step7.php","user.php","List Property"),
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
    1 => "House",
    2 => "Townhouse",
	3 => "Villa",
	4 => "Apartment/Unit",
	5 => "Block of apartments",
	6 => "Land",
	7 => "Something else",
	
	
	
);

//meta categories
$metacategories = array(
    0 => "Default",
    1 => "Amenities",
);

$amenities = array(
	// id, label,order,value,status
	array("1","Air Conditioning","1","ac","1"),
	array("2","Balcony","2","balcony","1"),
	array("3","Bedding","3","bedding","1"),
	array("4","Cable TV","4","cable","1"),
	array("5","Coffee Pot","5","coffee-pot","1"),
	array("6","Dishwasher","6","dishwasher","1"),
	array("7","Fridge","7","fridge","1"),
	array("8","Grill","8","grill","1"),
	array("9","Heating","9","heating","1"),
	array("10","Internet","10","internet","1"),
	array("11","Microwave","11","microwave","1"),
	array("12","Oven","12","oven","1"),
	array("13","Parking","13","parking","1"),
	array("14","Pool","14","pool","1"),
	array("15","Toaster","15","toaster","0")
);


$fields = array(
///array(formid,step,fieldid,dbcolumn,mandaory,type),
	array(10,1,"name","name",1,0),
	array(10,1,"apt","apt",0,0),
	array(10,1,"street_number","str_number",1,0),
	array(10,1,"route","street",1,0),
	array(10,1,"postal_code","zip_id",1,0),
	array(10,1,"formatted_address","faddress",1,0),
	array(10,1,"country2","country",1,1),
	array(10,1,"state","state",1,1),
	array(10,1,"suburb","suburb",1,1),
	array(10,1,"country","country_id",1,1),
	array(10,1,"administrative_area_level_1","state_id",1,1),
	array(10,1,"locality","area_id",1,1),
	array(10,1,"lat","lat",1,0),
	array(10,1,"lng","lng",1,0),
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
	array(10,5,"amenities","amenities",0,1),
	array(10,6,"photos","photos",0,0),
	array(10,7,"status","status",0,0),
	//array(10,1,"","",1,1),
);
//////////////////////////////////////////////////////////////////////////////


class Database
{
    /** TRUE if static variables have been initialized. FALSE otherwise
    */
    private static $init = FALSE;
    /** The mysqli connection object
    */
    public static $conn;
    /** initializes the static class variables. Only runs initialization once.
    * does not return anything.
    */
    public static function initialize()
    {
        if (self::$init===TRUE)return;
        self::$init = TRUE;
        self::$conn = new mysqli("localhost", "onmrkt", "RedFish10", "onmrkt");
		//self::$close = $conn->close();
    }
}

function inserta($userid,$propid,$finalname) {
$result = mysqli_query (Database::$conn, "INSERT INTO `images` (`id`, `user_id`, `prop_id`, `name`, `status`, `ord`, `date2`) VALUES (NULL, ".$userid.",".$propid.", '".$finalname."', '1', '1',".time().")");
}

function selecciona($userid,$propid) {
$files = array();
$result = mysqli_query (Database::$conn, "SELECT * FROM `images` WHERE `user_id` = ".$userid." AND `prop_id` = ".$propid." AND `status` = 1 ORDER BY `ord` ASC");
$cuantos = mysqli_num_rows($result);
	if($cuantos  > 0) {
		 while ($row = $result->fetch_assoc()) {
		   $files[] =  $row["name"];
		}
	} 
	return $files;
}




function deleteImage($file) {
$result = mysqli_query (Database::$conn, "DELETE FROM `images` WHERE `images`.`name` = '".$file."'");
}


function getcover($userid,$propid) {
$result = mysqli_query (Database::$conn, "SELECT `name` FROM `images` WHERE `user_id` = ".$userid." AND `prop_id` = ".$propid." AND `cover` = 1 ORDER BY `ord` ASC");
$cuantos = mysqli_num_rows($result);
	if($cuantos  > 0) {
		 while ($row = $result->fetch_assoc()) {
		   $cover[] =  $row["name"];
		}
	} 
	return $cover[0];
}


function addcover($imgname,$userid,$propid) {
$result = mysqli_query (Database::$conn, "SELECT `id` FROM `images` WHERE `user_id` = ".$userid." AND `prop_id` = ".$propid." AND `cover` = 1 ORDER BY `ord` ASC");
$cuantos = mysqli_num_rows($result);
	if($cuantos  > 0) {
		 while ($row = $result->fetch_assoc()) {
		   $old_cover =  $row["id"];
		}
		$remove_old_cover = mysqli_query (Database::$conn, "UPDATE `images` SET `cover` = 0 WHERE `images`.`id` = '".$old_cover."'");
		$add_new_cover = mysqli_query (Database::$conn, "UPDATE `images` SET `cover` = 1 WHERE `images`.`name` = '".$imgname."'");
	} else {
		$add_new_cover = mysqli_query (Database::$conn, "UPDATE `images` SET `cover` = 1 WHERE `images`.`name` = '".$imgname."'");
	}
}

function acomoda($imgorder) {
	$arne = "";
	foreach($imgorder as $key => $name) {
		$ordn = $key+1;
		$result = mysqli_query (Database::$conn, "UPDATE `images` SET `ord` = '".$ordn."' WHERE `images`.`name` = '".$name."'");
		//$arne .= $ordn.": ".$name." - ";
	}
	//return $arne; // to alert the order
}


function addToken($token,$date,$userid) {
	$propid = 0;
	$result = mysqli_query (Database::$conn, "INSERT INTO `properties` (`id`, `token`, `date2`, `user_id`) VALUES (NULL, '".$token."',".$date.",".$userid.")");
	$propid = mysqli_insert_id(Database::$conn);
	/*
	if($result) {		
			$papropid = mysqli_query (Database::$conn, "SELECT `id` FROM `properties` WHERE `token` = '".$token."' ORDER BY `id` DESC LIMIT 1");
			$cuantos = mysqli_num_rows($papropid);
				if($cuantos  > 0) {
					 while ($row = $papropid->fetch_assoc()) {
					   $elpropid[] =  $row["id"];
					}
				} 
				 $propid = $elpropid[0];			
	}
	*/
	return $propid;
}

function addFF($id,$field,$column){
	//echo $id;
	$result = mysqli_query (Database::$conn, "UPDATE `properties` SET `".$column."` = '".$field."' WHERE `properties`.`id` = ".$id."");
}



function addmetaProp($propid,$meta,$value) {
	$result = mysqli_query (Database::$conn, "INSERT INTO `propertiesmeta` (`id`, `prop_id`, `meta_key`, `meta_value`) VALUES (NULL, ".$propid.", '".$meta."', '".$value."');");
	$metapropid = mysqli_insert_id(Database::$conn);
	return $metapropid;
}



function addmetaAmen($propid,$category,$ff) {
	global $amenities;
	$result = mysqli_query (Database::$conn, "SELECT * FROM `propertiesmeta` WHERE `prop_id` = ".$propid." AND `category` = ".$category." ORDER BY `ID` ASC");
	
	$metasdb = array();
	$metasdbid = array();
	$cuantos = mysqli_num_rows($result);
	if($cuantos  > 0) {
		 while ($row = $result->fetch_assoc()) {
		   $metasdb[] =  $row["meta_key"];
			$metasdbid[] =  $row["id"];
		}
	}
	
	$arr = array();
	foreach($amenities as $key => $amenity) {
			 $arr[] =  $amenity[3];
	}
	
	//turn off all of them
	foreach($metasdbid as $key => $id) {
			 $result = mysqli_query (Database::$conn, "UPDATE `propertiesmeta` SET `meta_value` = '0' WHERE `propertiesmeta`.`id` = ".$id."");
	}
	

	foreach($arr as $key => $arritem) {
		if (!in_array($arritem, $metasdb)) {
			 $result = mysqli_query (Database::$conn, "INSERT INTO `propertiesmeta` (`id`, `prop_id`, `meta_key`, `category`, `meta_value`) VALUES (NULL, ".$propid.", '".$arritem."', '1', '0');");
		} 
	}
	
	
	foreach($ff as $key => $ffitem) {
		$result = mysqli_query (Database::$conn, "UPDATE `propertiesmeta` SET `meta_value` = '1' WHERE `propertiesmeta`.`prop_id` = ".$propid." AND `propertiesmeta`.`meta_key` = '".$ffitem."'");
	}
}








function selectPorperty($propid) {
$propdata = array();
$result = mysqli_query (Database::$conn, "SELECT * FROM `properties` WHERE `id` = ".$propid." ");
$cuantos = mysqli_num_rows($result);
	if($cuantos  > 0) {
		 while ($row = $result->fetch_assoc()) {
		   $propdata[] =  $row;
		}
	} 
	return $propdata;
}









function getHeadline($theid) {
$result = mysqli_query (Database::$conn, "SELECT `meta_value` FROM `propertiesmeta` WHERE `id` = ".$theid."  ORDER BY `id` ASC");
$cuantos = mysqli_num_rows($result);
	if($cuantos  > 0) {
		 while ($row = $result->fetch_assoc()) {
		   $headline[] =  $row["meta_value"];
		}
	} 
	return $headline[0];
}

function getDescription($theid) {
$result = mysqli_query (Database::$conn, "SELECT `meta_value` FROM `propertiesmeta` WHERE `id` = ".$theid."  ORDER BY `id` ASC");
$cuantos = mysqli_num_rows($result);
	if($cuantos  > 0) {
		 while ($row = $result->fetch_assoc()) {
		   $desc[] =  $row["meta_value"];
		}
	} 
	return $desc[0];
}

/*
function getAmenity($propid) {
$result = mysqli_query (Database::$conn, "SELECT * FROM `propertiesmeta` WHERE `prop_id` = ".$propid." AND `category` = 1  ORDER BY `meta_` ASC");
$cuantos = mysqli_num_rows($result);
	if($cuantos  > 0) {
		 while ($row = $result->fetch_assoc()) {
		   $desc[] =  $row["meta_value"];
		}
	} 
	return $desc[0];
}
*/


function getPamenities($propid) { ////////////////////////////////////////////// PENDING TO GET THESE VALUES FROM DATABASE AND NOT FROM ARRAY
	global $amenities;
	$ames = array();
	foreach($amenities as $key => $amenitie) {
		
		
		$result = mysqli_query (Database::$conn, "SELECT `meta_value` FROM `propertiesmeta` WHERE `prop_id` = ".$propid." AND `meta_key` like '".$amenitie[3]."' AND `category` = 1");
$cuantos = mysqli_num_rows($result);
	if($cuantos  > 0) {
		 while ($row = $result->fetch_assoc()) {
		   $metavalue =  $row["meta_value"];
		}
	} else {
		$metavalue =  "9";
	}
		
		
		
		
		if($amenitie[4]==1){
			$ames[] = array($amenitie[1],$amenitie[3],$metavalue);
		}
		//$result = mysqli_query (Database::$conn, "UPDATE `propertiesmeta` SET `meta_value` = '1' WHERE `propertiesmeta`.`prop_id` = ".$propid." AND `propertiesmeta`.`meta_key` = '".$ffitem."'");
	}
	return $ames;
}




function getCountry($propid) { ////////////////////////////////////////////// PENDING TO GET THESE VALUES FROM DATABASE AND NOT FROM ARRAY
	global $country;
	$pcountry = $country[$propid];
	return $pcountry;
}

function getState($propid) { ////////////////////////////////////////////// PENDING TO GET THESE VALUES FROM DATABASE AND NOT FROM ARRAY
	global $administrative_area_level_1;
	$pstate = $administrative_area_level_1[$propid];
	return $pstate;
}

function getCity($propid) { ////////////////////////////////////////////// PENDING TO GET THESE VALUES FROM DATABASE AND NOT FROM ARRAY
	global $locality;
	$pcity = $locality[$propid];
	return $pcity;
}

function getCategory($propid) { ////////////////////////////////////////////// PENDING TO GET THESE VALUES FROM DATABASE AND NOT FROM ARRAY
	global $pcategory;
	$prcategory = $pcategory[$propid];
	return $prcategory;
}

function getTypes($propid) { ////////////////////////////////////////////// PENDING TO GET THESE VALUES FROM DATABASE AND NOT FROM ARRAY
	global $ptypes;
	$prtypes = $ptypes[$propid];
	return $prtypes;
}

function getPimages($propid) {
	$result = mysqli_query (Database::$conn, "SELECT `name`,`cover`,`ord` FROM `images` WHERE `prop_id` = ".$propid." AND `status` = 1  ORDER BY `ord` ASC");
	$cuantos = mysqli_num_rows($result);
	if($cuantos  > 0) {
		
		$k = 1;
		 while ($row = $result->fetch_assoc()) {
			 if($row["cover"]==1){
		   		$photos[0] =  $row["name"];
			 }else{
				 $photos[$k] =  $row["name"];
				 $k++;
			 }
		}
	} 
	return $photos;
}


function getPcover($propid) {
	$result = mysqli_query (Database::$conn, "SELECT `name`,`cover`,`ord` FROM `images` WHERE `prop_id` = ".$propid." AND `status` = 1 AND `cover` = 1 ORDER BY `ord` ASC");
	$cuantos = mysqli_num_rows($result);
	$cover = ""; // if cases there is no cover image PENDIND **************************************
	if($cuantos  > 0) {
		
		$k = 1;
		 while ($row = $result->fetch_assoc()) {
			 $cover =  $row["name"];		
		}
	} 
	return $cover;
}

function formatMoney($number, $fractional=false) {
    if ($fractional) {
        $number = sprintf('%.2f', $number);
    }
    while (true) {
        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
        if ($replaced != $number) {
            $number = $replaced;
        } else {
            break;
        }
    }
    return $number;
} 

function first_words($sentence, $count) {
  preg_match("/(?:\w+(?:\W+|$)){0,$count}/", $sentence, $matches);
  return $matches[0];
}


function timeAgo($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}


///////////////////// BROWSING FUNCTIONS /////////////////////////////


function selectProp($psearch,$ptype,$pprice,$pbeds,$order,$ascdesc,$limit) {
	
if($psearch === 0){ $psearch = ""; } else { $psearch = " `faddress` LIKE '%".$psearch."%' AND "; }
if($ptype === 0){ $ptype = ""; } else { $ptype = " `type` = ".$ptype." AND "; }
if($pprice === 0){ $pprice = ""; } else { $pprice = " `price` = ".$pprice." AND "; }
if($pbeds === 0){ $pbeds = ""; } else { $pbeds = " `bedrooms` = ".$pbeds." AND "; }

if($order === 0){ $order = " ORDER BY `id` "; } else { $order = " ORDER BY `".$order."`"; }
if($ascdesc === 0){ $ascdesc = "DESC"; } else { $ascdesc = " ".$ascdesc." "; }
if($limit === 0){ $limit = ""; } else { $limit = " LIMIT ".$limit.""; }

$p = array();
$query = "SELECT * FROM `properties` WHERE ".$psearch.$ptype.$pprice.$pbeds." `status` = 1 ".$order." ".$ascdesc." ".$limit."";
$result = mysqli_query (Database::$conn, $query);
$cuantos = mysqli_num_rows($result);
	//echo $psearch;
	//echo $query;
	if($cuantos  > 0) {
		 while ($row = $result->fetch_assoc()) {
			 $row['timeago'] = timeAgo('@'.$row['date2'].'');
			 $row['headline'] = getHeadline($row['headline_id']);
			 $row['cover'] = getPcover($row['id']);
			 $p[] =  $row;
		}
		return $p;
	} else {
		return "No results";
	}
	
}






/*

Database::initialize();
//search,type,price,beds,order,ascdesc,limit
print_r(selectProp("33131",3,1750000,2,"price","DESC",1000));
$close = Database::$conn->close();

/////////////////////////////////////////////////

$string = "This worked great for me. I needed to display only the first 5 sentences however so I switched the 10 to a 5, then switched the ' ' to '. ' in the implode and explode and it worked just fine. I did have to put a period after I displayed the text because the last.";

$words = 8;

echo first_words($string,$words);

////////////////////////////////

Database::initialize();
$propid = 4; //constant

$prop = selectPorperty($propid); //array
$headline = getHeadline($prop[0]['headline_id']);
$description = getHeadline($prop[0]['description_id']);
$pimages = getPimages($propid); //array
$cover = getPcover($propid);
$amenities = getPamenities($propid); //array
/////////////////////////////
print_r($prop);
echo "headline: ".$headline." ";
echo "description: ".$description." ";
echo "cover: ".$cover." ";
print_r($pimages);
print_r($amenities);

$close = Database::$conn->close();

///////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////




$userid = 1;
$length = 28;
$token = bin2hex(random_bytes($length));
$date2 = time();
Database::initialize();
echo addToken($token,$date2,$userid);
$close = Database::$conn->close();

//////////////////////////////////

Database::initialize();
$propid = 2;
$category = 1;
$ff = array("ac","popo");

echo addmetaAmen($propid,$category,$ff);

$close = Database::$conn->close();
//////////////////////////////////////////////

Database::initialize();
$propid = 1;

 echo selectPorperty($propid);

$close = Database::$conn->close();
/////////////////////////////////



Database::initialize();
$propid = 1;
				$meta = "prop_desc";
				$value = "caca"; 
 echo addmetaProp($propid,$meta,$value);

$close = Database::$conn->close();
/////////////////////////////////



$length = 28;
$token = bin2hex(random_bytes($length));
$date2 = time();
Database::initialize();
addToken($token,$date2);
$close = Database::$conn->close();

echo "vava";



////////////////////////////////

Database::initialize();
$file = "0-7-1508386596-108.jpg";
deleteImage($file) ;
$close = Database::$conn->close();

/////////////////////////////////////////////////////////

Database::initialize();
$userid =7;
	$propid = 0;
print_r(selecciona($userid,$propid));
$files = array('0-7-1508370026-117.jpg', '0-7-1508370026-110.jpg', '0-7-1508370026-107.jpg');
print_r($files);
$close = Database::$conn->close();

/////////////////////////////////////////////////////////////

$orden = '100';
$imagename = "POPODHAS";
	$userid =1;
	$propid = 2;
	$finalname = $imagename.$orden.".jpg";
	Database::initialize();
	inserta($userid,$propid,$finalname);
	$close = Database::$conn->close();

/////////////////////////////////////////////////////////////////
$imgname = "0-7-1508300993-109.jpg";
$userid = 7;
$propid = 0;
$finalname = "kkkk";
Database::initialize();
echo addcover($imgname,$userid,$propid);
	$close = Database::$conn->close();

//////////////////////////////////////////////////////////////////


$userid = 0;
$propid = 0;
$finalname = "kkkk";
Database::initialize();
inserta($userid,$propid,$finalname);
	$close = Database::$conn->close();


//selecciona($userid,$propid) ;
//borra("0-7-1507852333-102");

$imgorder = array("0-7-1507852333-103","0-7-1507862483-101","0-7-1507862483-102","0-7-1507862483-103");

$finalname = "0-7-1507852333-101";
Database::initialize();
//borra($finalname);
acomoda($imgorder);
$close = Database::$conn->close();
*/

?>