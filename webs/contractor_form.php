<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<p>
	<div>
		<table class="blueTable">
			<thead>
				<th>Numer NIP</th>
				<th>Numer REGON</th>
                <th>Nazwa</th>
				<th>Płatnik VAT?</th>
                <th>Data utworzenia</th>
				<th>Ulica</th>
                <th>Numer budynku</th>
				<th>Numer lokalu</th>
                <th>Uwagi</th>
				<th>Akcje</th>
			</thead>
			<tbody>
				<?php
					include('./utils/conn.php');
					$query=mysqli_query($conn,"select * from `contractors`");
					while($row=mysqli_fetch_array($query)) {
						?>
						<tr>
							<td><?php echo $row['NIP']; ?></td>
							<td><?php echo $row['REGON']; ?></td>
                            <td><?php echo $row['NAME']; ?></td>
							<td><?php echo $row['VAT_PAYER']; ?></td>
                            <td><?php echo $row['CREATION_DATE']; ?></td>
							<td><?php echo $row['STREET']; ?></td>
                            <td><?php echo $row['STREET_NUMBER']; ?></td>
							<td><?php echo $row['APARTMENT_NUMBER']; ?></td>
                            <td><?php echo $row['NOTES']; ?></td>
							<td>
								<a class="button" href="/webs/contractor_edit.php?id=<?php echo $row['ID']; ?>">Edit</a>
								<a class="button" href="/utils/delete.php?id=<?php echo $row['ID']; ?>">Delete</a>
							</td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
	</div>
    <div>
		</br></br>
		<table class="blueTable">
			<thead>
                <th>Numer NIP</th>
                <th>Numer REGON</th>
                <th>Nazwa</th>
                <th>Płatnik VAT?</th>
                <th>Ulica</th>
                <th>Numer budynku</th>
                <th>Numer lokalu</th>
                <th>Uwagi</th>
				<th>Akcje</th>
				</thead>

            <form action='/utils/add.php' method='post'>
                <tr>
                    <td><input type='text' name='nip' size='10' maxlength='10'/></td>
                    <td><input type='text' name='regon' size='10' maxlength='10'/></td>
                    <td><input type='text' name='con_name' size='10' maxlength='10'/></td>
                    <td><input type='checkbox' name='vat_payer' value='1'/>Płatnik VAT?</td>
                    <td><input type='text' name='street' size='10' maxlength='10'/></td>
                    <td><input type='text' name='street_number' size='10' maxlength='10'/></td>
                    <td><input type='text' name='apartment_number' size='10' maxlength='10'/></td>
                    <td><input type='text' name='notes' size='10' maxlength='10'/></td>
                    <td><input type='submit' name='add_contractor' value='Dodaj kontrahenta'></td>
                </tr>
            </form>
        </table>
	</div>
	</p>
</body>
</html>