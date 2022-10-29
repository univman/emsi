<?php
	include('../utils/conn.php');
	$id=$_GET['id'];
	$query=mysqli_query($conn,"select * from `contractors` where ID='$id'");
	$row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<h2>Edycja kontrachenta</h2>
	<div>
		<table>
			<tr>
				<th>Numer NIP</th>
				<th>Numer REGON</th>
				<th>Nazwa</th>
				<th>Płatnik VAT?</th>
				<th>Ulica</th>
				<th>Numer budynku</th>
				<th>Numer lokalu</th>
				<th>Uwagi</th>
			</tr>

			<form action="/utils/update.php?id=<?php echo $id; ?>" method='post'>
				<tr>
					<td><input type='text' value="<?php echo $row['NIP']; ?>" name='nip' size='10' maxlength='10'/></td>
					<td><input type='text' value="<?php echo $row['REGON']; ?>" name='regon' size='10' maxlength='10'/></td>
					<td><input type='text' value="<?php echo $row['NAME']; ?>" name='con_name' size='10' maxlength='10'/></td>
					<td><input type='checkbox' value="<?php echo $row['VAT_PAYER']; ?>" name='vat_payer'/>Płatnik VAT?</td>
					<td><input type='text' value="<?php echo $row['STREET']; ?>" name='street' size='10' maxlength='10'/></td>
					<td><input type='text' value="<?php echo $row['STREET_NUMBER']; ?>" name='street_number' size='10' maxlength='10'/></td>
					<td><input type='text' value="<?php echo $row['APARTMENT_NUMBER']; ?>" name='apartment_number' size='10' maxlength='10'/></td>
					<td><input type='text' value="<?php echo $row['NOTES']; ?>" name='notes' size='10' maxlength='10'/></td>
					<td><input type='submit' value='Aktualizuj dane' name='add_contractor'></td>
				</tr>
			</form>
		</table>
	</div>
</body>
</html>