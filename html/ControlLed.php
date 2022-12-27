<?php
/*
 * ControlLed.php
 * 
 * Copyright 2022 tborghi <tborghi@tborghi-lnx>
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA 02110-1301, USA.
 * 
 * 
 */

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Led Controller</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.36" />
    <link href="/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- <link href="/bootstrap/css/bootstrap-switch.css" rel="stylesheet"> (it seems bootstrap 5 does not need this)-->
    <script src="/javascript/jquery/jquery.js"></script>
    <!-- <script src="/bootstrap/js/bootstrap-switch.js"></script> -->
    <script src="/bootstrap-switch.js"></script>
</head>
<?php
	require 'Leds.php';
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		//echo print_r($_Post);
		if (empty($_POST["blueLedStatus"])){
			echo "Please enter blue led status <br>";
		}else{
			if ($_POST["blueLedStatus"] == "on"){
				echo "Turning blue led on <br>";
				setLed("blue", 1);
			}else{
				echo "Turning blue led off <br>";
				setLed("blue", 0);
			}
		}
		if (empty($_POST["greenLedStatus"])) {
			echo "Please enter green led status <br>";
		}else{
			if ($_POST["greenLedStatus"] == "on") {
				echo "Turning green led on <br>";
				setLed("green", 1);
			}else{
				echo "Turning green led off <br>";
				setLed("green", 0);
			}
		}
	}
	
	$ledStatus = [
		"blueOn" => "",
		"blueOff" => "",
		"greenOn" => "",
		"greenOff" => "",
	];
	if (getLedStatus("blue")) {
		$ledStatus["blueOn"] = "checked";
	} else {
		$ledStatus["blueOff"] = "checked";
	}
	if (getLedStatus("green")) {
		$ledStatus["greenOn"] = "checked";
	} else {
		$ledStatus["greenOff"] = "checked";
	}


?>
<body>
	<form method="Post">
		<h2>Blue Led:</h2>
		<label>
		<input type="radio" name="blueLedStatus" value="on" <?php echo $ledStatus["blueOn"]?> >
		On
		</label>
		<br>
		<label></label>
		<input type="radio" name="blueLedStatus" value="off" <?php echo $ledStatus["blueOff"]?> >
		Off
		</label>
		<h2>Green Led (system status):</h2>
		<label>
		<input type="radio" name="greenLedStatus" value="on" <?php echo $ledStatus["greenOn"]?> >
		On
		</label>
		<br>
		<label></label>
		<input type="radio" name="greenLedStatus" value="off" <?php echo $ledStatus["greenOff"]?> >
		Off
		</label>
		<br>
		<button type="submit">Ok</button>
	</form>
</body>

</html>
