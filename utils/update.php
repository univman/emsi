<?php
	include('../utils/conn.php');
	$id=$_GET['id'];
 
    $nip = $_POST["nip"];
    $regon = $_POST["regon"];
    $con_name = $_POST["con_name"];
    $vat_payer = $_POST["vat_payer"];
    $street = $_POST["street"];
    $street_number = $_POST["street_number"];
    $apartment_number = $_POST["apartment_number"];
    $notes = $_POST["notes"];
 
	mysqli_query($conn,"update `contractors` set nip='$nip', regon='$regon', name='$con_name', vat_payer='$vat_payer',
    street='$street', street_number='$street_number', apartment_number='$apartment_number', notes='$notes' where id='$id'");

	header('location:/index.php?page=contractor_form');
?>