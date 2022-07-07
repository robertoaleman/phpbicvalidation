<?php

/* Class Validate Container Owner 1.0

Author:Roberto Aleman
Website: ventics.com

THIS KIND CHECK THE OWNER OF A CONTAINER TO THE CODE EACH CONTAINER HAVING PRINTED ON ITS EXTERNAL AND SHOWING A LINK TO THE INFORMATION OWNER, USED TO LOCATE THE OWNER OF ANY CONTAINER OR KNOW IF HAS BEEN ALTERED IN CODE CHECKER CONTAINER

From Wikipedia, the free encyclopedia
A 40-foot (12.19 m) long shipping container. Each of the eight corners has a simple twistlock fitting for stacking, locking and hoisting
There are over seventeen million shipping containers in the world Containers on rails in Jyv�skyl�, Finland Containers standing with their loading doors open
Stacking shipping containers each with a standard ISO 6346 reporting mark Corner casting on a shipping container. The twistlock proper is done through a larger oval hole on the bottom.
An intermodal container (also container, freight container, ISO container, shipping container, hi-cube container, box, conex box and sea can) is a standardized reusable steel box. They are used to store and move materials and products in the global containerized intermodal freight transport system efficiently and securely. "Intermodal" indicates that the container can be moved from one mode of transport to another (from ship, to rail, to truck) without unloading and reloading the contents of the container. Lengths of containers, which each have a unique ISO 6346 reporting mark, vary from 8 to 56 feet (2.438 to 17.069 m) and heights from 8 feet (2.438 m) to 9 feet 6 inches (2.896 m). There are about 17 million intermodal containers in the world of varying types to suit different cargoes.
Each container is allocated a standardized ISO 6346 reporting mark (ownership code), four characters long ending in either U, J or Z, followed by six numbers and a check digit.[25] The ownership code for intermodal containers is issued by the Bureau International des Containers et du Transport Intermodal (41 rue R�aumur, 75003 - Paris France), hence the name BIC-Code for the intermodal container reporting mark. So far there exist only four-letter BIC-Codes ending in "U".
The placement and registration of BIC Codes is standardized by the commissions TC104 and TC122 in the JTC1 of the ISO which are dominated by shipping companies. Shipping containers are labelled with a series of identification codes that includes the manufacturer code, the ownership code, usage classification code, UN placard for hazardous goods and reference codes for additional transport control and security.

*/
class validate_container_owner {

function __construct()
{
	global	$url_bic_code;
}

	function calculate ($code_container_to_test)
	{

		$separate = str_split($code_container_to_test);
		$acroni = strtolower ($separate[0].$separate[1].$separate[2].$separate[3]);
	
	$url_bic_code = "http://www.bic-code.org/container-bic-code-".$acroni.".html"; // LINK TO MORE INFO


for ($i = 0; $i <= 3; $i++) {

switch ($separate[$i]) {
	case "A":
		$separate[$i] = 10;
		break;
	case "B":
		$separate[$i] = 12;//  the 11 value is ignored by the algorithm
		break;
	case "C":
		$separate[$i] = 13;
		break;
	case "D":
		$separate[$i] = 14;
		break;
	case "E":
		$separate[$i] = 15;
		break;
	case "F":
		$separate[$i] = 16;
		break;
	case "G":
		$separate[$i] = 17;
		break;
	case "H":
		$separate[$i] = 18;
		break;
	case "I":
		$separate[$i] = 19;
		break;
	case "J":
		$separate[$i] = 20;
		break;
	case "K":
		$separate[$i] = 21;
		break;
	case "L": //  the 22 value is ignored by the algorithm
		$separate[$i] = 23;
		break;
	case "M":
		$separate[$i] = 24;
		break;
	case "N":
		$separate[$i] = 25;
		break;
	case "O":
		$separate[$i] = 26;
		break;
	case "P":
		$separate[$i] = 27;
		break;
	case "Q":
		$separate[$i] = 28;
		break;
	case "R":
		$separate[$i] = 29;
		break;
	case "S":
		$separate[$i] = 30;
		break;
	case "T":
		$separate[$i] = 31;
		break;
	case "U":
		$separate[$i] = 32;
		break;
	case "V":
		$separate[$i] = 34;// the 33 value is ignored by the algorithm
		break;
	case "W":
		$separate[$i] = 35;
		break;
	case "X":
		$separate[$i] = 36;
		break;
	case "Y":
		$separate[$i] = 37;
		break;
	case "Z":
		$separate[$i] = 38;
		break;


	}

	
}

$v1 = ($separate[0]*pow(2,0))+ ($separate[1]*pow(2,1))+ ($separate[2]*pow(2,2))+ ($separate[3]*pow(2,3))+ ($separate[4]*pow(2,4))+ ($separate[5]*pow(2,5))+ ($separate[6]*pow(2,6))+ ($separate[7]*pow(2,7))+ ($separate[8]*pow(2,8))+ ($separate[9]*pow(2,9)) ;

$not_decimals = explode(".",($v1/11));
$v2 = $not_decimals[0]*11;
$gran_total = $v1 - $v2;

if ($gran_total == 10)
{
	$gran_total =0;
}
$show_check = new validate_container_owner();
$show_check->show_message($code_container_to_test, $url_bic_code,$separate[10],$gran_total);

	}

function show_message($c,$u,$s,$g)
{

	if ($g == $s)
	{
		$message = "DIGIT BOTH AGREE THAT MEANS THAT THE CONTAINER IS CORRECTLY IDENTIFIED";
	}
	else
	{
		$message = "<b>ERROR OCCURRED IN IDENTIFYING THE CONTAINER, CHECK AND TRY AGAIN!</b>";
		}


	echo "<div style='text-align:center'>
	YOU SEE THE OWNER HAS REQUESTED THE CONTAINER WITH CODE <b>".$c."</b>
	<br/><br/>
	BY THE DIGIT VERIFICATION ALGORITHM IS : ".$g." <br/><br/>
	YOU HAVE ENTERED THE NUMBER DIGIT VERIFICATION AS PRINTED IN THE CONTAINER:".$s."<br><br>".$message."! <br><br>
	CONTAINER IS PROPERLY VERIFIED FOR OWNER, CAN SEE THE OWNER INFORMATION ON THE FOLLOWING LINK:<br>
	<a href=".$u.">$u<br/>CLICK HERE TO SEE MORE ABOUT THIS COTAINER!</a><br/>
	<br/><br/> <br/><br/>CHECK ANOTHER COTAINER?</div>";

}
}
?>
