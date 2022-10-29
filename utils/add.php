<?php
	include('../utils/conn.php');
 
	$nip = $_POST["nip"];
    $regon = $_POST["regon"];
    $con_name = $_POST["con_name"];
    $vat_payer = $_POST["vat_payer"];
    $street = $_POST["street"];
    $street_number = $_POST["street_number"];
    $apartment_number = $_POST["apartment_number"];
    $notes = $_POST["notes"];
 
	mysqli_query($conn, "INSERT INTO contractors(
        `NIP`, `REGON`, `NAME`, `VAT_PAYER`, `STREET`, `STREET_NUMBER`, `APARTMENT_NUMBER`, `NOTES`) 
    VALUES(
        '$nip', '$regon', '$con_name', '$vat_payer', '$street',
        '$street_number', '$apartment_number', '$notes');");

	header('location:/index.php?page=contractor_form');
 
?>