<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadanie zdalne e-MSI</title>
</head>
<body>
    <p>
        <table class="blueTable">
			<thead>
				<th>Numer NIP</th>
				<th>Numer REGON</th>
                <th>Nazwa</th>
                <th>Data utworzenia</th>
				<th>Ulica</th>
                <th>Numer budynku</th>
				<th>Numer lokalu</th>
                <th>Uwagi</th>
			</thead>
            <?php
                $result = $conn->query("SELECT * FROM contractors");

                if($result->num_rows > 0) {

                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["NIP"] . " </td>";
                        echo "<td>" . $row["REGON"] . " </td>";
                        echo "<td>" . $row["NAME"] . " </td>";
                        echo "<td>" . $row["CREATION_DATE"] . " </td>";
                        echo "<td>" . $row["STREET"] . " </td>";
                        echo "<td>" . $row["STREET_NUMBER"] . " </td>";
                        echo "<td>" . $row["APARTMENT_NUMBER"] . " </td>";
                        echo "<td>" . $row["NOTES"] . " </td>";
                        echo "</tr>";
                    }

                } else {

                    echo "Pusta baza danych";

                }
            ?>
            <form action='' method='post'>
                <tr><td class="black" colspan="8"> </td></tr>
                <tr><td class="bold" colspan="8">Wprowadzanie danych</td></tr>
                <thead>
                    <th>Numer NIP</th>
                    <th>Numer REGON</th>
                    <th>Nazwa</th>
                    <th>Data utworzenia</th>
                    <th>Ulica</th>
                    <th>Numer budynku</th>
                    <th>Numer lokalu</th>
                    <th>Uwagi</th>
                </thead>
                <tr>
                    <td><input type='text' name='nip' size='10' maxlength='10' style="border:none"/></td>
                    <td><input type='text' name='regon' size='10' maxlength='10' style="border:none"/></td>
                    <td><input type='text' name='con_name' size='10' maxlength='10' style="border:none"/></td>
                    <td><input type='text' name='date' size='10' maxlength='10' style="border:none"/></td>
                    <td><input type='text' name='street' size='10' maxlength='10' style="border:none"/></td>
                    <td><input type='text' name='street_number' size='10' maxlength='10' style="border:none"/></td>
                    <td><input type='text' name='apartment_number' size='10' maxlength='10' style="border:none"/></td>
                    <td><input type='text' name='notes' size='10' maxlength='10' style="border:none"/></td>
                </tr>
            </form>
        </table>
    </p>

    <form>
        <select name="kolory">
            <option>zielony</option>
            <option>niebieski</option>
            <option>szary</option>
            <option>turkusowy</option>
            <option>granatowy</option>
            <option>czerwony</option>
            <option>biały</option>
        </select>
        <select name="VAT">
            <option>ZW</option>
            <option>NP</option>
            <option>0%</option>
            <option>3%</option>
            <option>8%</option>
            <option>23%</option>
        </select>
    </form>

    <div>
        <ol>
            <li>Element</li>
            <li>Element</li>
            <li>Element</li>
        </ol>
    </div>

</body>
</html>