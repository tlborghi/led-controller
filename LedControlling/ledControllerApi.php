<?php
/*
 * Leds2.php
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
	require 'Leds.php';
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		//echo "Received";
		//print_r($_POST);
		//echo $_POST["blueLedStatus"];
		if ($_POST["toDo"] == "setLed") {
			echo "setting Leds";
			if ($_POST["blueLedStatus"] == "true") {
				setLed("blue", 1);
			} else {
				setLed("blue", 0);
			}
			if ($_POST["greenLedStatus"] == "true") {
				setLed("green", 1);
			} else {
				setLed("green", 0);
			}
		} else {
			$blueLedStatus = getLedStatus("blue");
			$greenLedStatus = getLedStatus("green");
			if ($blueLedStatus) {
				$blueLedStatus = "true";
			} else {
				$blueLedStatus = "false";
			}
			if ($greenLedStatus) {
				$greenLedStatus = "true";
			} else {
				$greenLedStatus = "false";
			}
			$LedStatus = [
				"blueLedStatus" => $blueLedStatus,
				"greenLedStatus" => $greenLedStatus,
			];
			//echo $blueLedStatus;
			//echo "          ";
			//echo $greenLedStatus;
			echo json_encode($LedStatus);
		}
	}


?>
