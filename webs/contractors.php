<p>
    <?php
        $result = $conn->query("SELECT * FROM contractors");

        if($result->num_rows > 0) {

            echo "<table>";

            echo "<tr>";
            echo "<th>Numer NIP</th>";
            echo "<th>Numer REGON</th>";
            echo "<th>Nazwa</th>";
            echo "<th>Płatnik VAT?</th>";
            echo "<th>Data utworzenia</th>";
            echo "<th>Ulica</th>";
            echo "<th>Numer budynku</th>";
            echo "<th>Numer lokalu</th>";
            echo "<th>Uwagi</th>";
            echo "<th>Akcje</th>";
            echo "</tr>";

            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["NIP"] . " </td>";
                echo "<td>" . $row["REGON"] . " </td>";
                echo "<td>" . $row["NAME"] . " </td>";
                echo "<td>" . $row["VAT_PAYER"] . " </td>";
                echo "<td>" . $row["CREATION_DATE"] . " </td>";
                echo "<td>" . $row["STREET"] . " </td>";
                echo "<td>" . $row["STREET_NUMBER"] . " </td>";
                echo "<td>" . $row["APARTMENT_NUMBER"] . " </td>";
                echo "<td>" . $row["NOTES"] . " </td>";
                echo "<td><a href='index.php?page=edit_contractor&id=".$row['ID']."'>Edytuj</a></br>";
                echo "<a href='utils/delete.php?id=".$row['ID']."'>Usuń</a></td>";
                echo "</tr>";
            }
            
        } else {
            echo "Pusta baza danych";
        }
        echo "<a href='index.php?page=add_contractor'>Dodaj kontrahenta</button>";

        
    ?>
</p>