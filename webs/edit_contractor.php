<p>
    <?php
        $result = $conn->query("SELECT * FROM contractors");

        if(isset($_POST["nip"])) {
            $nip = $_POST["nip"];
            $regon = $_POST["regon"];
            $con_name = $_POST["con_name"];
            $vat_payer = $_POST["vat_payer"];
            $street = $_POST["street"];
            $street_number = $_POST["street_number"];
            $apartment_number = $_POST["apartment_number"];
            $notes = $_POST["notes"];
            $insert = 0;

            if(empty($nip) || 
            empty($regon) || 
            empty($con_name) ||
            empty($street) || 
            empty($street_number) || 
            empty($apartment_number) || 
            empty($notes)) {
                echo "Wypełnij wszystkie pola";
            } else {
                $insert = $conn->query("INSERT INTO contractors(`NIP`, `REGON`, `NAME`, `VAT_PAYER`, `STREET`, `STREET_NUMBER`, `APARTMENT_NUMBER`, `NOTES`) 
                VALUES('$nip', '$regon', '$con_name', '$vat_payer', '$street', '$street_number', '$apartment_number', '$notes');");
            }

            if ($insert) {
                $message = "User updated Sussesfully!";
                 header('location:index.php?page=contractors');
             }else {
                 header('location:index.php?page=add_contractors');
             }
        }

        if($result->num_rows > 0) {

            echo "<table>";

            echo "<tr>";
            echo "<th>Numer NIP</th>";
            echo "<th>Numer REGON</th>";
            echo "<th>Nazwa</th>";
            echo "<th>Płatnik VAT?</th>";
            echo "<th>Ulica</th>";
            echo "<th>Numer budynku</th>";
            echo "<th>Numer lokalu</th>";
            echo "<th>Uwagi</th>";
            echo "</tr>";

            echo "<form action='' method='post'>";
            echo "<tr>";
                echo "<td><input type='text' name='nip' size='10' maxlength'10'/></td>";
                echo "<td><input type='text' name='regon' size='10' maxlength'10'/></td>";
                echo "<td><input type='text' name='con_name' size='10' maxlength'10'/></td>";
                echo "<td><input type='checkbox' name='vat_payer' value='1'/>Płatnik VAT?</td>";
                echo "<td><input type='text' name='street' size='10' maxlength'10'/></td>";
                echo "<td><input type='text' name='street_number' size='10' maxlength'10'/></td>";
                echo "<td><input type='text' name='apartment_number' size='10' maxlength'10'/></td>";
                echo "<td><input type='text' name='notes' size='10' maxlength'10'/></td>";
                echo "<td><input type='submit' name='add_contractor' value='Dodaj kontrahneta'></td>";
            echo "</tr>";
            echo "</form>";

            echo "</table>";

        } else {
            echo "Pusta baza danych";
        }

    ?>
</p>